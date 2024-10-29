<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://webbykey.com/
 * @since      1.0.0
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/includes
 * @author     WebbyKey <help@webbykey.com>
 */
class WK_Addtocart_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'addtocart',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
