<?php

/**
 * Theme setup.
 */
function tailpress_setup()
{
	add_theme_support('title-tag');

	register_nav_menus([
		'primary' => __('Hauptmenü', 'salonknallenfalls'),
		'secondary' => __('Footer', 'salonknallenfalls'),
	]);

	add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('tailpress', tailpress_asset('css/app.css'), [], $theme->get('Version'));
	wp_enqueue_script('tailpress', tailpress_asset('js/app.js'), [], $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(), get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3);

/**
 * Call setup files for Custom Post Types
 *
 * @since Quartiersplattform 1.0
 *
 * @return void
 */
require_once dirname(__FILE__) . '/advanced-custom-fields/blocks.php'; # Custom Blocks
require_once dirname(__FILE__) . '/advanced-custom-fields/veranstaltungen.php'; # Veranstaltungen ACF und CPT
require_once dirname(__FILE__) . '/advanced-custom-fields/venues.php'; # Spielstätten ACF und CPT
require_once dirname(__FILE__) . '/advanced-custom-fields/pages.php'; # Seiten erstellen
/**
 * Update Post Title from an ACF field value on post save.
 *
 * Triggers on save, edit or update of published posts.
 * Works in "Quick Edit", but not bulk edit.
 */

function sync_acf_post_title($post_id, $post, $update)
{
	if (function_exists('get_field')) {
		$acf_title = get_field('vorname', $post_id);
		if (!empty($acf_title)) {
			if ($title) {
				$title = $acf_title;
			} else {
				$title = get_field('vorname') . ' ' . get_field('nachname');
			}

			$content = [
				'ID' => $post_id,
				'post_title' => $title,
			];
			remove_action('save_post', 'sync_acf_post_title'); // prevent a loop
			wp_update_post($content);
		}
	}
}
add_action('save_post', 'sync_acf_post_title', 10, 3);

/**
 *
 * Add Menu Items and genereate if not already done
 *
 */

function setup_main_menu()
{
	// Check if the menu exists
	$menu_name = 'Hauptmenü';
	$menu_exists = wp_get_nav_menu_object($menu_name);

	// If it doesn't exist, let's create it.
	if (!$menu_exists) {
		$menu_id = wp_create_nav_menu($menu_name);

		// Set up default menu items
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('News', 'salonknallenfalls'),
			'menu-item-url' => home_url('/neuigkeiten/'),
			'menu-item-status' => 'publish',
		]);
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Programm', 'salonknallenfalls'),
			'menu-item-url' => home_url('/programm/'),
			'menu-item-status' => 'publish',
		]);
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Über uns', 'salonknallenfalls'),
			'menu-item-url' => home_url('/ueber-uns/'),
			'menu-item-status' => 'publish',
		]);
		$locations = get_theme_mod('nav_menu_locations');
		$locations['primary'] = $menu_id;
		set_theme_mod('nav_menu_locations', $locations);
	}
}

function setup_footer_menu()
{
	// Check if the menu exists
	$menu_name = 'Footer';
	$menu_exists = wp_get_nav_menu_object($menu_name);

	// If it doesn't exist, let's create it.
	if (!$menu_exists) {
		$menu_id = wp_create_nav_menu($menu_name);

		// Set up default menu items
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Newsletter', 'salonknallenfalls'),
			'menu-item-url' => home_url('/newsletter/'),
			'menu-item-status' => 'publish',
		]);
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Presse', 'salonknallenfalls'),
			'menu-item-url' => home_url('/presse/'),
			'menu-item-status' => 'publish',
		]);
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Datenschutz', 'salonknallenfalls'),
			'menu-item-url' => home_url('/datenschutzerklaerung/'),
			'menu-item-status' => 'publish',
		]);
		wp_update_nav_menu_item($menu_id, 0, [
			'menu-item-title' => __('Impressum', 'salonknallenfalls'),
			'menu-item-url' => home_url('/impressum/'),
			'menu-item-status' => 'publish',
		]);
		$locations = get_theme_mod('nav_menu_locations');
		$locations['secondary'] = $menu_id;
		set_theme_mod('nav_menu_locations', $locations);
	}
}

add_action('after_setup_theme', 'setup_main_menu', 6);
add_action('after_setup_theme', 'setup_footer_menu', 6);

/**
 *
 * Assign Templates to pages
 *
 */

function get_custom_post_type_template($page_template)
{
	global $post;
	$title = get_the_title();
	$post_states = [];
	$prefix = 'Salon Knallenfalls – ';
	if ($title == 'News') {
		$post_states[] = $prefix . 'News';
		$page_template = get_stylesheet_directory() . '/pages/page-news.php';
	} elseif ($title == 'Programm') {
		$post_states[] = $prefix . 'Programm';
		$page_template = get_stylesheet_directory() . '/pages/page-programm.php';
	} elseif ($title == 'Über uns') {
		$post_states[] = $prefix . 'Über uns';
		$page_template = get_stylesheet_directory() . '/pages/page-ueber-uns.php';
	} elseif ($title == 'Presse') {
		$post_states[] = $prefix . 'Presse';
		$page_template = get_stylesheet_directory() . '/pages/page-presse.php';
	} elseif ($title == 'Newsletter') {
		$post_states[] = $prefix . 'Newsletter';
		$page_template = get_stylesheet_directory() . '/pages/page-newsletter.php';
	} elseif ($title == 'Neuigkeiten') {
		$post_states[] = $prefix . 'Neuigkeiten';
		$page_template = get_stylesheet_directory() . '/pages/page-news-posts.php';
	} 

	if (doing_filter('page_template') && !empty($page_template)) {
		return $page_template;
	} elseif (doing_filter('display_post_states') && !empty($post_states)) {
		return $post_states;
	}
}
add_filter('page_template', 'get_custom_post_type_template', 10, 1);
add_filter('display_post_states', 'get_custom_post_type_template', 1, 1);

/**
 *
 * Create Pages After Setup
 *
 */

add_action('after_setup_theme', 'create_pages', 2);
function create_pages()
{
	$pages = [
		0 => ['title' => __('Startseite', 'salonknallenfalls'), 'slug' => 'startseite'],
		1 => ['title' => __('Programm', 'salonknallenfalls'), 'slug' => 'programm'],
		2 => ['title' => __('Über uns', 'salonknallenfalls'), 'slug' => 'ueber-uns',],
		3 => ['title' => __('Presse', 'salonknallenfalls'), 'slug' => 'Presse'],
		4 => ['title' => __('Impressum', 'salonknallenfalls'),'slug' => 'impressum',],
		5 => ['title' => __('Newsletter', 'salonknallenfalls'),'slug' => 'impressum',],
		6 => ['title' => __('Neuigkeiten', 'salonknallenfalls'),'slug' => 'neuigkeiten',],
	];

	for ($i = 0; $i < count($pages); $i++) {
		$my_post = [];
		$my_post = [
			'post_title' => wp_strip_all_tags($pages[$i]['title']),
			'post_status' => 'publish',
			'post_content' => '',
			'post_author' => 1,
			'post_type' => 'page',
		];

		if (!function_exists('post_exists')) {
			require_once ABSPATH . 'wp-admin/includes/post.php';
		}
		if (post_exists($pages[$i]['title'], '', '', 'page') === 0) {
			# create post
			wp_insert_post($my_post, true);
		}
	}
}

/**
 *
 * Shorten Excerpt Length for posts
 *
 */

function my_excerpt_length($length)
{
	return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');

// custom image sizes/ratios
// https://developer.wordpress.org/reference/functions/add_image_size/
// with array( 'center', 'center' ) = (cropped to fit)

// square (1:1)

add_image_size('square_s', 400, 400, ['center', 'center']);
add_image_size('square_m', 500, 500, ['center', 'center']);
add_image_size('square_l', 800, 800, ['center', 'center']);
add_image_size('fullwidth', 1920, 1080, ['center', 'center']);



/**
 * Load dashicons for non-loggedin users
 */
function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');


/**
 *
 * Function to show Events at "Programm" Page
 *
 */


function showEvents($post_type)
{
	?>
	<div id="veranstaltungen" class="mt-12 md:mt-24 mx-auto container max-w-screen-lg ">
      <?php
      $args = [
      	'post_type' => "event",
      	'post_status' => 'publish',
      	'posts_per_page' => 40,
		'meta_key'          => 'event-date',                
		'meta_value'   => date( "Ymd" ), // change to how "event date" is stored
		'meta_compare' => '>=',            
		'orderby' => 'meta_value',  
		'order' => 'ASC',
      ];

      $loop = new WP_Query($args);

      while ($loop->have_posts()):$loop->the_post(); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class('mb-24'); ?>>
                <a class="flex flex-wrap md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                	get_permalink()
                ); ?>">                  
              <div class="w-full md:w-2/5 ">
                <div class="relative">
                  <?php  
                    $image = get_field('event-image');
                    $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                    }
					showCopyright($image);
                  ?>							
                </div>	
              </div>                  				  
                  <div class="w-full pt-4 md:p-6 md:w-3/5 md:pl-16 md:pt-6 place-items-center flex">
                  	<div>
				 		          <h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
                    		<?php 
                          the_field("event-date");
                          echo("<br>");
                          the_title(); 
                          echo("<br>");                          
                        ?>
                  		</h2>  
                      <span class=" text-primary text-xl">
                        <p>
                        <?php 
                          $venue = get_field('event-location');
                          if( $venue ): ?>
                          <?php echo esc_html( $venue->post_title ); ?>
                          <?php endif; ?>								
                        </p>
                        </span>                  
						<p class=" text-lg font-light leading-snug"> 
							<?php 
								$description = get_field('event-description'); 
								echo substr($description, 0 , 230)." ...";
							?>
						</p>
						<br>
						<button>Weiterlesen</button>
					</div> 
                  </div>
                </a>
            </div>
		<?php
      endwhile;
      wp_reset_postdata();
  ?>

    
      
  </div>
  <?php
}

/**
 *
 * Function to show Events at "Programm" Page
 *
 */


 function showNews()
 {
	 ?>
	 <div id="veranstaltungen" class="mt-12 md:mt-24 mx-auto container max-w-screen-lg ">
	 <?php
	 $args = [
		 'post_type' => "post",
		 'post_status' => 'publish',
		 'posts_per_page' => 10,
		 'order' => 'DESC',
	 ];

	 $loop = new WP_Query($args);

	 while ($loop->have_posts()):$loop->the_post(); ?>
		 <div id="post-<?php the_ID(); ?>" <?php post_class('mb-24'); ?>>
			   <a class="flex flex-wrap md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
				   get_permalink()
			   ); ?>"> 
				 
			 <div class="w-full md:w-2/5 ">
			   <div class="relative">
				 <?php  
				   if (has_post_thumbnail()){
					the_post_thumbnail('square_s');
				   } 
				   showCopyright(get_post_thumbnail_id());
					?>                                                               
			   </div>	
			 </div>                  				  
				 <div class="w-full pt-4 md:p-6 md:w-3/5 md:pl-16 md:pt-6 place-items-center flex">
					 <div>
								  <h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight  mb-4">
						   <?php 
						 the_date();
						 echo("<br>");
						 the_title(); 
						 echo("<br>");                          
					   ?>
						 </h2>  
					 
					   
					   <?php 
						 $venue = get_field('event-location');
						 if( $venue ): ?>
							<span class=" text-primary text-xl">
								<p>
									<?php echo esc_html( $venue->post_title ); ?>
								</p>
							</span>                  
						 <?php endif; ?>													   
					   
					   <p class=" text-lg font-light leading-snug"> 
						   <?php 							   
							   the_excerpt(  );							   
						   ?>
					   </p>
					   <br>
					   <button>Weiterlesen</button>
				   </div> 
				 </div>
			   </a>
		   </div>
		   
	   <?php
	 endwhile;
	 wp_reset_postdata();
	 ?>
	 </div>
	<?php	 
}
/**
 * Show Carousel for Main Start Page
 *
 *
 * @param $post_type
 * @return Future Events
 */

function showCarousel($post_type)
{
	?>
      <?php
      $args = [
      	'post_type' => $post_type,
      	'post_status' => 'publish',
      	'posts_per_page' => 10,
      	'meta_key'          => 'event-date',                
		'meta_value'   => date( "Ymd" ), // change to how "event date" is stored
		'meta_compare' => '>=',            
		'orderby'   => 'meta_value',  
      	'order' => 'ASC',
      ];

      $loop = new WP_Query($args);
	  ?>
	<div id="" class="overflow-visible flex flex-nowrap hover:paused animate-infinite-scroll-mobile md:animate-infinite-scroll-desktop">
	  <?php
      while ($loop->have_posts()):$loop->the_post(); ?>	  
          <div id="post-<?php the_ID(); ?>" <?php post_class('md:first:ml[4%] first:ml-[4%] last:mr:mr-[30%] last:mr-[20%] mr-16 md:mr-32 mb-[4rem] md:snap-center md:mb-44'); ?>>                                  
		  	<a class="flex md:flex-nowrap flex-wrap md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                	get_permalink()
                ); ?>"> 				
				<div class="relative md:min-w-max w-64">
					<?php  
						$image = get_field('event-image');												
						$size = 'square_s'; // (thumbnail, medium, large, full or custom size)						

						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}	
						showCopyright($image);						
					?>
					<div class="p-4 z-40 hover:animate-spin-normal font-bold font-serif text-base md:text-xl md:w-40 md:h-40 w-28 h-28  text-black bg-white flex place-items-center rounded-full absolute md:-bottom-20 md:-right-20 -bottom-14 -right-14">
						<div class=" aligncenter text-center ">
							<?php 
								$unixtimestamp = strtotime( get_field('event-date') );
								// Display date in the format "l d F, Y".
								//echo date_i18n( "d.F Y", $unixtimestamp );
								the_field("event-date");
							?>															
						</div>
					</div>
				</div>	                  				  
				<div class="mt-12 md:w-[36rem] p-6 md:pl-16 md:pt-6 text-primary place-items-center flex">
					<div>
						<h2 class="font-serif bold text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-4">
							<?php the_title(); ?>
						</h2>  
						<!-- <p>
							<?php 
								$venue = get_field('event-location');
								if( $venue ): ?>
									<?php echo esc_html( $venue->post_title ); ?>
								<?php endif; 								
							?>											
						</p> -->
						<p class="md:block hidden text-lg font-normal leading-snug"> 
							<?php 
								$description = get_field('event-description'); 
								echo substr($description, 0 , 230)." ...";
							?>
						</p>
						<br>						
						<button>Mehr erfahren</button>
					</div> 
				</div>
                </a>
            </div>
			
		<?php
      endwhile;
      wp_reset_postdata();
	  ?>
	  
	  </div>
	  
	  <?php
}

/**
 * Calendar Download Button
 *
 *
 * @param array $post Post ID
 * @return string
 */
function calendar_download($post) {
	
	get_template_part( 'components/calendar_download');

}

/**
 * Calendar Download Button
 *
 *
 * @param $image id
 * @return string
 */

function showCopyright($image){
	$fotograf = get_post_field( 'post_excerpt', $image );	
	echo "<p class='mt-2 text-xs font-normal text-neutral-500 !important'>"					;
	if($fotograf == ""){							
		echo "© Julian Dell";
	}else{							
		echo "© ".$fotograf;
	}
	echo "</p>";
}



/**
 * Calendar Download Button
 *
 *
 * @param array $post Post ID
 * @return string
 */

function newsletter_popup(){
	// Überprüfen, ob der Popup-Cookie noch nicht gesetzt wurde
	if (!isset($_COOKIE['popup_closed'])) {
	// Div-Element mit dem Popup-Inhalt ausgeben
	?>
	<div id="popup" tabindex="-1" class="fixed bottom-0  left-0 z-50 w-screen bg-white h-modal ">
		<div class="  text-black relative w-full h-full md:h-auto pt-6 pl-8  md:pr-[20%] md:pl-[20%] items-center place-items-center">
			<div class="mb-4 text-sm font-light pr-8">
				<div class="flex font-serif font-bold justify-between">
					<span class=" mb-3 text-xl md:text-2xl">Newsletter abonnieren</span>		
					<span class=" text-right close cursor-pointer hover:text-slate-400 text-xl md:text-2xl "> X</span>
				</div>																					

				<form action="https://app.loops.so/api/newsletter-form/cm3irxhbr004uwp14325ynq4v" method="post" class="space-y-4">            		
					<p>
						Melde dich für unseren Newsletter an und verpasse keine Veranstaltungen!	
					</p>	
					<div class="grid gap grid-cols-2">
						<div>
							<input class="bg-red bg-gray-200 px-2 w-64 h-10" type="text" id="email" name="email" required placeholder="hallo@salonknallenfalls.de">
						</div>
						<div>
							<button class="text-base font-serif font-bold h-10 px-6 hover:border-1 bg-black text-white hover:text-black hover:bg-white hover:border-black" type="submit">Abschicken</button>
						</div>
				</div>
					<div class="flex">
						<input class="accent-black block mr-4" type="checkbox" id="terms" name="terms" required>
						<label class="" for="terms">Ich akzeptiere die <a href="<?php echo home_url()."/datenschutzerklaerung"; ?>" class="terms-link" target="_blank">Datenschutzbestimmungen</a></label>
					</div>
        		</form>																					
			</div>				
		</div>
		<div >
    	</div>
	</div>
    <!-- JavaScript-Code, der auf den Klick auf das Schließen-Symbol reagiert und den Popup-Cookie setzt -->
    <script>
            document.querySelector("#popup .close").addEventListener("click", function() {
              document.getElementById("popup").style.display = "none";
              var date = new Date();
              // Cookie wird eine Stunde lang gültig sein
              date.setTime(date.getTime() + (1 * 60 * 60 * 1000));
              document.cookie = "popup_closed=1; expires=" + date.toUTCString() + "; path=/";
            });
	</script>
	<?php
	}
}

?>
