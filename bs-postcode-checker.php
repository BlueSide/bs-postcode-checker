<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.blueside.nl/
 * @since             1.0.0
 * @package           Bs_Postcode_Checker
 *
 * @wordpress-plugin
 * Plugin Name:       Blue Side Postcode Checker
 * Plugin URI:        https://www.blueside.nl/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Marlon Peeters
 * Author URI:        https://www.blueside.nl/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bs-postcode-checker
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bs-postcode-checker-activator.php
 */
function activate_bs_postcode_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bs-postcode-checker-activator.php';
	Bs_Postcode_Checker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bs-postcode-checker-deactivator.php
 */
function deactivate_bs_postcode_checker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bs-postcode-checker-deactivator.php';
	Bs_Postcode_Checker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bs_postcode_checker' );
register_deactivation_hook( __FILE__, 'deactivate_bs_postcode_checker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bs-postcode-checker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bs_postcode_checker() {

	$plugin = new Bs_Postcode_Checker();
	$plugin->run();

}
run_bs_postcode_checker();
