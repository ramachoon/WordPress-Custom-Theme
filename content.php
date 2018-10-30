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
