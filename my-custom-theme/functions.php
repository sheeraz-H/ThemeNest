<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MYTHEME_VERSION', '1.0.0' );
define( 'MYTHEME_DIR', get_template_directory() );
define( 'MYTHEME_URI', get_template_directory_uri() );

require_once MYTHEME_DIR . '/inc/class-walker-nav.php';

// require_once MYTHEME_DIR . '/inc/theme-setup.php';
// require_once MYTHEME_DIR . '/inc/enqueue.php';
// require_once MYTHEME_DIR . '/inc/widgets.php';
// require_once MYTHEME_DIR . '/inc/custom-post-types.php';
// require_once MYTHEME_DIR . '/inc/custom-taxonomies.php';
// require_once MYTHEME_DIR . '/inc/meta-boxes.php';
// require_once MYTHEME_DIR . '/inc/ajax-handlers.php';
// require_once MYTHEME_DIR . '/inc/helpers.php';
// require_once MYTHEME_DIR . '/inc/customizer.php';
// require_once MYTHEME_DIR . '/inc/shortcodes.php';