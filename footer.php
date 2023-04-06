
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>


<footer id="colophon" class="md:mt-16 font-serif site-footer pb-2 text-slate-50" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
	<div class="mx-auto justify-between md:grid  md:grid-cols-2 mt-8  text-sm flex">
		<div class="text-primary md:block hover:text-white space-x-4 flex mr-10 ">
			<a  href="https://www.instagram.com/salonknallenfalls/" class=" text-slate-200 font-normal">
				<span class="text-4xl dashicons dashicons-instagram mb-4 bg-transparent"></span>
			</a>
			<a  href="https://www.facebook.com/salonknallenfalls/" class="text-slate-200 font-normal text-4xl">
				<span class="dashicons dashicons-facebook"></span>
			</a>
		</div>		
		<?php 

		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations['secondary'] );
		wp_nav_menu(
			array(
				'container_id'    => 'secondary-menu',
				'container_class' => 'md:p-4 lg:p-0 lg:block ',
				'menu_class'      => 'lg:flex lg:-mx-4 grid grid-cols-2 gap-4 float-right',
				'theme_location'  => 'secondary',
				'li_class'        => 'font-serif text-primary bold text-base md:text-xl lg:mb-0 lg:mx-4 hover:text-primary hover:underline hover:underline-offset-4 mr-4',
				'fallback_cb'     => false,
			)
		);
		?>		
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
