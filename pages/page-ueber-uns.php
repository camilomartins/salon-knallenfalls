<?php

/**
 *
 * Template Name: Verein
 * Template Post Type: page
 *
 */

get_header(); ?>

<!-- <main class="max-w-screen-lg mx-auto my-12 py-48" role="main" data-track-content> -->
    
<div class="">

 
        <?php if ('' !== get_post()->post_content) { ?>

            <div >
                <?php
                if (
                  is_search() ||
                  (!is_singular() &&
                    'summary' === get_theme_mod('blog_content', 'full'))
                ) {
                  the_excerpt();
                } else {
                  the_content(__('Continue reading', 'twentytwenty'));
                } ?>
            </div>
            
        <?php } ?>
        

<?php

/**
 * Alle aktuellen Nachrichten im Freibad Mirke
 */

?>

            <!-- Alle aktuellen Nachrichten im Freibad Mirke -->
            <div class="nachrichten mt-24 mx-auto container max-w-screen-lg ">

                <h2 class="text-3xl mt-8 mb-6 md:mt-60  md:mb-16 font-bold text-primary">Der Salon</h2>
                    <?php
                        $args = [
                        'post_type' => 'event',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        ];

                        $loop = new WP_Query($args);
                        
                        while ($loop->have_posts()):
                        $loop->the_post(); 
                    ?>
                      <div id="post-<?php the_ID(); ?>" <?php post_class( ' block mb-12' ); ?>>
                          <a class="flex flex-wrap" href="<?php echo  esc_url( get_permalink())?>"> 
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                              <div class="w-3/5 md:w-2/5">
                                  <?php the_post_thumbnail('large'); ?>
                              </div>
                            <?php endif; ?>

                            <div class="w-full py-6 md:w-3/5 md:pl-8 md:pt-6">
                              <div class="mb-4">
                                <p class=" text-primary text-sm font-light "><?php echo get_the_author(); ?> am <?php the_date(); ?></p>
                                <h2 class="text-primary entry-title text-xl md:text-2xl font-extrabold leading-tight mb-1">
                                  <?php the_title(); ?>
                                </h2>
                              </div>

                              <div class="font-light leading-6">
                                <?php the_excerpt(); ?>
                              </div>
                              <button class="mt:32 block hover:text-primary font-light" href="<?php // echo get_permalink(); ?>"> Weiterlesen ></button>        

                              <!-- <a class="border border-primary text-primary px-5 py-3 font-semibold " href="<?php echo get_permalink(); ?>">Weiterlesen</a>         -->

                            </div>
                          </a>
                      </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                    
            </div>


</div>
</main><!-- #site-content -->
                
<?php get_footer(); ?>


