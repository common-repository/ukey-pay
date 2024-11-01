<?php

/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              UKey
 * @since             1.0.0
 * @package           UKey
 *
 * @wordpress-plugin
 * Plugin Name:       UKey Pay
 * Description:       90-95% of online consumers don't want to be hit with a subscription paywall. Give them a pay-per-use experience and start building long-term customer relationships. Get started by activating this plugin and specifying your Client ID under UKey Settings page.
 * Version:           1.0.0
 * Author:            Team UKey
 * Author URI:        https://ukey.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ukey
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'UKEY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ukey-activator.php
 */
function activate_ukey() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ukey-activator.php';
	UKey_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ukey-deactivator.php
 */
function deactivate_ukey() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ukey-deactivator.php';
	UKey_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ukey' );
register_deactivation_hook( __FILE__, 'deactivate_ukey' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ukey.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ukey() {

	$plugin = new UKey();
	$plugin->run();

}
run_ukey();
