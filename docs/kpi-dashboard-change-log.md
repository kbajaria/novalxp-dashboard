# KPI Dashboard Change Log

This document records incremental changes to `local_novalxp_execdashboard` (the executive KPI dashboard plugin).

Each entry covers: what changed, why, which file(s), and the files to include in a standard deploy.

---

## Standard deployment procedure

Use this procedure to deploy any combination of changed files to **dev**, **test**, or **prod**.

### SSH aliases

| Environment | Alias | URL |
|---|---|---|
| Dev | `dev-moodle-ec2` | https://dev.novalxp.co.uk |
| Test | `test-moodle-ec2` | https://test.novalxp.co.uk |
| Prod | `prod-moodle-ec2` | https://learn.novalxp.co.uk |

### Moodle plugin paths on the server

| Local file | Server path |
|---|---|
| `artifacts/source/novalxp_execdashboard/index.php` | `/var/www/moodle/public/local/novalxp_execdashboard/index.php` |
| `artifacts/source/novalxp_execdashboard/classes/local/metrics.php` | `/var/www/moodle/public/local/novalxp_execdashboard/classes/local/metrics.php` |
| `artifacts/source/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php` | `/var/www/moodle/public/local/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php` |

### Deploy steps

Replace `<alias>` with the target environment alias (e.g. `test-moodle-ec2`).

**Step 1 — Authenticate (if your SSO session has expired):**
```bash
aws sso login --profile finova-sso
```

**Step 2 — SCP each changed file to the server's staging area:**
```bash
scp <local-file> <alias>:/home/ec2-user/<filename>
```

For example, to deploy all three plugin files to test:
```bash
scp artifacts/source/novalxp_execdashboard/index.php \
    test-moodle-ec2:/home/ec2-user/index.php
scp artifacts/source/novalxp_execdashboard/classes/local/metrics.php \
    test-moodle-ec2:/home/ec2-user/metrics.php
scp artifacts/source/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php \
    test-moodle-ec2:/home/ec2-user/local_novalxp_execdashboard.php
```

**Step 3 — Install, fix ownership, and purge caches in a single SSH call:**

Adjust the `cp` and `chown` lines to include only the files you deployed in Step 2.

```bash
ssh test-moodle-ec2 "
  sudo cp /home/ec2-user/index.php \
    /var/www/moodle/public/local/novalxp_execdashboard/index.php
  sudo cp /home/ec2-user/metrics.php \
    /var/www/moodle/public/local/novalxp_execdashboard/classes/local/metrics.php
  sudo cp /home/ec2-user/local_novalxp_execdashboard.php \
    /var/www/moodle/public/local/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php
  sudo chown apache:apache \
    /var/www/moodle/public/local/novalxp_execdashboard/index.php \
    /var/www/moodle/public/local/novalxp_execdashboard/classes/local/metrics.php \
    /var/www/moodle/public/local/novalxp_execdashboard/lang/en/local_novalxp_execdashboard.php
  sudo php /var/www/moodle/admin/cli/purge_caches.php
"
```

> **Note:** The Moodle plugin directories are owned by `apache`. Always SCP to `/home/ec2-user/` first, then use `sudo cp` — direct SCP to the plugin path will be denied.

### Rollback

To revert a file to the previous commit and redeploy:
```bash
git checkout HEAD~1 -- <local-file>
```
Then repeat the deploy steps above for the reverted file.

---

## Change 4: Fix trend series duplicate-key bug (get_recordset_sql)

**Date:** 2026-03-22
**Status:** Live on dev and test

### What changed

Replaced `get_records_sql()` with `get_recordset_sql()` (+ `$records->close()`) in `trend_series()`.

### Why

`get_records_sql()` uses the first returned column as the PHP array key, so it requires unique values in that column. The trend SQL returns `uecreated` (enrolment timestamp) as the first column, which is not unique — multiple enrolments can share the same timestamp. On dev this rarely collides, but test has enough data to trigger duplicates, causing Moodle to drop rows and emit warnings. `get_recordset_sql()` streams rows without keying, so duplicates are handled correctly.

### Files changed

- `artifacts/source/novalxp_execdashboard/classes/local/metrics.php` — `trend_series()` only

### Deploy files

`metrics.php` only. See [Standard deployment procedure](#standard-deployment-procedure).

### How to verify

Navigate to the KPI dashboard. Confirm no "Duplicate value found in column 'uecreated'" warnings appear and the trend chart renders correctly.

---

## Change 3: Chart polish — filter zero rows, integer funnel axis

**Date:** 2026-03-22
**Status:** Live on dev and test

### What changed

1. **Top 10 courses by enrolment chart** — courses with zero active enrolments are now excluded from the chart.
2. **Completion rate by course chart** — courses with a 0% completion rate are now excluded from the chart.
3. **Engagement funnel** — x-axis forced to whole-number (integer) steps. Moodle's Chart.js was previously rendering fractional tick marks (e.g. 0.5, 1.5) when counts were small integers.

### Why

Zero-value rows cluttered the charts with uninformative bars. The fractional axis on the funnel was misleading — learner counts are always whole numbers.

### Files changed

- `artifacts/source/novalxp_execdashboard/index.php` — chart data filtering and axis configuration only

### Deploy files

`index.php` only. See [Standard deployment procedure](#standard-deployment-procedure).

### How to verify

1. Navigate to the KPI dashboard.
2. Confirm the top-10 enrolments chart shows no bars with a zero value.
3. Confirm the completion rate chart shows no bars with a 0% value.
4. Confirm the engagement funnel x-axis shows only whole numbers (0, 1, 2, … not 0.5, 1.5, …).

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

### Deploy files

`index.php`, `metrics.php`, `lang/en/local_novalxp_execdashboard.php`. See [Standard deployment procedure](#standard-deployment-procedure).

### How to verify

1. Log in as `admin` or `demo.user001`.
2. Navigate to `/local/novalxp_execdashboard/index.php`.
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
5. Confirm the all-time tiles do not change when the window selector changes.
6. Confirm the top-10 enrolments chart and funnel update with the selectors.

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

### Deploy files

`index.php` only. See [Standard deployment procedure](#standard-deployment-procedure).

### How to verify

1. Log in as `admin` or `demo.user001`.
2. Navigate to `/local/novalxp_execdashboard/index.php`.
3. Confirm the page renders in this order: Summary KPI tiles → Trends chart → Course breakdown table → Cost KPI tiles → Cost recommendations.
4. Confirm all sections are present and the filter controls work correctly.

---
