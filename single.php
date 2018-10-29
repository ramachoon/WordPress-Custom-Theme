<!--
    single.php renders out the individual blog posts which you create
    using the wordpress dashboard.
    If this file doesn't exist, it will default to index.php

    https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
 -->

<?php get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1><?= the_title(); ?></h1>
                        <p>This is a blog post</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
