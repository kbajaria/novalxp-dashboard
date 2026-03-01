# block_novalxpfunnel

Dashboard block for Moodle 5.1.3+ that shows a student course funnel:

- Enrolled
- In Progress
- Complete

## Install

1. Copy this folder to your Moodle server at:
   - `/var/www/moodle/public/blocks/novalxpfunnel`
2. Run the Moodle upgrade:
   - Site administration -> Notifications
3. Purge caches:
   - Site administration -> Development -> Purge all caches

## Add to default dashboard

1. Open Dashboard as admin.
2. Turn editing on.
3. Add a block -> `Course funnel`.
4. Reposition as needed.
5. Use `Reset Dashboard for all users` so everyone gets the block.

## Data logic

- Enrolled: distinct active enrolments for the current user.
- Complete: enrolled courses with `course_completions.timecompleted` set.
- In Progress: `Enrolled - Complete`.

Courses with completion tracking disabled are counted as in-progress if enrolled.
