<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('thumbnail', ['class'=>'card-img-top img-fluid', 'alt'=>'Card image cap']); ?>
        <?php endif; ?>
        <a class="btn btn-warning" href="<?= esc_url(get_permalink()); ?>">Go to gallery</a>
    </div>
</div>
