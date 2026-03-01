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
- Deployment/check scripts:
  - `scripts/sync_welcome_block.sh`
  - `scripts/check_welcome_drift.sh`

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
  - `subpagepattern=2`: badges, tags, recentlyaccessedcourses, recentlyaccesseditems, html(91), html(93)
  - `subpagepattern=3`: myoverview
- Position overrides seen in `mdl_block_positions_my_index.tsv`:
  - block `91` at weight `-3`
  - block `93` at weight `0`
