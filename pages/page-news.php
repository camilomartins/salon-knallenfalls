<?php

/**
 *
 * Template Name: Startseite
 *
 */
      get_header(); 
?>
<div id="carousel" class="scroll-smooth snap-x ml-[calc(50%-50vw)] mr-[calc(50%-50vw)] mt-12 md:mt-24 flex overflow-visible overflow-x-auto scrollbar-hide">
      <?php 
            showCarousel("event");      
      ?>      
</div>

<?php get_footer(); ?>


