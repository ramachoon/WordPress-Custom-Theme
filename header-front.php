<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <h3>This is coming from header-front.php</h3>
        <p>This will only be used on the front page</p>

        <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
          <div class="container">
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
        		<span class="navbar-toggler-icon"></span>
        	</button>
        	<a class="navbar-brand" href="#">Navbar</a>
                <!--
                    Once a menu has been registered in functions.php all we need to do is
                    tell it where to do.
                    The wp_nav_menu() function needs an array of values.
                    The only only value it absolutly needs is the theme_location value, which should
                    match up with the name of the registered menu.

                    You need to be careful with styling a menu because by default, all the ID's and classes
                    for the menu come from the name the user gives it, and we cant control what they name it
                    so adding in extra parameters like menu_id and styling that will make sure
                    that the menu looks exactly as it should no mater what the user names it.

                    https://developer.wordpress.org/reference/functions/wp_nav_menu/
                -->
        		<?php
        		wp_nav_menu( array(
        			'theme_location'    => 'header_nav',
        			'depth'             => 2,
        			'container'         => 'div',
        			'container_class'   => 'collapse navbar-collapse',
        			'container_id'      => 'bs-example-navbar-collapse-1',
        			'menu_class'        => 'nav navbar-nav',
        			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        			'walker'            => new WP_Bootstrap_Navwalker(),
        		) );
        		?>
        	</div>
        </nav>
