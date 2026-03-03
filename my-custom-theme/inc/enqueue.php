<?php
/**
 * Enqueue Scripts & Styles
 *
 * @package MyCustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mytheme_scripts() {

    // Google Fonts — Playfair Display + Lato
    wp_enqueue_style(
        'mytheme-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri(),
        array(),
        MYTHEME_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'mytheme-main',
        MYTHEME_URI . '/assets/src/js/main.js',
        array( 'jquery' ),
        MYTHEME_VERSION,
        true
    );

    // Pass data to JS
    wp_localize_script( 'mytheme-main', 'mythemeData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'mytheme_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );