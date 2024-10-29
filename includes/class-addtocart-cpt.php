<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://webbykey.com/
 * @since      1.0.0
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/admin
 * @author     WebbyKey <help@webbykey.com>
 */
class WK_Addtocart_CPT {

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
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register submenu page.
	 *
	 * @return void
	 */
	function register_my_custom_submenu_page() {

		$args['show_in_menu'] = false;
		register_post_type( 'add_to_cart_cpt', $args );

		$link_our_new_CPT = 'edit.php?post_type=add_to_cart_cpt';

		add_submenu_page( 'woocommerce', 'Add to Cart Button', 'Add to Cart Button', 'manage_options', $link_our_new_CPT );
	}

}
