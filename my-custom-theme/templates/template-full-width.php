<?php
/**
 * Template Name: Homepage
 *
 * @package MyCustomTheme
 */

get_header(); ?>

<!-- ================================================
     HERO SECTION
================================================ -->
<section class="hero">
    <div class="hero-content">
        <span class="hero-badge">New Collection 2026</span>
        <h1>Dress To <br><em>Impress</em></h1>
        <p>Discover the latest trends in fashion. Shop men, women and kids collections.</p>
        <div class="hero-buttons">
            <?php if ( function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn-primary">Shop Now</a>
            <?php endif; ?>
            <a href="#collections" class="btn-secondary">View Collections</a>
        </div>
    </div>
</section>

<!-- ================================================
     CATEGORIES SECTION
================================================ -->
<section class="categories" id="collections">
    <div class="container">
        <div class="section-header">
            <h2>Shop By Category</h2>
            <p>Find exactly what you're looking for</p>
        </div>
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-img men"></div>
                <h3>Men</h3>
                <a href="#">Shop Now →</a>
            </div>
            <div class="category-card">
                <div class="category-img women"></div>
                <h3>Women</h3>
                <a href="#">Shop Now →</a>
            </div>
            <div class="category-card">
                <div class="category-img kids"></div>
                <h3>Kids</h3>
                <a href="#">Shop Now →</a>
            </div>
            <div class="category-card">
                <div class="category-img accessories"></div>
                <h3>Accessories</h3>
                <a href="#">Shop Now →</a>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     FEATURED PRODUCTS
================================================ -->
<section class="featured-products">
    <div class="container">
        <div class="section-header">
            <h2>Featured Products</h2>
            <p>Handpicked styles just for you</p>
        </div>
        <div class="products-grid">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 8,
                'meta_query'     => array(
                    array(
                        'key'   => '_featured',
                        'value' => 'yes',
                    ),
                ),
            );
            $products = new WP_Query( $args );

            if ( $products->have_posts() ) :
                while ( $products->have_posts() ) : $products->the_post();
                    global $product;
            ?>
                <div class="product-card">
                    <div class="product-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        <?php endif; ?>
                        <button class="quick-add">+ Quick Add</button>
                    </div>
                    <div class="product-info">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="no-products">No featured products yet. <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">View all products</a></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ================================================
     BANNER / PROMO SECTION
================================================ -->
<section class="promo-banner">
    <div class="container">
        <div class="promo-grid">
            <div class="promo-card promo-sale">
                <span>Up to 50% Off</span>
                <h3>Season Sale</h3>
                <a href="#">Shop Sale →</a>
            </div>
            <div class="promo-card promo-new">
                <span>Just Arrived</span>
                <h3>New Arrivals</h3>
                <a href="#">Explore →</a>
            </div>
        </div>
    </div>
</section>

<!-- ================================================
     FEATURES / USP STRIP
================================================ -->
<section class="features-strip">
    <div class="container">
        <div class="features-grid">
            <div class="feature-item">
                <span>🚚</span>
                <h4>Free Shipping</h4>
                <p>On orders over $50</p>
            </div>
            <div class="feature-item">
                <span>🔄</span>
                <h4>Easy Returns</h4>
                <p>30 day return policy</p>
            </div>
            <div class="feature-item">
                <span>🔒</span>
                <h4>Secure Payment</h4>
                <p>100% secure checkout</p>
            </div>
            <div class="feature-item">
                <span>💬</span>
                <h4>24/7 Support</h4>
                <p>Always here to help</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>