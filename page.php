<?php get_header(); ?>

<main class="container max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>

<!-- PAGE TEMPLATE -->

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

		</main>

<?php
get_footer();
