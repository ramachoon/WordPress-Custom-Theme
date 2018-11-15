<?php
/*
    Template Name: Enquiries
*/

if($_POST){
    var_dump($_POST);

    $errors = array();

    if(!wp_verify_nonce($_POST['_wpnonce'], 'wp_enquiery_form')){
        echo "cant save the data, sorry";
        return;
    }

    //validation

    if(empty($errors)){

        $args = array(
            'post_title' => $_POST['enquiriesName'],
            'post_content' => $_POST['enquiriesMessage'],
            'post_type' => 'enquiries',
            'meta_input' => array(
                'email' => $_POST['enquiriesEmail'],
                'courseInterest' => $_POST['enquiriesCourseInterest']
            )
        );

        wp_insert_post($args);
        echo "Your Enquiry has been sent";
    }
}



 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <div class="container">

            <div class="row">
                <div class="col">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="wp_content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="<?= get_permalink(); ?>" method="post">
                        <?php wp_nonce_field('wp_enquiery_form'); ?>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="enquiriesName" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <?php wp_editor($content, 'enquiriesMessage', array('textarea_rows' => '10')); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="enquiriesEmail" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">What Course are you interested In</label>
                            <select class="form-control" name="enquiriesCourseInterest">
                                <option value="">Choose a Course</option>
                                <option value="Course1">Course 1</option>
                                <option value="Course2">Course 2</option>
                                <option value="Course3">Course 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="" value="Send Enquiry" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
