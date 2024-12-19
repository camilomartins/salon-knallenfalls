
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>
<?php 
      newsletter_popup();   
?>                    


<footer id="colophon" class="mx-auto w-full max-w-[90vw]  inline-block fixed bottom-0 font-serif pb-2 text-slate-50" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>
	<div class="mx-auto justify-between md:grid  md:grid-cols-2 mt-8  text-sm flex ">
		<div class="text-primary md:block hover:text-white space-x-2 flex mr-auto ">
			<a  href="https://www.instagram.com/salonknallenfalls/" class="h-8 w-8 text-slate-200 font-normal">
				<!-- <span class="text-4xl dashicons dashicons-instagram mb-4 bg-transparent"></span> -->
				<svg class="w-8 h-8 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1,3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
			</a>
			<a  href="https://www.facebook.com/salonknallenfalls/" class="h-8 w-8 text-slate-200 font-normal">
				<!-- <span class="dashicons dashicons-facebook min-w"></span> -->
				<svg class="w-8 h-8 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
				
			</a>
		</div>		
		<?php 

		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations['secondary'] );
		wp_nav_menu(
			array(
				'container_id'    => 'secondary-menu ',
				'container_class' => 'md:p-4 lg:p-0 lg:block ',
				'menu_class'      => 'lg:flex lg:-mx-4 grid grid-cols-2 gap-4 float-right',
				'theme_location'  => 'secondary',
				'li_class'        => 'font-serif text-primary bold text-base md:text-xl lg:mb-0 lg:mx-4 hover:text-primary hover:underline hover:underline-offset-4 mr-32',
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
