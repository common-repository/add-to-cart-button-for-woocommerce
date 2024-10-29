<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://webbykey.com/
 * @since      1.0.0
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/includes
 * @author     WebbyKey <help@webbykey.com>
 */
class WK_Addtocart {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WK_Addtocart_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WK_ADDTOCART_VERSION' ) ) {
			$this->version = WK_ADDTOCART_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'addtocart';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WK_Addtocart_Loader. Orchestrates the hooks of the plugin.
	 * - WK_Addtocart_i18n. Defines internationalization functionality.
	 * - WK_Addtocart_Admin. Defines all hooks for the admin area.
	 * - WK_Addtocart_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-addtocart-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-addtocart-i18n.php';

		/**
		 * The class responsible for add to cart button functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-addtocart-button.php';

		/**
		 * The class responsible for add to cart button custom post type and submenu
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-addtocart-cpt.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-addtocart-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-addtocart-public.php';

		/**
		 * The class responsible for public dynamic styles.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-addtocart-dynamic-styles.php';

		$this->loader = new WK_Addtocart_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WK_Addtocart_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WK_Addtocart_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new WK_Addtocart_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

		$plugin_cpt = new WK_Addtocart_CPT( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_menu', $plugin_cpt, 'register_my_custom_submenu_page', 99 );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WK_Addtocart_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$plugin_public_dynamic_styles = new WK_Addtocart_Dynamic_Styles( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public_dynamic_styles, 'atcb_dynamic_styles' );

		$plugin_admin_atcb = new WK_Addtocart_Button( $this->get_plugin_name(), $this->get_version() );
		// To remove any hook.
		$this->loader->add_action( 'plugins_loaded', $plugin_admin_atcb, 'atcb_remove_hooks' );
		// Add to cart button custom text for all product type.
		$this->loader->add_action( 'woocommerce_loop_add_to_cart_link', $plugin_admin_atcb, 'atcb_new_add_to_cart' );
		// Single add to cart button text.
		$this->loader->add_filter( 'woocommerce_product_single_add_to_cart_text', $plugin_admin_atcb, 'atcb_replace_single_text', 10, 2 );
		// Sticky button.
		if ( 'hide' !== get_option( '_addtocart_options' )['atc_sticky_show'] ) {
			$this->loader->add_action( 'woocommerce_single_product_summary', $plugin_admin_atcb, 'atcb_single_sticky_add_to_cart', 30 );
		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WK_Addtocart_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
