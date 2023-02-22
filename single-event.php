<?php
/**
 * 
 * Template Name: Events [Default]
 * Template Post Type: event
 *
 */
?>
<?php get_header(); ?>

<div class="flex" id="post-<?php the_ID(); ?>" > <?php// post_class(); ?>
	<div class="relative flex py-6 md:py-16 md:px-12 z-10 container my-8 mx-auto  min-h-screen">
		<div id="post-<?php the_ID(); ?>" <?php post_class('mb-24'); ?>> 
				<div>
                  <?php if (has_post_thumbnail()): ?>
                    <div class="w-full md:w-4/5 ">
						<div class="relative">
							<?php  
								$image = get_field('event-image');
								$size = 'square_l'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
							?>
							<div class="hover:animate-spin-slow bold font-serif text-2xl w-40 h-40 text-black bg-white flex place-items-center rounded-full absolute -bottom-20 -right-20">
								<div class=" aligncenter text-center ">
									<?php 
										$unixtimestamp = strtotime( get_field('event-date') );
										// Display date in the format "l d F, Y".
										echo date_i18n( "d.F Y", $unixtimestamp );
									?>															
								</div>
							</div>
						</div>	
                    </div>
					</div>
                  <?php endif; ?>
				  
                  <div class="p-6 md:w-3/5 md:pl-16 md:pt-6 text-primary place-items-center">
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


