<!--
    single.php renders out the individual blog posts which you create
    using the wordpress dashboard.
    If this file doesn't exist, it will default to index.php

    https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
 -->

<?php get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <!--
                We are going to do the same thing as front-page.php and render
                out the content differently depending on what post format it is.
            -->
            <?php get_template_part('content', get_post_format()); ?>

            <div class="container">
                <hr>
                <div class="col">

                    <!-- Comments form goes here -->
                    <?php $comments_args = array(
                        'comment_field' => '<div class="form-group">
                                                <label for="comment">Enter your comment</label>
                                                <textarea name="comment" class="form-control" rows="10" aria-required="true"></textarea>
                                            </div>',
                        'submit_button' => '<div class="form-group">
                                                <input type="submit" class="btn btn-info" value="Post Comment">
                                            </div>',
                        'fields' => array(
                            'author' =>
                                '<div class="form-group">
                                    <label for="author">Name</label>
                                    <input name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'">
                                </div>',
                            'email' =>
                                '<div class="form-group">
                                      <label for="email">Email</label>
                                      <input name="email" class="form-control" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .'">
                                </div>',
                            'url' =>
                                '<div class="form-group">
                                      <label for="url">Email</label>
                                      <input name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'">
                                </div>',
                        )
                    ) ?>
                    <?php comment_form($comments_args, get_the_ID()); ?>
                    <?php
                        $comments = get_comments(array(
                            'post_id' => get_the_ID(),
                            'status' => 'approve'
                        ));
                        wp_list_comments('', $comments );

                    ?>
                </div>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
