# local_novalxp_execdashboard

Moodle local plugin scaffold for a NovaLXP executive dashboard.

## What this scaffold includes

- a dedicated page at `/local/novalxp_execdashboard/index.php`
- a custom capability: `local/novalxp_execdashboard:view`
- a first-pass KPI summary derived from active enrolments and course completions

## Current KPI tiles

- Active learners
- Active enrolments
- Completed enrolments
- Completion rate
- New enrolments in the last 30 days
- Completions in the last 30 days

## Intended next steps

1. Add navigation entry for permitted users.
2. Add cohort, client, category, and date filters.
3. Split not-started from genuinely in-progress learners.
4. Add trend series and drill-down tables.
5. Move heavier reporting logic to pre-aggregated tables if live queries become too expensive.

## Installation

1. Copy this folder to your Moodle server at:
   - `/var/www/moodle/public/local/novalxp_execdashboard`
2. Run the Moodle upgrade:
   - Site administration -> Notifications
3. Grant `local/novalxp_execdashboard:view` to the required role.
4. Purge caches.
