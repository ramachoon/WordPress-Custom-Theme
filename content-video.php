<!--
    This file will only render if the post format is video

    Look at content.php & functions.php for more info about post formats
 -->

<?php if( is_singular() ): ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col bg-info">
                <h1><?= the_title(); ?></h1>
                <p>This is a blog post with a video content type</p>
                <hr>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="single-video-content wp_content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <div class="video-container">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-info" href="<?= esc_url(get_permalink()); ?>">Watch the video</a>
        </div>
    </div>
<?php endif; ?>
