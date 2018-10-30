<!--
    single.php renders out the individual blog posts which you create
    using the wordpress dashboard.
    If this file doesn't exist, it will default to index.php

    https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
 -->

<?php get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
