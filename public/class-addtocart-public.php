<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://webbykey.com/
 * @since      1.0.0
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package wk-add-to-cart-button-pro-for-woocommerce
 * @subpackage wk-add-to-cart-button-pro-for-woocommerce/public
 * @author     WebbyKey <help@webbykey.com>
 */
class WK_Addtocart_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WK_Addtocart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WK_Addtocart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/addtocart-public.css', array(), $this->version, 'all' );

		// Google Font.
		$unique_id       = uniqid();
		$enqueue_fonts   = array();
		$atcb_typography = array();

		/**
		 * A Custom function for get an option
		 *
		 * @param array  $option from metabox.
		 * @param string $default value if the field empty.
		 * @return mixed
		 */
		function atc_get_option( $option = '', $default = null ) {

			$options = get_option( '_addtocart_options' );
			return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
		}

		$atcb_typography[] = atc_get_option( 'atc_typography_regular' );
		$atcb_typography[] = atc_get_option( 'atc_single_btn_typography' );
		$atcb_typography[] = atc_get_option( 'atc_sticky_typography' );

		if ( ! empty( $atcb_typography ) ) {

			foreach ( $atcb_typography as $font ) {

				if ( isset( $font['type'] ) && 'google' === $font['type'] ) {

					$variant         = ( isset( $font['font-weight'] ) ) ? ':' . $font['font-weight'] : '';
					$subset          = isset( $font['subset'] ) ? ':' . $font['subset'] : '';
					$enqueue_fonts[] = $font['font-family'] . $variant . $subset;
				}
			}
		}

		if ( ! empty( $enqueue_fonts ) ) {

			wp_enqueue_style( 'atc--google-fonts' . $unique_id, esc_url( add_query_arg( 'family', rawurlencode( implode( '|', $enqueue_fonts ) ), '//fonts.googleapis.com/css' ) ), array(), $this->version );
		}

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
		 * defined in WK_Addtocart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WK_Addtocart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/addtocart-public.js', array( 'jquery' ), $this->version, false );

	}

}
