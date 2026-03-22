# Edutor Artifact Guardrails

Date: March 19, 2026

## Purpose

This repo contains copied Edutor source artifacts from dev for investigation and documentation. Those copies should not be treated as complete or safe deployment baselines without checking for required NovaLXP customizations.

## Why this matters

The dev feedback widget regression was traced to Edutor theme files that no longer contained the NovaLXP feedback integration patch.

That patch is required to render the front-page feedback textarea in featured pane 2 and lives outside the feedback plugin itself.

## Required caution for Edutor artifact use

Before using `artifacts/source/edutor/` as a comparison source, rollback source, or promotion input, verify whether it includes all required NovaLXP functional patches.

At minimum, check for:

- the NovaLXP feedback pane 2 hook in `classes/output/core_renderer.php`
- the matching `customcontent` block in `templates/fp_featured.mustache`
- any intentionally active raw SCSS overrides in `theme_edutor/scss`

## Known example

The copied Edutor artifacts in this repo were useful for analysis, but they did not include the feedback integration patch. Treating them as authoritative deployable theme code would risk removing the feedback field from an environment.

## Related references

- `docs/dashboard-artifacts-map.md`
- `docs/frontpage-featured-carousel-rca-2026-03-16.md`
- `NovaLXP-Feedback/repo/patches/edutor-featured-feedback.patch`
