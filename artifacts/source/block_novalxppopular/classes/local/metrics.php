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

namespace block_novalxppopular\local;

defined('MOODLE_INTERNAL') || die();

/**
 * Popularity score = (completions × WEIGHT_COMPLETIONS) + (enrolments × WEIGHT_ENROLMENTS).
 *
 * Weights are defined as constants so they can be adjusted without touching query logic.
 */
class metrics {
    const WEIGHT_COMPLETIONS = 2;
    const WEIGHT_ENROLMENTS  = 1;

    /**
     * Top courses by popularity score, excluding courses the given user is already enrolled in.
     * Used by the learner dashboard block.
     *
     * @param int $userid
     * @param int $limit
     * @return array  Each element: {courseid, coursename, courseurl, score, completions, enrolments}
     */
    public static function top_for_user(int $userid, int $limit = 5): array {
        global $DB, $SITE;

        $wc = self::WEIGHT_COMPLETIONS;
        $we = self::WEIGHT_ENROLMENTS;

        $sql = "SELECT c.id AS courseid,
                       c.fullname AS coursename,
                       COALESCE(comp.cnt, 0) AS completions,
                       COALESCE(enr.cnt, 0)  AS enrolments,
                       (COALESCE(comp.cnt, 0) * :wc) + (COALESCE(enr.cnt, 0) * :we) AS score
                  FROM {course} c
             LEFT JOIN (
                           SELECT course, COUNT(1) AS cnt
                             FROM {course_completions}
                            WHERE timecompleted IS NOT NULL
                         GROUP BY course
                       ) comp ON comp.course = c.id
             LEFT JOIN (
                           SELECT e.courseid, COUNT(DISTINCT ue.userid) AS cnt
                             FROM {enrol} e
                             JOIN {user_enrolments} ue ON ue.enrolid = e.id
                            WHERE e.status = 0
                              AND ue.status = 0
                         GROUP BY e.courseid
                       ) enr ON enr.courseid = c.id
                 WHERE c.id <> :siteid
                   AND c.visible = 1
                   AND c.id NOT IN (
                           SELECT e2.courseid
                             FROM {enrol} e2
                             JOIN {user_enrolments} ue2 ON ue2.enrolid = e2.id
                            WHERE ue2.userid = :userid
                              AND ue2.status = 0
                              AND e2.status = 0
                       )
              ORDER BY score DESC, c.fullname ASC";

        $records = $DB->get_records_sql($sql, [
            'wc'     => $wc,
            'we'     => $we,
            'siteid' => (int)$SITE->id,
            'userid' => $userid,
        ], 0, $limit);

        return self::format_records($records);
    }

    /**
     * Top courses by popularity score globally (no user enrolment filter).
     * Used by the bot payload.
     *
     * @param int $limit
     * @return array  Each element: {courseid, coursename, courseurl, score, completions, enrolments}
     */
    public static function top_global(int $limit = 10): array {
        global $DB, $SITE;

        $wc = self::WEIGHT_COMPLETIONS;
        $we = self::WEIGHT_ENROLMENTS;

        $sql = "SELECT c.id AS courseid,
                       c.fullname AS coursename,
                       COALESCE(comp.cnt, 0) AS completions,
                       COALESCE(enr.cnt, 0)  AS enrolments,
                       (COALESCE(comp.cnt, 0) * :wc) + (COALESCE(enr.cnt, 0) * :we) AS score
                  FROM {course} c
             LEFT JOIN (
                           SELECT course, COUNT(1) AS cnt
                             FROM {course_completions}
                            WHERE timecompleted IS NOT NULL
                         GROUP BY course
                       ) comp ON comp.course = c.id
             LEFT JOIN (
                           SELECT e.courseid, COUNT(DISTINCT ue.userid) AS cnt
                             FROM {enrol} e
                             JOIN {user_enrolments} ue ON ue.enrolid = e.id
                            WHERE e.status = 0
                              AND ue.status = 0
                         GROUP BY e.courseid
                       ) enr ON enr.courseid = c.id
                 WHERE c.id <> :siteid
                   AND c.visible = 1
              ORDER BY score DESC, c.fullname ASC";

        $records = $DB->get_records_sql($sql, [
            'wc'     => $wc,
            'we'     => $we,
            'siteid' => (int)$SITE->id,
        ], 0, $limit);

        return self::format_records($records);
    }

    /**
     * @param array $records  Raw DB records
     * @return array
     */
    private static function format_records(array $records): array {
        $out = [];
        foreach ($records as $r) {
            $out[] = [
                'courseid'    => (int)$r->courseid,
                'coursename'  => (string)$r->coursename,
                'courseurl'   => (string)(new \moodle_url('/course/view.php', ['id' => $r->courseid])),
                'score'       => (int)$r->score,
                'completions' => (int)$r->completions,
                'enrolments'  => (int)$r->enrolments,
            ];
        }
        return $out;
    }
}
