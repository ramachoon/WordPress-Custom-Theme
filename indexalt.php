<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    <body>

        <div class="container">
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post();?>
                    <div class="row">


                            <?php if( has_post_thumbnail() ): ?>
                                <?php $columnClass = 'col-xs-12 col-md-8'; ?>
                                <div class="col-xs-12 col-md-4">
                                    <?php the_post_thumbnail('medium', ['class'=>'img-fluid', 'alt'=>'thumbnail image']); ?>
                                </div>
                            <?php else: ?>
                                <?php $columnClass = 'col-xs-12'; ?>
                            <?php endif; ?>
                                <div class="<?= $columnClass;  ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <div><?php the_content(); ?></div>
                                </div>





                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>




        <?php wp_footer(); ?>
    </body>
</html>
