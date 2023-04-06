<?php

/**
 * Member Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values
$featured_posts = get_field('field_63fa3b625b1a4');
?>
<section class="mb-10 bg-black text-primary">
    <h1 class="font-serif  text-2xl font-bold mb-4">Vergangene Veranstaltungen</h1>    
    <div class="flex flex-wrap">
        
        <?php
            $today = getdate();
            $args = [
                'post_type' => "event",
                'post_status' => 'publish',
                'posts_per_page' => 8,
                //Compare if Post is in the past
                'meta_key'          => 'event-date',                
                'meta_value'   => date( "Ymd" ), // change to how "event date" is stored
                'meta_compare' => '<',            
                'orderby'           => 'meta_value',      	
                'order' => 'ASC',
            ];
            $loop = new WP_Query($args);
            if($loop->have_posts()){
                while ($loop->have_posts()):$loop->the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('mb-4 mr-4'); ?>>
                            <a class="md:bg-transparent  md:transition-opacity hover:opacity-80" href="<?php echo esc_url(
                                get_permalink()
                            ); ?>">                             
                            <div class="post text-primary">    
                                <div class="flex flex-wrap bg-black">    
                                    <div class="w-56 h-56 group bg-slate-300">
                                        <div class="relative overflow-hidden bg-slate-300">
                                        <?php  
                                            $image = get_field('event-image', get_the_ID());
                                            $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                                            if( $image ) {
                                            echo wp_get_attachment_image( $image, $size );
                                            }
                                        ?>	
                                            <div class="absolute h-full w-full bg-gradient-to-t from-black to-black-100  -bottom-10 opacity-0 group-hover:bottom-0 group-hover:opacity-100 transition-all duration-300">
                                                <span class="text-2xl font-serif absolute bottom-0 p-4 text-white">
                                                <?php 
                                                    the_field("event-date", get_the_ID());
                                                    echo("<br>");
                                                    the_title();                                         
                                                ?>
                                                </span>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                  
                            </a>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
            }else{                
                ?>
                <div class="post text-primary">    
                    <div class="flex flex-wrap mb-4">    
                        <div class="block  group">
                            <div class="w-56 h-56 relative overflow-hidden bg-gradient-to-t from-cyan-500 to-blue-500">
                                
                                <div class="absolute h-full w-full bg-gradient-to-t from-black to-black-100  -bottom-10 opacity-0 group-hover:bottom-0 group-hover:opacity-100 transition-all duration-300">
                                    <span class="text-2xl font-serif absolute bottom-0 p-4 text-white">
                                        Hier steht der Künstler
                                        <br>
                                        <?php echo date("d.m.Y") ?>
                                    </span>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php                
            }
        ?>
    </div>
</section>



