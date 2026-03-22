# Learner Dashboard Block Deployment

Runbook for deploying a new or updated Moodle block to the learner dashboard (`/my`).

---

## Steps

### 1. Copy block files to the server

The SSH user (`ec2-user`) does not have write access to the Moodle directory directly. Rsync to a temp location first, then `sudo cp` into place.

```bash
# Rsync to temp
rsync -av artifacts/source/block_<name>/ <env>-moodle-ec2:/tmp/block_<name>_deploy/

# Move into place and fix ownership
ssh <env>-moodle-ec2 "sudo cp -r /tmp/block_<name>_deploy /var/www/moodle/blocks/<name> && \
  sudo chown -R apache:apache /var/www/moodle/blocks/<name> && \
  rm -rf /tmp/block_<name>_deploy"
```

Moodle root on all environments: `/var/www/moodle` (not `/var/www/moodle/public`).

### 2. Run Moodle upgrade

Registers the new plugin and runs any install DB steps.

```bash
ssh <env>-moodle-ec2 "sudo -u apache php /var/www/moodle/admin/cli/upgrade.php --non-interactive"
```

### 3. Place block on the default dashboard

Run the placement script to insert the block into `mdl_block_instances` at the correct position on the shared default dashboard (`my-index / subpage 2`). Scripts live in `scripts/`.

```bash
cat scripts/place_<name>_default_dashboard.php | ssh <env>-moodle-ec2 "sudo -u apache php"
```

### 4. Reset all user dashboards — REQUIRED

**This step is mandatory whenever the default dashboard layout changes.**

Moodle users accumulate their own dashboard copies in `mdl_my_pages` (rows with `userid IS NOT NULL`). These copies override the shared default, so newly placed blocks are invisible to existing users until their copy is discarded.

`my_reset_page_for_all_users()` deletes all per-user copies, forcing everyone back to the shared default on next page load.

```bash
cat <<'PHP' | ssh <env>-moodle-ec2 php
<?php
define('CLI_SCRIPT', true);
require '/var/www/moodle/config.php';
require_once($CFG->dirroot . '/my/lib.php');

$privatepage = defined('MY_PAGE_PRIVATE') ? MY_PAGE_PRIVATE : 1;
$before = $DB->count_records_select('my_pages', 'private = :p AND userid IS NOT NULL', ['p' => $privatepage]);
my_reset_page_for_all_users($privatepage, 'my-index');
purge_all_caches();
$after = $DB->count_records_select('my_pages', 'private = :p AND userid IS NOT NULL', ['p' => $privatepage]);
echo "RESET before={$before} after={$after}\n";
PHP
```

Output should show `after=0`.

**Side effects:** All users lose any personal dashboard customisations (moved or hidden blocks). This is acceptable because the learner dashboard is a managed layout; users are not expected to customise it.

### 5. Verify

Log in as a learner on the environment and confirm the new block appears at `/my`.

---

## Environment host aliases

| Environment | SSH alias |
|---|---|
| Dev | `dev-moodle-ec2` |
| Test | `test-moodle-ec2` |
| Production | `prod-moodle-ec2` |

---

## Blocks currently on the default learner dashboard (subpage 2, content region)

| Weight | Block |
|---|---|
| -3 | `html` — Welcome block (instance 91) |
| -2 | `html` — Dashboard search block |
| -1 | `recentlyaccessedcourses` |
| -1 | `novalxpfunnel` — Course funnel |
| 0 | `novalxppopular` — Popular courses |
| 1 | `badges` |
| 2 | `html` — Featured course card (instance 93) |
| 2 | `html` |

*Weights are as observed on dev 2026-03-22. Verify with the placement script output before making changes.*
