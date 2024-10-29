<?php

/**
 * Functionalities of Add to cart button.
 */
class WK_Addtocart_Button {

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
	 * A Custom function for get an option
	 *
	 * @param array  $option from metabox.
	 * @param string $default value if the field empty.
	 * @return mixed
	 */
	private function atc_get_option( $option = '', $default = null, $option_two = '', $default_two = null ) {

		if ( ! isset( $option_two ) ) {

			$options = get_option( '_addtocart_options' );
			return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
		} else {

			$options = get_option( '_addtocart_options' );
			return ( isset( $options[ $option ][ $option_two ] ) ) ? $options[ $option ][ $option_two ] : $default_two;
		}
	}

	/**
	 * Remove Add to Cart Button First.
	 * From Shop Page.
	 */
	public function atcb_remove_hooks() {

		/**
		 * Remove product price from single page
		 * Reference: plugins\woocommerce\templates\content-single-product.php
		 */
		remove_action( 'woocommerce_loop_add_to_cart_link', 'woocommerce_template_loop_add_to_cart' );
		// If want to remove form single page.
		// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}

	/**
	 * Create new button.
	 * All Products.
	 *
	 * @return void
	 */
	function atcb_new_add_to_cart() {

		global $product;

		switch ( $product->get_type() ) {

			case 'simple':
				$atc_dynamic_text          = esc_html( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_simple_txt', 'Add to Cart' ) );
				$atc_dynamic_icon          = esc_html( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_simple_icon', '' ) );
				$atc_dynamic_icon_position = esc_html( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_simple_icon_position', '' ) );
				break;

			case 'variable':
				$atc_dynamic_text          = esc_html( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_variable_txt', 'Select Options' ) );
				$atc_dynamic_icon          = esc_html( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_variable_icon', '' ) );
				$atc_dynamic_icon_position = esc_html( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_variable_icon_position', '' ) );
				break;

			case 'grouped':
				$atc_dynamic_text          = esc_html( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_grouped_txt', 'View Products' ) );
				$atc_dynamic_icon          = esc_html( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_grouped_icon', '' ) );
				$atc_dynamic_icon_position = esc_html( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_grouped_icon_position', '' ) );
				break;

			case 'external':
				$atc_dynamic_text          = esc_html( $this->atc_get_option( 'atc_external_fieldset', null, 'atc_external_txt', 'Buy Product' ) );
				$atc_dynamic_icon          = esc_html( $this->atc_get_option( 'atc_external_fieldset', null, 'atc_external_icon', '' ) );
				$atc_dynamic_icon_position = esc_html( $this->atc_get_option( 'atc_external_fieldset', null, 'atc_external_icon_position', '' ) );
				break;

			case 'booking':
				$atc_dynamic_text          = esc_html( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_booking_txt', 'Add to Cart' ) );
				$atc_dynamic_icon          = esc_html( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_booking_icon', '' ) );
				$atc_dynamic_icon_position = esc_html( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_booking_icon_position', '' ) );
				break;

		}

		if ( 'before' === $atc_dynamic_icon_position ) {

			echo sprintf(
				'<a href="%s" data-quantity="%s" class="%s atc__button" %s><i class="%s"></i> %s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				esc_attr( $atc_dynamic_icon ),
				esc_html( $atc_dynamic_text )
			);
		} else {

			echo sprintf(
				'<a href="%s" data-quantity="%s" class="%s atc__button" %s>%s <i class="%s"></i></a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				esc_html( $atc_dynamic_text ),
				esc_attr( $atc_dynamic_icon )
			);
		}

	}

	/**
	 * Single add to cart button text.
	 *
	 * @return void
	 */
	function atcb_replace_single_text() {

		global $product;

		switch ( $product->get_type() ) {

			case 'simple':
				if ( 'before' === $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_single_simple_icon_position' ) ) {

					echo '<i class="' . esc_attr( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_single_simple_icon' ) ) . '"></i> ' . esc_html( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_single_simple_txt', 'Add to Cart' ) );
				} else {

					echo esc_html( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_single_simple_txt', 'Add to Cart' ) ) . ' <i class="' . esc_attr( $this->atc_get_option( 'atc_simple_fieldset', null, 'atc_single_simple_icon' ) ) . '"></i>';
				}
				break;

			case 'variable':
				if ( 'before' === $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_single_variable_icon_position' ) ) {

					echo '<i class="' . esc_attr( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_single_variable_icon' ) ) . '"></i> ' . esc_html( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_single_variable_txt', 'Add to Cart' ) );
				} else {

					echo esc_html( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_single_variable_txt', 'Add to Cart' ) ) . ' <i class="' . esc_attr( $this->atc_get_option( 'atc_variable_fieldset', null, 'atc_single_variable_icon' ) ) . '"></i>';
				}
				break;

			case 'grouped':
				if ( 'before' === $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_single_grouped_icon_position' ) ) {

					echo '<i class="' . esc_attr( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_single_grouped_icon' ) ) . '"></i> ' . esc_html( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_single_grouped_txt', 'Add to Cart' ) );
				} else {

					echo esc_html( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_single_grouped_txt', 'Add to Cart' ) ) . ' <i class="' . esc_attr( $this->atc_get_option( 'atc_grouped_fieldset', null, 'atc_single_grouped_icon' ) ) . '"></i>';
				}
				break;

			case 'external':
				if ( 'before' === $this->atc_get_option( 'atc_external_fieldset', null, 'atc_single_external_icon_position' ) ) {

					echo "<script type=\"text/JavaScript\">
						(function( $ ) {

							$( document ).ready(function() {
								$('button.single_add_to_cart_button.button').prepend('<i class=\"{$this->atc_get_option( 'atc_external_fieldset', null, 'atc_single_external_icon' )} atc_external\"></i> ');
								$('i.atc_external').next().remove();
								$('#atc__btn-sticky button i.atc_external').remove();
							});

						})( jQuery );
					</script>";

				} else {

					echo "<script type=\"text/JavaScript\">
						(function( $ ) {

							$( document ).ready(function() {
								$('button.single_add_to_cart_button.button').append(' <i class=\"{$this->atc_get_option( 'atc_external_fieldset', null, 'atc_single_external_icon' )} atc_external\"></i>');
								$('i.atc_external').next().remove();
								$('#atc__btn-sticky button i.atc_external').remove();
							});

						})( jQuery );
					</script>";
				}

				return $this->atc_get_option( 'atc_external_fieldset', null, 'atc_single_external_txt', 'Add to Cart' );

				break;

			case 'booking':
				if ( 'before' === $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_single_booking_icon_position' ) ) {

					echo '<i class="' . esc_attr( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_single_booking_icon' ) ) . '"></i> ' . esc_html( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_single_booking_txt', 'Add to Cart' ) );
				} else {

					echo esc_html( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_single_booking_txt', 'Add to Cart' ) ) . ' <i class="' . esc_attr( $this->atc_get_option( 'atc_booking_fieldset', null, 'atc_single_booking_icon' ) ) . '"></i>';
				}
				break;

			default:
				echo 'Add to Cart';
				break;
		}

	}

	/**
	 * Sticky Button.
	 *
	 * @return void
	 */
	public function atcb_single_sticky_add_to_cart() {

		global $product;

		if ( 'before' === atc_get_option( 'atc_sticky_icon_position' ) ) {

			$atc_sticky_text = ' ' . atc_get_option( 'atc_sticky_txt', 'Add to Cart' );
			$atc_sticky_icon = 'prepend';
		} else {

			$atc_sticky_text = atc_get_option( 'atc_sticky_txt', 'Add to Cart' ) . ' ';
			$atc_sticky_icon = 'append';
		}

		$atc_sticky_icon_fa = atc_get_option( 'atc_sticky_icon' );

		echo '<div id="atc__btn-sticky">';

		if ( ! $product->is_type( 'external' ) ) {

			echo "<script type=\"text/JavaScript\">
				(function( $ ) {

					$( document ).ready(function() {
						$('#atc__btn-sticky button').text('{$atc_sticky_text}');
						$('#atc__btn-sticky button').{$atc_sticky_icon}('<i class=\"{$atc_sticky_icon_fa}\"></i>');
					});

				})( jQuery );
			</script>";
		} else {

			echo "<script type=\"text/JavaScript\">
				(function( $ ) {

					$( document ).ready(function() {
						$('#atc__btn-sticky button').text('{$atc_sticky_text}');
						$('#atc__btn-sticky button').{$atc_sticky_icon}('<i class=\"{$atc_sticky_icon_fa}\"></i>');
					});

				})( jQuery );
			</script>";
		}

		/**
		 * Trigger the single product add to cart action.
		 */
		do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );

		echo '</div>'; // #atc__btn-sticky.
	}

}