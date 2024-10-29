<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * Email validate
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_validate_email' ) ) {
	function atc_validate_email( $value ) {

		if ( ! filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
			return esc_html__( 'Please write a valid email address!', 'wk-add-to-cart-button-for-woocommerce' );
		}

	}
}

/**
 *
 * Numeric validate
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_validate_numeric' ) ) {
	function atc_validate_numeric( $value ) {

		if ( ! is_numeric( $value ) ) {
			  return esc_html__( 'Please write a numeric data!', 'wk-add-to-cart-button-for-woocommerce' );
		}

	}
}

/**
 *
 * Required validate
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_validate_required' ) ) {
	function atc_validate_required( $value ) {

		if ( empty( $value ) ) {
			return esc_html__( 'Error! This field is required!', 'wk-add-to-cart-button-for-woocommerce' );
		}

	}
}

/**
 *
 * URL validate
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_validate_url' ) ) {
	function atc_validate_url( $value ) {

		if ( ! filter_var( $value, FILTER_VALIDATE_URL ) ) {
			 return esc_html__( 'Please write a valid url!', 'wk-add-to-cart-button-for-woocommerce' );
		}

	}
}

/**
 *
 * Email validate for Customizer
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_customize_validate_email' ) ) {
	function atc_customize_validate_email( $validity, $value, $wp_customize ) {

		if ( ! sanitize_email( $value ) ) {
			$validity->add( 'required', esc_html__( 'Please write a valid email address!', 'wk-add-to-cart-button-for-woocommerce' ) );
		}

		return $validity;

	}
}

/**
 *
 * Numeric validate for Customizer
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_customize_validate_numeric' ) ) {
	function atc_customize_validate_numeric( $validity, $value, $wp_customize ) {

		if ( ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'Please write a numeric data!', 'wk-add-to-cart-button-for-woocommerce' ) );
		}

		return $validity;

	}
}

/**
 *
 * Required validate for Customizer
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_customize_validate_required' ) ) {
	function atc_customize_validate_required( $validity, $value, $wp_customize ) {

		if ( empty( $value ) ) {
			$validity->add( 'required', esc_html__( 'Error! This field is required!', 'wk-add-to-cart-button-for-woocommerce' ) );
		}

		return $validity;

	}
}

/**
 *
 * URL validate for Customizer
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_customize_validate_url' ) ) {
	function atc_customize_validate_url( $validity, $value, $wp_customize ) {

		if ( ! filter_var( $value, FILTER_VALIDATE_URL ) ) {
			$validity->add( 'required', esc_html__( 'Please write a valid url!', 'wk-add-to-cart-button-for-woocommerce' ) );
		}

		return $validity;

	}
}
