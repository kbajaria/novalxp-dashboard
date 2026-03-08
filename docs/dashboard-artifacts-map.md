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

## Dashboard styling override

- `theme_edutor/scss` raw SCSS setting
  - Holds the dashboard-only Tags pill styling override applied in each environment.
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
