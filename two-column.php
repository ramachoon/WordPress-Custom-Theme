<!--
    Check full-width.php for more info about page templates.

    Sometimes you might want a template for a different post type as well.
    You might want your individual posts to be laid differently depending on the
    content.
    By default, a template would only be used for a page, but if you want to allow
    other post types to use the a template, you can include the Template-Post-Type:
    comment underneath the Template Name comment.
    (I have to use a - between the words as it would then
    register this comment for the post types and not the real one bellow)
    This will also include a dropdown menu in the attributes section of the add/edit
    sections of the post type.
    The value would be a list of all the post types you want this template to be used for.
    The default post types are:
        Post (Post Type: 'post')
        Page (Post Type: 'page')
        Attachment (Post Type: 'attachment')
        Revision (Post Type: 'revision')
        Navigation Menu (Post Type: 'nav_menu_item')
        Custom CSS (Post Type: 'custom_css')
        Changesets (Post Type: 'customize_changeset')
        User Data Request (Post Type: 'user_request' )

    Later on we will add our own custom post types into our theme.
 -->

<?php
    /*
        Template Name: Two column Template
        Template Post Type: page, post
    */
 ?>

 <?php get_header(); ?>
     <?php if(have_posts()): ?>
         <?php while(have_posts()): the_post();?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1><?= the_title(); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="twoColumns">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>

         <?php endwhile; ?>
     <?php endif; ?>
 <?php get_footer(); ?>
