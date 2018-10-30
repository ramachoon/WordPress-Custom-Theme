<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <div class="video-container">
            <?php the_content(); ?>
        </div>
        <a class="btn btn-info" href="<?= esc_url(get_permalink()); ?>">Watch the video</a>
    </div>
</div>
