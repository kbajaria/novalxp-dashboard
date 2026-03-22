# Engineering Log — NovaLXP-Dashboard

Chronological record of features shipped, bugs fixed, and investigations completed in this repo. Newest entries first.

Used to generate the weekly engineering report. Each entry should be added at the time the work is done or concluded.

**Entry types:** `Feature` · `Bug` · `Investigation` · `Infra` · `Chore`
**Statuses:** `released` · `resolved` · `no-action` · `wont-fix` · `ongoing`

---

## 2026-03-22 — [Investigation] Learner funnel chart not updating after course completion

**Component:** `block_novalxpfunnel` (learner dashboard)
**Status:** no-action — working as designed

### Report
A learner reported that after completing a course, their personal funnel chart on the `/my` dashboard did not immediately reflect the completion.

### Investigation
Reviewed `block_novalxpfunnel/classes/local/metrics.php` and `block_novalxpfunnel.php`. The block has no cache and no polling — it queries `{course_completions}` live on every page load. The data the block sees is always current as of the last page load.

Checked production cron: runs every minute (`* * * * *`) as the `apache` user. The key scheduled task, `\core\task\completion_regular_task`, is also scheduled every minute and was last seen running on time with no errors or disabled state.

### Conclusion
Not a bug. Moodle course completion is asynchronous by design: when a learner meets completion criteria, the evaluation is queued and processed by `completion_regular_task` on the next cron cycle. Until cron writes the `timecompleted` value to `course_completions`, the funnel query returns no completion record. The funnel reflects completions correctly once the learner reloads the page after cron has run — typically within one minute of completing the course.

---

## 2026-03-22 — [Bug] Trend series duplicate-key error on test environment

**Component:** `local_novalxp_execdashboard` — `metrics.php` `trend_series()`
**Status:** released (dev and test)

### Report
Trend chart rendered incorrectly on test and emitted "Duplicate value found in column 'uecreated'" warnings. The chart worked on dev where data volume is lower.

### Root cause
`get_records_sql()` uses the first column as the PHP array key. The trend query returns `uecreated` (enrolment timestamp) as the first column, which is not unique — multiple enrolments can share the same timestamp. At test data volumes, duplicates silently drop rows.

### Fix
Replaced `get_records_sql()` with `get_recordset_sql()` (+ `$records->close()`) in `trend_series()`. Recordsets stream rows without keying, so duplicate timestamps are handled correctly.

**File:** `artifacts/source/novalxp_execdashboard/classes/local/metrics.php`

---

## 2026-03-22 — [Feature] KPI dashboard redesign — all-time tiles, top-10 chart, simplified funnel

**Component:** `local_novalxp_execdashboard`
**Status:** released (dev and test)

### What shipped
- **All-time overview section** added above the filter controls: three static tiles (Total users, Learners ever enrolled, Total course completions) that do not change with selector state.
- **Window selector** updated: replaced "All time" (0 days) with "Last year" (365 days). Allowed windows: 7, 30, 90, 365 days.
- **Top 10 courses by enrolment** horizontal bar chart added above the completion rate chart, filtered by current selectors.
- **Engagement funnel** simplified from 5 bars to 3: New enrolments in period, Started learning, Completions.

**Files:** `index.php`, `metrics.php`, `lang/en/local_novalxp_execdashboard.php`

---

## 2026-03-22 — [Bug] Charts showed zero-value bars; engagement funnel had fractional axis ticks

**Component:** `local_novalxp_execdashboard` — `index.php`
**Status:** released (dev and test)

### Report
Top-10 enrolments chart and completion rate chart included bars with zero values. Engagement funnel x-axis showed fractional tick marks (0.5, 1.5, etc.) when learner counts were small integers.

### Fix
- Zero-enrolment and 0%-completion courses filtered out before chart data is built.
- Funnel x-axis forced to integer steps via Chart.js axis configuration.

**File:** `artifacts/source/novalxp_execdashboard/index.php`

---

## 2026-03-22 — [Chore] Moved AWS cost metrics to bottom of KPI dashboard

**Component:** `local_novalxp_execdashboard` — `index.php`
**Status:** released (dev)

### What changed
Reordered dashboard sections so AWS cost KPIs and recommendations appear at the bottom rather than near the top. Summary learning KPIs (active learners, enrolments, completion rate) are now the first thing visible after the filter controls.

**File:** `artifacts/source/novalxp_execdashboard/index.php`

---

## 2026-03-16 — [Bug] Front-page featured carousel showing stale course artwork after update

**Component:** `theme_edutor` SCSS
**Status:** resolved

### Report
Home-page Featured carousel on dev showed old `Risk_Compliance.png` artwork for Jira and Slack courses even after updating pane copy, replacing image files, updating stored-file setting values, purging caches, and hard-refreshing the browser.

### Root cause
A separate raw SCSS override in `theme_edutor/scss` hardcoded the old images with `!important`, overriding all file-based settings.

### Fix
Updated the SCSS override to reference the correct image files.

See full RCA: [`docs/frontpage-featured-carousel-rca-2026-03-16.md`](frontpage-featured-carousel-rca-2026-03-16.md)
