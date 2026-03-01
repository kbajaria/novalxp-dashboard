# Welcome Block Sync Workflow

This project now treats the Welcome block as a canonical spec and deploys that spec to all environments.

## Canonical source files

- `spec/welcome/title.txt`
- `spec/welcome/format.txt`
- `spec/welcome/text.html`

These files are the source of truth for the `my-index` HTML block content that contains `Welcome to NovaLXP`.

## Scripts

- `scripts/sync_welcome_block.sh`
  - `check` mode: detects drift against canonical spec.
  - `apply` mode: backs up matching blocks, then rewrites title/format/text to canonical values.

- `scripts/check_welcome_drift.sh`
  - Runs `check` for `dev`, `test`, and `prod` in sequence.

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

Use this if rollback is needed.
