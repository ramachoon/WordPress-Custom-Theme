<!--
    This file will render whatever page you set as your home page.
    By default the home page is a list of all the posts but you can change it
    to a static page through the customize section and the home page settings tab.
-->


<?php get_header('front'); ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Home Page</h1>
                </div>
                <?php if(have_posts()): ?>
                    <div class="card-columns">
                        <?php while(have_posts()): the_post();?>
                            <div class="card">
                                <?php if( has_post_thumbnail() ): ?>
                                    <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <div class="">
                                        <?php the_content(); ?>
                                    </div>
                                    <a class="btn btn-primary" href="<?= esc_url(get_permalink()); ?>">Go to post</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
