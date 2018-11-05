<!--
    This file will only render if the post format is image

    Look at content.php & functions.php for more info about post formats
 -->

<?php if( is_singular() ): ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col bg-secondary">
                <h1><?= the_title(); ?></h1>
                <p>This is a blog post with an image content type</p>
                <hr>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xs-12 col-md-4">
                <?php if( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="wp_content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <?php if( has_post_thumbnail() ): ?>
                <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary" href="<?= esc_url(get_permalink()); ?>">Go to image</a>
        </div>
    </div>
<?php endif; ?>
