<!--
    When the get_template_part('content', get_post_format())' function is called,
    it will first look for a file for that post format. The naming should be
    content-{post-format}.php. If it can't find it then it would default to content.php

    Because we are using the same function in front-page.php and single.php.
    We need to tell this file that if it is a single post page to render out the entire content,
    but if it is just from the posts page then render it out differently.
    We could add in a few more else's if we wanted to aswell.

    The is_singular() function is just going to check to see if it is a singluar post page
 -->


<?php if( is_singular() ): ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col bg-primary">
                <h1><?= the_title(); ?></h1>
                <p>This is a blog post with an image content type</p>
                <hr>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="wp_content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <div class="">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="<?= esc_url(get_permalink()); ?>">Go to post</a>
        </div>
    </div>
<?php endif; ?>
