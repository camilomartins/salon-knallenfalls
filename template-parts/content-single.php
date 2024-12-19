<div class="" id="post-<?php the_ID(); ?>" > <?php// post_class(); ?>
	<div class="relative    md:px-12 container shrink mx-auto  min-h-screen">
		<div id="post-<?php the_ID(); ?>" <?php post_class('mb-24 flex flex-wrap md:flex-nowrap'); ?>> 
				<div class=" md:w-1/2 ">                                      
					<div class="relative">
						<div class="z-0">
							<?php  
							if(has_post_thumbnail( $post)){
								the_post_thumbnail("square_l");
							}							
							
							?>
						</div>																		
					</div>                    			                	
					<span><?php showCopyright(get_post_thumbnail_id()); ?></span>
				</div>				  
				<div class="ml-0 md:ml-24 mt-10 md:mt-60 md:p-6 md:w-1/2 md:pl-16 md:pt-6 text-primary place-items-center">
                  	<div class="">
				 		<h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-snug  mb-4">
                    		<?php the_title(); ?>
                  		</h2>												                  
						<p class=" text-lg font-light leading-snug"> 
							<?php 
								the_content();
							?>
						</p>																				
					</div> 
                  </div>
            </div>
	</div>
</div>
