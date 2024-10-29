<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_get_icons' ) ) {
	function atc_get_icons() {

		if ( ! empty( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'atc_icon_nonce' ) ) {

			ob_start();

			ATC::include_plugin_file( 'fields/icon/default-icons.php' );

			$icon_lists = apply_filters( 'atc_field_icon_add_icons', atc_get_default_icons() );

			if ( ! empty( $icon_lists ) ) {

				foreach ( $icon_lists as $list ) {

					echo ( count( $icon_lists ) >= 2 ) ? '<div class="atc-icon-title">' . $list['title'] . '</div>' : '';

					foreach ( $list['icons'] as $icon ) {
							echo '<a class="atc-icon-tooltip" data-atc-icon="' . $icon . '" title="' . $icon . '"><span class="atc-icon atc-selector"><i class="' . $icon . '"></i></span></a>';
					}
				}
			} else {

				echo '<div class="atc-text-error">' . esc_html__( 'No data provided by developer', 'wk-add-to-cart-button-for-woocommerce' ) . '</div>';

			}

			wp_send_json_success( array( 'content' => ob_get_clean() ) );

		} else {

			 wp_send_json_error( array( 'error' => esc_html__( 'Error: Nonce verification has failed. Please try again.', 'wk-add-to-cart-button-for-woocommerce' ) ) );

		}

	}
	add_action( 'wp_ajax_atc-get-icons', 'atc_get_icons' );
}

/**
 *
 * Export
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_export' ) ) {
	function atc_export() {

		if ( ! empty( $_GET['export'] ) && ! empty( $_GET['nonce'] ) && wp_verify_nonce( $_GET['nonce'], 'atc_backup_nonce' ) ) {

			header( 'Content-Type: application/json' );
			header( 'Content-disposition: attachment; filename=backup-' . gmdate( 'd-m-Y' ) . '.json' );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Pragma: no-cache' );
			header( 'Expires: 0' );

			echo json_encode( get_option( wp_unslash( $_GET['export'] ) ) );

		}

		die();
	}
	add_action( 'wp_ajax_atc-export', 'atc_export' );
}

/**
 *
 * Import Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_import_ajax' ) ) {
	function atc_import_ajax() {

		if ( ! empty( $_POST['import_data'] ) && ! empty( $_POST['unique'] ) && ! empty( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'atc_backup_nonce' ) ) {

			$import_data = json_decode( wp_unslash( trim( $_POST['import_data'] ) ), true );

			if ( is_array( $import_data ) ) {

				  update_option( wp_unslash( $_POST['unique'] ), wp_unslash( $import_data ) );
				wp_send_json_success();

			}
		}

		wp_send_json_error( array( 'error' => esc_html__( 'Error: Nonce verification has failed. Please try again.', 'wk-add-to-cart-button-for-woocommerce' ) ) );

	}
	add_action( 'wp_ajax_atc-import', 'atc_import_ajax' );
}

/**
 *
 * Reset Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_reset_ajax' ) ) {
	function atc_reset_ajax() {

		if ( ! empty( $_POST['unique'] ) && ! empty( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'atc_backup_nonce' ) ) {
			delete_option( wp_unslash( $_POST['unique'] ) );
			wp_send_json_success();
		}

		wp_send_json_error( array( 'error' => esc_html__( 'Error: Nonce verification has failed. Please try again.', 'wk-add-to-cart-button-for-woocommerce' ) ) );

	}
	add_action( 'wp_ajax_atc-reset', 'atc_reset_ajax' );
}

/**
 *
 * Chosen Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_chosen_ajax' ) ) {
	function atc_chosen_ajax() {

		if ( ! empty( $_POST['term'] ) && ! empty( $_POST['type'] ) && ! empty( $_POST['nonce'] ) && wp_verify_nonce( $_POST['nonce'], 'atc_chosen_ajax_nonce' ) ) {

			$capability = apply_filters( 'atc_chosen_ajax_capability', 'manage_options' );

			if ( current_user_can( $capability ) ) {

				$type       = $_POST['type'];
				$term       = $_POST['term'];
				$query_args = ( ! empty( $_POST['query_args'] ) ) ? $_POST['query_args'] : array();
				$options    = ATC_Fields::field_data( $type, $term, $query_args );

				wp_send_json_success( $options );

			} else {
				  wp_send_json_error( array( 'error' => esc_html__( 'You do not have required permissions to access.', 'wk-add-to-cart-button-for-woocommerce' ) ) );
			}
		} else {
				 wp_send_json_error( array( 'error' => esc_html__( 'Error: Nonce verification has failed. Please try again.', 'wk-add-to-cart-button-for-woocommerce' ) ) );
		}

	}
	add_action( 'wp_ajax_atc-chosen', 'atc_chosen_ajax' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'atc_set_icons' ) ) {
	function atc_set_icons() {
		?>
	<div id="atc-modal-icon" class="atc-modal atc-modal-icon">
	  <div class="atc-modal-table">
		<div class="atc-modal-table-cell">
		  <div class="atc-modal-overlay"></div>
		  <div class="atc-modal-inner">
			<div class="atc-modal-title">
				  <?php esc_html_e( 'Add Icon', 'wk-add-to-cart-button-for-woocommerce' ); ?>
			  <div class="atc-modal-close atc-icon-close"></div>
			</div>
			<div class="atc-modal-header atc-text-center">
			  <input type="text" placeholder="<?php esc_html_e( 'Search a Icon...', 'wk-add-to-cart-button-for-woocommerce' ); ?>" class="atc-icon-search" />
			</div>
			<div class="atc-modal-content">
			  <div class="atc-modal-loading"><div class="atc-loading"></div></div>
			  <div class="atc-modal-load"></div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
			<?php

	}
	add_action( 'admin_footer', 'atc_set_icons' );
	add_action( 'customize_controls_print_footer_scripts', 'atc_set_icons' );
}
