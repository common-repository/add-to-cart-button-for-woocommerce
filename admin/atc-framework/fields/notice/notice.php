<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: notice
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! class_exists( 'ATC_Field_notice' ) ) {
  class ATC_Field_notice extends ATC_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $style = ( ! empty( $this->field['style'] ) ) ? $this->field['style'] : 'normal';

      echo ( ! empty( $this->field['content'] ) ) ? '<div class="atc-notice atc-notice-'. $style .'">'. $this->field['content'] .'</div>' : '';

    }

  }
}
