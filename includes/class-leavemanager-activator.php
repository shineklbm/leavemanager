<?php

/**
 * Fired during plugin activation
 *
 * @link       http://shinesudarsanan.in
 * @since      1.0.0
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    LeaveManager
 * @subpackage LeaveManager/includes
 * @author     Shine Mon <shineklbm@gmail.com>
 */
class LeaveManager_Activator {

	/**
	 * A plugin to manage leave
	 *
	 * This plugin can be used to manage the employees leave.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_role('employee', __( 'Employee' ));
	}
}
