======== STEP 1 =========

** index.php **
this page is required to create a WordPress theme and will serve as the fall back if a page that we are looking for is not available.

** page.php **
this is used for displaying static pages that do not display dynamic content such as blog posts. An example of this would be a home page or contact us. 

404.php 

** Archive.php **
used for displaying an archive of all the blog posts in hierarchal format 

** comments.php **
responsible for displaying comments. Might be easier to copy from starter2021 template or _s and add styles if we need these. 

** footer.php **
the footer

** header.php **
the header

**** functions.php ****
the is where all of the magic happens and we override the default settings and also add out CSS and JavaScript. 

** search.php **
this is the page that will display search results when a user searches for specific content. 

** single.php **
this page is responsible for displaying individual blog posts when we click on them. 

style.css - even though we are using webpack to compile we always need a style.css to create a wordpress  theme. We need to put all of the info about our theme In the comments and wordpress will pull it out and add the details on the front page for us and anyone that wants to use our theme. 

** front-page.php ** 
- > shows default home.

home.php - > works like front-page but would be for site front page and blogs.


readme.txt


======== STEP 2 =========
1. set up all the basic functions that we need, enqueue all of your styles. 
( prefix your own function name with something so that they do not clash with Wordpress's built in functions )

2. wp_head() & wp_footer() will inject our scripts and stylesheets. 

3. One that is done we can start work on our header and footer files. 

==== 



=== EXTRA TIPS ===

// trick to update the version with timestamp everytime we save. 
filemtime(THE_DIR_PATH . '/dist/style.css'),
 wp_enqueue_style('styles', THE_DIR_URI . '/dist/style.css', [], filemtime(THE_DIR_PATH . '/dist/style.css'), 'all');


 add bootstrap icons from sprite.
  <svg class="bi" width="32" height="32" fill="currentColor">
        <use xlink:href="<?php echo THE_DIR_URI; ?>/img/gen/bootstrap-icons.svg#heart-fill" />
</svg>