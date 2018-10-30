<!--
    This file will only render if the post format is aside

    Look at content.php & functions.php for more info about post formats
 -->

<?php if( is_singular() ): ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col bg-danger">
                <h1><?= the_title(); ?></h1>
                <p>This is a blog post with an aside content type</p>
                <hr>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <div>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger" href="<?= esc_url(get_permalink()); ?>">Go to aside post</a>
        </div>
    </div>
<?php endif; ?>
