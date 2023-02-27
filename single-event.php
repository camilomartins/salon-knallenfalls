<?php
/**
 * 
 * Template Name: Events [Default]
 * Template Post Type: event
 *
 */
?>
<?php get_header(); ?>

<div class="" id="post-<?php the_ID(); ?>" > <?php// post_class(); ?>
	<div class="relative    md:px-12 container shrink mx-auto  min-h-screen">
		<div id="post-<?php the_ID(); ?>" <?php post_class('mb-24 flex flex-wrap md:flex-nowrap'); ?>> 
				<div class=" md:w-1/2 ">                                      
						<div class="relative">
							<div class="z-0 bg-slate-300">
								<?php  
								$image = get_field('event-image');
								$size = 'square_l'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
								echo wp_get_attachment_image( $image, $size );
								}
								?>
							</div>
						
							<div class="z-50 -mt-16 md:-mr-0 -mr-3 object-center float-right hover:animate-spin-slow font-bold font-serif text-xl w-40 h-40 text-black bg-white  place-items-center relative rounded-full md:absolute md:-bottom-20  md:-right-20">
								<div class="w-40 h-40 text-center flex place-items-center">
									<div>
									<?php 
										$unixtimestamp = strtotime( get_field('event-date') );
										// Display date in the format "l d F, Y".
										the_field("event-date");
									?>	
									</div>														
								</div>
							</div>
						</div>
                    			                	
				</div>
				  
				<div class="ml-0 md:ml-24 mt-10 md:mt-60 md:p-6 md:w-1/2 md:pl-16 md:pt-6 text-primary place-items-center">
                  	<div class="">
				 		<h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-snug  mb-4">
                    		<?php the_title(); ?>
                  		</h2>
						<p class="text-primary">
							<?php 
								$venue = get_field('event-location');
								if( $venue ): ?>
									<?php echo esc_html( $venue->post_title ); ?>
							<?php endif; ?>								
							</p>
						<button class="w-full mt-10 mb-4 btn btn-white">
							<a href="<?php the_field("event-ticket"); ?>"><span class="dashicons dashicons-tickets-alt"></span>  Ticket kaufen</button></a> 		
						<!-- <button class="mb-10 w-full btn-black btn "><span class="dashicons dashicons-calendar"></span>  Kalendereintrag</a></button> 			 -->
                  
						<p class=" text-lg font-light leading-snug"> 
							<?php 
								the_field('event-description');								
							?>
						</p>																				
					</div> 
                  </div>
            </div>

		<div class="md:max-w-80">
			<?php the_content(); ?>

			<?php
				// the_post_thumbnail();
				wp_link_pages(
					array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			?>
		</div>
	</div>

</div>
<?php
get_footer();
?>


