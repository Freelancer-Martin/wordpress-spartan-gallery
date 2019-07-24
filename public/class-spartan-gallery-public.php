<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       developerforwebsites@gmail.com
 * @since      1.0.0
 *
 * @package    Spartan_Gallery
 * @subpackage Spartan_Gallery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Spartan_Gallery
 * @subpackage Spartan_Gallery/public
 * @author     Freelancer Martin <developerforwebsites@gmail.com>
 */
 if ( ! defined( 'WPINC' ) ) {

     die;

 }

 
class Spartan_Gallery_Public {

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
		 * defined in Spartan_Gallery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Spartan_Gallery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	  wp_enqueue_style( $this->plugin_name . 'public', plugin_dir_url( __FILE__ ) . 'css/spartan-gallery-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name . 'freewall-pinterest-style', plugin_dir_url( __FILE__ ) . 'css/freewall-pinterest-style.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name . 'gallery-styles', plugin_dir_url( __FILE__ ) .  'css/gallery-styles.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name . 'freewall-main', plugin_dir_url( __FILE__ ) .  'css/freewall-main.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name . 'hexagon', plugin_dir_url( __FILE__ ) .  'css/hexagon-gallery-style.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name . 'gallery-3d-slider', plugin_dir_url( __FILE__ ) .  'css/gallery-3d-slider.css', array(), $this->version, 'all' );

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
		 * defined in Spartan_Gallery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Spartan_Gallery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name . 'smartphoto', plugin_dir_url( __FILE__ ) . 'js/jquery-smartphoto.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name . 'hexagon-tweenmax', plugin_dir_url( __FILE__ ) . 'js/hexagon-tweenmax.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/spartan-gallery-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->plugin_name . 'freewall-options', plugin_dir_url( __FILE__ ) . 'js/freewall-options.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_script( $this->plugin_name . 'freewall-min', plugin_dir_url( __FILE__ ) . 'js/freewall.min.js' ,array( 'jquery' ), $this->version, true );

		wp_enqueue_script( $this->plugin_name . 'jquery-responsiveGallery', plugin_dir_url( __FILE__ ) . 'js/jquery.responsiveGallery.js' ,array( 'jquery' ), $this->version, true );

		wp_enqueue_script( $this->plugin_name . 'modernizr.custom', plugin_dir_url( __FILE__ ) . 'js/modernizr.custom.js' ,array( 'jquery' ), $this->version, true );

	}

}
