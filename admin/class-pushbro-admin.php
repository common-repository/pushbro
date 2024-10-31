<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://pushbro.com/wp/
 * @since      1.0.0
 *
 * @package    Pushbro
 * @subpackage Pushbro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pushbro
 * @subpackage Pushbro/admin
 * @author     Pushbro Team <hello@pushbro.com>
 */
class Pushbro_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Pushbro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pushbro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pushbro-admin.css', array(), $this->version, 'all' );

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
		 * defined in Pushbro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pushbro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pushbro-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function display_options_page() {
		include_once 'partials/pushbro-admin-display.php';
	}
		
	public function register_setting() {
		add_settings_section(
			'pushbro_general',
			__( 'General', 'pushbro' ),
			array( $this, 'pushbro_general_cb' ),
			$this->plugin_name
		);
		add_settings_field(
			'pushbro_option_subdomain_id',
			'Pushbro Subdomain',
			array( $this, 'pushbro_option_subdomain_cb' ),
			$this->plugin_name, 
			'pushbro_general'
		);
		register_setting( $this->plugin_name, 'pushbro_option_subdomain', array( $this, 'pushbro_getcode' ) );
	}
	
	public function pushbro_option_subdomain_cb() {
		echo '<input type="text" name="pushbro_option_subdomain" id="pushbro_option_subdomain_id" value="'.get_option( 'pushbro_option_subdomain' ).'"> ';
	}
	
	public function pushbro_getcode($val) {
		$resp = json_decode(file_get_contents("https://pushbro.com/api/config?subdomain=".urlencode($val)));
		if(!$resp){ return "Subdomain not found!"; 	}
		if(isset($resp->errors) && $resp->errors ){ return "Subdomain not found!"; 	}
		$script = $resp->data;
		if(get_option('pushbro_script_file')){
			update_option('pushbro_script_file', $script);
		}else{
			add_option('pushbro_script_file', $script);
		}
		
		return $val;
	}
	
	public function pushbro_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'pushbro' ) . '</p>';
	}
	
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Pushbro Settings', 'pushbro' ),
			__( 'PushBro', 'pushbro' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

}
