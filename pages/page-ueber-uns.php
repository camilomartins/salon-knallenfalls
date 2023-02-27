<?php

/**
 *
 * Template Name: Über uns
 * Template Post Type: page
 *
 */

get_header(); ?>

<main class="max-w-screen-lg mx-auto" role="main">
    
<div class="">
        <?php if ('' !== get_post()->post_content) { ?>            
            <div class="max-w-screen-lg">
                <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
                	the_excerpt();
                } else {
                	the_content(__('Continue reading', 'twentytwenty'));
                } ?>
            </div>
            
        <?php } ?>
  </div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>


