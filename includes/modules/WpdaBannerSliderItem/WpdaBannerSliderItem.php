<?php

class WPDA_BannerSliderItem extends ET_Builder_Module {

	public $no_render;
	
	function init() {
		$this->name             = esc_html__( 'Slider', 'et_builder' );
		$this->plural           = esc_html__( 'Sliders', 'et_builder' );
		$this->slug             = 'wpda_banner_slider_item';
		$this->vb_support       = 'on';
		$this->type             = 'child';
		$this->child_title_var  = 'title';
		$this->no_render        = true;
		$this->main_css_element = '%%order_class%% .wpd_banner_item';
	}

	function get_fields() {
		return array(
			'bannersidegradient' => array(
				'label'          => esc_html__( 'Banner Left Background Color', 'wpda-wpddiviaddons' ),
				'description'    => esc_html__( 'Pick a color for banner left background.', 'wpda-wpddiviaddons' ),
				'type'           => 'color',
				'option_category' => 'basic_option',
			),

			'bannerbgimage' => array(
				'label'           => esc_html__( 'Banner Background Image', 'wpda-wpddiviaddons' ),
				'type'            => 'upload',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Upload Image For Banner Background', 'wpda-wpddiviaddons' ),
				'upload_button_text' => et_builder_i18n( 'Upload an image' ),
				'option_category' => 'basic_option',
			),

			'bannerpersonimage' => array(
				'label'           => esc_html__( 'Banner Person Image', 'wpda-wpddiviaddons' ),
				'type'            => 'upload',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Upload Image For Banner Person', 'wpda-wpddiviaddons' ),
				'option_category' => 'basic_option',
				'upload_button_text' => et_builder_i18n( 'Upload an image' ),
			),

			'bannertitle'	=> array(
				'label'						=> esc_html__( 'Banner Title', 'wpda-wpddiviaddons' ),
				'type'						=> 'text',
				'option_category'	=> 'basic_option',
				'description'			=> esc_html__( 'Banner Title Here.', 'wpda-wpddiviaddons' ),
				'option_category' => 'basic_option',
			),

			'bannertext'	=> array(
				'label'						=> esc_html__( 'Banner Text', 'wpda-wpddiviaddons' ),
				'type'						=> 'tiny_mce',
				'option_category'	=> 'basic_option',
				'description'			=> esc_html__( 'Banner Text Here.', 'wpda-wpddiviaddons' ),
				'option_category' => 'basic_option',
			),

			'bannertext'	=> array(
				'label'						=> esc_html__( 'Banner Read More', 'wpda-wpddiviaddons' ),
				'type'						=> 'tiny_mce',
				'option_category'	=> 'basic_option',
				'description'			=> esc_html__( 'Banner Read More Button.', 'wpda-wpddiviaddons' ),
				'option_category' => 'basic_option',
			),
		);
	}
}

new WPDA_BannerSliderItem();