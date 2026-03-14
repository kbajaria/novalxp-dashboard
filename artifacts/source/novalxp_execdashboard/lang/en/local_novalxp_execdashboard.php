<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'NovaLXP executive dashboard';
$string['novalxp_execdashboard:view'] = 'View the NovaLXP executive dashboard';
$string['privacy:metadata'] = 'The NovaLXP executive dashboard plugin does not store personal data.';
$string['title'] = 'NovaLXP KPIs';
$string['heading'] = 'KPI overview';
$string['intro'] = 'Track learner activity, progression, completions, recent performance trends, and configured operating cost measures across NovaLXP.';
$string['notconfigured'] = 'Not configured';
$string['filter_allcategories'] = 'All categories';
$string['filter_allcohorts'] = 'All cohorts';
$string['filter_category'] = 'Category';
$string['filter_cohort'] = 'Cohort';
$string['filter_window'] = 'Reporting window';
$string['filter_submit'] = 'Apply';
$string['window_7'] = 'Last 7 days';
$string['window_30'] = 'Last 30 days';
$string['window_90'] = 'Last 90 days';
$string['tile_activelearners'] = 'Active learners';
$string['tile_activeenrolments'] = 'Active enrolments';
$string['tile_inprogress'] = 'In progress';
$string['tile_notstarted'] = 'Not started';
$string['tile_completions'] = 'Completed enrolments';
$string['tile_completionrate'] = 'Completion rate';
$string['tile_newenrolmentswindow'] = 'New enrolments';
$string['tile_completionswindow'] = 'Completions';
$string['tile_totalmonthlycost'] = 'Total monthly NovaLXP run cost';
$string['tile_totalmonthlycost_help'] = 'Total month-to-date NovaLXP AWS cost, combining fixed platform spend and AI spend.';
$string['tile_monthlyaicost'] = 'Monthly AI cost';
$string['tile_monthlyaicost_help'] = 'Month-to-date AI spend attributed to the configured AI AWS services, currently Amazon Bedrock.';
$string['tile_costperactivelearner'] = 'Cost per active learner';
$string['tile_costperactivelearner_help'] = 'Total monthly NovaLXP run cost divided by the number of active learners in the current dashboard filter.';
$string['tile_aicostperactivelearner'] = 'AI cost per active learner';
$string['tile_aicostperactivelearner_help'] = 'Monthly AI cost divided by the number of active learners in the current dashboard filter.';
$string['tile_aicostpercentoftotal'] = 'AI cost as % of total';
$string['tile_aicostpercentoftotal_help'] = 'The percentage of total NovaLXP run cost currently coming from AI spend.';
$string['tile_forecastcurrentadoption'] = 'Forecasted cost at current adoption';
$string['tile_forecastcurrentadoption_help'] = 'Forecast monthly spend assuming the current adoption level and current mix of fixed platform cost versus AI cost.';
$string['tile_forecastdoubledadoption'] = 'Forecasted cost at doubled adoption';
$string['tile_forecastdoubledadoption_help'] = 'Forecast monthly spend if adoption doubled, assuming fixed platform cost stays flat and AI cost scales with adoption.';
$string['section_summarykpis'] = 'Learner KPIs';
$string['section_costkpis'] = 'Cost KPIs';
$string['section_costrecommendations'] = 'Recommendations';
$string['costassumptionnote'] = 'Cost forecasts assume non-AI platform cost stays fixed while AI cost scales in line with adoption. Configure the monthly cost inputs under Reports -> NovaLXP executive dashboard.';
$string['costforecastnote'] = 'At the current live cost mix, doubling adoption increases forecast monthly spend by {$a}. That small delta is expected when AI cost is a very small share of total platform cost.';
$string['costsource_manual'] = 'Using manually configured monthly cost inputs.';
$string['costsource_awslive'] = 'Using live AWS Cost Explorer month-to-date cost data.';
$string['costsource_awsaifilter'] = 'AI cost is filtered from the configured AWS service list.';
$string['costsource_awsaifailed'] = 'Live AI cost lookup failed, so the manual AI cost fallback is being used.';
$string['costsource_awsaimissingfilter'] = 'No AWS AI service filter is configured, so the manual AI cost fallback is being used.';
$string['costsource_awsfailed'] = 'Live AWS total cost lookup failed, so manual cost inputs are being used.';
$string['costsource_awsmissingcredentials'] = 'Live AWS billing is enabled but the AWS credentials are incomplete, so manual cost inputs are being used.';
$string['costsource_awsimdsunavailable'] = 'Live AWS billing is set to use the EC2 instance role, but instance metadata credentials were not available, so manual cost inputs are being used.';
$string['recommendation_fixedcost_title'] = 'Prioritise infrastructure savings';
$string['recommendation_fixedcost_body'] = 'AI is only {$a} of total spend right now, so the biggest savings are more likely to come from EC2, RDS, storage, and network optimisation than from AI tuning.';
$string['recommendation_scaling_title'] = 'Current adoption is not materially increasing AWS spend';
$string['recommendation_scaling_body'] = 'Doubling adoption only adds about {$a} per month under the current cost mix, which suggests fixed platform cost is still the main driver.';
$string['recommendation_ai_title'] = 'Review AI efficiency as adoption grows';
$string['recommendation_ai_body'] = 'AI already represents {$a} of total spend, so prompt design, caching, session controls, and model choice are worth monitoring closely.';
$string['recommendation_monitor_title'] = 'Keep monitoring the cost mix';
$string['recommendation_monitor_body'] = 'No strong optimisation signal stands out from the current KPI mix, so keep watching the split between fixed platform cost and variable AI cost over time.';
$string['section_courses'] = 'Course breakdown';
$string['course_name'] = 'Course';
$string['course_activeenrolments'] = 'Active enrolments';
$string['course_activelearners'] = 'Active learners';
$string['course_inprogress'] = 'In progress';
$string['course_notstarted'] = 'Not started';
$string['course_completions'] = 'Completions';
$string['course_completionrate'] = 'Completion rate';
$string['course_newenrolmentswindow'] = 'New enrolments';
$string['course_completionswindow'] = 'Completions';
$string['empty_courses'] = 'No active course enrolments matched the current filters.';
$string['section_trends'] = 'Trend series';
$string['trend_period'] = 'Period';
$string['trend_newenrolments'] = 'New enrolments';
$string['trend_completions'] = 'Completions';
$string['empty_trends'] = 'No trend activity matched the current filters.';
$string['settingsheading_costs'] = 'Cost inputs';
$string['settingsheading_costs_desc'] = 'Enter the monthly cost inputs used by the executive dashboard when live AWS billing data is unavailable or disabled.';
$string['settingsheading_aws'] = 'Live AWS billing';
$string['settingsheading_aws_desc'] = 'Configure AWS Cost Explorer access to pull live month-to-date NovaLXP cost data.';
$string['setting_monthlyplatformcost'] = 'Monthly non-AI platform cost (USD)';
$string['setting_monthlyplatformcost_desc'] = 'Fallback monthly AWS and hosting cost excluding AI usage. This is treated as fixed in the doubled-adoption forecast.';
$string['setting_monthlyaicost'] = 'Monthly AI cost (USD)';
$string['setting_monthlyaicost_desc'] = 'Fallback monthly AI model and inference spend attributed to NovaLXP.';
$string['setting_awsbillingenabled'] = 'Enable live AWS billing';
$string['setting_awsbillingenabled_desc'] = 'When enabled, the dashboard will call AWS Cost Explorer for month-to-date cost data and use the manual values only as fallback.';
$string['setting_awsuseec2role'] = 'Use EC2 instance role';
$string['setting_awsuseec2role_desc'] = 'Use the Moodle EC2 instance profile role via IMDSv2 instead of storing static AWS access keys in Moodle.';
$string['setting_awsaccesskeyid'] = 'AWS access key ID';
$string['setting_awsaccesskeyid_desc'] = 'Access key for an IAM principal that can call ce:GetCostAndUsage. Leave blank when using the EC2 instance role.';
$string['setting_awssecretaccesskey'] = 'AWS secret access key';
$string['setting_awssecretaccesskey_desc'] = 'Secret key paired with the configured AWS access key. Leave blank when using the EC2 instance role.';
$string['setting_awssessiontoken'] = 'AWS session token';
$string['setting_awssessiontoken_desc'] = 'Optional session token for temporary AWS credentials. Leave blank when using the EC2 instance role.';
$string['setting_awslinkedaccount'] = 'Linked account ID';
$string['setting_awslinkedaccount_desc'] = 'Optional AWS linked account ID to filter billing data when the credentials belong to a management account.';
$string['setting_awsaicostservices'] = 'AI AWS services';
$string['setting_awsaicostservices_desc'] = 'Comma-separated AWS Cost Explorer SERVICE values to treat as AI spend, for example Amazon Bedrock.';
$string['setting_awstimeout'] = 'AWS request timeout (seconds)';
$string['setting_awstimeout_desc'] = 'HTTP timeout for AWS Cost Explorer requests.';
