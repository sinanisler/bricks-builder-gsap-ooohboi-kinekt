<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://gloo.tube
 * @since      1.0.0
 *
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */
class Ooohboi_Kinekt_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ooohboi-kinekt',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
