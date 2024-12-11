<?php
/*
Plugin Name: Wpddiviaddons
Plugin URI:  https://www.wpdrops.com
Description: Divi Addons By WP Drops
Version:     1.0.3
Author:      WP Drops
Author URI:  https://www.wpdrops.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpda-wpddiviaddons
Domain Path: /languages

Wpddiviaddons is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Wpddiviaddons is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Wpddiviaddons. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'wpda_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */

define('WPDA_POST_CAROUSEL_FILE', __FILE__);
define('WPDA_POST_CAROUSEL_BASE', plugin_basename(__FILE__));
define('WPDA_POST_CAROUSEL_VERSION', '1.0.3');
define('WPDA_POST_CAROUSEL_DIR', plugin_dir_path(__FILE__));
define('WPDA_POST_CAROUSEL_URL', plugin_dir_url(__FILE__));

function wpda_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Wpddiviaddons.php';
}
add_action( 'divi_extensions_init', 'wpda_initialize_extension' );
endif;
