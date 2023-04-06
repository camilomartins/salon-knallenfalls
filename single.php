<?php get_header(); ?>

	<!-- <div class="container my-8 mx-auto"> -->

	<!-- Single Block post template  -->

	<?php if ( have_posts() ) : ?>
		<!-- <h1>Single PHP File</h1> -->
		<?php	
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php endwhile; ?>

	<?php endif; ?>

	<!-- </div> -->

<?php
get_footer();
