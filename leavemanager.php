<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://shinesudarsanan.in
 * @since             1.0.0
 * @package           LeaveManager
 *
 * @wordpress-plugin
 * Plugin Name:       Leave Manager
 * Plugin URI:        http://shinesudarsanan.in/
 * Description:       This plugin is crated by Shine with the help of boilerplate plugin
 * Version:           1.0.0
 * Author:            Shine Mon or Your Company
 * Author URI:        http://shinesudarsanan.in/
 * License:           GPL-2.0+
 * License URI:       http://www.shinesudarsanan.in/
 * Text Domain:       leavemanager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'LEAVEMANAGER_VERSION', '1.0.0' );

function activate_LeaveManager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-leavemanager-activator.php';
	LeaveManager_Activator::activate();
}

function deactivate_LeaveManager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-leavemanager-deactivator.php';
	LeaveManager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_LeaveManager' );
register_deactivation_hook( __FILE__, 'deactivate_LeaveManager' );

require plugin_dir_path( __FILE__ ) . 'includes/class-leavemanager.php';

function run_LeaveManager() {

	$plugin = new LeaveManager();
	$plugin->run();

}
run_LeaveManager();
