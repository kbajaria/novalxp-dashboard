# AWS IAM Request For NovaLXP KPI Dashboard

This request is for the Moodle executive KPI dashboard to pull live cost data from AWS Cost Explorer.

Preferred setup:

- use the Moodle EC2 instance role with the required Cost Explorer permissions

Fallback only:

- create a dedicated IAM user if instance-role based access is not possible

## Requested IAM user

- User name: `nova-kpi-cost-reader`

## Purpose

- Read-only access for the NovaLXP KPI dashboard
- Used to fetch live AWS month-to-date cost data
- Used to fetch AWS service and linked-account dimension values for filtering

## Required policy

Attach this inline policy to the IAM user:

```json
{
  "Version": "2012-10-17",
  "Statement": [
    {
      "Effect": "Allow",
      "Action": [
        "ce:GetCostAndUsage",
        "ce:GetDimensionValues"
      ],
      "Resource": "*"
    }
  ]
}
```

## Required outputs

Please return:

- AWS access key ID
- AWS secret access key

## Dashboard configuration values

These values have already been confirmed from Cost Explorer and should be entered in the NovaLXP dashboard settings with the new credentials:

- Linked account ID: `070017892219`
- AI AWS services: `Amazon Bedrock`

## Optional CLI commands

```bash
aws iam create-user --user-name nova-kpi-cost-reader

aws iam put-user-policy \
  --user-name nova-kpi-cost-reader \
  --policy-name NovaLXPCostExplorerReadOnly \
  --policy-document '{
    "Version":"2012-10-17",
    "Statement":[
      {
        "Effect":"Allow",
        "Action":[
          "ce:GetCostAndUsage",
          "ce:GetDimensionValues"
        ],
        "Resource":"*"
      }
    ]
  }'

aws iam create-access-key --user-name nova-kpi-cost-reader
```

## Context

The current SSO role used in local development cannot create IAM users because of an explicit deny in the account permission boundary, so this step must be completed by an AWS admin or another role with IAM write permissions.
