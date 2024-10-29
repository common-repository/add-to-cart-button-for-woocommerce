<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! class_exists( 'ATC_Field_icon' ) ) {
  class ATC_Field_icon extends ATC_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'wk-add-to-cart-button-for-woocommerce' ),
        'remove_title' => esc_html__( 'Remove Icon', 'wk-add-to-cart-button-for-woocommerce' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'atc_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="atc-icon-select">';
      echo '<span class="atc-icon-preview'. $hidden .'"><i class="'. $this->value .'"></i></span>';
      echo '<a href="#" class="button button-primary atc-icon-add" data-nonce="'. $nonce .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button atc-warning-primary atc-icon-remove'. $hidden .'">'. $args['remove_title'] .'</a>';
      echo '<input type="text" name="'. $this->field_name() .'" value="'. $this->value .'" class="atc-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

  }
}
