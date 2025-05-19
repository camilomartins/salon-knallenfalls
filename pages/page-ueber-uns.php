<?php

/**
 *
 * Template Name: Über uns
 * Template Post Type: page
 *
 */

get_header(); ?>    
    <?php if ('' !== get_post()->post_content) { ?>            
        <div class="mt-20 max-w-screen-lg mx-auto">
            <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
                the_excerpt();
            } else {
                the_content(__('Continue reading', 'twentytwenty'));
            } ?>
        </div>
        
    <?php } ?>
              
<?php get_footer(); ?>


