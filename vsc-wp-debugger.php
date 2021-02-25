<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://suilichem.com
 * @since             1.0.0
 * @package           Vsc_Wp_Debugger
 *
 * @wordpress-plugin
 * Plugin Name:       WP Debugger
 * Plugin URI:        https://suilichem.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Richard Mauritz
 * Author URI:        https://suilichem.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vsc-wp-debugger
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
define( 'VSC_WP_DEBUGGER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vsc-wp-debugger-activator.php
 */
function activate_vsc_wp_debugger() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vsc-wp-debugger-activator.php';
	Vsc_Wp_Debugger_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vsc-wp-debugger-deactivator.php
 */
function deactivate_vsc_wp_debugger() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vsc-wp-debugger-deactivator.php';
	Vsc_Wp_Debugger_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vsc_wp_debugger' );
register_deactivation_hook( __FILE__, 'deactivate_vsc_wp_debugger' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vsc-wp-debugger.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vsc_wp_debugger() {

	$plugin = new Vsc_Wp_Debugger();
	$plugin->run();

}
run_vsc_wp_debugger();
