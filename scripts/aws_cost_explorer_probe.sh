#!/usr/bin/env bash
set -euo pipefail

PROFILE="${1:-finova-sso}"
LINKED_ACCOUNT="${2:-}"
AI_SERVICE="${3:-Amazon Bedrock}"
START_DATE="$(date -u +%Y-%m-01)"
END_DATE="$(date -u -v+1d +%Y-%m-%d)"

echo "Profile: ${PROFILE}"
echo "Window: ${START_DATE} to ${END_DATE} (UTC, end exclusive)"
echo

echo "Linked accounts:"
aws ce get-dimension-values \
  --profile "${PROFILE}" \
  --region us-east-1 \
  --time-period "Start=${START_DATE},End=${END_DATE}" \
  --dimension LINKED_ACCOUNT \
  --context COST_AND_USAGE \
  --output table

echo
echo "Services:"
aws ce get-dimension-values \
  --profile "${PROFILE}" \
  --region us-east-1 \
  --time-period "Start=${START_DATE},End=${END_DATE}" \
  --dimension SERVICE \
  --context COST_AND_USAGE \
  --output table

echo
echo "Total month-to-date cost:"
aws ce get-cost-and-usage \
  --profile "${PROFILE}" \
  --region us-east-1 \
  --time-period "Start=${START_DATE},End=${END_DATE}" \
  --granularity MONTHLY \
  --metrics UnblendedCost \
  --output table

if [[ -n "${AI_SERVICE}" ]]; then
  echo
  echo "Month-to-date AI cost for service: ${AI_SERVICE}"

  FILTER_JSON="$(printf '{"Dimensions":{"Key":"SERVICE","Values":["%s"]}}' "${AI_SERVICE}")"
  if [[ -n "${LINKED_ACCOUNT}" ]]; then
    FILTER_JSON="$(printf '{"And":[{"Dimensions":{"Key":"LINKED_ACCOUNT","Values":["%s"]}},{"Dimensions":{"Key":"SERVICE","Values":["%s"]}}]}' "${LINKED_ACCOUNT}" "${AI_SERVICE}")"
  fi

  aws ce get-cost-and-usage \
    --profile "${PROFILE}" \
    --region us-east-1 \
    --time-period "Start=${START_DATE},End=${END_DATE}" \
    --granularity MONTHLY \
    --metrics UnblendedCost \
    --filter "${FILTER_JSON}" \
    --output table
fi
