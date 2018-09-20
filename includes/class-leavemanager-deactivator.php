<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://shinesudarsanan.in
 * @since      1.0.0
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    LeaveManager
 * @subpackage LeaveManager/includes
 * @author     Shine Mon <shineklbm@gmail.com>
 */
class LeaveManager_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		remove_role('employee');
	}


	/**
	 * This will delete plugin page for apply for leave
	 */
	private function delete_apply_for_leave_page() {
		$apply_for_leave_page = get_page_by_path('apply-for-leave');
	}
}
