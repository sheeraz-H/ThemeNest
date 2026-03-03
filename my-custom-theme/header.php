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
            <a href="<?php echo esc_url( get_search_link() ); ?>" class="cart-icon" title="Search">
                
            </a>

            <!-- WooCommerce Cart -->
            <?php if ( function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon" title="Cart">
                    
                    <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
                        <span class="cart-count">
                            <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                        </span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            <!-- Account -->
            <?php if ( function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="btn btn-primary">
                    My Account
                </a>
            <?php endif; ?>

        </div>
    </div>
</header>