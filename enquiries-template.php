<?php
/*
    Template Name: Enquiries
*/

if($_POST){
    var_dump($_POST);
    $errors = array();

    if(!wp_verify_nonce($_POST['_wpnonce'], 'wp_enquiery_form')){
        array_push($errors, 'Sorry something went wrong with processing this form, Please try again');
    } else {

        if(!$_POST['enquiriesName']){
            array_push($errors, "Your name is required, please enter a value");
        } else if(strlen($title) < 2){
            array_push($errors, "Please enter at least 2 characters for your Name");
        }

        $content = $_POST['enquiriesMessage'];
        if(!$_POST['enquiriesMessage']){
            array_push($errors, "A message is required, please enter a value");
        } else if(strlen($_POST['enquiriesMessage']) < 10){
            array_push($errors, "Please enter at least 10 characters for your Message");
        }

        if(!$_POST['enquiriesEmail']){
            array_push($errors, "An Email is required, please enter a value");
        } else if(!filter_var($_POST['enquiriesEmail'], FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Please enter a valid email address");
        }

        if(!$_POST['enquiriesCourseInterest']){
            array_push($errors, "Please select a Course you are intereted in.");
        } else if($_POST['enquiriesCourseInterest'] === ''){
            array_push($errors, "Please select a Course you are intereted in.");
        }


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

            <?php if($_POST && !empty($errors)): ?>
                <div class="row mb-2">
                    <div class="col">
                        <div class="alert alert-danger pb-0" role="alert">
                            <ul>
                                <?php foreach($errors as $singleError): ?>
                                    <li><?= $singleError; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

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
