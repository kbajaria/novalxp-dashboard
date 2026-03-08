<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_novalxp_execdashboard\local;

defined('MOODLE_INTERNAL') || die();

class metrics {
    /**
     * Build shared joins and where fragments for dashboard filters.
     *
     * @param int $cohortid Optional cohort scope.
     * @param int $categoryid Optional category scope.
     * @param array<string,int> $params Query params updated by reference.
     * @return array{joins:string,where:string}
     */
    protected static function filter_sql(int $cohortid, int $categoryid, array &$params): array {
        $joins = '';
        $where = '';

        if ($cohortid > 0) {
            $joins .= " JOIN {cohort_members} cm
                          ON cm.userid = ue.userid";
            $where .= " AND cm.cohortid = :cohortid";
            $params['cohortid'] = $cohortid;
        }
        if ($categoryid > 0) {
            $where .= " AND c.category = :categoryid";
            $params['categoryid'] = $categoryid;
        }

        return ['joins' => $joins, 'where' => $where];
    }

    /**
     * Return available cohorts keyed by ID.
     *
     * @return array<int,string>
     */
    public static function cohort_options(): array {
        global $DB;

        $records = $DB->get_records('cohort', null, 'name ASC, id ASC', 'id,name');
        $options = [0 => get_string('filter_allcohorts', 'local_novalxp_execdashboard')];
        foreach ($records as $record) {
            $options[(int)$record->id] = (string)$record->name;
        }

        return $options;
    }

    /**
     * Return available course categories keyed by ID.
     *
     * @return array<int,string>
     */
    public static function category_options(): array {
        global $DB;

        $sql = "SELECT id, name, depth
                  FROM {course_categories}
              ORDER BY path ASC, id ASC";
        $records = $DB->get_records_sql($sql);
        $options = [0 => get_string('filter_allcategories', 'local_novalxp_execdashboard')];
        foreach ($records as $record) {
            $depth = max(0, ((int)$record->depth) - 1);
            $label = str_repeat('- ', $depth) . (string)$record->name;
            $options[(int)$record->id] = $label;
        }

        return $options;
    }

    /**
     * Return first-pass executive KPI summary metrics.
     *
     * @param int $windowdays Rolling window for period metrics.
     * @param int $cohortid Optional cohort scope.
     * @param int $categoryid Optional course category scope.
     * @return array<string,int|float>
     */
    public static function summary(int $windowdays = 30, int $cohortid = 0, int $categoryid = 0): array {
        global $DB, $SITE;

        $now = time();
        $windowstart = $now - ($windowdays * DAYSECS);
        $params = [
            'siteid' => (int)$SITE->id,
            'ueactive' => 0,
            'eactive' => 0,
            'nowstart' => $now,
            'nowend' => $now,
            'windowstartenrol' => $windowstart,
            'windowstartcomplete' => $windowstart,
        ];
        $filters = self::filter_sql($cohortid, $categoryid, $params);
        $joins = $filters['joins'];
        $where = $filters['where'];

        $sql = "SELECT COUNT(1) AS activeenrolments,
                       COUNT(DISTINCT d.userid) AS activelearners,
                       SUM(CASE WHEN d.timecompleted IS NOT NULL THEN 1 ELSE 0 END) AS completions,
                       SUM(CASE WHEN d.timecompleted IS NULL AND d.started = 1 THEN 1 ELSE 0 END) AS inprogress,
                       SUM(CASE WHEN d.timecompleted IS NULL AND d.started = 0 THEN 1 ELSE 0 END) AS notstarted,
                       SUM(CASE WHEN d.uecreated >= :windowstartenrol THEN 1 ELSE 0 END) AS newenrolmentswindow,
                       SUM(CASE WHEN d.timecompleted >= :windowstartcomplete THEN 1 ELSE 0 END) AS completionswindow
                  FROM (
                    SELECT DISTINCT ue.userid,
                           e.courseid,
                           cc.timecompleted,
                           CASE WHEN EXISTS (
                               SELECT 1
                                 FROM {course_modules} cm
                                 JOIN {course_modules_completion} cmc
                                   ON cmc.coursemoduleid = cm.id
                                WHERE cm.course = e.courseid
                                  AND cmc.userid = ue.userid
                                  AND cmc.completionstate <> 0
                           ) THEN 1 ELSE 0 END AS started,
                           COALESCE(ue.timecreated, ue.timestart, 0) AS uecreated
                      FROM {enrol} e
                      JOIN {user_enrolments} ue
                        ON ue.enrolid = e.id
                      JOIN {course} c
                        ON c.id = e.courseid
                      {$joins}
                 LEFT JOIN {course_completions} cc
                        ON cc.course = e.courseid
                       AND cc.userid = ue.userid
                     WHERE ue.status = :ueactive
                       AND e.status = :eactive
                       AND e.courseid <> :siteid
                       AND (ue.timestart = 0 OR ue.timestart <= :nowstart)
                       AND (ue.timeend = 0 OR ue.timeend > :nowend)
                       {$where}
                  ) d";

        $record = $DB->get_record_sql($sql, $params);

        $activeenrolments = (int)($record->activeenrolments ?? 0);
        $activelearners = (int)($record->activelearners ?? 0);
        $completions = (int)($record->completions ?? 0);
        $inprogress = (int)($record->inprogress ?? 0);
        $notstarted = (int)($record->notstarted ?? 0);
        $newenrolmentswindow = (int)($record->newenrolmentswindow ?? 0);
        $completionswindow = (int)($record->completionswindow ?? 0);
        $completionrate = $activeenrolments > 0 ? round(($completions / $activeenrolments) * 100, 1) : 0.0;

        return [
            'activelearners' => $activelearners,
            'activeenrolments' => $activeenrolments,
            'completions' => $completions,
            'inprogress' => $inprogress,
            'notstarted' => $notstarted,
            'completionrate' => $completionrate,
            'newenrolmentswindow' => $newenrolmentswindow,
            'completionswindow' => $completionswindow,
        ];
    }

    /**
     * Return course-level funnel metrics for active enrolments.
     *
     * @param int $windowdays Rolling window for period metrics.
     * @param int $cohortid Optional cohort scope.
     * @param int $categoryid Optional course category scope.
     * @param int $limit Maximum rows to return.
     * @return array<int,array<string,int|float|string>>
     */
    public static function course_breakdown(
        int $windowdays = 30,
        int $cohortid = 0,
        int $categoryid = 0,
        int $limit = 15
    ): array {
        global $DB, $SITE;

        $now = time();
        $windowstart = $now - ($windowdays * DAYSECS);
        $params = [
            'siteid' => (int)$SITE->id,
            'ueactive' => 0,
            'eactive' => 0,
            'nowstart' => $now,
            'nowend' => $now,
            'windowstartenrol' => $windowstart,
            'windowstartcomplete' => $windowstart,
        ];
        $filters = self::filter_sql($cohortid, $categoryid, $params);
        $joins = $filters['joins'];
        $where = $filters['where'];

        $sql = "SELECT c.id,
                       c.fullname,
                       COUNT(1) AS activeenrolments,
                       COUNT(DISTINCT ue.userid) AS activelearners,
                       SUM(CASE WHEN cc.timecompleted IS NOT NULL THEN 1 ELSE 0 END) AS completions,
                       SUM(CASE WHEN cc.timecompleted IS NULL AND COALESCE(started.started, 0) = 1 THEN 1 ELSE 0 END) AS inprogress,
                       SUM(CASE WHEN cc.timecompleted IS NULL AND COALESCE(started.started, 0) = 0 THEN 1 ELSE 0 END) AS notstarted,
                       SUM(CASE WHEN COALESCE(ue.timecreated, ue.timestart, 0) >= :windowstartenrol THEN 1 ELSE 0 END) AS newenrolmentswindow,
                       SUM(CASE WHEN cc.timecompleted >= :windowstartcomplete THEN 1 ELSE 0 END) AS completionswindow
                  FROM {enrol} e
                  JOIN {user_enrolments} ue
                    ON ue.enrolid = e.id
                  {$joins}
                  JOIN {course} c
                    ON c.id = e.courseid
             LEFT JOIN (
                    SELECT cm.course,
                           cmc.userid,
                           1 AS started
                      FROM {course_modules} cm
                      JOIN {course_modules_completion} cmc
                        ON cmc.coursemoduleid = cm.id
                     WHERE cmc.completionstate <> 0
                  GROUP BY cm.course, cmc.userid
             ) started
                    ON started.course = e.courseid
                   AND started.userid = ue.userid
             LEFT JOIN {course_completions} cc
                    ON cc.course = e.courseid
                   AND cc.userid = ue.userid
                 WHERE ue.status = :ueactive
                   AND e.status = :eactive
                   AND e.courseid <> :siteid
                   AND (ue.timestart = 0 OR ue.timestart <= :nowstart)
                   AND (ue.timeend = 0 OR ue.timeend > :nowend)
                   {$where}
              GROUP BY c.id, c.fullname
              ORDER BY activeenrolments DESC, completions DESC, c.fullname ASC";

        $records = $DB->get_records_sql($sql, $params, 0, $limit);
        $rows = [];
        foreach ($records as $record) {
            $activeenrolments = (int)$record->activeenrolments;
            $completions = (int)$record->completions;
            $rows[] = [
                'courseid' => (int)$record->id,
                'coursename' => (string)$record->fullname,
                'activeenrolments' => $activeenrolments,
                'activelearners' => (int)$record->activelearners,
                'completions' => $completions,
                'inprogress' => (int)$record->inprogress,
                'notstarted' => (int)$record->notstarted,
                'completionrate' => $activeenrolments > 0 ? round(($completions / $activeenrolments) * 100, 1) : 0.0,
                'newenrolmentswindow' => (int)$record->newenrolmentswindow,
                'completionswindow' => (int)$record->completionswindow,
            ];
        }

        return $rows;
    }

    /**
     * Return bucketed enrolment and completion trend rows for the reporting window.
     *
     * @param int $windowdays Rolling window for period metrics.
     * @param int $cohortid Optional cohort scope.
     * @param int $categoryid Optional course category scope.
     * @return array<int,array<string,int|string>>
     */
    public static function trend_series(int $windowdays = 30, int $cohortid = 0, int $categoryid = 0): array {
        global $DB, $SITE;

        $now = time();
        $windowstart = $now - ($windowdays * DAYSECS);
        $params = [
            'siteid' => (int)$SITE->id,
            'ueactive' => 0,
            'eactive' => 0,
            'nowstart' => $now,
            'nowend' => $now,
            'windowstartenrol' => $windowstart,
            'windowstartcomplete' => $windowstart,
        ];
        $filters = self::filter_sql($cohortid, $categoryid, $params);
        $joins = $filters['joins'];
        $where = $filters['where'];

        $sql = "SELECT COALESCE(ue.timecreated, ue.timestart, 0) AS uecreated,
                       cc.timecompleted
                  FROM {enrol} e
                  JOIN {user_enrolments} ue
                    ON ue.enrolid = e.id
                  JOIN {course} c
                    ON c.id = e.courseid
                  {$joins}
             LEFT JOIN {course_completions} cc
                    ON cc.course = e.courseid
                   AND cc.userid = ue.userid
                 WHERE ue.status = :ueactive
                   AND e.status = :eactive
                   AND e.courseid <> :siteid
                   AND (ue.timestart = 0 OR ue.timestart <= :nowstart)
                   AND (ue.timeend = 0 OR ue.timeend > :nowend)
                   AND (
                        COALESCE(ue.timecreated, ue.timestart, 0) >= :windowstartenrol
                     OR cc.timecompleted >= :windowstartcomplete
                   )
                   {$where}";

        $records = $DB->get_records_sql($sql, $params);
        $bucketdays = $windowdays > 30 ? 7 : 1;
        $series = [];

        for ($start = $windowstart; $start <= $now; $start += ($bucketdays * DAYSECS)) {
            $bucketstart = $start;
            $bucketend = min($now, $bucketstart + ($bucketdays * DAYSECS) - 1);
            $key = (string)$bucketstart;
            $series[$key] = [
                'label' => self::bucket_label($bucketstart, $bucketend, $bucketdays),
                'newenrolments' => 0,
                'completions' => 0,
            ];
        }

        foreach ($records as $record) {
            $uecreated = (int)$record->uecreated;
            $timecompleted = (int)($record->timecompleted ?? 0);

            if ($uecreated >= $windowstart) {
                $bucketkey = (string)self::bucket_start($uecreated, $windowstart, $bucketdays);
                if (isset($series[$bucketkey])) {
                    $series[$bucketkey]['newenrolments']++;
                }
            }

            if ($timecompleted >= $windowstart) {
                $bucketkey = (string)self::bucket_start($timecompleted, $windowstart, $bucketdays);
                if (isset($series[$bucketkey])) {
                    $series[$bucketkey]['completions']++;
                }
            }
        }

        return array_values($series);
    }

    /**
     * Normalise a timestamp into the configured bucket start.
     *
     * @param int $timestamp Timestamp to normalise.
     * @param int $windowstart Window lower bound.
     * @param int $bucketdays Bucket size in days.
     * @return int
     */
    protected static function bucket_start(int $timestamp, int $windowstart, int $bucketdays): int {
        $offset = max(0, $timestamp - $windowstart);
        $bucketseconds = $bucketdays * DAYSECS;
        return $windowstart + (int)floor($offset / $bucketseconds) * $bucketseconds;
    }

    /**
     * Build a friendly label for a trend bucket.
     *
     * @param int $bucketstart Bucket start timestamp.
     * @param int $bucketend Bucket end timestamp.
     * @param int $bucketdays Bucket size in days.
     * @return string
     */
    protected static function bucket_label(int $bucketstart, int $bucketend, int $bucketdays): string {
        if ($bucketdays === 1) {
            return userdate($bucketstart, '%d %b');
        }

        return userdate($bucketstart, '%d %b') . ' - ' . userdate($bucketend, '%d %b');
    }
}
