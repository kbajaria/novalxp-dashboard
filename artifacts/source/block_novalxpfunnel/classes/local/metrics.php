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

namespace block_novalxpfunnel\local;

defined('MOODLE_INTERNAL') || die();

class metrics {
    /**
     * Return course status metrics for a user.
     *
     * Enrolled: active enrolments excluding site course.
     * Complete: enrolled courses with a completion timestamp.
     * In Progress: enrolled - complete.
     *
     * @param int $userid
     * @return array{enrolled:int,inprogress:int,complete:int}
     */
    public static function for_user(int $userid): array {
        global $DB, $SITE;

        $now = time();
        $params = [
            'userid' => $userid,
            // Active user enrolments and enabled enrolment methods are both status 0.
            'ueactive' => 0,
            'eactive' => 0,
            'siteid' => (int)$SITE->id,
            'nowstart' => $now,
            'nowend' => $now,
        ];

        $sql = "SELECT COUNT(1) AS enrolled,
                       SUM(CASE WHEN d.timecompleted IS NOT NULL THEN 1 ELSE 0 END) AS complete
                  FROM (
                    SELECT DISTINCT e.courseid,
                           cc.timecompleted
                      FROM {enrol} e
                      JOIN {user_enrolments} ue
                        ON ue.enrolid = e.id
                      JOIN {course} c
                        ON c.id = e.courseid
                 LEFT JOIN {course_completions} cc
                        ON cc.course = e.courseid
                       AND cc.userid = ue.userid
                     WHERE ue.userid = :userid
                       AND ue.status = :ueactive
                       AND e.status = :eactive
                       AND e.courseid <> :siteid
                       AND (ue.timestart = 0 OR ue.timestart <= :nowstart)
                       AND (ue.timeend = 0 OR ue.timeend > :nowend)
                  ) d";

        $record = $DB->get_record_sql($sql, $params);

        $enrolled = (int)($record->enrolled ?? 0);
        $complete = (int)($record->complete ?? 0);
        $inprogress = max(0, $enrolled - $complete);

        return [
            'enrolled' => $enrolled,
            'inprogress' => $inprogress,
            'complete' => $complete,
        ];
    }
}
