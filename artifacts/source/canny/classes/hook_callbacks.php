<?php
namespace local_canny;

defined('MOODLE_INTERNAL') || die();

use core\hook\output\before_footer_html_generation;
use moodle_url;

/**
 * Hook callbacks for local_canny.
 */
class hook_callbacks {

    /**
     * Hook handler for core\hook\output\before_footer_html_generation.
     *
     * @param before_footer_html_generation $hook
     */
    public static function before_footer_html_generation(before_footer_html_generation $hook): void {
        global $USER, $CFG;

        // Do not expose anything for guests or non-logged-in users.
        if (!isloggedin() || isguestuser()) {
            return;
        }

        $userdata = [
            'id'        => (int)$USER->id,          // This is the Moodle userid – perfect for Canny.
            'email'     => (string)$USER->email,
            'name'      => fullname($USER),
            'avatarURL' => '',
            'created'   => (int)$USER->timecreated,
        ];

        // Try to construct an avatar URL if they have a picture.
        if (!empty($USER->picture)) {
            require_once($CFG->libdir . '/weblib.php');
            $avatarurl = new moodle_url('/user/pix.php', ['id' => $USER->id, 'rev' => $USER->picture]);
            $userdata['avatarURL'] = $avatarurl->out(false);
        }

        $json = json_encode($userdata,
            JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

        $html = '<script>window.CANNY_USER = ' . $json . ';</script>';

        // Inject our JS just before the footer.
        $hook->add_html($html);
    }
}

