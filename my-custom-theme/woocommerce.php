<?php
/**
 * WooCommerce Template
 *
 * @package MyCustomTheme
 */

get_header(); ?>

<main class="woo-main section">
    <div class="container">
        <?php woocommerce_content(); ?>
    </div>
</main>

<?php get_footer(); ?>
