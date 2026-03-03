<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">

        <!-- Logo -->
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <i class="fa-solid fa-book-open"></i>
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <!-- Navigation -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">

            <!-- Search -->
            <a href="<?php echo esc_url( get_search_link() ); ?>" class="header-icon" title="Search Books">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>

            <!-- Wishlist (for future use) -->
            <a href="#" class="header-icon" title="Wishlist">
                <i class="fa-regular fa-heart"></i>
            </a>

            <!-- WooCommerce Cart -->
            <?php if ( function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-icon cart-wrapper" title="Your Cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
                        <span class="cart-count">
                            <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                        </span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <!-- My Account -->
            <?php if ( function_exists( 'WC' ) ) : ?>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i>
                        My Account
                    </a>
                <?php else : ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="btn btn-primary">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</header>