# NovaLXP Executive Dashboard Proposal

## Objective

Define an executive-level KPI dashboard for NovaLXP that:

- uses data already available in Moodle and NovaLXP customizations
- is practical to implement in the current NovaLXP environment
- can be shown only to selected users such as executives, managers, or client admins

This proposal is based on the current NovaLXP Moodle dashboard structure and the existing `block_novalxpfunnel` custom block.

## Current state in NovaLXP

NovaLXP already has a custom dashboard block that computes per-user learning funnel metrics from Moodle enrolment and completion data:

- Enrolled
- In Progress
- Complete

The current logic is implemented in:

- `artifacts/source/block_novalxpfunnel/classes/local/metrics.php`
- `artifacts/source/block_novalxpfunnel/block_novalxpfunnel.php`

The default dashboard currently uses Moodle `my-index` blocks on shared dashboard subpages, with custom HTML blocks and the NovaLXP funnel block already placed on the default dashboard.

## Current implementation status

NovaLXP now has a Moodle-native KPI page implemented as:

- `artifacts/source/novalxp_execdashboard/`
- URL: `/local/novalxp_execdashboard/index.php`

Implemented features currently include:

- capability-gated access via `local/novalxp_execdashboard:view`
- summary KPI tiles
- cohort filter
- course category filter
- rolling `7 / 30 / 90` day reporting window
- trend chart for enrolments and completions
- course breakdown table
- learner state split into:
  - not started
  - in progress
  - complete

The current header navigation in the Edutor theme also adds a `KPIs` top-nav item for users with the dashboard capability.

The KPI experience is now deployed in:

- dev
- test
- production

The current access model uses the `Executive Dashboard Viewer` system role plus the `local/novalxp_execdashboard:view` capability.

Current rollout status:

- dev
  - `admin`
  - `demo.user001`
- test
  - `admin`
  - `demo.user001`
- production
  - `admin`
  - `demo.user001`
  - Richard Bolger (`user id 523`, username `bamboo_1287`, email `richard.bolger@finova.tech`)

The original dev deployment granted access to:

- `admin`
- `demo.user001`

using a dedicated system role for the demo user rather than broadening access for all logged-in users.

## Recommended KPI set

The dashboard should separate KPIs into three tiers.

### Tier 1: executive summary KPIs

These should appear as top-line tiles.

1. Active learners
   - Distinct users with at least one active enrolment.
2. Total active enrolments
   - Count of active learner-course enrolments.
3. Completion rate
   - Completed enrolments divided by active enrolments.
4. In-progress rate
   - In-progress enrolments divided by active enrolments.
5. New enrolments
   - Enrolments created in the last 7, 30, and 90 days.
6. Learner activity rate
   - Percentage of enrolled learners active within the last 7 or 30 days.
7. Average courses per learner
   - Active enrolments divided by active learners.
8. Median time to completion
   - Median days from enrolment start to course completion.

### Tier 2: operational drill-down KPIs

These support management decisions and should sit below the executive tiles.

1. Funnel by course
   - Enrolled, in progress, complete, completion rate by course.
2. Funnel by category
   - Same as above grouped by course category.
3. Funnel by cohort or client account
   - Same as above grouped by cohort, client, or team.
4. Dormant learners
   - Learners enrolled but inactive for 14, 30, or 60 days.
5. Courses with highest drop-off
   - High enrolment but low completion.
6. Courses with longest completion cycle
   - Long median days to completion.
7. Assessment outcomes
   - Quiz attempts, pass rate, average score, retries.
8. Badge or credential awards
   - Awards issued in the last 30 or 90 days, if used in NovaLXP.

### Tier 3: trend metrics

These are important for executive use and are harder to deliver from purely live dashboard queries.

1. Monthly active learners
2. Monthly completions
3. Monthly enrolments
4. Completion trend by client or cohort
5. Engagement trend by client or cohort
6. Course launch performance over time

## Data sources available in Moodle

The current NovaLXP code confirms immediate access to these core data areas:

- enrolments via `{enrol}` and `{user_enrolments}`
- course completion via `{course_completions}`
- course catalog via `{course}`

For the next KPI tier, the likely Moodle sources are:

- recent learner activity: `{user_lastaccess}` and site logs
- activity completion: `{course_modules_completion}`
- assessment outcomes: quiz and grade tables such as `{quiz_attempts}` and `{grade_grades}`
- audience segmentation: `{cohort}` and `{cohort_members}`
- badges or certificates: badge and award tables, if enabled in NovaLXP

## KPI definitions

To keep reporting stable, NovaLXP should adopt explicit definitions.

### Enrolled

Distinct active learner-course enrolments where:

- the enrolment method is active
- the user enrolment is active
- the current date is inside the enrolment window
- the site course is excluded

This matches the current funnel logic.

### Complete

Enrolled courses where `course_completions.timecompleted` is set.

### In Progress

Recommended definition:

- enrolled
- not complete
- has learner activity after enrolment or has at least one started trackable activity

Current block logic uses `enrolled - complete`, which is acceptable for learner-facing summary cards but too coarse for executive reporting because it combines not-started and genuinely in-progress learners.

### Active learner

Recommended definition:

- a learner with at least one active enrolment and
- a login or course interaction within the reporting period

### Dormant learner

Recommended definition:

- active enrolment exists
- no login or course interaction within the threshold window

## Display options

There are three viable ways to display an executive dashboard for NovaLXP.

### Option 1: dashboard block on Moodle `my-index`

Description:

- build one or more custom blocks and place them on the default dashboard
- blocks can show KPI tiles, small charts, or summaries

Pros:

- lowest friction for deployment
- fits the current NovaLXP dashboard pattern
- fast for simple metrics

Cons:

- poor fit for multi-section executive reporting
- limited filtering and drill-down
- live block queries can become expensive
- default dashboard distribution is broad unless visibility is explicitly gated

Best for:

- learner summary widgets
- simple manager widgets
- a small executive summary block linking to a deeper report

### Option 2: dedicated Moodle local plugin page

Description:

- create a local plugin such as `local_novalxp_execdashboard`
- expose a dedicated page under Site administration, Reports, or a custom navigation entry

Pros:

- best Moodle-native fit for an executive dashboard
- full-page layout allows KPI tiles, charts, tables, filters, export actions
- easier to gate access with capabilities
- cleaner separation between learner dashboard and executive reporting

Cons:

- more implementation work than a block
- still needs careful query design or pre-aggregation for trends

Best for:

- executive and management dashboards
- cohort or client segmentation
- filters by period, program, course category, cohort, or client

### Option 3: external BI dashboard

Description:

- extract Moodle and NovaLXP data to a reporting store and visualize in a BI tool

Pros:

- best for trend reporting and large datasets
- easier cross-system reporting
- strongest charting and export capabilities

Cons:

- extra infrastructure and governance
- slower to stand up
- user access and embedding become separate concerns

Best for:

- board-level reporting
- historical trend analysis
- multi-system client reporting

## Recommended display approach

Recommended architecture for NovaLXP:

1. Keep `block_novalxpfunnel` or similar blocks for learner-facing personal dashboard metrics.
2. Build a dedicated executive dashboard page in a Moodle local plugin for leadership reporting.
3. Add one small summary block on the dashboard only if you want a shortcut tile for privileged users.
4. If trend reporting becomes central, back the executive page with pre-aggregated reporting tables or an external reporting layer.

This gives NovaLXP a clean split:

- learner dashboard on `my-index`
- executive reporting on a separate, controlled page

This is now the path NovaLXP is actively using in dev.
This is now the path NovaLXP is actively using across dev, test, and production.

## Selected-user visibility in Moodle

Yes, Moodle can show this content only to selected users.

The recommended mechanism is capability-based access control.

### Recommended approach

Create a custom capability such as:

- `local/novalxp_execdashboard:view`

Then:

- assign that capability only to selected roles such as Executive, Client Admin, or Manager
- check that capability in the dashboard page or block before rendering content
- optionally combine this with cohort checks if audience membership is organization-specific

Example access pattern:

- executives see the executive dashboard
- standard learners do not see it
- client admins may see only their own client segment if scoped rules are added

This is the mechanism now in use for the current dev implementation.

### Why not rely only on default dashboard placement

The current NovaLXP dashboard tooling manages the shared default dashboard on `my-index` and can reset private dashboards for all users. That is useful for broad rollout, but it is not a strong audience-selection mechanism on its own.

If a block is placed on the default dashboard, it should still implement its own permission check before displaying sensitive content.

### Practical implementation options for restricted visibility

1. Restricted block
   - Put a block on `my-index`.
   - In `get_content()`, return empty output unless the user has the required capability.
   - Good for a small executive summary card.

2. Restricted local plugin page
   - Build a full executive dashboard page.
   - Require capability before page render.
   - Best overall option.

3. Cohort-aware view
   - Use capability plus cohort membership.
   - Useful for client admins who should see only their own organization.

## Proposed implementation phases

### Phase 1: define and validate KPI logic

- confirm business definitions for active learner, in progress, dormant, and completion
- decide which dimensions matter: cohort, client, category, course, time period
- validate a sample SQL definition for each KPI

### Phase 2: deliver Moodle-native executive dashboard MVP

- create `local_novalxp_execdashboard`
- add capability `local/novalxp_execdashboard:view`
- render:
  - KPI tile row
  - funnel by course/category/cohort
  - recent enrolment and completion trends
  - dormant learners summary
- restrict page access to selected roles

### Phase 3: optimize for performance and trend depth

- add pre-aggregated reporting tables if live queries are too slow
- add scheduled refresh jobs
- add CSV export and client/cohort filters

## Suggested MVP scope

For the first release, NovaLXP should implement:

- active learners
- active enrolments
- completion rate
- in-progress rate
- new enrolments in last 30 days
- completions in last 30 days
- dormant learners in last 30 days
- funnel by course
- funnel by cohort or client

This is enough to provide leadership value without overbuilding.

## Recommendation summary

- Use Moodle-native data first.
- Keep learner metrics in blocks.
- Build the executive dashboard as a dedicated local plugin page.
- Control visibility with a custom capability assigned only to selected roles.
- Add cohort or client scoping if NovaLXP needs tenant-like audience separation.
- Use pre-aggregated reporting tables if trend and segmentation queries become heavy.
