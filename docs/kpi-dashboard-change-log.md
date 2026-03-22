# KPI Dashboard Change Log

This document records incremental changes to `local_novalxp_execdashboard` (the executive KPI dashboard plugin).

Each entry covers: what changed, why, which file(s), and how to deploy to dev for testing.

---

## Change 3: Chart polish — filter zero rows, integer funnel axis

**Date:** 2026-03-22
**Status:** Live on dev

### What changed

1. **Top 10 courses by enrolment chart** — courses with zero active enrolments are now excluded from the chart.
2. **Completion rate by course chart** — courses with a 0% completion rate are now excluded from the chart.
3. **Engagement funnel** — x-axis forced to whole-number (integer) steps. Moodle's Chart.js was previously rendering fractional tick marks (e.g. 0.5, 1.5) when counts were small integers.

### Why

Zero-value rows cluttered the charts with uninformative bars. The fractional axis on the funnel was misleading — learner counts are always whole numbers.

### Files changed

- `artifacts/source/novalxp_execdashboard/index.php` — chart data filtering and axis configuration only

### How to deploy to dev for testing

```bash
aws sso login --profile finova-sso

scp artifacts/source/novalxp_execdashboard/index.php \
    dev-moodle-ec2:/home/ec2-user/index.php

ssh dev-moodle-ec2 "sudo cp /home/ec2-user/index.php /var/www/moodle/public/local/novalxp_execdashboard/index.php && \
  sudo chown apache:apache /var/www/moodle/public/local/novalxp_execdashboard/index.php && \
  sudo php /var/www/moodle/admin/cli/purge_caches.php"
```

### How to verify

1. Navigate to the KPI dashboard on dev.
2. Confirm the top-10 enrolments chart shows no bars with a zero value.
3. Confirm the completion rate chart shows no bars with a 0% value.
4. Confirm the engagement funnel x-axis shows only whole numbers (0, 1, 2, … not 0.5, 1.5, …).

### Rollback

```bash
git checkout HEAD~1 -- artifacts/source/novalxp_execdashboard/index.php
```

Then redeploy as above.

---

## Change 2: KPI dashboard redesign — all-time section, top-10 chart, simplified funnel

**Date:** 2026-03-22
**Status:** Live on dev

### What changed

1. **All-time overview section** added at the very top of the dashboard, above the filter controls. Shows three tiles that never change with the selectors: Total users in system, Learners ever enrolled, Total course completions.

2. **Window selector** — replaced "All time" (0 days) with "Last year" (365 days). The allowed windows are now 7, 30, 90, 365 days.

3. **Top 10 courses by enrolment** chart added above the completion rate chart. Shows a horizontal bar chart of the top 10 courses by active enrolments, filtered by the current selectors.

4. **Engagement funnel** simplified from 5 bars to 3: New enrolments in period, Started learning, Completions. Potential users and Ever enrolled removed (those concepts now live in the all-time tiles).

### Why

Separating static all-time KPIs from window-filtered metrics makes the dashboard clearer — users can see the overall picture at a glance before drilling into a time window. The top-10 enrolments chart adds a quick-hit view of course popularity. The funnel is cleaner now that "ever enrolled" is surfaced as a dedicated tile.

### Files changed

- `artifacts/source/novalxp_execdashboard/index.php` — all output changes
- `artifacts/source/novalxp_execdashboard/classes/local/metrics.php` — added `alltime_summary()`, simplified `funnel_series()`
- `artifacts/source/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php` — added new strings, changed `window_0` → `window_365`

### How to deploy to dev for testing

No Moodle upgrade is required.

```bash
# Authenticate
aws sso login --profile finova-sso

# Copy the updated files to dev
scp artifacts/source/novalxp_execdashboard/index.php \
    dev-moodle-ec2:/home/ec2-user/index.php
scp artifacts/source/novalxp_execdashboard/classes/local/metrics.php \
    dev-moodle-ec2:/home/ec2-user/metrics.php
scp artifacts/source/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php \
    dev-moodle-ec2:/home/ec2-user/local_novalxp_execdashboard.php

# Install and purge caches
ssh dev-moodle-ec2 "sudo cp /home/ec2-user/index.php /var/www/moodle/public/local/novalxp_execdashboard/index.php && \
  sudo cp /home/ec2-user/metrics.php /var/www/moodle/public/local/novalxp_execdashboard/classes/local/metrics.php && \
  sudo cp /home/ec2-user/local_novalxp_execdashboard.php /var/www/moodle/public/local/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php && \
  sudo chown apache:apache \
    /var/www/moodle/public/local/novalxp_execdashboard/index.php \
    /var/www/moodle/public/local/novalxp_execdashboard/classes/local/metrics.php \
    /var/www/moodle/public/local/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php && \
  sudo php /var/www/moodle/admin/cli/purge_caches.php"
```

### How to verify

1. Log in to `https://dev.novalxp.co.uk` as `admin` or `demo.user001`.
2. Navigate to the KPI dashboard (`/local/novalxp_execdashboard/index.php`).
3. Confirm page order:
   - **All-time overview** tiles (Total users, Learners ever enrolled, Total completions) — static, above filters
   - `<hr>` separator
   - Filter controls (Category, Cohort, Reporting window)
   - Learner KPI tiles
   - Trend series chart
   - **Top 10 courses by enrolment** chart
   - Completion rate by course chart
   - Engagement funnel (3 bars: New enrolments, Started, Completions)
   - Course breakdown table
   - Cost KPIs and recommendations
4. Confirm window selector shows: Last 7 days, Last 30 days, Last 90 days, Last year (no "All time").
5. Confirm the all-time tiles do not change when you change the window selector.
6. Confirm the top-10 enrolments chart updates with the selectors.
7. Confirm the engagement funnel shows 3 bars only.

### Rollback

```bash
git checkout HEAD~1 -- artifacts/source/novalxp_execdashboard/index.php \
  artifacts/source/novalxp_execdashboard/classes/local/metrics.php \
  artifacts/source/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php
```

Then redeploy using the same steps above.

---

## Change 1: Move AWS cost metrics to bottom of dashboard

**Date:** 2026-03-22
**Status:** Live on dev

### What changed

Reordered the dashboard sections so AWS cost metrics appear at the bottom rather than at the top.

**Before:**
1. Filters
2. Cost KPIs (tiles + notes)
3. Cost Recommendations
4. Summary KPIs
5. Trends chart
6. Course breakdown table

**After:**
1. Filters
2. Summary KPIs
3. Trends chart
4. Course breakdown table
5. Cost KPIs (tiles + notes)
6. Cost Recommendations

### Why

Summary learning KPIs (active learners, enrolments, completion rate) are the primary reason most users visit the dashboard. AWS cost metrics are supporting context, not the headline. Moving costs to the bottom keeps the most actionable learning data front-and-centre.

### Files changed

- `artifacts/source/novalxp_execdashboard/index.php` — output section reordered (no logic changes, no data changes)

### How to deploy to dev for testing

No Moodle upgrade is required. This is a PHP output reorder only.

```bash
aws sso login --profile finova-sso

scp artifacts/source/novalxp_execdashboard/index.php \
    dev-moodle-ec2:/home/ec2-user/index.php

ssh dev-moodle-ec2 "sudo cp /home/ec2-user/index.php /var/www/moodle/public/local/novalxp_execdashboard/index.php && \
  sudo chown apache:apache /var/www/moodle/public/local/novalxp_execdashboard/index.php && \
  sudo php /var/www/moodle/admin/cli/purge_caches.php"
```

### How to verify

1. Log in to `https://dev.novalxp.co.uk` as `admin` or `demo.user001`.
2. Navigate to the KPI dashboard (top-nav **KPIs** link, or `/local/novalxp_execdashboard/index.php`).
3. Confirm the page renders in this order:
   - Summary KPI tiles (Active learners, enrolments, completion rate, etc.)
   - Trends chart
   - Course breakdown table
   - Cost KPI tiles (Total monthly cost, AI cost, etc.)
   - Cost recommendations
4. Confirm all sections are still present and no data is missing.
5. Confirm the filter controls (category, cohort, window) still work correctly.

### Rollback

To revert, restore the previous version from git:

```bash
git checkout HEAD~1 -- artifacts/source/novalxp_execdashboard/index.php
```

Then redeploy using the same steps above.

---
