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

    // Google Fonts
    wp_enqueue_style(
        'mytheme-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap',
        array(),
        null
    );

    // Font Awesome Icons
        wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
    array(),
    '6.5.0'
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

// Remove WooCommerce default styles and use ours
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
