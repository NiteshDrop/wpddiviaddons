<?php

class WPDA_PostCarousel extends ET_Builder_Module {
	public $posts_json;

	protected $module_credits = array(
		'module_uri' => 'https://www.wpdrops.com',
		'author'     => 'WP Drops',
		'author_uri' => 'https://www.wpdrops.com',
	);
	
	public function init() {
		$this->vb_support = 'on';
		$this->slug       = 'wpda_post_carousel';
		$this->name = esc_html__( 'WPDA Post Carousel', 'wpda-wpddiviaddons' );
		$this->settings_modal_toggles = array(
			'advanced' => array(
				'toggles' => array(
					'title'     => esc_html__('Title', 'wpda-wpddiviaddons'),
					'posts' 		=> array(
						'priority'	=> 24,
						'tabbed_subtoggles' => true,
          	'title' => 'Wpd Post Carousel',
					),

					'postsstyle' 		=> array(
						'priority'	=> 24,
						'tabbed_subtoggles' => true,
          	'title' => 'Wpd Post Setting',
					),
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
				'toggle_slug'     => 'posts',
				'options'					=> get_post_types(array('public' => true)),
				'default'					=> 'post',
			),

			'postperpage' => array(
				'label'           => esc_html__( 'Post Per Page', 'wpda-wpddiviaddons' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Select Post Per Page To Show On The Carousel.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'posts',
				'options'         => array(
					"3" => esc_html__( '3', 'wppc-wpd-post-carousel' ),	
					"6" =>esc_html__( '6', 'wppc-wpd-post-carousel' ),	
					"9" => esc_html__( '9', 'wppc-wpd-post-carousel' ),
				),
				'default'					=> '3',
			),

			'postcategory' => array(
				'label'           => esc_html__( 'Post Categories', 'wpda-wpddiviaddons' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Select Post Category To Show On The Carousel.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'posts',
				'default'					=> 'Uncategorized',
				'options'					=> self::wpda_get_category_list()
			),

			'posttitlecolor' => array(
				'label'           => esc_html__( 'Post Title Color', 'wpda-wpddiviaddons' ),
				'type'        		=> 'color-alpha',
				'description'     => esc_html__( 'Select Post Type Color.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'postsstyle',
				'default'					=> '#555',
				'tab_slug'				=> 'advanced'
			),

			'postdatecolor' => array(
				'label'           => esc_html__( 'Post Date Color', 'wpda-wpddiviaddons' ),
				'type'        		=> 'color-alpha',
				'description'     => esc_html__( 'Select Post Date Color.', 'wpda-wpddiviaddons' ),
				'toggle_slug'     => 'postsstyle',
				'default'					=> '#555',
				'tab_slug'				=> 'advanced'
			),
		);
	}

	public function wpda_render_post_carousel_frontend() {
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
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
				</div>
				<div class="wpda_post_title ">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div>
				<div class="wpda_post_text">
					<?php the_content(); ?>
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

	protected function render_css($render_slug)
	{
		$posttitlecolor = $this->props['posttitlecolor'];
		$postdatecolor = $this->props['postdatecolor'];

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .wpda_post_title a',
				'declaration' => sprintf(
					'color : %1$s', $posttitlecolor
				),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .wpda_post_date',
				'declaration' => sprintf(
					'color : %1$s', $postdatecolor
				),
			)
		);
	}

	public function render($attrs, $content, $render_slug ) {
		$this->render_css($render_slug);
		return $this -> wpda_render_post_carousel_frontend();
	}
}

new WPDA_PostCarousel();