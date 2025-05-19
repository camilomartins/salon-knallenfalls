<?php

/**
 *
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 */

get_header(); ?>
  <?php
  if ('' !== get_post()->post_content) { ?>
    <div class="gutenberg-content">
      
      <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
      	the_excerpt();
      } else {
      	the_content(__('Continue reading', 'twentytwenty'));
      } ?>
    </div>
      
  <?php }
  

  /**
   * Veranstaltungen im Salon Knallenfalls
   */
  showEvents("event");
  ?>
                
<?php get_footer(); ?>


