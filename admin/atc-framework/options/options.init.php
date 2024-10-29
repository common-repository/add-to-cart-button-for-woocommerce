<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.

// Set a unique slug-like ID.
$prefix = '_addtocart_options';

// Create options.
ATC::createOptions(
	$prefix,
	array(
		'framework_title'   => 'Add to Cart Button for WooCommerce',
		'sticky_header'     => false,
		'menu_title'        => 'Add to Cart',
		'show_bar_menu'     => false,
		'menu_slug'         => 'edit.php?post_type=add_to_cart_cpt',
		'show_network_menu' => false,
		'theme'             => 'light',
		'footer_credit'     => __( 'Giving a <a href="https://codecanyon.net/item/add-to-cart-button-pro-for-woocommerce/reviews/25512311" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating to this plugin.', 'wk-add-to-cart-button-for-woocommerce' ),
		'class'             => 'add-to-cart-options',
	)
);