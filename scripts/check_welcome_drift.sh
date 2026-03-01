#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
SYNC_SCRIPT="$ROOT_DIR/scripts/sync_welcome_block.sh"

if [[ ! -x "$SYNC_SCRIPT" ]]; then
  echo "Missing executable: $SYNC_SCRIPT"
  exit 1
fi

rc=0
for env in dev test prod; do
  echo "=== CHECK $env ==="
  if "$SYNC_SCRIPT" check "$env"; then
    status=0
  else
    status=$?
    if [[ $status -eq 2 ]]; then
      rc=2
    else
      rc=$status
    fi
  fi
  echo
 done

exit $rc
