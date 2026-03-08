# local_novalxp_execdashboard

Moodle local plugin for the NovaLXP KPI experience.

## Current features

- a dedicated page at `/local/novalxp_execdashboard/index.php`
- an admin navigation entry under Reports for permitted users
- a custom capability: `local/novalxp_execdashboard:view`
- a `KPIs` top-nav item in the Edutor header for permitted users
- KPI summary tiles derived from active enrolments and course completions
- a rolling 7/30/90 day reporting window filter
- a cohort filter for audience scoping
- a course category filter for dashboard segmentation
- a trend chart for enrolments and completions
- a status model that splits not-started, in-progress, and complete
- a course-level breakdown table for active enrolments and completions

## Current KPI tiles

- Active learners
- Active enrolments
- Not started
- In progress
- Completed enrolments
- Completion rate
- New enrolments in the last 30 days
- Completions in the last 30 days

## Intended next steps

1. Add client filters and category descendant rollups.
2. Add exports if stakeholders need offline reporting.
3. Split not-started from genuinely in-progress learners.
4. Add richer drill-down tables.
5. Move heavier reporting logic to pre-aggregated tables if live queries become too expensive.

## Installation

1. Copy this folder to your Moodle server at:
   - `/var/www/moodle/public/local/novalxp_execdashboard`
2. Run the Moodle upgrade:
   - Site administration -> Notifications
3. Grant `local/novalxp_execdashboard:view` to the required role.
4. Purge caches.
