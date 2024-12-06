<?php

class WPDA_PostCarousel extends ET_Builder_Module {

	public $slug       = 'wpda_post_carousel';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://www.wpdrops.com',
		'author'     => 'WP Drops',
		'author_uri' => 'https://www.wpdrops.com',
	);

	public function init() {
		$this->name = esc_html__( 'WPDA Post Carousel', 'wpda-wpddiviaddons' );
		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'   => et_builder_i18n( 'Content' ),
				),
			),
		);
	}

	static function wpda_get_category_list() {
		$wpda_cat_list = array();
		$args = array(
			'hide_empty'      => false,
		);
		$catogeries = get_categories($args);
		foreach($catogeries as $category) {
			$wpda_cat_list[] = $category->name;
		}
		return $wpda_cat_list;
	}

	public function get_fields() {
		return array(
			'posttype' => array(
				'label'           => esc_html__( 'Post Type', 'wpda-wpddiviaddons' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Select Post Type To Show On The Carousel.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'main_content',
				'options'					=> get_post_types(array('public' => true))
			),

			'postperpage' => array(
				'label'           => esc_html__( 'Post Per Page', 'wpda-wpddiviaddons' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Select Post Per Page To Show On The Carousel.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'main_content',
				'options'         => array(
					"3" => esc_html__( '3', 'wppc-wpd-post-carousel' ),	
					"6" =>esc_html__( '6', 'wppc-wpd-post-carousel' ),	
					"9" => esc_html__( '9', 'wppc-wpd-post-carousel' ),
				),
			),

			'postcategory' => array(
				'label'           => esc_html__( 'Post Categories', 'wpda-wpddiviaddons' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Select Post Category To Show On The Carousel.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'main_content',
				'default'					=> '',
				'options'					=> self::wpda_get_category_list()
			),
		);
	}

	public function wpda_render_post_carousel() {

		$args = [
			'post_type'      => $this->props['posttype'],
			'posts_per_page' => $this->props['postperpage'],
			'category_name'	 => $this->props['postcategory']
		];
		$query = new WP_Query($args);
		ob_start();
		if($query -> have_posts()) :
	?>
	<div class="blog-carousel owl-carousel owl-theme">
		<?php
			while($query-> have_posts()):
				$query -> the_post();
		?>
		<div class="item">
			<div class="carousel_content">
				<div class="wpda_post_thumbnail">
					<?php the_post_thumbnail('medium') ?>
				</div>
				<div class="wpda_post_title">
					<?php the_title(); ?>
				</div>
				<div class="wpda_post_date">
					<?php echo get_the_date(); ?>
				</div>
			</div>
		</div>
		<?php
			endwhile;
			wp_reset_postdata();
			?>
	</div>
	<?php
		else :
			?>
	<div><p>No post found.</p></div>
	<?php
		endif;
		return ob_get_clean();
	}
	public function render( $attrs, $content, $render_slug ) {
		return sprintf($this -> wpda_render_post_carousel(), $render_slug);
	}
}

new WPDA_PostCarousel;