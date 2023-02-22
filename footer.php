
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>


<footer id="colophon" class="font-serif site-footer bg-background pt-12 pb-6 text-slate-50 " role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
	<div class="container max-w-screen-xl  mx-auto justify-between md:grid  md:grid-cols-2 mt-8  text-sm ">


		<div class="text-primary md:block hover:text-white space-x-4">
			<a  href="https://www.instagram.com/freibad_mirke/" class=" text-slate-200 font-normal"><span class="text-4xl dashicons dashicons-instagram mb-4 "></span></a>
			<a  href="https://de-de.facebook.com/mirkerfreibad/" class="text-slate-200 font-normal text-4xl"><span class="dashicons dashicons-facebook"></span></a>
		</div>

		<div class="">
			<?php 

			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object( $locations['secondary'] );
			wp_nav_menu(
				array(
					'container_id'    => 'secondary-menu',
					'container_class' => ' md:mt-4 md:p-4 lg:mt-0 lg:p-0 lg:block',
					'menu_class'      => 'lg:flex lg:-mx-4 float-right',
					'theme_location'  => 'secondary',
					'li_class'        => 'font-serif text-primary bold text-2xl mb-4 lg:mb-0 md:text-base lg:mx-4 hover:text-primary hover:underline hover:decoration-wavy hover:underline-offset-4',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>
		
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
