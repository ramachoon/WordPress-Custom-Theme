<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    <body>

        <div class="container">
            <!-- check to see if the post/page actually has a post -->
            <?php if(have_posts()): ?>
                <!-- Loop over the posts/post and get the current one you are on -->
                <?php while(have_posts()): the_post();?>
                    <div class="row">
                        <!-- check to see if the post/page has a post thumbnail -->
                        <?php if( has_post_thumbnail() ): ?>
                            <div class="col-xs-12 col-md-4">
                                <!-- the_post_thumbnail(ImageSize, Array of attributes for the image) -->
                                <?php the_post_thumbnail('medium', ['class'=>'img-fluid', 'alt'=>'thumbnail image']); ?>
                            </div>
                            <div class="col-xs-12 col-md-8">
                        <?php else: ?>
                            <div class="col-xs-12">
                        <?php endif; ?>
                            <!-- get the title of the current post in the loop -->
                            <h3><?php the_title(); ?></h3>
                            <!--
                                Get the content of the current post in the loop.
                                We have to remember that the content can be html so we want
                                to make sure we put it inside a div or a span rather than specific elements like p and h's
                            -->
                            <div><?php the_content(); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>
