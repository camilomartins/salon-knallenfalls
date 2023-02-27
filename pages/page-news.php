<?php

/**
 *
 * Template Name: Startseite
 *
 */

      get_header(); 
?>

<div id="veranstaltungen" class="scroll-smooth snap-x w-screen ml-[calc(50%-50vw)] mt-24 mx-auto flex overflow-x-auto scrollbar-hide h-full">
<?php 
      showCarousel("event");
?>      
</div>

<div id="info-popup" tabindex="-1" class="hidden fixed bottom-0  left-0 z-50 w-screen bg-white h-modal ">
  <div class=" text-black relative w-full h-full md:h-auto">
      <div class="pt-6 pl-[20%] items-center place-items-center relative shadow ">
          <div class="  mb-4 text-sm font-light ">
              <h3 class="mb-3 text-2xl font-serif font-bold">Newsletter
              <span class=" inline-block">X</span>
              </h3>
              
              <p>
                  Melde dich für unseren Newsletter an 
                  und verpasse keine Veranstaltungen!
              </p>
          </div>
          <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
              <div class="items-center space-y-4 ">
              <input class="text-xl font-light placeholder:text-gray-400 block bg-gray-200 w-full border py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1" placeholder="Deine E-Mail Adresse" type="email" name="search"/>

                  <button id="close-modal" type="button"  class="btn-black p-4">Abschicken</button>                              
              </div>
          </div>
      </div>
  </div>
</div>
                
<?php get_footer(); ?>


