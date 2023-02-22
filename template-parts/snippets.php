 
 <?php //if ( is_search() || is_archive() ) : ? ?> 

<div class="entry-summary">
   <?php //the_excerpt(); ?>
   </div>

<?php  else : ?>

    <div class="entry-content">
       <?php 
       the_content(
           sprintf(
               __( 'Continue reading %s', 'tailpress' ),
               the_title( '<span class="screen-reader-text">"', '"</span>', false )
           )
       );

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


<?php endif; ?> 



<!-- Preview -->


<article id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>

	<a class="flex" href="<?php echo  esc_url( get_permalink())?>"> 

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="w-2/5">
		    	<?php the_post_thumbnail('large'); ?>
			</div>
		<?php endif; ?>

		<div class="w-3/5 pl-8">
			<div class="entry-header mb-4">
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class=" text-primary text-sm font-light "><?php echo get_the_date(); ?></time>
				<h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-1">
					<?php the_title(); ?>
				</h2>
			</div>

			<div class="entry-summary font-light leading-6">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</a>
</article>



<h2>Aktuelles aus dem Freibad</23>
      <?php
      $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
      ];

      $loop = new WP_Query($args);

      while ($loop->have_posts()):
        $loop->the_post(); ?>
 
          
      <article id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>
        <a class="flex" href="<?php echo  esc_url( get_permalink())?>"> 
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <div class="w-2/5">
                <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>

          <div class="w-3/5 pl-8">
            <div class="mb-4">
              <p class=" text-gray-700 text-sm font-light "><?php echo get_the_author(); ?> am <?php the_date(); ?></p>
              <h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-1">
                <?php the_title(); ?>
              </h2>
            </div>

            <div class="font-light leading-6">
              <?php the_excerpt(); ?>
            </div>

            <!-- <a href="<?php //echo get_permalink(); ?>"><button>Weiterlesen</button></a> -->
          </div>
        </a>
      </article>

      <?php
        endwhile;
        wp_reset_postdata();
      ?>

    </div>