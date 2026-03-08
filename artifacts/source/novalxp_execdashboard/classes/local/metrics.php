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
     * Return first-pass executive KPI summary metrics.
     *
     * @return array<string,int|float>
     */
    public static function summary(): array {
        global $DB, $SITE;

        $now = time();
        $days30 = $now - (30 * DAYSECS);
        $params = [
            'siteid' => (int)$SITE->id,
            'ueactive' => 0,
            'eactive' => 0,
            'nowstart' => $now,
            'nowend' => $now,
            'days30' => $days30,
        ];

        $sql = "SELECT COUNT(1) AS activeenrolments,
                       COUNT(DISTINCT d.userid) AS activelearners,
                       SUM(CASE WHEN d.timecompleted IS NOT NULL THEN 1 ELSE 0 END) AS completions,
                       SUM(CASE WHEN d.uecreated >= :days30 THEN 1 ELSE 0 END) AS newenrolments30,
                       SUM(CASE WHEN d.timecompleted >= :days30 THEN 1 ELSE 0 END) AS completions30
                  FROM (
                    SELECT DISTINCT ue.userid,
                           e.courseid,
                           cc.timecompleted,
                           COALESCE(ue.timecreated, ue.timestart, 0) AS uecreated
                      FROM {enrol} e
                      JOIN {user_enrolments} ue
                        ON ue.enrolid = e.id
                 LEFT JOIN {course_completions} cc
                        ON cc.course = e.courseid
                       AND cc.userid = ue.userid
                     WHERE ue.status = :ueactive
                       AND e.status = :eactive
                       AND e.courseid <> :siteid
                       AND (ue.timestart = 0 OR ue.timestart <= :nowstart)
                       AND (ue.timeend = 0 OR ue.timeend > :nowend)
                  ) d";

        $record = $DB->get_record_sql($sql, $params);

        $activeenrolments = (int)($record->activeenrolments ?? 0);
        $activelearners = (int)($record->activelearners ?? 0);
        $completions = (int)($record->completions ?? 0);
        $newenrolments30 = (int)($record->newenrolments30 ?? 0);
        $completions30 = (int)($record->completions30 ?? 0);
        $completionrate = $activeenrolments > 0 ? round(($completions / $activeenrolments) * 100, 1) : 0.0;

        return [
            'activelearners' => $activelearners,
            'activeenrolments' => $activeenrolments,
            'completions' => $completions,
            'completionrate' => $completionrate,
            'newenrolments30' => $newenrolments30,
            'completions30' => $completions30,
        ];
    }
}
