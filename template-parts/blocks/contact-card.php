<?php

/**
 * Kontaktdaten Block Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.
$name = get_field('name') ?: 'Hier steht der Name.';
$position = get_field('position') ?: 'Position der Person.';
$mail = get_field('mail') ?: 'Mailadresse';
$phone = get_field('phone') ?: 'Telefonnummer';
$image = get_field('image') ?: 'https://freibad-mirke.de';
?>
<div class="bg-black group flex flex-wrap pl-48 mb-10">
    <?php if( get_field('contact_information') ): ?>
        <?php while( the_repeater_field('contact_information') ): 
            $name = get_sub_field('name');
            $position = get_sub_field('position');
            $mail = get_sub_field('mail');
            $phone = get_sub_field('phone');
            $image = get_sub_field('image');
            ?>
            <div id="title-block" class="items-center flex p-10 text-primary ">
                <div class="group-even:order-last w-48 h-48 rounded-full mr-10 overflow-hidden">
                    <?php  
                        $image = get_sub_field('image');
                        $size = 'square_s'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                    ?>	
                </div>
                <div class="group-even:order-first group-odd:mr-10">
                    <h1 class="font-serif text-2xl">
                        <?php echo $name; ?>
                    </h1>
                    <p class="text-base text-light">
                        <?php echo $position; ?>
                        <br>
                        <?php echo $phone; ?>
                        <br>
                        <?php echo $mail; ?>
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>

    <div id="title-block" class="items-center flex p-10 text-primary ">
        <div class=" group-even:order-last w-48 h-48 rounded-full mr-10 bg-white">

        </div>
        <div class=" group-even:order-first group-odd:mr-10">
            <h1 class="font-serif text-2xl">
                <?php echo $name; ?>
            </h1>
            <p class="text-base text-light">
                <?php echo $position; ?>
                <br>
                <?php echo $phone; ?>
                <br>
                <?php echo $mail; ?>
            </p>
        </div>
    </div>
    <div id="title-block" class="items-center flex p-10 text-primary ">
        <div class="group-odd:order-last w-48 h-48 rounded-full mr-10 bg-white">

        </div>
        <div class="group-even:order-first group-:mr-10">
            <h1 class="font-serif text-2xl">
                <?php echo $name; ?>
            </h1>
            <p class="text-base text-light">
                <?php echo $position; ?>
                <br>
                <?php echo $phone; ?>
                <br>
                <?php echo $mail; ?>
            </p>
        </div>
    </div>
    <?php endif;?>
</div>


