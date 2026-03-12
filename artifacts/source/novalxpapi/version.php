<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Version details for the local_novalxpapi plugin.
 *
 * Local plugin providing external web service endpoints for NovaLXP.
 */

$plugin->component = 'local_novalxpapi';  // Full frankenstyle component name.
$plugin->version   = 2026030700;          // YYYYMMDDXX – course factory guardrails.
$plugin->requires  = 2022041900;          // Requires at least Moodle 4.0 (safe for 5.x).
$plugin->maturity  = MATURITY_ALPHA;      // Or MATURITY_BETA / MATURITY_STABLE when ready.
$plugin->release   = '0.1.0';
