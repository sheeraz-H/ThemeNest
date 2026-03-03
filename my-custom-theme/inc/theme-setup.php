<?php
/**
 * Theme Setup
 *
 * @package MyCustomTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mytheme_setup() {

    // Title tag
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );

    // HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Register menus
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'my-custom-theme' ),
        'footer-menu'  => __( 'Footer Menu', 'my-custom-theme' ),
    ) );

    // Image sizes for book covers
    add_image_size( 'book-cover',      300, 400, true );
    add_image_size( 'book-cover-large', 600, 800, true );
    add_image_size( 'book-thumb',      150, 200, true );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

// Remove WooCommerce breadcrumb (optional)
add_filter( 'woocommerce_breadcrumb_defaults', function( $defaults ) {
    $defaults['delimiter'] = ' &rsaquo; ';
    return $defaults;
} );

// Change WooCommerce shop columns to 3
add_filter( 'loop_shop_columns', function() {
    return 3;
} );

// Show 12 products per page
add_filter( 'loop_shop_per_page', function() {
    return 12;
} );
