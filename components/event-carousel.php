<?php ?>

<div id="carousel" class="scroll-smooth snap-x ml-[calc(50%-50vw)] mr-[calc(50%-50vw)] mt-12 md:mt-24 flex overflow-visible overflow-x-auto scrollbar-hide">
      <?php
      $args = [
      	'post_type' => "event",
      	'post_status' => 'publish',
      	'posts_per_page' => 10,
      	'meta_key'          => 'event-date',                
		'meta_value'   => date( "Ymd" ), // change to how "event date" is stored
		'meta_compare' => '>=',            
		'orderby'   => 'meta_value',  
      	'order' => 'ASC',
      ];

      $loop = new WP_Query($args);

      while ($loop->have_posts()):$loop->the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('first:md:ml-[30%] first:ml-[20%] last:mr:mr-[30%] last:mr-[20%] mr-16 md:mr-32 snap-center md:mb-44 mb-[2rem]'); ?>>                                  
		  	<a class="flex md:flex-nowrap flex-wrap md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                	get_permalink()
                ); ?>"> 				
				<div class="relative md:min-w-max w-64">
					<?php  
						$image = get_field('event-image');
						$size = 'square_s'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
					?>
					<div class="p-4 drop-shadow-2xl z-40 hover:animate-spin-slow font-bold font-serif text-base md:text-xl md:w-40 md:h-40 w-28 h-28  text-black bg-white flex place-items-center rounded-full absolute md:-bottom-20 md:-right-20 -bottom-14 -right-14">
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
				<div class="mt-12 md:w-[36rem] p-6 md:pl-16 md:pt-6 text-primary place-items-center flex">
					<div>
						<h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-4">
							<?php the_title(); ?>
						</h2>  
						<!-- <p>
							<?php 
								$venue = get_field('event-location');
								if( $venue ): ?>
									<?php echo esc_html( $venue->post_title ); ?>
								<?php endif; 								
							?>											
						</p> -->
						<p class="md:block hidden text-lg font-light leading-snug"> 
							<?php 
								$description = get_field('event-description'); 
								echo substr($description, 0 , 230)." ...";
							?>
						</p>
						<br>						
						<button>Mehr erfahren</button>
					</div> 
				</div>
                </a>
            </div>
		
		<?php
      endwhile;
	  ?>
	  </div>
	  <div class="mb-[2rem] mx-auto w-full place-content-center flex space-x-2">
	  <?php
	  	$count_posts = $loop->found_posts; 
		for ($i = 0; $i < $count_posts; $i++):?>
  			<div class="w-5 h-5 inline-block rounded-full border-1 hover:bg-white cursor-pointer border-white"></div>
		<?php
		endfor;
		?>
		</div>
		<?php
      	wp_reset_postdata();
        ?>