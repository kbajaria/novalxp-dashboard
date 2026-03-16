# Dashboard Artifacts Map

## Source system

- Host alias: `dev-moodle-ec2`
- Moodle path: `/var/www/moodle/public`
- Extracted on: see `artifacts/raw/exported_at_utc.txt`

## Database exports

- `artifacts/raw/mdl_my_pages.tsv`
  - Page definitions (`mdl_my_pages`).
- `artifacts/raw/mdl_block_instances_my_index.tsv`
  - Block definitions for dashboard (`pagetypepattern='my-index'`).
- `artifacts/raw/mdl_block_instances_my_index_html_only.tsv`
  - Convenience subset of HTML blocks only.
- `artifacts/raw/mdl_block_positions_my_index.tsv`
  - Explicit block position overrides.
- `artifacts/raw/mdl_config_dashboard_related.tsv`
  - Core config values matching dashboard/custom-html patterns.
- `artifacts/raw/mdl_config_plugins_dashboard_related.tsv`
  - Plugin/theme config export (broad).
- `artifacts/raw/mdl_config_plugins_dashboard_subset.tsv`
  - Smaller filtered subset focused on dashboard/theme keys.

## Decoded custom HTML

- `artifacts/decoded/block_91.json`
- `artifacts/decoded/block_91.html`
  - Includes title `Welcome to NovaLXP` and button links.
- `artifacts/decoded/block_93.json`
- `artifacts/decoded/block_93.html`
  - Featured course HTML card.

## Canonical managed spec

- `spec/welcome/title.txt`
- `spec/welcome/format.txt`
- `spec/welcome/text.html`
- `spec/dashboard-search/title.txt`
- `spec/dashboard-search/format.txt`
- `spec/dashboard-search/text.html`
- `spec/featured-course/title.txt`
- `spec/featured-course/format.txt`
- `spec/featured-course/text.html`
- Deployment/check scripts:
  - `scripts/sync_welcome_block.sh`
  - `scripts/sync_dashboard_search_block.sh`
  - `scripts/sync_featured_course_block.sh`
  - `scripts/check_welcome_drift.sh`

## Front-page featured carousel inputs

- Front-page Featured carousel content is not managed by the dashboard HTML block specs.
- Primary source:
  - `theme_edutor` plugin settings in `mdl_config_plugins`
  - Keys follow the pattern `pane1blockN(title|content|url|image|label|price)`
- Theme code path:
  - `artifacts/source/edutor/classes/output/core_renderer.php`
  - `artifacts/source/edutor/templates/fp_featured.mustache`
  - `artifacts/source/edutor/lib.php`
- Important caveat:
  - `theme_edutor/scss` may contain raw SCSS overrides for `.featured-carousel .item-1-N .thumb-holder-inner`.
  - On dev, the `NOVALXP_PANE1_IMAGE_FIX` block can override pane image settings with `!important` rules.
  - When carousel images appear wrong even though `pane1blockNimage` looks correct in the admin UI, inspect raw SCSS before changing stored files again.

## Dashboard styling override

- `theme_edutor/scss` raw SCSS setting
  - Holds the dashboard-only Tags pill styling override applied in each environment.
  - Also may contain front-page Featured carousel image overrides.
  - Must be migrated separately from the HTML block specs.

## Source code artifacts copied from dev

- Theme:
  - `artifacts/source/edutor/` (full directory copy)
- Local plugins:
  - `artifacts/source/bedrock/`
  - `artifacts/source/canny/`
  - `artifacts/source/novalxpapi/`
  - `artifacts/source/novalxpbot/`

## Current dashboard mapping observed

- `mdl_block_instances` for `my-index` currently shows:
  - `subpagepattern=2`: welcome HTML, search HTML, novalxpfunnel, featured HTML, tags, badges, recently accessed blocks
  - `subpagepattern=3`: myoverview
- Position overrides seen in `mdl_block_positions_my_index.tsv`:
  - block `91` at weight `-3`
  - search block at weight `-2`
  - novalxpfunnel at weight `-1` where present
  - featured block at weight `1` or `2` depending on environment baseline
  - tags block after featured

## Incident notes

- March 16, 2026:
  - Dashboard Featured content was updated to a four-course version via the managed HTML block spec.
  - Home-page carousel images initially appeared unchanged because raw SCSS in `theme_edutor/scss` still hardcoded `Risk_Compliance.png` for `item-1-4` and `item-1-5`.
  - RCA: `docs/frontpage-featured-carousel-rca-2026-03-16.md`
