<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: switcher
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! class_exists( 'ATC_Field_switcher' ) ) {
  class ATC_Field_switcher extends ATC_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $active     = ( ! empty( $this->value ) ) ? ' atc--active' : '';
      $text_on    = ( ! empty( $this->field['text_on'] ) ) ? $this->field['text_on'] : esc_html__( 'On', 'wk-add-to-cart-button-for-woocommerce' );
      $text_off   = ( ! empty( $this->field['text_off'] ) ) ? $this->field['text_off'] : esc_html__( 'Off', 'wk-add-to-cart-button-for-woocommerce' );
      $text_width = ( ! empty( $this->field['text_width'] ) ) ? ' style="width: '. $this->field['text_width'] .'px;"': '';

      echo $this->field_before();

      echo '<div class="atc--switcher'. $active .'"'. $text_width .'>';
      echo '<span class="atc--on">'. $text_on .'</span>';
      echo '<span class="atc--off">'. $text_off .'</span>';
      echo '<span class="atc--ball"></span>';
      echo '<input type="text" name="'. $this->field_name() .'" value="'. $this->value .'"'. $this->field_attributes() .' />';
      echo '</div>';

      echo ( ! empty( $this->field['label'] ) ) ? '<span class="atc--label">'. $this->field['label'] . '</span>' : '';

      echo '<div class="clear"></div>';

      echo $this->field_after();

    }

  }
}
