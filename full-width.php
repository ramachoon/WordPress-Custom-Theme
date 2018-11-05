<!--
    Instead of using specific files, it is better to include a template file.
    Creating a template will be allow your users to choose between the default or
    the specifc template.

    When creating a template, firstly make sure you don't name the file starting with
    page- as this would then look for a page with the name of whatever you give it.
    Instead add a PHP comment at the top and say Template-Name: name-of-template,
    just like it does bellow. (I have to use a - between the words as it would then
    register this comment as the name and not the real one bellow)

    On the create/edit pages sections in the admin dashboard, a dropdown will appear
    under page attributes asking you to choose the default template or whatever
    templates are available.
    The default would depend on what other files you have in your project.
    In this one the default would be page.php

    https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use
-->

<?php
    /* Template Name: Full Page Width */
 ?>

<?php get_header(); ?>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h1><?= the_title(); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="wp_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
