<?php

/**
 *
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 */

get_header(); ?>

<!-- <main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>         -->
  <?php
  if ('' !== get_post()->post_content) { ?>
    <div class="gutenberg-content">
      <?php if (
        is_search() ||
        (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))
      ) {
        the_excerpt();
      } else {
        the_content(__('Continue reading', 'twentytwenty'));
      } ?>
    </div>
      
  <?php }

  /**
   * Alle aktuellen Veranstaltungen im Freibad Mirke
   */
  showEvents("event");
  ?>

    
      
  </div>


</main><!-- #site-content -->
                
<?php get_footer(); ?>


