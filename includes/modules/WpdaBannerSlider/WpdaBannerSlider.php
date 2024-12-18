<?php

class WPDA_BannerSlider extends ET_Builder_Module {
	
	public function init() {
		$this->name       = esc_html__( 'Wpda Banner Slider', 'wpda-wpddiviaddons' );
		$this->plural     = esc_html__( 'Wpda Banner Sliders', 'wpda-wpddiviaddons' );
		$this->child_slug = 'wpda_banner_slider_item';
		$this->slug       = 'wpda_banner_slider';
		$this->vb_support = 'on';
		$this->name = esc_html__( 'WPDA Banner Slider', 'wpda-wpddiviaddons' );
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'Sliders' 		=> array(
						'priority'	=> 24,
						'tabbed_subtoggles' => true,
          	'title' => 'Wpd Banner Slider',
					),
				),
			),
		);
		
	}

	public function render($attrs, $content, $render_slug ) {
		return sprintf("Slider");
	}

	public function add_new_child_text() {
		return esc_html__( 'Add New Slider', 'et_builder' );
	}
}

new WPDA_BannerSlider();