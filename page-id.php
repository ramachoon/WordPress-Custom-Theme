<!--
    page-$id.php can be used to render out specific pages based on the ID of the page.
    To find your ID you can either look into the database in wp_posts, looking in the
    URL when you edit the page, or by using get_the_ID() inside of the while have_posts()
    loop.

    I would recommend not using this as you can't guarantee that the page your user
    creates will match the ID you made this page for.
    This ID is auto incrementing based on the order which you create pages and posts,
    and it also saves drafts and revisions in the same database, so it would be really
    unlikely to get it to match up.
    
    https://developer.wordpress.org/themes/template-files-section/page-template-files/
 -->


<h1>This is the contact page</h1>
