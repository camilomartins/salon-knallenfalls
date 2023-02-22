<div class=" " id="post-<?php the_ID(); ?>" > <?php// post_class(); ?>
	<h1 class="text-primary">Single Content</h1>
	<div class=" z-0 absolute left-0 right-0 bottom-0 top-[112px] lg:top-[152px]">
		
	</div>

	<div class="relative py-6 md:py-16 md:px-12 z-10 container my-8 mx-auto mt-[20vh] min-h-screen max-w-screen-lg">
		<header class="mb-4">
			<?php the_post_thumbnail("fullwidth"); ?>	
			<br>
			<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-primary"><?php echo get_the_date(); ?></time>
			<?php the_title( sprintf( '<h1 class="entry-title  text-xl lg:text-4xl font-extrabold leading-tight mb-1 text-red"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>

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
