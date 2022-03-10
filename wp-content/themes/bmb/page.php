<?php /* Template Name: createpage */ ?>
 
<?php get_header(); ?>
 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();?>
 
            
            <?php 
            // Include the page content template.
                get_template_part('template-parts/create', 'page' ); ?>

 
            <!-- // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            } -->
 
        <?php endwhile; // end of the loop. ?>
        
 
    </main><!-- .site-main -->
 
    <!-- <php get_sidebar( 'content-bottom' ); ?> -->
 
</div><!-- .content-area -->
 
<!-- <php get_sidebar(); ?> -->
<?php get_footer(); ?>
