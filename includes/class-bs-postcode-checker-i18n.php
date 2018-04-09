<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.blueside.nl/
 * @since      1.0.0
 *
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bs_Postcode_Checker
 * @subpackage Bs_Postcode_Checker/includes
 * @author     Marlon Peeters <marlon@blueside.nl>
 */
class Bs_Postcode_Checker_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bs-postcode-checker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
