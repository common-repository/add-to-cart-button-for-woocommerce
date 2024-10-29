<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

// Single Page Button Settings.
ATC::createSection(
	$prefix,
	array(
		'title'  => __( 'Button on Product Page', 'wk-add-to-cart-button-for-woocommerce' ),
		'icon'   => '',
		'fields' => array(

			array(
				'id'     => 'atc_simple_fieldset',
				'type'   => 'fieldset',
				'title'  => __( 'Simple Products', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'  => __( 'Set the text & icon for simple products', 'wk-add-to-cart-button-for-woocommerce' ),
				'fields' => array(
					array(
						'id'      => 'atc_single_simple_txt',
						'type'    => 'text',
						'title'   => __( 'Text', 'wk-add-to-cart-button-for-woocommerce' ),
						'default' => 'Add to Cart',
					),
					array(
						'id'    => 'atc_single_simple_icon',
						'type'  => 'icon',
						'title' => __( 'Icon', 'wk-add-to-cart-button-for-woocommerce' ),
					),
					array(
						'id'      => 'atc_single_simple_icon_position',
						'type'    => 'button_set',
						'title'   => __( 'Icon Position', 'wk-add-to-cart-button-for-woocommerce' ),
						'options' => array(
							'before' => __( 'Before', 'wk-add-to-cart-button-for-woocommerce' ),
							'after'  => __( 'After', 'wk-add-to-cart-button-for-woocommerce' ),
						),
						'default' => 'before',
					),
				),
			),
			array(
				'id'     => 'atc_variable_fieldset',
				'type'   => 'fieldset',
				'title'  => __( 'Variable Products', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'  => __( 'Set the text & icon for variable products', 'wk-add-to-cart-button-for-woocommerce' ),
				'fields' => array(
					array(
						'id'      => 'atc_single_variable_txt',
						'type'    => 'text',
						'title'   => __( 'Text', 'wk-add-to-cart-button-for-woocommerce' ),
						'default' => 'Add to Cart',
					),
					array(
						'id'    => 'atc_single_variable_icon',
						'type'  => 'icon',
						'title' => __( 'Icon', 'wk-add-to-cart-button-for-woocommerce' ),
					),
					array(
						'id'      => 'atc_single_variable_icon_position',
						'type'    => 'button_set',
						'title'   => __( 'Icon Position', 'wk-add-to-cart-button-for-woocommerce' ),
						'options' => array(
							'before' => __( 'Before', 'wk-add-to-cart-button-for-woocommerce' ),
							'after'  => __( 'After', 'wk-add-to-cart-button-for-woocommerce' ),
						),
						'default' => 'before',
					),
				),
			),
			array(
				'id'     => 'atc_grouped_fieldset',
				'type'   => 'fieldset',
				'title'  => __( 'Grouped Products', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'  => __( 'Set the text & icon for grouped products', 'wk-add-to-cart-button-for-woocommerce' ),
				'fields' => array(
					array(
						'id'      => 'atc_single_grouped_txt',
						'type'    => 'text',
						'title'   => __( 'Text', 'wk-add-to-cart-button-for-woocommerce' ),
						'default' => 'Add to Cart',
					),
					array(
						'id'    => 'atc_single_grouped_icon',
						'type'  => 'icon',
						'title' => __( 'Icon', 'wk-add-to-cart-button-for-woocommerce' ),
					),
					array(
						'id'      => 'atc_single_grouped_icon_position',
						'type'    => 'button_set',
						'title'   => __( 'Icon Position', 'wk-add-to-cart-button-for-woocommerce' ),
						'options' => array(
							'before' => __( 'Before', 'wk-add-to-cart-button-for-woocommerce' ),
							'after'  => __( 'After', 'wk-add-to-cart-button-for-woocommerce' ),
						),
						'default' => 'before',
					),
				),
			),
			array(
				'id'     => 'atc_external_fieldset',
				'type'   => 'fieldset',
				'title'  => __( 'External Products', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'  => __( 'Set the text & icon for external/affliate products', 'wk-add-to-cart-button-for-woocommerce' ),
				'fields' => array(
					array(
						'id'      => 'atc_single_external_txt',
						'type'    => 'text',
						'title'   => __( 'Text', 'wk-add-to-cart-button-for-woocommerce' ),
						'default' => 'Add to Cart',
					),
					array(
						'id'    => 'atc_single_external_icon',
						'type'  => 'icon',
						'title' => __( 'Icon', 'wk-add-to-cart-button-for-woocommerce' ),
					),
					array(
						'id'      => 'atc_single_external_icon_position',
						'type'    => 'button_set',
						'title'   => __( 'Icon Position', 'wk-add-to-cart-button-for-woocommerce' ),
						'options' => array(
							'before' => __( 'Before', 'wk-add-to-cart-button-for-woocommerce' ),
							'after'  => __( 'After', 'wk-add-to-cart-button-for-woocommerce' ),
						),
						'default' => 'before',
					),
				),
			),
			array(
				'id'     => 'atc_booking_fieldset',
				'type'   => 'fieldset',
				'title'  => __( 'Booking Products', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'  => __( 'Set the text & icon for booking products', 'wk-add-to-cart-button-for-woocommerce' ),
				'fields' => array(
					array(
						'id'      => 'atc_single_booking_txt',
						'type'    => 'text',
						'title'   => __( 'Text', 'wk-add-to-cart-button-for-woocommerce' ),
						'default' => 'Add to Cart',
					),
					array(
						'id'    => 'atc_single_booking_icon',
						'type'  => 'icon',
						'title' => __( 'Icon', 'wk-add-to-cart-button-for-woocommerce' ),
					),
					array(
						'id'      => 'atc_single_booking_icon_position',
						'type'    => 'button_set',
						'title'   => __( 'Icon Position', 'wk-add-to-cart-button-for-woocommerce' ),
						'options' => array(
							'before' => __( 'Before', 'wk-add-to-cart-button-for-woocommerce' ),
							'after'  => __( 'After', 'wk-add-to-cart-button-for-woocommerce' ),
						),
						'default' => 'before',
					),
				),
			),

			array(
				'type'    => 'subheading',
				'content' => __( 'Options for All Product Types', 'wk-add-to-cart-button-for-woocommerce' ),
			),
			array(
				'id'           => 'atc_single_btn_typography',
				'type'         => 'typography',
				'title'        => __( 'Button Typography', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'     => __( 'Set the font-family and font-styles for the button', 'wk-add-to-cart-button-for-woocommerce' ),
				'color'        => false,
				'subset'       => false,
				'preview_text' => __( 'Add to Cart', 'wk-add-to-cart-button-for-woocommerce' ),
				'output'       => 'button.single_add_to_cart_button',
			),
			array(
				'id'      => 'atc_single_btn_color_group',
				'type'    => 'color_group',
				'title'   => __( 'Button Color', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'   => __( 'Define the text color and background color for the buttons', 'wk-add-to-cart-button-for-woocommerce' ),
				'options' => array(
					'color-txt'       => __( 'Color Text', 'wk-add-to-cart-button-for-woocommerce' ),
					'color-txt-hover' => __( 'Color Text on Hover', 'wk-add-to-cart-button-for-woocommerce' ),
					'color-bg'        => __( 'Color Background', 'wk-add-to-cart-button-for-woocommerce' ),
					'color-bg-hover'  => __( 'Color Background on Hover', 'wk-add-to-cart-button-for-woocommerce' ),
				),
			),
			array(
				'id'          => 'atc_single_btn_size',
				'type'        => 'dimensions',
				'title'       => __( 'Size', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'       => __( 'Set the width and height from here', 'wk-add-to-cart-button-for-woocommerce' ),
				'width_icon'  => __( 'width', 'wk-add-to-cart-button-for-woocommerce' ),
				'height_icon' => __( 'height', 'wk-add-to-cart-button-for-woocommerce' ),
				'output'      => 'button.single_add_to_cart_button',
			),
			array(
				'id'       => 'atc_single_btn_border',
				'type'     => 'border',
				'title'    => __( 'Border', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'    => __( 'Set the border width and style from here', 'wk-add-to-cart-button-for-woocommerce' ),
				'all_icon' => __( 'Size', 'wk-add-to-cart-button-for-woocommerce' ),
				'all'      => true,
				'color'    => false,
				'default'  => array(
					'all'   => '0',
					'style' => 'solid',
					'unit'  => 'px',
				),
			),
			array(
				'id'      => 'atc_single_btn_border_color',
				'type'    => 'color_group',
				'title'   => __( 'Border Color', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'   => __( 'Set the border color for normal and hover state', 'wk-add-to-cart-button-for-woocommerce' ),
				'options' => array(
					'border-color' => __( 'Normal', 'wk-add-to-cart-button-for-woocommerce' ),
					'border-hover' => __( 'On Hover', 'wk-add-to-cart-button-for-woocommerce' ),
				),
			),
			array(
				'id'          => 'atc_single_btn_border_radius',
				'type'        => 'border',
				'title'       => __( 'Border Radius', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'       => __( 'Define the border-radius for the button\'s corner here', 'wk-add-to-cart-button-for-woocommerce' ),
				'top_icon'    => __( 'Top Left', 'wk-add-to-cart-button-for-woocommerce' ),
				'bottom_icon' => __( 'Top Right', 'wk-add-to-cart-button-for-woocommerce' ),
				'left_icon'   => __( 'Bottom Left', 'wk-add-to-cart-button-for-woocommerce' ),
				'right_icon'  => __( 'Bottom Right', 'wk-add-to-cart-button-for-woocommerce' ),
				'color'       => false,
				'style'       => false,
				'class'       => 'atc-no-placeholder',
			),
			array(
				'id'          => 'atc_single_btn_margin',
				'type'        => 'spacing',
				'title'       => __( 'Margin', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'       => __( 'Set margin here to offset the button from other element', 'wk-add-to-cart-button-for-woocommerce' ),
				'top_icon'    => __( 'Top', 'wk-add-to-cart-button-for-woocommerce' ),
				'bottom_icon' => __( 'Bottom', 'wk-add-to-cart-button-for-woocommerce' ),
				'left_icon'   => __( 'Left', 'wk-add-to-cart-button-for-woocommerce' ),
				'right_icon'  => __( 'Right', 'wk-add-to-cart-button-for-woocommerce' ),
				'output'      => 'button.single_add_to_cart_button',
				'output_mode' => 'margin',
			),
			array(
				'id'          => 'atc_single_btn_padding',
				'type'        => 'spacing',
				'title'       => __( 'Padding', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'       => __( 'Set padding for the button text here', 'wk-add-to-cart-button-for-woocommerce' ),
				'top_icon'    => __( 'Top', 'wk-add-to-cart-button-for-woocommerce' ),
				'bottom_icon' => __( 'Bottom', 'wk-add-to-cart-button-for-woocommerce' ),
				'left_icon'   => __( 'Left', 'wk-add-to-cart-button-for-woocommerce' ),
				'right_icon'  => __( 'Right', 'wk-add-to-cart-button-for-woocommerce' ),
				'output'      => 'button.single_add_to_cart_button',
				'output_mode' => 'padding',
			),
			array(
				'id'      => 'atc_single_transition',
				'type'    => 'spinner',
				'title'   => __( 'Transition Time', 'wk-add-to-cart-button-for-woocommerce' ),
				'subtitle'   => __( 'Transition helps to load the color in hover stat smoothly. Define it here in milli-seconds', 'wk-add-to-cart-button-for-woocommerce' ),
				'unit'    => 'ms',
				'default' => 300,
			),

		),
	)
);
