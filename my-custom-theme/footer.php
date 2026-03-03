<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Col 1 - About -->
            <div class="footer-col">
                <h4><?php bloginfo( 'name' ); ?></h4>
                <p>Your go-to destination for books and digital products. Instant downloads, lifetime access.</p>
            </div>

            <!-- Col 2 - Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <?php if ( function_exists( 'WC' ) ) : ?>
                        <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">Shop</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                </ul>
            </div>

            <!-- Col 3 - Categories -->
            <div class="footer-col">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Fiction</a></li>
                    <li><a href="#">Non-Fiction</a></li>
                    <li><a href="#">eBooks</a></li>
                    <li><a href="#">Online Courses</a></li>
                </ul>
            </div>

            <!-- Col 4 - Support -->
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Download Help</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p><?php bloginfo( 'name' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?> — All Rights Reserved</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>