<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ukey.app
 * @since      1.0.0
 *
 * @package    UKey
 * @subpackage UKey/admin/partials
 */


// Check user capabilities
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

// Add error/update messages
 
// Check if the user have submitted the settings
// WordPress will add the "settings-updated" $_GET parameter to the url
if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'ukey_messages', 'ukey_message', __( 'Settings Saved', 'ukey' ), 'updated' );
}

// show error/update messages
settings_errors( 'ukey_messages' );

?>

<div class="uk-main">
    <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "ukey"
        settings_fields( 'ukey' );
        // output setting sections and their fields
        // (sections are registered for "ukey", each field is registered to a specific section)
        do_settings_sections( 'ukey' );
        // output save settings button
        submit_button( 'Save Settings' );
        ?>
    </form>
</div>
