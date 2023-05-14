<?php

/**
 *
 * Template Name: Presse
 * Template Post Type: page
 *
 */

get_header(); ?>
<div class="flex font-serif font-bold justify-between">
	<span class=" mb-3 text-xl md:text-2xl">Newsletter abonnieren</span>		
</div>
<!-- Begin Mailchimp Signup Form -->													
<form class="space-y-2 md:mb-64 mb-24" action="https://salonknallenfalls.us13.list-manage.com/subscribe/post?u=a1700f15a4c2930db37b084f1&amp;id=fa33d1b16b&amp;f_id=00fa96e2f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>					
	<p>
    	Melde dich für unseren Newsletter an 
    	und verpasse keine Veranstaltungen!	
  	</p>									
  	<div class="mc-field-group">
		<label for="mce-EMAIL">
			Email Addresse  
			<span class="asterisk">*</span>
		</label>
		<input placeholder="Gib hier deine E-Mail Adresse ein" type="email" value="" name="EMAIL" class="text-base w-full font-serif font-light placeholder:text-gray-400 block bg-gray-200 border py-2 pl-2 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 required email" id="mce-EMAIL" required>
		<span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
  	</div>
  	<div id="mce-responses" class="clear foot">
    	<div class="response" id="mce-error-response" style="display:none"></div>
    	<div class="response" id="mce-success-response" style="display:none"></div>
  	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
  	<div style="position: absolute; left: -5000px;" aria-hidden="true">
    	<input type="text" name="b_a1700f15a4c2930db37b084f1_fa33d1b16b" tabindex="-1" value="">
  	</div>
  	<div class="optionalParent">
    	<div class="clear foot">
      		<input type="submit" value="Anmelden" name="subscribe" id="mc-embedded-subscribe" class="cursor btn-black p-4" >											
    	</div>
  </div>
</form>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->																							
  

<!-- <main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content>         -->
  <?php if ('' !== get_post()->post_content) { ?>
    <div class="gutenberg-content">
      <?php
        if (
                is_search() ||
                (!is_singular() &&
                  'summary' === get_theme_mod('blog_content', 'full'))
              ) {
                the_excerpt();
              } else {
                the_content(__('Continue reading', 'twentytwenty'));
            }
      ?>
    </div>
      
  <?php } 

    ?>

    


</main><!-- #site-content -->
                
<?php get_footer(); ?>


