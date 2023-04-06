<?php

/**
 * Venue Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.
?>
<?php

$featured_posts = get_field('field_63fa3b625b1a4');
?>
<section class="mb-10 bg-black text-primary">
    <h1 class="font-serif  text-2xl font-bold mb-4">Spielstätten</h1>    
    <?php
    if( $featured_posts ): ?>
    <div class="post "> 
        <div class="flex flex-wrap ">    
            <?php foreach( $featured_posts as $featured_post ): ?>
            <div class="venue flex mb-4">
                <?php
                    $permalink = get_permalink( $featured_post->ID );
                    $title = get_the_title( $featured_post->ID ) ?: "Name der Spielstätte";
                    $seats = get_field( 'seats', $featured_post->ID );        
                    $adress = get_field( 'adress', $featured_post->ID );        
                    $image = get_field('field_63ed14761fbc0', $featured_post->ID);
                    $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                    ?>
                    <div class="image md:w-56 w-1/2 ">
                        <?php if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                        ?>
                    </div>                                    
                    <div class="description ml-6  md:w-56 w-1/2">            
                        <h1 class="font-serif  text-xl font-light leading-tight  mb-4">
                            <?php echo ($title); ?>
                        </h1>
                        <span class="font-light"> 
                            <?php echo esc_html( $seats ); ?> Plätze
                        <br>
                        <br>
                        <?php echo esc_html( $adress ); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php else: 
?>

<!-- Preview, when Block is generated in Gutenberg Editor -->
<div class="post text-primary">    
    <div class="flex flex-wrap bg-black mb-4">    
        <div class="venue flex">
                <div class="image w-56 h-56 bg-slate-300">
                            
                </div>                                    
                <div class="description ml-6  w-56">            
                    <h1 class="font-serif  text-xl font-light leading-tight  mb-4">
                        Beispielevent
                    </h1>
                    <span class="font-light"> 
                        100 Plätze
                    <br>
                    <br>
                    Hier steht die Adresse
                    </span>
                </div>
            </div>
    </div>
</div>

<?php
endif;?>