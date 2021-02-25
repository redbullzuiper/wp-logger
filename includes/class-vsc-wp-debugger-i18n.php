<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://suilichem.com
 * @since      1.0.0
 *
 * @package    Vsc_Wp_Debugger
 * @subpackage Vsc_Wp_Debugger/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Vsc_Wp_Debugger
 * @subpackage Vsc_Wp_Debugger/includes
 * @author     Richard Mauritz <richard@suilichem.com>
 */
class Vsc_Wp_Debugger_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vsc-wp-debugger',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
