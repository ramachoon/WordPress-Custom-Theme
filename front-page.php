<!--
    This file will render whatever page you set as your home page.
    By default the home page is a list of all the posts but you can change it
    to a static page through the customize section and the home page settings tab.
-->

<!--
    get_header('front') would then look for header-front.php rather than header.php
    https://codex.wordpress.org/Function_Reference/get_header
 -->
<?php get_header('front'); ?>

        <div class="container">
            <div class="row mb-5 mt-5">
                <div class="card-deck">
                    <div class="card col-6">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <button type="button" name="button">Go to Post</button>
                    </div>
                    <div class="card col-6">
                        <h3>Post Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <button type="button" name="button">Go to Post</button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h1>Home Page</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php if(have_posts()): ?>
                        <div class="card-columns">
                            <?php while(have_posts()): the_post();?>
                                <!--
                                    What we are going to do is render out a different card
                                    depending on what post format our post is.
                                    What it is going to look for is a file called content-{postformat}.php.
                                    If it cant't find that file, it will look for content.php.
                                    It will then paste the contents of that file into this location.
                                -->
                                <?php get_template_part('content', get_post_format()); ?>

                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!--
                    Our users don't actually need to include widgets on the theme.
                    So we need to make sure we wrap it is around an if statement
                    and if there aren't any widgets, then the design still needs to look good.

                    In our theme. If there are widgets inside the front_page_sidebar then we want our theme
                    to use 9 and 3 columns. Otherwise we want the main posts to take up the whole 12.

                    is_active_sidebar() needs the ID of the registered sidebar. So this must match
                    what you wrote in functions.php
                -->
                <?php if( is_active_sidebar('front_page_sidebar') ): ?>
                    <div class="col-3">
                        <div id="frontSidebar">
                            <!--
                                To get the sidebar to actually show all the widgets, then say dynamic_sidebar(id)
                                This will then echo out all the widgets which you have specified in the widgets section.

                                By default they will be echoed out as li's but if you change the befores and afters then
                                it would use those instead.

                                The widgets will use default styles so they won't look good by default.
                                If you are allowing widgets, you will have to style them yourself in your css.
                                There is a way on only allowing specific widgets on your site which also might be useful
                                if you don't want to style every single widget.
                            -->
                            <?php dynamic_sidebar('front_page_sidebar'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
<?php get_footer(); ?>
