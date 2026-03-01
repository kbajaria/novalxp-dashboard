# Extraction Log

## Actions completed

1. Connected to dev Moodle through `ssh dev-moodle-ec2`.
2. Confirmed Moodle release in `/var/www/moodle/public/version.php`.
3. Exported dashboard-related DB records to `artifacts/raw/`.
4. Decoded HTML block `configdata` payloads into `artifacts/decoded/`.
5. Copied theme and relevant local plugin source trees into `artifacts/source/`.

## Important implementation detail

Moodle stores HTML block content in `mdl_block_instances.configdata` as base64-encoded PHP serialized data. This project includes both:

- raw configdata export (`artifacts/raw/mdl_block_instances_my_index.tsv`)
- decoded payload files (`artifacts/decoded/block_*.json`, `artifacts/decoded/block_*.html`)

