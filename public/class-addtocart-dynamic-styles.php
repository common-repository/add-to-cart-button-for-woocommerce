<?php

/**
 * The public-facing dynamic styles of the plugin display.
 *
 * @link       https://webbykey.com/
 * @since      1.0.0
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/public
 */

/**
 * The public-facing dynamic styles of the plugin display.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/public
 * @author     WebbyKey <help@webbykey.com>
 */
class WK_Addtocart_Dynamic_Styles {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * A Custom function for get an option
	 *
	 * @param array  $option from metabox.
	 * @param string $default value if the field empty.
	 * @return mixed
	 */
	public function atc_get_option( $option = '', $default = null, $option_two = '', $default_two = null ) {

		if ( ! isset( $option_two ) ) {

			$options = get_option( '_addtocart_options' );
			return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
		} else {

			$options = get_option( '_addtocart_options' );
			return ( isset( $options[ $option ][ $option_two ] ) ) ? $options[ $option ][ $option_two ] : $default_two;
		}
	}

	/**
	 * Dynamic style generator.
	 *
	 * @return void
	 */
	public function atcb_dynamic_styles() {

		/***************************
		 * Sticky Button Custom CSS.
		 */
		switch ( atc_get_option( 'atc_sticky_show' ) ) {

			case 'show':
				$sticky_display = 'display: block;';
				$sticky_mobile  = 'display: block;';
				break;

			case 'show_mobile':
				$sticky_display = 'display: none;';
				$sticky_mobile  = 'display: block;';
				break;

			default:
				$sticky_display = '';
				$sticky_mobile  = '';
				break;
		}

		switch ( atc_get_option( 'atc_sticky_button_position' ) ) {

			case 'bottom-right':
				$atc_sticky_button_position = 'bottom: 0;right: 0;';
				break;

			case 'bottom-left':
				$atc_sticky_button_position = 'bottom: 0;left: 0;';
				break;

			case 'top-right':
				$atc_sticky_button_position = 'top: 0;right: 0;';
				break;

			case 'top-left':
				$atc_sticky_button_position = 'top: 0;left: 0;';
				break;

			default:
				$atc_sticky_button_position = 'bottom: 0;';
				break;
		}

		$atc_sticky_qty_show                   = ( empty( atc_get_option( 'atc_sticky_qty_show' ) ) ) ? 'display: none;' : 'display: block;';
		$atc_sticky_variations_show            = ( empty( atc_get_option( 'atc_sticky_variations_show' ) ) ) ? 'display: none;' : 'display: block;';
		$atc_sticky_group_table_show           = ( empty( atc_get_option( 'atc_sticky_group_table_show' ) ) ) ? 'display: none;' : 'display: block;';
		$atc_sticky_color_txt                  = ( ! empty( $this->atc_get_option( 'atc_sticky_color', null, 'color-txt' ) ) ) ? "color: {$this->atc_get_option( 'atc_sticky_color', null, 'color-txt' )};" : '';
		$atc_sticky_color_txt_hover            = ( ! empty( $this->atc_get_option( 'atc_sticky_color', null, 'color-txt-hover' ) ) ) ? "color: {$this->atc_get_option( 'atc_sticky_color', null, 'color-txt-hover' )};" : '';
		$atc_sticky_color_bg                   = ( ! empty( $this->atc_get_option( 'atc_sticky_color', null, 'color-bg' ) ) ) ? "background: {$this->atc_get_option( 'atc_sticky_color', null, 'color-bg' )};" : '';
		$atc_sticky_color_bg_hover             = ( ! empty( $this->atc_get_option( 'atc_sticky_color', null, 'color-bg-hover' ) ) ) ? "background: {$this->atc_get_option( 'atc_sticky_color', null, 'color-bg-hover' )};" : '';
		$atc_sticky_btn_size_desktop_width     = ( ! empty( $this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'width' ) ) ) ? "width: {$this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'width' )}{$this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'unit' )};" : '';
		$atc_sticky_btn_size_desktop_height    = ( ! empty( $this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'height' ) ) ) ? "height: {$this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'height' )}{$this->atc_get_option( 'atc_sticky_btn_size_desktop', null, 'unit' )};" : '';
		$atc_sticky_btn_mobile_screen          = ( isset( atc_get_option( 'atc_sticky_btn_mobile_screen' )['width'] ) ) ? atc_get_option( 'atc_sticky_btn_mobile_screen' )['width'] : '480';
		$atc_sticky_border                     = ( ! empty( $this->atc_get_option( 'atc_sticky_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_sticky_border', null, 'all' )}px {$this->atc_get_option( 'atc_sticky_border', null, 'style' )} {$this->atc_get_option( 'atc_sticky_border_color', null, 'border-color' )};" : '';
		$atc_sticky_border_hover               = ( ! empty( $this->atc_get_option( 'atc_sticky_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_sticky_border', null, 'all' )}px {$this->atc_get_option( 'atc_sticky_border', null, 'style' )} {$this->atc_get_option( 'atc_sticky_border_color', null, 'border-hover' )};" : '';
		$atc_sticky_border_radius_top_left     = ( '0' <= $this->atc_get_option( 'atc_sticky_border_radius', null, 'left' ) ) ? "border-top-left-radius: {$this->atc_get_option( 'atc_sticky_border_radius', null, 'left' )}px;" : '';
		$atc_sticky_border_radius_top_right    = ( '0' <= $this->atc_get_option( 'atc_sticky_border_radius', null, 'top' ) ) ? "border-top-right-radius: {$this->atc_get_option( 'atc_sticky_border_radius', null, 'top' )}px;" : '';
		$atc_sticky_border_radius_bottom_left  = ( '0' <= $this->atc_get_option( 'atc_sticky_border_radius', null, 'bottom' ) ) ? "border-bottom-left-radius: {$this->atc_get_option( 'atc_sticky_border_radius', null, 'bottom' )}px;" : '';
		$atc_sticky_border_radius_bottom_right = ( '0' <= $this->atc_get_option( 'atc_sticky_border_radius', null, 'right' ) ) ? "border-bottom-right-radius: {$this->atc_get_option( 'atc_sticky_border_radius', null, 'right' )}px;" : '';
		$atc_sticky_transition                 = ( ! empty( atc_get_option( 'atc_sticky_transition' ) ) ) ? 'transition: background ' . atc_get_option( 'atc_sticky_transition' ) . 'ms ease-in-out;' : '';

		/*********************
		 * Single Page Button.
		 */
		$atc_single_btn_color_txt              = ( ! empty( $this->atc_get_option( 'atc_single_btn_color_group', null, 'color-txt' ) ) ) ? "color: {$this->atc_get_option( 'atc_single_btn_color_group', null, 'color-txt' )};" : '';
		$atc_single_btn_color_bg               = ( ! empty( $this->atc_get_option( 'atc_single_btn_color_group', null, 'color-bg' ) ) ) ? "background: {$this->atc_get_option( 'atc_single_btn_color_group', null, 'color-bg' )};" : '';
		$atc_single_border_radius_top_left     = ( '0' <= $this->atc_get_option( 'atc_single_btn_border_radius', null, 'left' ) ) ? "border-top-left-radius: {$this->atc_get_option( 'atc_single_btn_border_radius', null, 'left' )}px;" : '';
		$atc_single_border_radius_top_right    = ( '0' <= $this->atc_get_option( 'atc_single_btn_border_radius', null, 'top' ) ) ? "border-top-right-radius: {$this->atc_get_option( 'atc_single_btn_border_radius', null, 'top' )}px;" : '';
		$atc_single_border_radius_bottom_left  = ( '0' <= $this->atc_get_option( 'atc_single_btn_border_radius', null, 'bottom' ) ) ? "border-bottom-left-radius: {$this->atc_get_option( 'atc_single_btn_border_radius', null, 'bottom' )}px;" : '';
		$atc_single_border_radius_bottom_right = ( '0' <= $this->atc_get_option( 'atc_single_btn_border_radius', null, 'right' ) ) ? "border-bottom-right-radius: {$this->atc_get_option( 'atc_single_btn_border_radius', null, 'right' )}px;" : '';
		$atc_single_btn_color_txt_hover        = ( ! empty( $this->atc_get_option( 'atc_single_btn_color_group', null, 'color-txt-hover' ) ) ) ? "color: {$this->atc_get_option( 'atc_single_btn_color_group', null, 'color-txt-hover' )};" : '';
		$atc_single_btn_color_bg_hover         = ( ! empty( $this->atc_get_option( 'atc_single_btn_color_group', null, 'color-bg-hover' ) ) ) ? "background: {$this->atc_get_option( 'atc_single_btn_color_group', null, 'color-bg-hover' )};" : '';
		$atc_single_border                     = ( ! empty( $this->atc_get_option( 'atc_single_btn_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_single_btn_border', null, 'all' )}px {$this->atc_get_option( 'atc_single_btn_border', null, 'style' )} {$this->atc_get_option( 'atc_single_btn_border_color', null, 'border-color' )};" : '';
		$atc_single_border_hover               = ( ! empty( $this->atc_get_option( 'atc_single_btn_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_single_btn_border', null, 'all' )}px {$this->atc_get_option( 'atc_single_btn_border', null, 'style' )} {$this->atc_get_option( 'atc_single_btn_border_color', null, 'border-hover' )};" : '';
		$atc_single_transition                 = ( ! empty( atc_get_option( 'atc_single_transition' ) ) ) ? 'transition: background ' . atc_get_option( 'atc_single_transition' ) . 'ms ease-in-out;' : '';

		/*******************
		 * Shop Page Button.
		 */
		$atc_regular_color_txt                  = ( ! empty( $this->atc_get_option( 'atc_color_regular', null, 'color-txt' ) ) ) ? "color: {$this->atc_get_option( 'atc_color_regular', null, 'color-txt' )};" : '';
		$atc_regular_color_txt_hover            = ( ! empty( $this->atc_get_option( 'atc_color_regular', null, 'color-txt-hover' ) ) ) ? "color: {$this->atc_get_option( 'atc_color_regular', null, 'color-txt-hover' )};" : '';
		$atc_regular_color_bg                   = ( ! empty( $this->atc_get_option( 'atc_color_regular', null, 'color-bg' ) ) ) ? "background-color: {$this->atc_get_option( 'atc_color_regular', null, 'color-bg' )};" : '';
		$atc_regular_color_bg_hover             = ( ! empty( $this->atc_get_option( 'atc_color_regular', null, 'color-bg-hover' ) ) ) ? "background-color: {$this->atc_get_option( 'atc_color_regular', null, 'color-bg-hover' )};" : '';
		$atc_regular_btn_width                  = ( ! empty( $this->atc_get_option( 'atc_button_size', null, 'width' ) ) ) ? "width: {$this->atc_get_option( 'atc_button_size', null, 'width' )}{$this->atc_get_option( 'atc_button_size', null, 'unit' )};" : '';
		$atc_regular_btn_height                 = ( ! empty( $this->atc_get_option( 'atc_button_size', null, 'height' ) ) ) ? "height: {$this->atc_get_option( 'atc_button_size', null, 'height' )}{$this->atc_get_option( 'atc_button_size', null, 'unit' )};" : '';
		$atc_regular_border_radius_top_left     = ( '0' <= $this->atc_get_option( 'atc_regular_border_radius', null, 'left' ) ) ? "border-top-left-radius: {$this->atc_get_option( 'atc_regular_border_radius', null, 'left' )}px;" : '';
		$atc_regular_border_radius_top_right    = ( '0' <= $this->atc_get_option( 'atc_regular_border_radius', null, 'top' ) ) ? "border-top-right-radius: {$this->atc_get_option( 'atc_regular_border_radius', null, 'top' )}px;" : '';
		$atc_regular_border_radius_bottom_left  = ( '0' <= $this->atc_get_option( 'atc_regular_border_radius', null, 'bottom' ) ) ? "border-bottom-left-radius: {$this->atc_get_option( 'atc_regular_border_radius', null, 'bottom' )}px;" : '';
		$atc_regular_border_radius_bottom_right = ( '0' <= $this->atc_get_option( 'atc_regular_border_radius', null, 'right' ) ) ? "border-bottom-right-radius: {$this->atc_get_option( 'atc_regular_border_radius', null, 'right' )}px;" : '';
		$atc_regular_transition                 = ( ! empty( atc_get_option( 'atc_regular_transition' ) ) ) ? 'transition: background ' . atc_get_option( 'atc_regular_transition' ) . 'ms ease-in-out;' : '';
		$atc_regular_border                     = ( ! empty( $this->atc_get_option( 'atc_regular_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_regular_border', null, 'all' )}px {$this->atc_get_option( 'atc_regular_border', null, 'style' )} {$this->atc_get_option( 'atc_regular_border_color', null, 'border-color' )};" : '';
		$atc_regular_border_hover               = ( ! empty( $this->atc_get_option( 'atc_regular_border', null, 'all' ) ) ) ? "border: {$this->atc_get_option( 'atc_regular_border', null, 'all' )}px {$this->atc_get_option( 'atc_regular_border', null, 'style' )} {$this->atc_get_option( 'atc_regular_border_color', null, 'border-hover' )};" : '';

		/**
		 * CSS Rules.
		 */
		$css_rule = array();

		if ( is_shop() ) {

			$css_rule = array(
				'.wk-add-to-cart-body.wk-add-to-cart-body.wk-add-to-cart-body .atc__button'       =>
					"{$atc_regular_color_txt}
					{$atc_regular_color_bg}
					{$atc_regular_btn_width}
					{$atc_regular_btn_height}
					{$atc_regular_border}
					{$atc_regular_border_radius_top_left}
					{$atc_regular_border_radius_top_right}
					{$atc_regular_border_radius_bottom_left}
					{$atc_regular_border_radius_bottom_right}
					{$atc_regular_transition}",

				'.wk-add-to-cart-body.wk-add-to-cart-body.wk-add-to-cart-body .atc__button:hover' =>
					"{$atc_regular_color_txt_hover}
					{$atc_regular_color_bg_hover}
					{$atc_regular_border_hover}",
			);
		}

		$css_responsive = '';
		/**
		 * is_product() returns true on a single product page.
		 * https://docs.woocommerce.com/document/conditional-tags/
		 */
		if ( is_product() ) {

			$css_rule += array(
				'.wk-add-to-cart-body.wk-add-to-cart-body.wk-add-to-cart-body button.single_add_to_cart_button.button' =>
					"{$atc_single_btn_color_txt}
					{$atc_single_btn_color_bg}
					{$atc_single_border}
					{$atc_single_border_radius_top_left}
					{$atc_single_border_radius_top_right}
					{$atc_single_border_radius_bottom_left}
					{$atc_single_border_radius_bottom_right}
					{$atc_single_transition}",

				'.wk-add-to-cart-body.wk-add-to-cart-body.wk-add-to-cart-body button.single_add_to_cart_button.button:hover' =>
					"{$atc_single_btn_color_txt_hover}
					{$atc_single_btn_color_bg_hover}
					{$atc_single_border_hover}",

				'#atc__btn-sticky'             =>
					"position: fixed;
					z-index: 9999;
					{$sticky_mobile}
					{$atc_sticky_button_position}",

				'#atc__btn-sticky .quantity'   =>
					"{$atc_sticky_qty_show}",

				'#atc__btn-sticky .variations' =>
					"{$atc_sticky_variations_show}",

				'#atc__btn-sticky .woocommerce-grouped-product-list' =>
					"{$atc_sticky_group_table_show}",

				'#atc__btn-sticky button.single_add_to_cart_button.button' =>
					"{$atc_sticky_color_txt}
					{$atc_sticky_color_bg}
					{$atc_sticky_border}
					{$atc_sticky_border_radius_top_left}
					{$atc_sticky_border_radius_top_right}
					{$atc_sticky_border_radius_bottom_left}
					{$atc_sticky_border_radius_bottom_right}
					{$atc_sticky_transition}",

				'#atc__btn-sticky button.single_add_to_cart_button.button:hover' =>
					"{$atc_sticky_color_txt_hover}
					{$atc_sticky_color_bg_hover}
					{$atc_sticky_border_hover}",

			);

			if ( 'show_mobile' === atc_get_option( 'atc_sticky_show' ) ) {

				$css_responsive = "@media only screen and (min-width: {$atc_sticky_btn_mobile_screen}px) {
					#atc__btn-sticky {
						{$sticky_display}
					}

					#atc__btn-sticky button.single_add_to_cart_button.button {
						{$atc_sticky_btn_size_desktop_width}
						{$atc_sticky_btn_size_desktop_height}
					}
				}";
			}
		}

		$dynamic_styles = '';
		foreach ( $css_rule as $key => $value ) {

			$dynamic_styles .= $key . '{' . $value . '}';
		}

		wp_add_inline_style( 'addtocart', $dynamic_styles . $css_responsive . atc_get_option( 'atc_custom_css' ) );

	}

}