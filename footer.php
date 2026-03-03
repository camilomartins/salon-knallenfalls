	</main>
		<?php do_action('tailpress_content_end'); ?>
	</div>

	<?php do_action('tailpress_content_after'); ?>
	<?php newsletter_popup(); ?>                    
	<footer id="colophon" class="pt-2 md:pt-4 bg-black w-full inline-block md:fixed left-0 md:pl-24 md:pr-24 pl-8 pr-8 bottom-0 pb-4 font-serif text-slate-50 relative z-50" role="contentinfo">
		<?php do_action('tailpress_footer'); ?>			
		<?php
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object($locations['secondary']);
			wp_nav_menu([
				'container_id' => 'secondary-menu ',
				'container_class' => 'md:p-4 lg:p-0 lg:block block ',
				'menu_class' => 'lg:flex lg:-mx-4 place-items-center grid grid-cols-2 md:grid-cols-3 gap-4 md:float-right',
				'theme_location' => 'secondary',
				'li_class' => 'font-serif text-primary bold text-xs md:text-xl lg:mb-0 lg:mx-4 hover:text-primary hover:underline hover:underline-offset-4 md:mr-32',
				'fallback_cb' => false,
			]);
		?>		
		</div>
	</footer>

	</div>
	<?php wp_footer(); ?>
</body>
</html>
