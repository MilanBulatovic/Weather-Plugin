<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wppb.me/
 * @since      1.0.0
 *
 * @package    Weather
 * @subpackage Weather/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Weather
 * @subpackage Weather/public
 * @author     Milan Bulatovic <milanbulatovic@outlook.com>
 */
class Weather_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/weather-public.css', array(), $this->version, 'all' );

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
		 * defined in Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/weather-public.js', array( 'jquery' ), $this->version, false );

	}

	//prikazati podatke sa admin dijela - ako je grad ukucan -> napravi upit na openweather -> prikazati na front end
	//napraviti input polje kada se ukuca grad -> GET request from OpenWeatherAPI -> podaci
	
	//Shortcode funkcija
	public function weather_shortcode(){

		require_once 'partials/weather-public-display.php';

		$city = get_option( 'test_city' );
		$apiKey = '383d6f303c387c20881c7748c17335bc';
		

		if($city) {
			$url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&appid=' . $apiKey;
			$weather = json_decode(file_get_contents($url), true);
			$temp = $weather['main']['temp'];
			$celsius = round($temp - 273.15);
			$tempMax = round($weather['main']['temp_max'] - 273.15);
			$tempMin = round($weather['main']['temp_min'] - 273.15);

			echo '<div class="admin-side"">'; 
		        echo '<h5>' . $city . '</h5>';
		        echo '<h1 class="admin-temp">' . $celsius . '&deg;C' . '</h1>';
		        echo '<p>' . 'Max temp:' . $tempMax . '&deg;C' . '</p>';
		        echo '<p>' . 'Min temp:' . $tempMin . '&deg;C' . '</p>';
			echo '</div>';		
			
		}
		?> </div></div> <?php
	} 

}
