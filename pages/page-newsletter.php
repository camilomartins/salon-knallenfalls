<?php

/**
 *
 * Template Name: Newsletter
 * Template Post Type: page
 *
 */

get_header(); ?>    
    <?php if ('' !== get_post()->post_content) { ?>            
        <div class="mt-20 max-w-screen-lg mx-auto">
            <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
                the_excerpt();
            } else {
                the_content(__('Continue reading', 'twentytwenty'));
            } ?>
        </div>
        
    <?php } ?>

<div class="mt-20 max-w-screen-lg mx-auto md:mb-64 mb-24">
	<div class="flex font-serif font-bold justify-between">
		<span class="mb-3 text-xl md:text-2xl">Newsletter abonnieren</span>		
	</div>
	<div id="page-thank-you-message" class="hidden">
		Vielen Dank für Ihre Anmeldung!
		Sie erhalten in Kürze eine Bestätigung per E-Mail.
	</div>

	<form id="page-newsletter-form" class="space-y-4">
		<p>
			Melde dich für unseren Newsletter an und verpasse keine Veranstaltungen!
		</p>
		<div class="grid grid-cols-[1fr_auto] w-full">
			<div>
				<input class="bg-gray-200 px-2 h-10 w-full text-black" type="email" id="page-email" name="email" required placeholder="hallo@salonknallenfalls.de">
			</div>
			<div>
				<button class="w-full whitespace-nowrap text-base font-serif font-bold h-10 px-6 hover:border-1 bg-black text-white hover:text-black hover:bg-white hover:border-black" type="submit">Abschicken</button>
			</div>
		</div>
		<div class="flex">
			<input class="accent-black block mr-4" type="checkbox" id="page-terms" name="terms" required>
			<label class="" for="page-terms">Ich akzeptiere die <a href="/datenschutzerklaerung" class="terms-link" target="_blank">Datenschutzbestimmungen</a></label>
		</div>
	</form>

	<script>
	document.getElementById('page-newsletter-form').addEventListener('submit', function(event) {
		event.preventDefault();

		const email = document.getElementById('page-email').value;
		const body = new URLSearchParams({ email: email });

		fetch('https://app.loops.so/api/newsletter-form/cm3irxhbr004uwp14325ynq4v', {
			method: 'POST',
			body: body,
		})
		.then(response => {
			if (!response.ok) {
				throw new Error('Netzwerkfehler: ' + response.status);
			}
			return response.json();
		})
		.then(data => {
			document.getElementById('page-newsletter-form').style.display = 'none';
			document.getElementById('page-thank-you-message').classList.remove('hidden');
		})
		.catch(error => {
			console.error('Newsletter-Fehler:', error);
		})
	});
	</script>
</div>
              
<?php get_footer(); ?>
