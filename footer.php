        <!-- <h3>This is coming from the footer</h3> -->
        <footer class="mt-5 py-5 bg-light">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand w-100" role="navigation">
                      <div class="container">
                        <?php
                            wp_nav_menu( array(
                    			'theme_location'    => 'footer_nav',
                                'menu_id' => 'footer-nav',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'menu_class'        => 'nav navbar-nav justify-content-around w-100',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                    		) );
                         ?>
                        </div>
                    </div>

                    <!--
                        Here we are wanting the data from our footer text customizer to get rendered out.
                        Because this mod is effecting the layout of our site we want to make sure we are
                        wrapping it around an if. Because our users don't need to include a value in here,
                        we don't want empty tags in our code.

                        Because it is just text we are checking to see if the length of the mod is greater than 0.

                        If it is we will render out the row, the col and the the actual mod itself
                    -->
                    <?php $footerText = get_theme_mod('footer_text_setting'); ?>
                    <?php if( strlen($footerText) > 0 ): ?>
                        <div class="row">
                            <div class="col text-center">
                                <p><?php echo get_theme_mod('footer_text_setting'); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </footer>


        <?php wp_footer(); ?>
    </body>
</html>
