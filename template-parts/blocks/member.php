<?php

/**
 * Member Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.
$text = get_field('text') ?: 'Hier steht der Titel.';

?>


 <div class="member">
     <?php 
        $featured_post = get_field('user');
        $vorname = get_field( 'nachname', $featured_post->ID );
        $nachname = get_field( 'nachname', $featured_post->ID );
        $phone = get_field( 'phone', $featured_post->ID );
        $mail = get_field( 'mail', $featured_post->ID );
        // $image = get_field( 'image', $featured_post->ID );
        $lieblingsort = get_field( 'lieblingsort', $featured_post->ID );
        $image = get_field('image');

        // Image variables.
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];

        // Thumbnail size attributes.
        $size = 'thumbnail';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];


    ?>
    <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col md:flex-row">
        <div class="w-full md:w-2/5 h-80">
        <?php if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />

            <!-- <img class="object-center object-cover w-40 h-40" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> -->
        <?php endif; ?>    
        
        </div>
        <div class="w-full md:w-3/5 text-left p-6 md:p-4 space-y-2">
            <p class="text-xl text-primary font-bold"><?php echo $vorname." ".$nachname; ?></p>
            <h2 class="text-primary">Lieblingsort</h2>
            <p class="text-base leading-relaxed text-gray-500 font-normal"><?php echo $lieblingsort; ?></p>
            <p class="text-base text-gray-400 font-normal">
                <a href="mailto:<?php echo $mail; ?>" class="text-gray-500 hover:text-gray-600">    
                    <span class="dashicons dashicons-email"> </span> 
                    <?php echo $mail; ?></p>
                </a>
            </p>
            <p class="text-base text-gray-400 font-normal">
                <a href="tel:<?php echo $phone; ?>" class="text-gray-500 hover:text-gray-600">    
                    <span class="dashicons dashicons-phone"> </span> 
                    <?php echo $phone; ?></p>
                </a>
            </p>
        </div>
    </div>
</div>
