# Dashboard Sync Workflow

This project now treats the default dashboard HTML blocks as canonical specs and deploys those specs to all environments.

## Canonical source files

- `spec/welcome/title.txt`
- `spec/welcome/format.txt`
- `spec/welcome/text.html`
- `spec/dashboard-search/title.txt`
- `spec/dashboard-search/format.txt`
- `spec/dashboard-search/text.html`
- `spec/featured-course/title.txt`
- `spec/featured-course/format.txt`
- `spec/featured-course/text.html`

These files are the source of truth for the `my-index` HTML blocks that power the welcome, search, and featured course cards on the default dashboard.

The Tags styling is not stored in an HTML block. It is applied through the theme raw SCSS setting `theme_edutor/scss` and must be deployed separately.

The Moodle home-page Featured carousel is a separate system. It is driven by `theme_edutor` pane settings and can also be overridden by raw SCSS in `theme_edutor/scss`.

## Scripts

- `scripts/sync_welcome_block.sh`
  - `check` mode: detects drift against canonical spec.
  - `apply` mode: backs up matching blocks, then rewrites title/format/text to canonical values.
- `scripts/sync_dashboard_search_block.sh`
  - `check` mode: verifies the managed search block exists directly under the welcome block.
  - `apply` mode: creates or updates the block, sets its dashboard weight, and resolves weight collisions so the block stays directly below welcome.
- `scripts/sync_featured_course_block.sh`
  - `check` mode: detects drift against the canonical featured-course spec.
  - `apply` mode: creates or updates the featured-course block, normalizes its dashboard weight, and hides older duplicate featured HTML variants when they exist.

- `scripts/check_welcome_drift.sh`
  - Runs `check` for `dev`, `test`, and `prod` in sequence.
- `scripts/remove_dashboard_tags_block.sh`
  - `check` mode: reports whether the default dashboard still includes the Tags block.
  - `apply` mode: backs up the Tags block rows and user dashboard rows, removes the Tags block from the default dashboard, resets all private dashboards, and purges caches.

## Deployment sequence

For each environment:

1. Apply the HTML block specs with:
   - `./scripts/sync_welcome_block.sh apply <env>`
   - `./scripts/sync_dashboard_search_block.sh apply <env>`
   - `./scripts/sync_featured_course_block.sh apply <env>`
2. If the Tags block should be removed from the default dashboard, run:
   - `./scripts/remove_dashboard_tags_block.sh apply <env>`
3. Apply any remaining dashboard styling overrides to `theme_edutor/scss`.
4. If you did not run the removal script, reset all private dashboards with Moodle's built-in `my_reset_page_for_all_users(MY_PAGE_PRIVATE, 'my-index')`.

This reset is required so existing user dashboard copies pick up the shared default dashboard changes.

## Front-page Featured Carousel Notes

- Source of truth for carousel text and links:
  - `theme_edutor` config values such as `pane1block4title`, `pane1block4content`, and `pane1block4url`
- Source of truth for carousel images:
  - `theme_edutor` stored-file settings such as `pane1block4image`
- Override path:
  - Raw SCSS in `theme_edutor/scss`
  - In dev, the `NOVALXP_PANE1_IMAGE_FIX` block may override pane images with `!important`

### Recommended troubleshooting order for carousel image mismatches

1. Verify the pane config values in `theme_edutor` for the affected slot.
2. Verify the stored-file setting value itself, not just the file area contents.
3. Check `theme_edutor/scss` for any `.featured-carousel .item-1-N .thumb-holder-inner` overrides.
4. Purge theme caches only after the SCSS and stored-file setting values are both correct.

### Known RCA

- March 16, 2026 front-page image mismatch:
  - The pane image files and `setting_file_url()` output were correct.
  - A raw SCSS block still hardcoded `Risk_Compliance.png` for slots 4 and 5 with `!important`.
  - Result: browser continued rendering the old images.
  - Full write-up: `docs/frontpage-featured-carousel-rca-2026-03-16.md`

## Usage

Check a single environment:

```bash
./scripts/sync_welcome_block.sh check dev
```

Apply to a single environment:

```bash
./scripts/sync_welcome_block.sh apply test
```

Check all environments:

```bash
./scripts/check_welcome_drift.sh
```

## Backups

In `apply` mode, a pre-change backup is saved to:

- `artifacts/deploy/<env>-backups/welcome_blocks_pre_spec_apply_<timestamp>.tsv`
- `artifacts/deploy/<env>-backups/theme_edutor_scss_pre_dashboard_tag_pills_<timestamp>.txt`
- `artifacts/deploy/<env>-backups/dashboard_tags_blocks_pre_remove_<timestamp>.tsv`
- `artifacts/deploy/<env>-backups/dashboard_user_pages_pre_reset_<timestamp>.tsv`

Use this if rollback is needed.
