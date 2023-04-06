<?php

/**
 *
 * Template Name: Startseite
 *
 */
      get_header(); 
?>
<div id="veranstaltungen" class="scroll-smooth snap-x w-screen ml-[calc(50%-50vw)] mt-24 mx-auto flex overflow-x-auto scrollbar-hide">
      <?php 
            showCarousel("event");      
      ?>      
</div>
<?php 
    //   newsletter_popup();   
?>                    
<?php get_footer(); ?>


