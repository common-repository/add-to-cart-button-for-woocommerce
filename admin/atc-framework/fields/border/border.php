<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: border
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! class_exists( 'ATC_Field_border' ) ) {
  class ATC_Field_border extends ATC_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'top_icon'           => '<i class="fa fa-long-arrow-up"></i>',
        'left_icon'          => '<i class="fa fa-long-arrow-left"></i>',
        'bottom_icon'        => '<i class="fa fa-long-arrow-down"></i>',
        'right_icon'         => '<i class="fa fa-long-arrow-right"></i>',
        'all_icon'           => '<i class="fa fa-arrows"></i>',
        'top_placeholder'    => esc_html__( 'top', 'wk-add-to-cart-button-for-woocommerce' ),
        'right_placeholder'  => esc_html__( 'right', 'wk-add-to-cart-button-for-woocommerce' ),
        'bottom_placeholder' => esc_html__( 'bottom', 'wk-add-to-cart-button-for-woocommerce' ),
        'left_placeholder'   => esc_html__( 'left', 'wk-add-to-cart-button-for-woocommerce' ),
        'all_placeholder'    => esc_html__( 'all', 'wk-add-to-cart-button-for-woocommerce' ),
        'top'                => true,
        'left'               => true,
        'bottom'             => true,
        'right'              => true,
        'all'                => false,
        'color'              => true,
        'style'              => true,
        'unit'               => 'px',
      ) );

      $default_value = array(
        'top'        => '',
        'right'      => '',
        'bottom'     => '',
        'left'       => '',
        'color'      => '',
        'style'      => 'solid',
        'all'        => '',
      );

      $border_props = array(
        'solid'     => esc_html__( 'Solid', 'wk-add-to-cart-button-for-woocommerce' ),
        'dashed'    => esc_html__( 'Dashed', 'wk-add-to-cart-button-for-woocommerce' ),
        'dotted'    => esc_html__( 'Dotted', 'wk-add-to-cart-button-for-woocommerce' ),
        'double'    => esc_html__( 'Double', 'wk-add-to-cart-button-for-woocommerce' ),
        'inset'     => esc_html__( 'Inset', 'wk-add-to-cart-button-for-woocommerce' ),
        'outset'    => esc_html__( 'Outset', 'wk-add-to-cart-button-for-woocommerce' ),
        'groove'    => esc_html__( 'Groove', 'wk-add-to-cart-button-for-woocommerce' ),
        'ridge'     => esc_html__( 'ridge', 'wk-add-to-cart-button-for-woocommerce' ),
        'none'      => esc_html__( 'None', 'wk-add-to-cart-button-for-woocommerce' )
      );

      $default_value = ( ! empty( $this->field['default'] ) ) ? wp_parse_args( $this->field['default'], $default_value ) : $default_value;

      $value = wp_parse_args( $this->value, $default_value );

      echo $this->field_before();

      if( ! empty( $args['all'] ) ) {

        $placeholder = ( ! empty( $args['all_placeholder'] ) ) ? ' placeholder="'. $args['all_placeholder'] .'"' : '';

        echo '<div class="atc--left atc--input">';
        echo ( ! empty( $args['all_icon'] ) ) ? '<span class="atc--label atc--label-icon">'. $args['all_icon'] .'</span>' : '';
        echo '<input type="text" name="'. $this->field_name('[all]') .'" value="'. $value['all'] .'"'. $placeholder .' class="atc-number" />';
        echo ( ! empty( $args['unit'] ) ) ? '<span class="atc--label atc--label-unit">'. $args['unit'] .'</span>' : '';
        echo '</div>';

      } else {

        $properties = array();

        foreach ( array( 'top', 'right', 'bottom', 'left' ) as $prop ) {
          if( ! empty( $args[$prop] ) ) {
            $properties[] = $prop;
          }
        }

        $properties = ( $properties === array( 'right', 'left' ) ) ? array_reverse( $properties ) : $properties;

        foreach( $properties as $property ) {

          $placeholder = ( ! empty( $args[$property.'_placeholder'] ) ) ? ' placeholder="'. $args[$property.'_placeholder'] .'"' : '';

          echo '<div class="atc--left atc--input">';
          echo ( ! empty( $args[$property.'_icon'] ) ) ? '<span class="atc--label atc--label-icon">'. $args[$property.'_icon'] .'</span>' : '';
          echo '<input type="text" name="'. $this->field_name('['. $property .']') .'" value="'. $value[$property] .'"'. $placeholder .' class="atc-number" />';
          echo ( ! empty( $args['unit'] ) ) ? '<span class="atc--label atc--label-unit">'. $args['unit'] .'</span>' : '';
          echo '</div>';

        }

      }

      if( ! empty( $args['style'] ) ) {
        echo '<div class="atc--left atc--input">';
        echo '<select name="'. $this->field_name('[style]') .'">';
        foreach( $border_props as $border_prop_key => $border_prop_value ) {
          $selected = ( $value['style'] === $border_prop_key ) ? ' selected' : '';
          echo '<option value="'. $border_prop_key .'"'. $selected .'>'. $border_prop_value .'</option>';
        }
        echo '</select>';
        echo '</div>';
      }

      if( ! empty( $args['color'] ) ) {
        $default_color_attr = ( ! empty( $default_value['color'] ) ) ? ' data-default-color="'. $default_value['color'] .'"' : '';
        echo '<div class="atc--left atc-field-color">';
        echo '<input type="text" name="'. $this->field_name('[color]') .'" value="'. $value['color'] .'" class="atc-color"'. $default_color_attr .' />';
        echo '</div>';
      }

      echo '<div class="clear"></div>';

      echo $this->field_after();

    }

    public function output() {

      $output    = '';
      $unit      = ( ! empty( $this->value['unit'] ) ) ? $this->value['unit'] : 'px';
      $important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
      $element   = ( is_array( $this->field['output'] ) ) ? join( ',', $this->field['output'] ) : $this->field['output'];

      // properties
      $top     = ( isset( $this->value['top'] )    && $this->value['top']    !== '' ) ? $this->value['top']    : '';
      $right   = ( isset( $this->value['right'] )  && $this->value['right']  !== '' ) ? $this->value['right']  : '';
      $bottom  = ( isset( $this->value['bottom'] ) && $this->value['bottom'] !== '' ) ? $this->value['bottom'] : '';
      $left    = ( isset( $this->value['left'] )   && $this->value['left']   !== '' ) ? $this->value['left']   : '';
      $style   = ( isset( $this->value['style'] )  && $this->value['style']  !== '' ) ? $this->value['style']  : '';
      $color   = ( isset( $this->value['color'] )  && $this->value['color']  !== '' ) ? $this->value['color']  : '';
      $all     = ( isset( $this->value['all'] )    && $this->value['all']    !== '' ) ? $this->value['all']    : '';

      if( ! empty( $this->field['all'] ) && ( $all !== '' || $color !== '' ) ) {

        $output  = $element .'{';
        $output .= ( $all   !== '' ) ? 'border-width:'. $all . $unit . $important .';' : '';
        $output .= ( $color !== '' ) ? 'border-color:'. $color . $important .';'       : '';
        $output .= ( $style !== '' ) ? 'border-style:'. $style . $important .';'       : '';
        $output .= '}';

      } else if( $top !== '' || $right !== '' || $bottom !== '' || $left !== '' || $color !== '' ) {

        $output  = $element .'{';
        $output .= ( $top    !== '' ) ? 'border-top-width:'. $top . $unit . $important .';'       : '';
        $output .= ( $right  !== '' ) ? 'border-right-width:'. $right . $unit . $important .';'   : '';
        $output .= ( $bottom !== '' ) ? 'border-bottom-width:'. $bottom . $unit . $important .';' : '';
        $output .= ( $left   !== '' ) ? 'border-left-width:'. $left . $unit . $important .';'     : '';
        $output .= ( $color  !== '' ) ? 'border-color:'. $color . $important .';'                 : '';
        $output .= ( $style  !== '' ) ? 'border-style:'. $style . $important .';'                 : '';
        $output .= '}';

      }

      $this->parent->output_css .= $output;

      return $output;

    }

  }
}
