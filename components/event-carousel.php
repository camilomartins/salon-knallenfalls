
<?php
$args = [
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'ASC',
];

$loop = new WP_Query($args);

while ($loop->have_posts()):$loop->the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('ml-56 mb-[5rem] '); ?>>                                  
        <a class="flex  md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
              get_permalink()
          ); ?>"> 				
          <div class="relative min-w-max	">
              <?php  
                  $image = get_field('event-image');
                  $caption = $image['caption'];
                  $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                  if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                  }
                  
              ?>
              <div class="z-40 hover:animate-spin-normal font-bold font-serif text-xl w-40 h-40 text-black bg-white flex place-items-center rounded-full absolute -bottom-20 -right-20">
                  <div class=" aligncenter text-center ">
                      <?php 
                          $unixtimestamp = strtotime( get_field('event-date') );
                          // Display date in the format "l d F, Y".
                          //echo date_i18n( "d.F Y", $unixtimestamp );
                          the_field("event-date");
                      ?>															
                  </div>
              </div>              
          </div>	                  				  
          <div class="w-[500px] p-6 md:pl-16 md:pt-6 text-primary place-items-center flex">
              <div>
                  <h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                      <?php the_title(); ?>
                  </h2>  
              
                  <p class=" text-lg font-light leading-snug"> 
                      <?php 
                          $description = get_field('event-description'); 
                          echo substr($description, 0 , 230)." ...";
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