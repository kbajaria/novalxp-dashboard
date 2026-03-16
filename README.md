# NovaLXP Default Dashboard Artifacts

Local starter project for a new GitHub repo that captures the **default Moodle dashboard page** configuration for NovaLXP, plus related custom code and HTML from the dev Moodle instance.

## What this contains

- `artifacts/raw/`: direct exports from the dev Moodle database and filesystem inventory.
- `artifacts/decoded/`: decoded HTML block content from dashboard block definitions.
- `artifacts/source/`: copied source code from dev Moodle theme/plugins relevant to dashboard behavior.
- `spec/`: canonical source-of-truth content for managed dashboard elements.
- `docs/`: mapping notes and extraction log.
- `scripts/`: helper script to re-run extraction.

## Snapshot summary (from dev Moodle 5.1)

- Moodle release: `5.1.3+ (Build: 20260227)`
- Dashboard page blocks discovered in `mdl_block_instances` with:
  - `pagetypepattern = 'my-index'`
  - default dashboard content currently on `subpagepattern = '2'`
- HTML blocks decoded locally:
  - `block instance 91` (`title: Welcome to NovaLXP`)
  - `block instance 93` (featured course card)

## Front Page Featured Carousel

- The Moodle home page Featured carousel is driven by `theme_edutor` plugin settings, not by course cards or the dashboard HTML block specs.
- Pane 1 carousel copy lives in `theme_edutor` config keys such as:
  - `pane1block4title`
  - `pane1block4content`
  - `pane1block4url`
  - `pane1block4image`
- Carousel images are file settings served through `theme_edutor` stored-file URLs.
- Dev currently also has a raw SCSS override block in `theme_edutor/scss` named `NOVALXP_PANE1_IMAGE_FIX`. That override can supersede the file settings with `!important` background-image rules and must be checked whenever carousel images do not match the pane config.

## Notes before publishing to GitHub

- Review and redact sensitive values before pushing.
- `artifacts/raw/mdl_config_plugins_dashboard_related.tsv` may include operational config you may not want public.

See `docs/dashboard-artifacts-map.md` for exact files and IDs.

## Canonical Welcome Block Workflow

- Canonical files:
  - `spec/welcome/title.txt`
  - `spec/welcome/format.txt`
  - `spec/welcome/text.html`
- Drift check:
  - `./scripts/sync_welcome_block.sh check <dev|test|prod>`
  - `./scripts/check_welcome_drift.sh`
- Deploy canonical block:
  - `./scripts/sync_welcome_block.sh apply <dev|test|prod>`

Full runbook: `docs/welcome-block-sync.md`.

For the March 16, 2026 front-page carousel incident and resolution, see `docs/frontpage-featured-carousel-rca-2026-03-16.md`.
