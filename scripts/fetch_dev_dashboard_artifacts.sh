#!/usr/bin/env bash
set -euo pipefail

# Re-fetches dashboard artifacts from dev Moodle.
# Assumes SSH alias 'dev-moodle-ec2' works and DB credentials are available.

ROOT_DIR="$(cd "$(dirname "$0")/.." && pwd)"
RAW_DIR="$ROOT_DIR/artifacts/raw"
DECODED_DIR="$ROOT_DIR/artifacts/decoded"
SOURCE_DIR="$ROOT_DIR/artifacts/source"

mkdir -p "$RAW_DIR" "$DECODED_DIR" "$SOURCE_DIR"
date -u +"%Y-%m-%dT%H:%M:%SZ" > "$RAW_DIR/exported_at_utc.txt"

# Provide DB params via env to avoid hardcoding secrets.
: "${MOODLE_DB_HOST:?Set MOODLE_DB_HOST}"
: "${MOODLE_DB_NAME:?Set MOODLE_DB_NAME}"
: "${MOODLE_DB_USER:?Set MOODLE_DB_USER}"
: "${MOODLE_DB_PASS:?Set MOODLE_DB_PASS}"

mysql_ssh() {
  local sql="$1"
  ssh dev-moodle-ec2 "mysql -N -B -h '$MOODLE_DB_HOST' -u '$MOODLE_DB_USER' -p'$MOODLE_DB_PASS' -D '$MOODLE_DB_NAME' -e \"$sql\""
}

mysql_ssh "SELECT id, COALESCE(userid,'NULL') userid, name, private, sortorder FROM mdl_my_pages ORDER BY id;" > "$RAW_DIR/mdl_my_pages.tsv"
mysql_ssh "SELECT id, blockname, parentcontextid, showinsubcontexts, requiredbytheme, pagetypepattern, COALESCE(subpagepattern,'NULL') subpagepattern, defaultregion, defaultweight, timecreated, timemodified, configdata FROM mdl_block_instances WHERE pagetypepattern='my-index' ORDER BY subpagepattern, defaultregion, defaultweight, id;" > "$RAW_DIR/mdl_block_instances_my_index.tsv"
mysql_ssh "SELECT bp.id, bp.blockinstanceid, bp.contextid, bp.pagetype, COALESCE(bp.subpage,'NULL') subpage, bp.visible, bp.region, bp.weight FROM mdl_block_positions bp JOIN mdl_block_instances bi ON bi.id = bp.blockinstanceid WHERE bi.pagetypepattern='my-index' ORDER BY bp.blockinstanceid, bp.id;" > "$RAW_DIR/mdl_block_positions_my_index.tsv"
mysql_ssh "SELECT name, value FROM mdl_config WHERE name REGEXP 'dashboard|myhome|homepagelayout|additionalhtml|frontpage|defaultpage';" > "$RAW_DIR/mdl_config_dashboard_related.tsv"
mysql_ssh "SELECT plugin, name, value FROM mdl_config_plugins WHERE plugin REGEXP '^theme_|^block_html' OR name REGEXP 'dashboard|myhome|additionalhtml|custom|frontpage|button|welcome';" > "$RAW_DIR/mdl_config_plugins_dashboard_related.tsv"

awk -F '\t' '$2=="html"{print $1"\t"$7"\t"$8"\t"$9"\t"$12}' "$RAW_DIR/mdl_block_instances_my_index.tsv" > "$RAW_DIR/mdl_block_instances_my_index_html_only.tsv"

# Decode HTML block payloads (base64 of PHP serialized stdClass)
rm -f "$DECODED_DIR"/block_*.json "$DECODED_DIR"/block_*.html
while IFS=$'\t' read -r id subpage region weight configb64; do
  perl -MMIME::Base64 -MJSON::PP -e '
    my ($id,$sub,$reg,$w,$b64,$jsonf,$htmlf)=@ARGV;
    my $s = decode_base64($b64);
    $s =~ /s:5:"title";s:\d+:"(.*?)";s:6:"format";s:\d+:"(.*?)";s:4:"text";s:\d+:"(.*)";\}\z/s or die "Could not parse serialized config for block $id\n";
    my ($title,$format,$text)=($1,$2,$3);
    open my $jh, ">", $jsonf or die $!;
    print $jh JSON::PP->new->ascii(0)->pretty(1)->canonical(1)->encode({
      block_instance_id => 0 + $id,
      subpagepattern => $sub,
      region => $reg,
      weight => 0 + $w,
      title => $title,
      format => $format,
      text => $text
    });
    close $jh;
    open my $hh, ">", $htmlf or die $!;
    print $hh $text;
    close $hh;
  ' "$id" "$subpage" "$region" "$weight" "$configb64" "$DECODED_DIR/block_${id}.json" "$DECODED_DIR/block_${id}.html"
done < "$RAW_DIR/mdl_block_instances_my_index_html_only.tsv"

# Copy code artifacts
ssh dev-moodle-ec2 "tar -C /var/www/moodle/public/theme -cf - edutor" | tar -C "$SOURCE_DIR" -xf -
ssh dev-moodle-ec2 "tar -C /var/www/moodle/public/local -cf - bedrock canny novalxpapi novalxpbot" | tar -C "$SOURCE_DIR" -xf -

echo "Done. Artifacts refreshed under: $ROOT_DIR/artifacts"
