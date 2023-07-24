<?php

/**
 *
 * Template Name: Startseite
 *
 */
      get_header(); 
      showCarousel("event");      
?>
<style>
.slider-container {
  width: 1000px;
  overflow-x: scroll;
  white-space: nowrap;
  margin-bottom:20px;
}

.slider {
  display: flex;
}

.slide {
  width: 100%;
  flex-shrink: 0;
  height: 200px;
}

.dot-navigation {
  display: flex;
}

.dot {
  width: 10px;
  height: 10px;
  background-color: white;
  margin: 0 5px;
  cursor: pointer;
}


</style>  

  <div class="slider-container">
  <div class="slider">
    <div class="slide" id="slide1">Slide 1</div>
    <div class="slide" id="slide2">Slide 2</div>
    <div class="slide" id="slide3">Slide 3</div>
    <div class="slide" id="slide4">Slide 4</div>
  </div>
</div>

<div class="dot-navigation">
  <div class="dot" onclick="scrollToSlide(1)"></div>
  <div class="dot" onclick="scrollToSlide(2)"></div>
  <div class="dot" onclick="scrollToSlide(3)"></div>
  <div class="dot" onclick="scrollToSlide(4)"></div>
</div>

<script>

function scrollToSlide(slideNumber) {
  const sliderContainer = document.querySelector('.slider-container');
  const slide = document.querySelector(`#slide${slideNumber}`);
  const slidePosition = slide.offsetLeft;
  
  sliderContainer.scrollLeft += 200;
}

</script>

<?php get_footer(); ?>


