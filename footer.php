        <!-- <h3>This is coming from the footer</h3> -->
        <footer class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                        wp_nav_menu( array(
                			'theme_location'    => 'footer_nav',
                            'menu_id' => 'footer-nav',
                		) );
                     ?>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
