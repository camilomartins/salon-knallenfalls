<?php

/**
 *
 * Template Name: Neuigkeiten
 *
 */

      get_header(); 
?>

<?php
// --- News Posts with Year & Spielstätte Filters ---
$args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'order'          => 'DESC',
];
$loop = new WP_Query($args);

// Collect unique years and locations for filter options
$years = [];
$locations = [];
if ($loop->have_posts()) {
    foreach ($loop->posts as $p) {
        $year = get_the_date('Y', $p->ID);
        if ($year) {
            $years[$year] = $year;
        }
        $venue = get_field('event-location', $p->ID);
        if ($venue && isset($venue->post_title)) {
            $locations[$venue->ID] = $venue->post_title;
        }
    }
    krsort($years);
    asort($locations);
}
?>

<div id="veranstaltungen" class="mt-12 md:mt-24 mx-auto container max-w-screen-lg">

    <?php if ($loop->have_posts()) : ?>
    <!-- Filters -->
    <div class="grid grid-cols-2 md:flex md:flex-wrap gap-2 md:gap-4 mb-6 md:mb-8">
        <select id="filter-year" class="bg-transparent text-white text-xs md:text-sm font-serif px-2 py-1 md:px-4 md:py-2 flex-1 md:flex-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-black">
            <option value="">Jahre</option>
            <?php foreach ($years as $y) : ?>
                <option value="<?php echo esc_attr($y); ?>"><?php echo esc_html($y); ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($locations)) : ?>
        <select id="filter-location" class="bg-transparent text-white text-xs md:text-sm font-serif px-2 py-1 md:px-4 md:py-2 flex-1 md:flex-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-black">
            <option value="">Spielstätten</option>
            <?php foreach ($locations as $loc) : ?>
                <option value="<?php echo esc_attr($loc); ?>"><?php echo esc_html($loc); ?></option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
    </div>

    <?php
    while ($loop->have_posts()) : $loop->the_post();
        $post_year = get_the_date('Y');
        $venue = get_field('event-location');
        $venue_name = ($venue && isset($venue->post_title)) ? $venue->post_title : '';
    ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('mb-24 news-post-card'); ?>
             data-year="<?php echo esc_attr($post_year); ?>"
             data-location="<?php echo esc_attr($venue_name); ?>">
               <a class="flex flex-wrap md:bg-transparent md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                   get_permalink()
               ); ?>"> 
                 
             <div class="w-full md:w-2/5 ">
               <div class="relative">
                 <?php  
                   if (has_post_thumbnail()){
                    the_post_thumbnail('square_s');
                   } 
                   showCopyright(get_post_thumbnail_id());
                    ?>                                                               
               </div>	
             </div>                  				  
                 <div class="w-full pt-4 md:p-6 md:w-3/5 md:pl-16 md:pt-6 place-items-center flex">
                     <div>
                                  <h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                           <?php 
                        the_date();
                        echo("<br>");
                        the_title(); 
                        echo("<br>");                          
                       ?>
                             </h2>  
                     
                       
                       <?php 
                         $venue = get_field('event-location');
                         if( $venue ): ?>
                            <span class=" text-primary text-xl">
                                <p>
                                    <?php echo esc_html( $venue->post_title ); ?>
                                </p>
                            </span>                  
                         <?php endif; ?>                                                     
                       
                       <p class=" text-lg font-light leading-snug"> 
                           <?php 						   
                               the_excerpt();						   
                           ?>
                       </p>
                       <br>
                       <button>Weiterlesen</button>
                   </div> 
                 </div>
               </a>
           </div>
           
       <?php
     endwhile;
     wp_reset_postdata();
     ?>

    <div id="no-results-message" class="hidden text-center py-8 text-gray-400 font-serif">
        Keine Beiträge gefunden.
    </div>

    <script>
    (function() {
        var yearSelect = document.getElementById('filter-year');
        var locationSelect = document.getElementById('filter-location');
        var cards = document.querySelectorAll('.news-post-card');
        var noResults = document.getElementById('no-results-message');

        function filterPosts() {
            var selectedYear = yearSelect ? yearSelect.value : '';
            var selectedLocation = locationSelect ? locationSelect.value : '';
            var visibleCount = 0;

            cards.forEach(function(card) {
                var matchYear = !selectedYear || card.getAttribute('data-year') === selectedYear;
                var matchLocation = !selectedLocation || card.getAttribute('data-location') === selectedLocation;

                if (matchYear && matchLocation) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (noResults) {
                noResults.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        if (yearSelect) yearSelect.addEventListener('change', filterPosts);
        if (locationSelect) locationSelect.addEventListener('change', filterPosts);
    })();
    </script>

    <?php else : ?>
        <p class="text-gray-400">Keine Beiträge vorhanden.</p>
    <?php endif; ?>
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
