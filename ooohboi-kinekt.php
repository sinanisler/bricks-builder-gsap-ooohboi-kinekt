<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              hhttps://kinekt.ooohboi.space/index.php/ooohboi-kinekt-documentation/
 * @since             1.0.0
 * @package           Ooohboi_Kinekt
 *
 * @wordpress-plugin
 * Plugin Name:       OoohBoi Kinekt
 * Plugin URI:        https://kinekt.ooohboi.space/index.php/ooohboi-kinekt-documentation/
 * Description:       Breathe life into your Bricks Builder creations with Kinekt, a nifty addon that lets you animate your widgets on scroll.
 * Version:           1.0.2
 * Author:            OoohBoi
 * Author URI:        https://ooohboi.space
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ooohboi-kinekt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OOOHBOI_KINEKT_VERSION', '1.0.2' );

/**
 * This plugin includes some custom made widgets for Bricks Builder
 * Which versions of these two are required
 */
define( 'OOOHBOI_KINEKT_BRICKS_REQUIRED', '1.9' );

/**
 * These are needed for the plugin updates
 */
define( 'OOOHBOI_KINEKT_SLUG', plugin_basename( __DIR__ ) );
define( 'OOOHBOI_KINEKT_PLUGIN', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ooohboi-kinekt-activator.php
 */
function activate_ooohboi_kinekt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ooohboi-kinekt-activator.php';
	Ooohboi_Kinekt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ooohboi-kinekt-deactivator.php
 */
function deactivate_ooohboi_kinekt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ooohboi-kinekt-deactivator.php';
	Ooohboi_Kinekt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ooohboi_kinekt' );
register_deactivation_hook( __FILE__, 'deactivate_ooohboi_kinekt' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ooohboi-kinekt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ooohboi_kinekt() {

	$plugin = new Ooohboi_Kinekt();
	$plugin->run();

}
run_ooohboi_kinekt();
