<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	
	<?php 
	wp_enqueue_script("jquery");
	wp_head(); ?>

	<script type="text/javascript">
		// makes sure the whole site is loaded
		jQuery(window).load(function () {
			"use strict";
			// will first fade out the loading animation
			if(  jQuery( '.et-bfb' ).length <= 0 && jQuery( '.et-fb' ).length <= 0  ){ 
				jQuery(".status").fadeOut();
				// will fade out the whole DIV that covers the website.
				jQuery(".preloader").delay(1000).fadeOut("slow");
			}else{
				jQuery(".preloader").css('display','none');
			}
		}); 
	</script> 
</head>

<body <?php body_class( '  antialiased  bg-slate-80 bg-background' ); ?>>

<!-- Preloader -->
<!-- <div class="preloader">
<div class="status rotating"></div>
</div> -->

<!-- Echo Current Page Template -->
<?php do_action( 'tailpress_site_before' ); 
echo "<script>console.log('Template".get_page_template(). "' );</script>";
echo "<script>console.log('".get_home_url(). "' );</script>";
?>

<div id="page" class="min-h-screen flex flex-col ">

	<?php do_action( 'tailpress_header' ); ?>
	
	<header class="lg:bg-transparent z-20 ">
		<div class="mx-auto container lg:flex lg:items-center  py-[20px]">
			<div class="flex justify-between items-center mr-auto">
				<a class="-mt-[45px] -ml-[30px] md:m-0" href="<?php echo get_home_url(); ?>" alt="Zur Startseite">
				<svg class="animate-spin-slow" width="95" height="95" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:#060300;}</style></defs><g id="Ebene_2" data-name="Ebene 2"><g id="Ebene_1-2" data-name="Ebene 1"><circle class="cls-1" cx="47.5" cy="47.5" r="47.5"/><path class="cls-2" d="M47.5,73A25.5,25.5,0,0,1,26.24,61.65L34,56.5a16.23,16.23,0,1,0,27-18l7.72-5.15A25.49,25.49,0,0,1,47.5,73Z"/><polygon class="cls-2" points="26.48 44.87 26.01 38.51 29.66 38.24 26.34 36.69 29.02 30.91 43.44 37.6 42.34 43.68 26.48 44.87"/><path class="cls-2" d="M18.54,64.59a2.68,2.68,0,0,0-.22-1.52c-.2-.38-.5-.58-.86-.39s-.31.34-.24.75l.12.87a1.63,1.63,0,0,1-.91,1.9,2,2,0,0,1-2.8-1.09,4.29,4.29,0,0,1-.52-1.9L14.52,63a2.87,2.87,0,0,0,.28,1.47c.23.44.52.57.81.42a.52.52,0,0,0,.25-.63l-.12-.89a1.76,1.76,0,0,1,.88-2.06,2,2,0,0,1,2.85,1,4.5,4.5,0,0,1,.5,2Z"/><path class="cls-2" d="M11.49,60l-.57-1.76,5.41-3.81.48,1.51-1,.64.62,1.94,1.18,0,.49,1.5Zm3.71-1.49-.39-1.21-2.1,1.34Z"/><path class="cls-2" d="M16.24,53.59,10,54.44l-.21-1.58,4.88-.67-.35-2.52,1.37-.18Z"/><path class="cls-2" d="M9.34,46.05c.06-1.73,1.47-2.72,3.36-2.64s3.19,1.16,3.13,2.89-1.47,2.7-3.35,2.62S9.27,47.76,9.34,46.05Zm5,.2c0-.74-.5-1.26-1.69-1.31s-1.78.44-1.81,1.17.5,1.22,1.71,1.26S14.31,47,14.33,46.25Z"/><path class="cls-2" d="M12.87,40l3.52.87L16,42.42,9.89,40.9l.33-1.33,4.1-1.41-3.53-.88.38-1.56,6.13,1.52L17,38.6Z"/><path class="cls-2" d="M15.92,26.44l1.78,3c.61-.06,2,.12,2.27-.39a1.29,1.29,0,0,0,.12-.42l1.15.48a2.33,2.33,0,0,1-.28,1c-.65,1.14-2.32.68-3.34.81l-.29.51,2.1,1.19L18.64,34l-5.49-3.12.79-1.38,2.19,1.24.36-.65-1.57-2.32.79-1.4Z"/><path class="cls-2" d="M20.23,24.88,23,27.28,21.9,28.47l-4.73-4.18.9-1,4.29.65L19.63,21.5l1.07-1.21,4.73,4.18-.93,1Z"/><path class="cls-2" d="M23.76,17.69l1.48-1.12,5.39,3.85-1.27.95-.93-.72L26.8,21.88l.43,1.1L26,23.93Zm2.64,3,1-.76-1.95-1.55Z"/><path class="cls-2" d="M31.37,20.07l-2.9-5.61,1.42-.73,2.26,4.38,2.26-1.17L35,18.17Z"/><path class="cls-2" d="M35.89,17.87l-2-6,1.52-.49L37,16.05l2.41-.79.44,1.31Z"/><path class="cls-2" d="M40.68,16.39l-1-6.24,4.36-.66.21,1.38-2.85.43.15,1L43.89,12l.19,1.31-2.28.34L42,14.8l2.85-.43L45,15.73Z"/><path class="cls-2" d="M47.94,12.09l-.16,3.62-1.59-.07.29-6.3,1.37.06L50,13.14,50.2,9.5l1.6.08-.28,6.3-1.39-.06Z"/><path class="cls-2" d="M54.9,14.52l-.47,2L53,16.15,54.41,10l4.13,1-.32,1.36-2.65-.63-.35,1.44,2.24.53-.32,1.36Z"/><path class="cls-2" d="M61.56,12.11l1.71.73-.65,6.58-1.46-.62.17-1.17-1.88-.8-.74.92-1.45-.61Zm-1.29,3.78,1.17.5.36-2.46Z"/><path class="cls-2" d="M63.29,19.88l3.43-5.29,1.34.86-2.68,4.14L67.51,21l-.75,1.16Z"/><path class="cls-2" d="M67.44,22.71,71.66,18l1.19,1.06-3.3,3.66,1.89,1.71-.93,1Z"/><path class="cls-2" d="M72.58,25.14a2.62,2.62,0,0,0,.51,1.45c.26.33.6.47.92.21s.23-.39.09-.78l-.29-.83a1.63,1.63,0,0,1,.53-2,2,2,0,0,1,3,.53,4.38,4.38,0,0,1,.87,1.77L76.84,26a3,3,0,0,0-.56-1.4c-.31-.38-.62-.45-.87-.25a.51.51,0,0,0-.13.66l.29.85A1.77,1.77,0,0,1,75.1,28a2,2,0,0,1-3-.46,4.36,4.36,0,0,1-.85-1.83Z"/></g></g></svg>
				</a>

				<div class="lg:hidden mr-6 hover:underline-offset-4">
					<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
						<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
								<g id="icon-shape">
									<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											id="Combined-Shape"></path>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>

			<?php
			wp_nav_menu(
				array(
					'container_id'    => 'primary-menu',
					'container_class' => ' mt-8 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
					'menu_class'      => 'lg:flex lg:-mx-4 text-2xl',
					'theme_location'  => 'primary',
					'li_class'        => 'font-serif text-primary font-thin mb-4 lg:mb-0 md:text-2xl lg:mx-4 hover:text-2xl hover:underline hover:underline-offset-4',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>
		
	</header>

	<div id="content" class="site-content flex-grow text-dark container max-w-screen-lg mx-auto">

		<?php do_action( 'tailpress_content_start' ); ?>
		
