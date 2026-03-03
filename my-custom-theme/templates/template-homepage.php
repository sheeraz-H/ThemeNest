<?php
/**
 * Template Name: Homepage
 *
 * @package MyCustomTheme
 */

get_header(); ?>

<!-- ============================================
     HERO SECTION
============================================ -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <span class="hero-badge">📚 New Arrivals Every Week</span>
            <h1>Discover Your Next <span class="highlight">Favourite Book</span></h1>
            <p>Explore thousands of eBooks and digital products. Instant download, lifetime access, read anywhere.</p>
            <div class="hero-buttons">
                <?php if ( function_exists( 'WC' ) ) : ?>
                    <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">
                        Browse Books
                    </a>
                <?php endif; ?>
                <a href="#featured" class="btn btn-outline">See Bestsellers</a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <strong>5,000+</strong>
                    <span>Books</span>
                </div>
                <div class="stat">
                    <strong>50,000+</strong>
                    <span>Happy Readers</span>
                </div>
                <div class="stat">
                    <strong>Instant</strong>
                    <span>Download</span>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-book-stack">
                <div class="book-card-float book-1">📖</div>
                <div class="book-card-float book-2">📗</div>
                <div class="book-card-float book-3">📕</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CATEGORIES SECTION
============================================ -->
<section class="categories section" id="categories">
    <div class="container">
        <div class="section-title">
            <h2>Browse by Category</h2>
            <p>Find exactly what you're looking for</p>
        </div>
        <div class="categories-grid">
            <?php
            $categories = get_terms( array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'exclude'    => get_option( 'default_product_cat' ),
            ) );

            $cat_icons = array( '📘', '📙', '📗', '📕', '📓', '📔' );
            $i = 0;

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) :
                foreach ( $categories as $category ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="category-card">
                        <span class="cat-icon"><?php echo $cat_icons[ $i % count( $cat_icons ) ]; ?></span>
                        <h4><?php echo esc_html( $category->name ); ?></h4>
                        <p><?php echo esc_html( $category->count ); ?> Books</p>
                    </a>
                <?php
                $i++;
                endforeach;
            else : ?>
                <a href="#" class="category-card">
                    <span class="cat-icon">📘</span>
                    <h4>Fiction</h4>
                    <p>Coming Soon</p>
                </a>
                <a href="#" class="category-card">
                    <span class="cat-icon">📙</span>
                    <h4>Non-Fiction</h4>
                    <p>Coming Soon</p>
                </a>
                <a href="#" class="category-card">
                    <span class="cat-icon">📗</span>
                    <h4>eBooks</h4>
                    <p>Coming Soon</p>
                </a>
                <a href="#" class="category-card">
                    <span class="cat-icon">📕</span>
                    <h4>Courses</h4>
                    <p>Coming Soon</p>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ============================================
     FEATURED BOOKS SECTION
============================================ -->
<section class="featured-books section" id="featured">
    <div class="container">
        <div class="section-title">
            <h2>Bestselling Books</h2>
            <p>Most loved by our readers</p>
        </div>
        <div class="books-grid">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 6,
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC',
            );
            $products = new WP_Query( $args );

            if ( $products->have_posts() ) :
                while ( $products->have_posts() ) : $products->the_post();
                    global $product; ?>
                    <div class="book-card">
                        <a href="<?php the_permalink(); ?>" class="book-cover">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'book-cover' ); ?>
                            <?php else : ?>
                                <div class="no-cover">📚</div>
                            <?php endif; ?>
                            <div class="book-overlay">
                                <span class="btn btn-primary">View Book</span>
                            </div>
                        </a>
                        <div class="book-info">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="book-author">by <?php echo esc_html( get_the_author() ); ?></p>
                            <div class="book-footer">
                                <span class="book-price">
                                    <?php echo wp_kses_post( $product->get_price_html() ); ?>
                                </span>
                                <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="btn btn-accent btn-sm">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="no-products">No books found. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=product' ) ); ?>">Add some products!</a></p>
            <?php endif; ?>
        </div>
        <div class="section-cta">
            <?php if ( function_exists( 'WC' ) ) : ?>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-outline">
                    View All Books →
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ============================================
     TRUST BADGES SECTION
============================================ -->
<section class="trust-section">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-item">
                <span class="trust-icon">⚡</span>
                <h4>Instant Download</h4>
                <p>Get your book immediately after purchase</p>
            </div>
            <div class="trust-item">
                <span class="trust-icon">🔒</span>
                <h4>Secure Payment</h4>
                <p>Your payment info is always protected</p>
            </div>
            <div class="trust-item">
                <span class="trust-icon">♾️</span>
                <h4>Lifetime Access</h4>
                <p>Download your books anytime forever</p>
            </div>
            <div class="trust-item">
                <span class="trust-icon">💬</span>
                <h4>24/7 Support</h4>
                <p>We're always here to help you</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TESTIMONIALS SECTION
============================================ -->
<section class="testimonials section">
    <div class="container">
        <div class="section-title">
            <h2>What Readers Say</h2>
            <p>Trusted by thousands of book lovers</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Amazing collection of books! The instant download feature is fantastic. I got my book within seconds."</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">👤</div>
                    <div>
                        <strong>Sarah Johnson</strong>
                        <span>Verified Buyer</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Best digital bookstore I've used. Great prices and huge selection. Highly recommend to all book lovers!"</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">👤</div>
                    <div>
                        <strong>Ahmed Khan</strong>
                        <span>Verified Buyer</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>"Lifetime access is a game changer. I can re-download my books anytime on any device. Love this store!"</p>
                <div class="reviewer">
                    <div class="reviewer-avatar">👤</div>
                    <div>
                        <strong>Maria Garcia</strong>
                        <span>Verified Buyer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NEWSLETTER SECTION
============================================ -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-box">
            <h2>Get New Books In Your Inbox</h2>
            <p>Subscribe and be first to know about new arrivals and exclusive discounts</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>