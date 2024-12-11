<?php

class WPDA_Wpddiviaddons extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'wpda-wpddiviaddons';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'wpddiviaddons';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.3';

	/**
	 * WPDA_Wpddiviaddons constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'wpddiviaddons', $args = array() ) {
		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_frontend_scripts') );

		parent::__construct( $name, $args );
	}

	public function enqueue_frontend_scripts() {
		$version = WPDA_POST_CAROUSEL_VERSION;

		wp_enqueue_script( 'wpda-frontend-js', WPDA_POST_CAROUSEL_URL . 'scripts/frontend.js', array('jquery'), null, true);
		wp_enqueue_script( 'owl-carousel-js', WPDA_POST_CAROUSEL_URL . 'scripts/owl.carousel.min.js', array('jquery'), '2.3.4', true);
		wp_enqueue_style( 'wpda-frontend-style', WPDA_POST_CAROUSEL_URL . 'styles/style.css');
		wp_enqueue_style( 'owl-carousel', WPDA_POST_CAROUSEL_URL . 'styles/owl.carousel.min.css');
		wp_enqueue_style( 'owl-carousel-default', WPDA_POST_CAROUSEL_URL . 'styles/owl.theme.default.min.css');
	}
}

new WPDA_Wpddiviaddons;
