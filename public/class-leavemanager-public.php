<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://shinesudarsanan.in
 * @since      1.0.0
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    LeaveManager
 * @subpackage LeaveManager/public
 * @author     Shine Mon <shineklbm@gmail.com>
 */
class LeaveManager_Public {

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
	 * @param      string    $LeaveManager       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $LeaveManager, $version ) {

		$this->LeaveManager = $LeaveManager;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->LeaveManager, plugin_dir_url( __FILE__ ) . 'css/leavemanager-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->LeaveManager, plugin_dir_url( __FILE__ ) . 'js/leavemanager-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Registers a new content type for leave_applications
	 */
	public function register_leave_application_content_type() { 
		$labels = array(
			'name'               => 'Leave Requests',
			'singular_name'      => 'Leave Request',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Request Leave',
			'edit_item'          => 'Edit Leave',
			'new_item'           => 'New Leave',
			'all_items'          => 'All Requests',
			'view_item'          => 'View Leave',
			'search_items'       => 'Search Leave',
			'not_found'          =>  'No leave found',
			'not_found_in_trash' => 'No leave found in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Leave Requests'
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'leave-requests' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor')
		);
	
		register_post_type( 'leave_requests', $args );
	
	}
	
	/**
	 * We are checking the user role here
	 * If he/she is with role of employee then 
	 * we redirect them to apply-for-leave page
	 */
	public function redirect_logged_in_employee( $redirect_to, $request, $user ) {
		if (isset($user->roles) && is_array($user->roles)) {
			if (in_array('employee', $user->roles)) {
				$redirect_to = home_url('/apply-for-leave/');
			}
		}
    	return $redirect_to;
	}

	
	// public function redirect_leave_application_page_template($page_template) {
	// 	$template_name = plugin_dir_path( __FILE__ ).'template/apply-for-leave-page.php';
		
	// 	$template_page = get_option('leavemanager_page_id', array() );

	// 	if ( is_page($template_page) ) {
	// 		$page_template = $template_name;
	// 	}
	// 	return $page_template;
	// }

	public function display_leave_form() {
		$template_page = get_option('leavemanager_page_id', array() );
		if ( is_page($template_page) ) {
			require_once(plugin_dir_path( __FILE__ ).'template/apply-for-leave-page.php');
		}
	}
}
