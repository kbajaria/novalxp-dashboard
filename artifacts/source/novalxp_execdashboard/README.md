# local_novalxp_execdashboard

Moodle local plugin for the NovaLXP KPI experience.

## Current features

- a dedicated page at `/local/novalxp_execdashboard/index.php`
- an admin navigation entry under Reports for permitted users
- a custom capability: `local/novalxp_execdashboard:view`
- a `KPIs` top-nav item in the Edutor header for permitted users
- a cost KPI section shown at the top of the dashboard
- lightweight cost recommendations driven by the current live cost mix
- learner KPI tiles derived from active enrolments and course completions
- a rolling 7/30/90 day reporting window filter
- a cohort filter for audience scoping
- a course category filter for dashboard segmentation
- a trend chart for enrolments and completions
- a status model that splits not-started, in-progress, and complete
- a course-level breakdown table for active enrolments and completions
- hover help for each cost KPI

## Rollout status

Deployed to:

- dev
- test
- production

Current permitted users by environment:

- dev: `admin`, `demo.user001`
- test: `admin`, `demo.user001`
- production: `admin`, `demo.user001`, `bamboo_1287` (`richard.bolger@finova.tech`)

## Current KPI tiles

- Cost KPIs
- Active learners
- Active enrolments
- Not started
- In progress
- Completed enrolments
- Completion rate
- New enrolments in the last 30 days
- Completions in the last 30 days
- Total monthly NovaLXP run cost
- Monthly AI cost
- Cost per active learner
- AI cost per active learner
- AI cost as % of total
- Forecasted cost at current adoption
- Forecasted cost at doubled adoption

The cost KPI section also includes:

- hover help for each cost KPI
- a forecast note that highlights the current-versus-doubled adoption delta
- a small recommendations section based on the current cost mix

The cost KPIs are driven by admin-configured monthly inputs:

- Monthly non-AI platform cost (USD)
- Monthly AI cost (USD)

The doubled-adoption forecast assumes non-AI platform cost remains fixed while AI cost scales with adoption.

## Live AWS billing

The dashboard can optionally call AWS Cost Explorer directly for live month-to-date cost values.

Configure these settings under Reports -> NovaLXP executive dashboard:

- Enable live AWS billing
- Use EC2 instance role
- Linked account ID (optional)
- AI AWS services
- AWS request timeout

Current implementation notes:

- uses AWS Cost Explorer `GetCostAndUsage`
- calls the `ce.us-east-1.amazonaws.com` endpoint
- signs requests with SigV4 in-plugin
- prefers the Moodle EC2 instance profile role via IMDSv2
- still supports static AWS credentials as fallback
- uses manual monthly cost values as fallback if live AWS calls fail or are disabled
- treats the configured AI service list as AI spend and subtracts that from total cost to derive non-AI platform cost
- currently uses linked account `070017892219`
- currently uses `Amazon Bedrock` as the AI service filter

## Savings recommendations

The dashboard currently shows lightweight recommendations based on the live KPI mix already on the page.

The next likely enhancement is AWS-native savings recommendations via AWS Cost Optimization Hub, which is separate from the Cost Explorer cost API currently used for the KPI values.

## Intended next steps

1. Add client filters and category descendant rollups.
2. Add exports if stakeholders need offline reporting.
3. Split not-started from genuinely in-progress learners.
4. Add richer drill-down tables.
5. Move heavier reporting logic to pre-aggregated tables if live queries become too expensive.

## Installation

1. Copy this folder to your Moodle server at:
   - `/var/www/moodle/public/local/novalxp_execdashboard`
2. Run the Moodle upgrade:
   - Site administration -> Notifications
3. Grant `local/novalxp_execdashboard:view` to the required role.
4. Purge caches.
