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
<script>
    const carousel = document.getElementById('carousel');

    console.log(carousel);
    // Variablen für das Scrollen
    let scrollPosition = 0;
    const scrollSpeed = 2;  // Geschwindigkeit der Animation (px pro Frame)
    const maxScroll = scrollingDiv.scrollWidth;  // Die Breite des gesamten Inhalts
    const containerWidth = scrollingDiv.offsetWidth;  // Die Breite des Containers

    // Die Animation ID für requestAnimationFrame speichern
    let scrollFrame;

    // Funktion zum Steuern der Animation
    function animateScroll() {
      // Die Scroll-Position wird um die Geschwindigkeit erhöht
      scrollPosition += scrollSpeed;

      // Wenn das Ende erreicht ist, zurück zum Anfang
      if (scrollPosition >= maxScroll) {
        scrollPosition = 0;
      }

      // Setzt die horizontale Scroll-Position des Divs
      scrollingDiv.scrollLeft = scrollPosition;

      // Nächsten Frame anfordern
      scrollFrame = requestAnimationFrame(animateScroll);
    }
    console.log(scrollPosition);
    console.log(containerWidth);

    // Startet die Animation
    animateScroll();

    // Pause beim Hover oder Touch
    scrollingDiv.addEventListener('mouseenter', () => {
      cancelAnimationFrame(scrollFrame);  // Animation stoppen
    });

    scrollingDiv.addEventListener('mouseleave', () => {
      animateScroll();  // Animation wieder starten
    });

    // Pausieren bei Touch-Interaktionen
    scrollingDiv.addEventListener('touchstart', () => {
      cancelAnimationFrame(scrollFrame);  // Animation stoppen
    });

    scrollingDiv.addEventListener('touchend', () => {
      animateScroll();  // Animation wieder starten
    });
  </script>

<?php get_footer(); ?>


