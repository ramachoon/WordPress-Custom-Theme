<?php if( is_singular() ): ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1><?= the_title(); ?></h1>
                <p>This is a blog post</p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <?php if( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-md-8">
                <div>
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
            <a class="btn btn-secondary" href="<?= esc_url(get_permalink()); ?>">Go to image</a>
        </div>
    </div>
<?php endif; ?>
