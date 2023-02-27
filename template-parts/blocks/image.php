<?php

/**
 * Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = '-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field('text') ?: 'Hier steht die Beschreibung.';
$headline = get_field('headline') ?: 'Hier steht der Titel.';
$image = get_field('image');
?>
        

<?php //if( !empty( $image ) ): ?>
        <!-- <img src="<?php //echo esc_url($image['url']); ?>" alt="<?php //echo esc_attr($image['alt']); ?>" /> -->
<?php // endif; ?>
	
<!-- <div class="h-auto relative" style="width:100vw; margin-left: calc(((100vw - 960px) / 2) * -1);"> -->

<!-- footer, bilder team square,  -->

<div class="relative flex sm:flex-nowrap flex-wrap mb-24 bg-black text-primary">
    <div class=" bg-white md:w-1/2 md:mr-10">
        <?php if( $image ) {
            $size = "square_l";
            echo wp_get_attachment_image( $image, $size );
        }
        ?>
    </div>                                    
    <div class="w-1/2  mt-24 ">
        <div class="bg-black  lg:mt-0  min-h-0 ">
            <h3 class=" font-bold text-4xl font-serif  mb-6">
                <?php echo $headline; ?>
            </h3>
            <p class="font-light"><?php echo $text; ?></p>
        </div>
    </div>
</div>
