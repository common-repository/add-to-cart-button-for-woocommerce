<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * WP Customize custom panel
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Customize_Panel_ATC' ) && class_exists( 'WP_Customize_Panel' ) ) {
	class WP_Customize_Panel_ATC extends WP_Customize_Panel {

		public $type = 'atc';
	}
}

/**
 *
 * WP Customize custom section
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Customize_Section_ATC' ) && class_exists( 'WP_Customize_Section' ) ) {
	class WP_Customize_Section_ATC extends WP_Customize_Section {

		public $type = 'atc';
	}
}

/**
 *
 * WP Customize custom control
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'WP_Customize_Control_ATC' ) && class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Control_ATC extends WP_Customize_Control {


		public $type   = 'atc';
		public $field  = '';
		public $unique = '';

		protected function render() {

			$depend = '';
			$hidden = '';

			if ( ! empty( $this->field['dependency'] ) ) {
				$hidden    = ' atc-dependency-control hidden';
				  $depend .= ' data-controller="' . $this->field['dependency'][0] . '"';
				$depend   .= ' data-condition="' . $this->field['dependency'][1] . '"';
				 $depend  .= ' data-value="' . $this->field['dependency'][2] . '"';
			}

			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control customize-control-' . $this->type . $hidden;

			echo '<li id="' . $id . '" class="' . $class . '"' . $depend . '>';
			$this->render_content();
			echo '</li>';

		}

		public function render_content() {

			$complex = array(
				'accordion',
				'background',
				'backup',
				'border',
				'button_set',
				'checkbox',
				'color_group',
				'date',
				'dimensions',
				'fieldset',
				'group',
				'image_select',
				'link_color',
				'media',
				'palette',
				'repeater',
				'sortable',
				'sorter',
				'spacing',
				'switcher',
				'tabbed',
				'typography',
			);

			$field_id   = ( ! empty( $this->field['id'] ) ) ? $this->field['id'] : '';
			$custom     = ( ! empty( $this->field['customizer'] ) ) ? true : false;
			$is_complex = ( in_array( $this->field['type'], $complex ) ) ? true : false;
			$class      = ( $is_complex || $custom ) ? ' atc-customize-complex' : '';
			$atts       = ( $is_complex || $custom ) ? ' data-unique-id="' . $this->unique . '" data-option-id="' . $field_id . '"' : '';

			if ( ! $is_complex && ! $custom ) {
				 $this->field['attributes']['data-customize-setting-link'] = $this->settings['default']->id;
			}

			$this->field['name'] = $this->settings['default']->id;

			$this->field['dependency'] = array();

			echo '<div class="atc-customize-field' . $class . '"' . $atts . '>';

			ATC::field( $this->field, $this->value(), $this->unique, 'customize' );

			echo '</div>';

		}

	}
}
