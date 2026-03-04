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
	<div class="relative    md:px-12 container shrink mx-auto">
		<div id="post-<?php the_ID(); ?>" <?php post_class('mb-24 flex flex-wrap md:flex-nowrap'); ?>> 
				<div class=" md:w-1/2 ">                                      
						<div class="relative">
							<div class="z-0 ">
								<?php  
								$image = get_field('event-image');
								$size = 'square_l'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
								echo wp_get_attachment_image( $image, $size );
								}								
								?>
							</div>
						
							<div class="p-2 md:p-4 drop-shadow-2xl z-40 hover:animate-spin-normal font-bold font-serif text-sm md:text-xl md:w-40 md:h-40 w-20 h-20  text-black bg-white flex place-items-center rounded-full absolute md:-bottom-20 md:-right-20 -bottom-10 -right-10">
								<div class="text-sm md:text-xl w-full h-full text-center flex place-items-center">
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
                    	<span class=""><?php showCopyright($image); ?></span>
				</div>
				  
				<div class="ml-0 md:ml-24 mt-12 md:mt-60 md:p-6 md:w-1/2 md:pl-16 md:pt-6 text-primary place-items-center">
                  	<div>
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
						<style>
						.ticket-btn, .ticket-btn-sold {
							position: relative;
							padding-left: 24px;
							padding-right: 24px;
						}
						.ticket-btn {
							background: radial-gradient(circle at 0% 50%, var(--ticket-bg, black) 8px, transparent 8.5px) left center / 12px 100% no-repeat,
							            radial-gradient(circle at 100% 50%, var(--ticket-bg, black) 8px, transparent 8.5px) right center / 12px 100% no-repeat,
							            linear-gradient(white, white);
						}
						.ticket-btn:hover { opacity: 0.85; }
						.ticket-btn-sold {
							background: radial-gradient(circle at 0% 50%, var(--ticket-bg, black) 8px, transparent 8.5px) left center / 12px 100% no-repeat,
							            radial-gradient(circle at 100% 50%, var(--ticket-bg, black) 8px, transparent 8.5px) right center / 12px 100% no-repeat,
							            linear-gradient(#d1d5db, #d1d5db);
						}
						</style>
						<?php if (get_field('event-sold-out')) : ?>
						<button class="ticket-btn-sold w-full mt-10 mb-4 py-3 font-serif font-bold text-gray-500 cursor-not-allowed" disabled>
							Ausverkauft
						</button>
						<?php else : ?>
						<a href="<?php the_field("event-ticket"); ?>" class="block">
							<div class="ticket-btn w-full mt-10 mb-4 py-3 font-serif font-bold text-black text-center transition-opacity">
								<span class="dashicons dashicons-tickets-alt"></span>  Ticket kaufen
							</div>
						</a>
						<?php endif; ?> 		
						<!-- <button class="mb-10 w-full btn-black btn "><span class="dashicons dashicons-calendar"></span>  Kalendereintrag</a></button> 			 -->
                  
						<p class="text-base md:text-lg font-normal leading-snug"> 
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


