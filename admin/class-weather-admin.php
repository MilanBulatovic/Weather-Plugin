<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Weather
 * @subpackage Weather/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Weather
 * @subpackage Weather/admin
 * @author     Milan Bulatovic <milanbulatovic@outlook.com>
 */
class Weather_Admin {

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
		 * defined in Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/weather-admin.css', array(), $this->version, 'all' );

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
		 * defined in Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/weather-admin.js', array( 'jquery' ), $this->version, false );

	}

	//Aktiviranje podešavanje plugin-a pod sekcijom SETTINGS
	public function myAdminMenu() {
		add_options_page('Weather Test Plugin', 'Weather Settings', 'manage_options', 'weather-test-settings-page', array($this, 'weatherTestAdminMenu'));
	}

	public function weatherTestAdminMenu(){
		require_once 'partials/weather-admin-display.php';
	}

	//Registracija input polja na admin dijelu
	public function testSettings(){
		add_settings_section( 'firstSection', null, null, 'weather-test-settings-page' );
		
		//add_settings_field('test_city', 'Enter City', array($this, 'cityDisplay'), 'weather-test-settings-page', 'firstSection');
		register_setting('testPlugin', 'test_city');
	}

	public function cityDisplay() {
		require_once 'partials/weather-admin-display.php';
	}

}
