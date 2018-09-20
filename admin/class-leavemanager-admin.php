<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://shinesudarsanan.in
 * @since      1.0.0
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/admin
 * @author     Shine Mon <shineklbm@gmail.com>
 */
class LeaveManager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $LeaveManager    The ID of this plugin.
	 */
	private $LeaveManager;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $LeaveManager       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $LeaveManager, $version ) {

		$this->LeaveManager = $LeaveManager;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in LeaveManager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The LeaveManager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->LeaveManager, plugin_dir_url( __FILE__ ) . 'css/leavemanager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in LeaveManager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The LeaveManager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->LeaveManager, plugin_dir_url( __FILE__ ) . 'js/leavemanager-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function leavemanager_register_settings() {
		add_option( 'leavemanager_page_id', 'none');
		register_setting( 'leavemanager_options_group', 'leavemanager_page_id', 'leavemanager_callback' );
	}


	public function leavemanager_register_options_page() {
		add_options_page(
            __('Leave menu')
            ,__('Leave Menu')
            ,'edit_posts'
            ,'leave-menu'
            ,array(&$this, 'leavemanager_options_page')
        );
	}

	public function leavemanager_options_page() {
		require_once(plugin_dir_path( __FILE__ ).'partials/leavemanager-admin-display.php');
	}
}
