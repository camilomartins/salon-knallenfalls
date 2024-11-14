<?php

/**
 *
 * Template Name: Startseite
 *
 */
      get_header(); 
?>
<div id="carousel" class="min-h-[60vh] scroll-smooth ml-[calc(50%-50vw)] mr-[calc(50%-50vw)] mt-12 md:mt-24 flex overflow-x-scroll scrollbar-hide">
      <?php 
            showCarousel("event");      
      ?>      
</div>

<?php get_footer(); ?>


