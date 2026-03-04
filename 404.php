<?php

/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div class="mt-20 max-w-screen-lg mx-auto min-h-[60vh] flex items-center">
	<div class="w-full">
		<h1 class="font-serif font-extrabold text-primary text-xl md:text-2xl mb-4">404</h1>
		<p class="text-base md:text-lg font-normal text-primary mb-8">
			<?php _e( 'Entschuldige, das konnten wir leider nicht finden.', 'salonknallenfalls' ); ?>
		</p>
		<a href="<?php echo get_bloginfo( 'url' ); ?>" class="btn btn-black inline-block">
			<?php _e( 'Zurück zur Startseite', 'salonknallenfalls' ); ?>
		</a>
	</div>
</div>

<?php get_footer(); ?>
