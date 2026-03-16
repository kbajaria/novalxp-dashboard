# Front-Page Featured Carousel RCA

Date: March 16, 2026

## Summary

The home-page Featured carousel on dev showed the old `Risk_Compliance.png` artwork for the Jira and Slack courses even after:

- updating `theme_edutor` pane copy and URLs
- replacing the pane image files
- updating the stored-file setting values
- purging Moodle/theme caches
- hard-refreshing the browser

The root cause was a separate raw SCSS override in `theme_edutor/scss` that hardcoded the old images with `!important`.

## Impact

- The Jira and Slack course cards on the Moodle home-page Featured carousel showed stale imagery.
- Dashboard Featured block content was unaffected by the final root cause, because the dashboard Featured section is managed separately through the HTML block spec.

## What Changed During the Fix

### Dashboard

- Updated the dashboard Featured spec in `spec/featured-course/text.html`
- Restored the existing dashboard featured courses and added:
  - `Jira Essentials: From Task to Done`
  - `Bridging the Gap: From Teams to Slack AI`
- Reset private dashboards for all users
- Hid an empty legacy Featured HTML block so only the correct visible block remained active

### Front page carousel

- Replaced `Bribery Prevention Refresher` in pane 1
- Put Jira and Slack into visible pane 1 slots
- Attached the correct course-linked images to those pane slots

## Investigation Timeline

1. Verified the visible home-page carousel was driven by `theme_edutor` pane settings, not by the dashboard Featured HTML block.
2. Updated pane copy and URLs for the Jira and Slack slots.
3. Copied the expected course images into the `pane1block4image` and `pane1block5image` file areas.
4. Updated the stored-file config values so `setting_file_url()` resolved to the new Jira and Slack filenames.
5. Verified generated theme CSS referenced the new pluginfile URLs.
6. Observed the browser still rendered the old images.
7. Inspected raw `theme_edutor/scss`.
8. Found the `NOVALXP_PANE1_IMAGE_FIX` block with hardcoded rules:
   - `.featured-carousel .item-1-4 .thumb-holder-inner { background-image: url("/course_images/Risk_Compliance.png") !important; }`
   - `.featured-carousel .item-1-5 .thumb-holder-inner { background-image: url("/course_images/Risk_Compliance.png") !important; }`
9. Replaced those two raw SCSS override lines with the correct Jira and Slack pluginfile URLs.
10. Purged theme caches again.

## Root Cause

The dev environment had a raw SCSS override block in `theme_edutor/scss` named `NOVALXP_PANE1_IMAGE_FIX`.

That override:

- targeted `.featured-carousel .item-1-4 .thumb-holder-inner`
- targeted `.featured-carousel .item-1-5 .thumb-holder-inner`
- used `!important`
- pointed both selectors to `Risk_Compliance.png`

Because that SCSS was loaded after the normal theme setting flow and used `!important`, it overrode the correct pane image settings and made the browser keep rendering the old pictures.

## Why Earlier Fixes Looked Correct But Failed

- The admin UI/file settings showed the expected uploaded images.
- The file areas contained the right binaries.
- `setting_file_url()` returned the correct Jira and Slack pluginfile URLs.
- Generated pre-SCSS also showed the correct Jira and Slack URLs.

All of that was still insufficient because the raw SCSS override won at render time.

## Final Resolution

- Updated the `theme_edutor/scss` `NOVALXP_PANE1_IMAGE_FIX` block so slots 4 and 5 point to the Jira and Slack image URLs instead of `Risk_Compliance.png`
- Purged theme caches

## Preventive Guidance

When front-page carousel images appear wrong:

1. Check pane config values in `theme_edutor`
2. Check the stored-file setting value, not only the uploaded file contents
3. Check `theme_edutor/scss` for `.featured-carousel` overrides
4. Only then purge caches and re-test

## Related Files

- `spec/featured-course/text.html`
- `docs/welcome-block-sync.md`
- `docs/dashboard-artifacts-map.md`
- `artifacts/source/edutor/lib.php`
- `artifacts/source/edutor/classes/output/core_renderer.php`
- `artifacts/source/edutor/templates/fp_featured.mustache`
