<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://pushbro.com/wp/
 * @since             1.0.0
 * @package           Pushbro
 *
 * @wordpress-plugin
 * Plugin Name:       pushbro
 * Plugin URI:        https://pushbro.com/wp/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Pushbro Team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pushbro
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
define( 'PUSHBRO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pushbro-activator.php
 */
function activate_pushbro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pushbro-activator.php';
	Pushbro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pushbro-deactivator.php
 */
function deactivate_pushbro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pushbro-deactivator.php';
	Pushbro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pushbro' );
register_deactivation_hook( __FILE__, 'deactivate_pushbro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pushbro.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pushbro() {

	$plugin = new Pushbro();
	$plugin->run();

}
run_pushbro();
