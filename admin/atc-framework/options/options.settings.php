<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

// Sticky Button Settings.
ATC::createSection(
	$prefix,
	array(
		'title'  => __( 'Advanced Settings', 'wk-add-to-cart-button-for-woocommerce' ),
		'icon'   => '',
		'fields' => array(
			array(
				'id'         => 'atc_sticky_btn_mobile_screen',
				'type'       => 'dimensions',
				'title'      => __( 'Mobile Screen Size', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'   => __( 'Define the width of mobile screen break-point here. The default value is 480px.', 'wk-add-to-cart-button-for-woocommerce' ),
				'width_icon' => 'min-width',
				'height'     => false,
				'units'      => array( 'px' ),
				'default'    => array(
					'width' => '480',
				),
			),
			array(
				'id'       => 'atc_custom_css',
				'type'     => 'code_editor',
				'title'    => __( 'Custom CSS', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle' => __( 'Place additional script styles here.', 'wk-add-to-cart-button-for-woocommerce' ),
				'settings' => array(
					'theme' => 'mbo',
					'mode'  => 'css',
				),
			),
		),
	)
);
