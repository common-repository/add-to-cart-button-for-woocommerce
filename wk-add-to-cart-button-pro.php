<?php

/**
 * Plugin Name:       Add to Cart Button Pro for WooCommerce
 * Plugin URI:        https://forhad.net/
 * Description:       Modify your '<strong>Add to Cart</strong>' buttons' text and styles as you want. Set a Sticky button for Customers' comfort.
 * Version:           1.1.0
 * Author:            Forhad
 * Author URI:        https://forhad.net/
 * License URI:       LICENSE.txt
 * Text Domain:       wk-add-to-cart-button-for-woocommerce
 * Domain Path:       /languages
 *
 * @link              https://forhad.net/
 * @since             1.0.0
 * @package wk-add-to-cart-button-pro-for-woocommerce
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WK_ADDTOCART_VERSION', '1.1.0' );

/**
 * Define global constants.
 */
$atc_plugin_data = get_file_data(
	__FILE__,
	array(
		'version' => 'Version',
	)
);
define( 'WK_ADDTOCART_PLUGIN_VERSION', $atc_plugin_data['version'] );
define( 'WK_ADDTOCART_DIR_PATH_FILE', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-addtocart-activator.php
 */
function activate_wk_addtocart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-addtocart-activator.php';
	WK_Addtocart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-addtocart-deactivator.php
 */
function deactivate_wk_addtocart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-addtocart-deactivator.php';
	WK_Addtocart_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wk_addtocart' );
register_deactivation_hook( __FILE__, 'deactivate_wk_addtocart' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-addtocart.php';

/**
 * Framework!
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/options/options.init.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/options/options.shop.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/options/options.single.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/options/options.sticky.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/atc-framework/options/options.settings.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wk_addtocart() {

	$plugin = new WK_Addtocart();
	$plugin->run();

}
run_wk_addtocart();

/**
 * Check if WooCommerce is activated.
 *
 * @return void
 */
function atc_wc_check() {
	if ( class_exists( 'woocommerce' ) ) {
		global $atc_wc_active;
		$atc_wc_active = 'yes';
	} else {
		global  $atc_wc_active;
		$atc_wc_active = 'no';
	}
}
add_action( 'admin_init', 'atc_wc_check' );
/**
 * Add body class for CSS.
 */

add_filter(
	'body_class',
	function( $classes ) {
		return array_merge( $classes, array( 'wk-add-to-cart-body' ) );
	}
);

/**
 * Show admin notice if WooCommerce is not activated.
 *
 * @return void
 */
function atc_wc_admin_notice() {
	 global  $atc_wc_active;
	if ( $atc_wc_active == 'no' ) {
		?>

<div class="notice notice-error">
    <p><?php esc_html_e( 'WooCommerce plugin is required. Please activate it to use the \'Add to Cart Button Pro for WooCommerce\' plugin.', 'wk-add-to-cart-button-for-woocommerce' ); ?>
    </p>
</div>
<?php
	}
}
add_action( 'admin_notices', 'atc_wc_admin_notice' );