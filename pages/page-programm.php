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
  // showCarousel('event');
  ?>
  <div id="veranstaltungen" class="mt-24 mx-auto container max-w-screen-lg ">
      <?php
      $args = [
      	'post_type' => "event",
      	'post_status' => 'publish',
      	'posts_per_page' => 10,
        'meta_key'          => 'event-date',
        'orderby'           => 'meta_value',      	
      	'order' => 'ASC',
      ];

      $loop = new WP_Query($args);

      while ($loop->have_posts()):$loop->the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('mb-24'); ?>>
                <a class="flex flex-wrap md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                	get_permalink()
                ); ?>"> 
                  
              <div class="w-full md:w-2/5 ">
                <div class="relative">
                  <?php  
                    $image = get_field('event-image');
                    $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                    }
                  ?>							
                </div>	
              </div>                  				  
                  <div class="w-full p-6 md:w-3/5 md:pl-16 md:pt-6 place-items-center flex">
                  	<div>
				 		          <h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                    		<?php 
                          the_field("event-date");
                          echo("<br>");
                          the_title(); 
                          echo("<br>");                          
                        ?>
                  		</h2>  
                      <span class=" text-secondary text-xl">
                        <p>
                        <?php 
                          $venue = get_field('event-location');
                          if( $venue ): ?>
                          <?php echo esc_html( $venue->post_title ); ?>
                          <?php endif; ?>								
                        </p>
                        </span>                  
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
  ?>

    
      
  </div>


</main><!-- #site-content -->
                
<?php get_footer(); ?>


