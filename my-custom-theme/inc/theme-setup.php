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

    // Title tag support
    add_theme_support( 'title-tag' );

    // Featured images
    add_theme_support( 'post-thumbnails' );

    // HTML5 support
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

    // WooCommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Register menus
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'my-custom-theme' ),
        'footer-menu'  => __( 'Footer Menu', 'my-custom-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );