# KPI Dashboard Change Log

This document records incremental changes to `local_novalxp_execdashboard` (the executive KPI dashboard plugin).

Each entry covers: what changed, why, which file(s), and how to deploy to dev for testing.

---

## Change 1: Move AWS cost metrics to bottom of dashboard

**Date:** 2026-03-22
**Status:** Ready for dev testing

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
# Authenticate
aws sso login --profile finova-sso

# Copy the updated file to dev
scp artifacts/source/novalxp_execdashboard/index.php \
    dev-moodle-ec2:/var/www/moodle/public/local/novalxp_execdashboard/index.php

# Purge Moodle caches
ssh dev-moodle-ec2 "sudo -u apache php /var/www/moodle/admin/cli/purge_caches.php"
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
git checkout HEAD -- artifacts/source/novalxp_execdashboard/index.php
```

Then redeploy using the same `scp` + cache purge steps above.

---
