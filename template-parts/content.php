
<div id="post-<?php the_ID(); ?>" <?php post_class( ' ' ); ?>>


	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<div class="w-auto">
			<?php the_post_thumbnail('large'); ?>
		</div>
	<?php endif; ?>



	<?php if( '' !== get_post()->post_content ) { ?>

		<?php
			// Gutenberg
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
			//	the_excerpt();
			} else {
				//the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
		?>

	<?php } ?>


	<?php if ( is_search() || is_archive() ) : ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

	<?php else : ?>

		<div>
			<?php
			/* translators: %s: Name of current post */
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

		</div>
