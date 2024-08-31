<?php
/**
 * Plugin Name: Custom Widgets
 * Plugin URI: 
 * Description: This is custom elementor widget development for learning purpose.
 * Version: 2.0.0
 * Author: biplob
 * Author URI: biplob.com
 * Text domain: picchi
 */

 if ( !defined( 'ABSPATH') )
 die( '-1');

// Furnixar Core Directories
//define( 'SC_IMAGES', plugins_url( 'widgets/images/', __FILE__));

// Make sure the same class is not loaded twice.
if ( !class_exists( 'Furnixar_core' ) ) {
 
 class Furnixar_core {
	 
	 const VERSION = '1.0';
	 const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
	 const MINIMUM_PHP_VERSION = '5.4';
	 
	 
	 private static  $_instance = null;
	 
	 public static function instance() {
		 if ( is_null( self::$_instance ) ) {
			 self::$_instance = new self();
		 }
		 return self::$_instance;
	 }

	 /**
	  * Clone
	  *
	  * Disable class cloning.
	  *
	  * @access protected
	  *
	  * @return void
	  */
	 public function __clone() {
		 // Cloning instances of the class is forbidden
		 _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'picchi' ), '1.7.0' );
	 }

	 /**
	  * Wakeup
	  *
	  * Disable unserializing the class.
	  *
	  * @access protected
	  *
	  * @return void
	  */
	 public function __wakeup() {
		 // Unserializing instances of the class is forbidden.
		 _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'picchi' ), '1.7.0' );
	 }

	 /**
	  * Constructor
	  *
	  * Initialize the Furnixar Core plugins.
	  *
	  * @access public
	  */
	 public function __construct() {
		 $opt = get_option('furnixar_opt');

		 $this->init_hooks();
		 do_action( 'furnixar_core_loaded' );
		 
	 }



	 /**
	  * Init Hooks
	  *
	  * Hook into actions and filters.
	  *
	  * @access private
	  */
	 private function init_hooks() {
		 add_action( 'init', [ $this, 'i18n' ] );
		 add_action( 'plugins_loaded', [ $this, 'init' ] );
	 }

	 /**
	  * Load Textdomain
	  *
	  * Load plugin localization files.
	  *
	  * @access public
	  */
	 public function i18n() {
		 load_plugin_textdomain( 'picchi', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	 }


	 /**
	  * Init Furnixar Core
	  *
	  * Load the plugin after Elementor (and other plugins) are loaded.
	  *
	  * @access public
	  */
	 public function init() {

		 if ( !did_action( 'elementor/loaded' ) ) {
			 add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			 return;
		 }

		 // Check for required Elementor version

		 if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			 add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			 return;
		 }

		 // Check for required PHP version

		 if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			 add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			 return;
		 }

		 // Add new Elementor Categories
		 add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

		 // Register New Widgets
		 add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

		 // Enqueue CSS and JS files			
		 add_action( 'elementor/frontend/before_enqueue_styles', [ $this, 'enqueue_elementor_editor_styles' ] );
	 }

	 public function enqueue_elementor_editor_styles(){
		 wp_enqueue_style( 'furnixar-elements', plugins_url( 'assets/css/custom-widgets.css', __FILE__ ) );
	 }


	 /**
	  * Admin notice
	  *
	  * Warning when the site doesn't have Elementor installed or activated.
	  *
	  * @access public
	  */
	 public function admin_notice_missing_main_plugin() {
		 $message = sprintf(
		 /* translators: 1: Furnixar Core 2: Elementor */
			 esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'picchi' ),
			 '<strong>' . esc_html__( 'Furnixar Core', 'picchi' ) . '</strong>',
			 '<strong>' . esc_html__( 'Elementor', 'picchi' ) . '</strong>'
		 );
		 printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	 }

	 /**
	  * Admin notice
	  *
	  * Warning when the site doesn't have a minimum required Elementor version.
	  *
	  * @access public
	  */
	 public function admin_notice_minimum_elementor_version() {
		 $message = sprintf(
		 /* translators: 1: Furnixar Core 2: Elementor 3: Required Elementor version */
			 esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'picchi' ),
			 '<strong>' . esc_html__( 'Furnixar Core', 'picchi' ) . '</strong>',
			 '<strong>' . esc_html__( 'Elementor', 'picchi' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		 );
		 printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	 }

	 /**
	  * Admin notice
	  *
	  * Warning when the site doesn't have a minimum required PHP version.
	  *
	  * @access public
	  */
	 public function admin_notice_minimum_php_version() {
		 $message = sprintf(
		 /* translators: 1: Furnixar Core 2: PHP 3: Required PHP version */
			 esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'picchi' ),
			 '<strong>' . esc_html__( 'Furnixar Core', 'picchi' ) . '</strong>',
			 '<strong>' . esc_html__( 'PHP', 'picchi' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		 );
		 printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	 }

	 /**
	  * Add new Elementor Categories
	  *
	  * Register new widget categories for Custom widgets.
	  *
	  * @since 1.0.0
	  * @since 1.7.1 The method moved to this class.
	  *
	  * @access public
	  */
	 public function add_elementor_category( $elements_manager ) {

		 \Elementor\Plugin::instance()->elements_manager->add_category(
			 'custom-elements',
			 [
				 'title' => __( 'Custom Elements', 'picchi' ),
				 'icon'	=> 'fa fa-plug',
			 ],
			 90 
		 );
		 
	 }

	 /**
	  * Register Widgets
	  *
	  * @access public
	  */
	 public function register_widgets( $widgets_manager ) {
		 // Site Elements
		 $widgets = array(
			'SectionTitle', 'AboutWidget', 'BannerWidget'
		 );

		 foreach ( $widgets as $widget ) {

			 require_once( __DIR__ . "/widgets/$widget.php" );
			 
			 $classname = "\\FurnixarCore\\Widgets\\$widget";
			 \Elementor\Plugin::instance()->widgets_manager->register( new $classname() );

		 }
	 }
 }
}
// Make sure the same function is not loaded twice.

if ( !function_exists( 'furnixar_core_load' ) ) {
 /**
  * Load Furnixar Core
  *
  * Main instance of Furnixar_Core.
  *
  */
 function furnixar_core_load() {
	 return Furnixar_core::instance();
 }

 // Run Furnixar Core
 furnixar_core_load();
}
