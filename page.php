<?php get_header(); ?>

<!-- PAGE TEMPLATE -->

    <?php if ('' !== get_post()->post_content) { ?>            
        <div class="mt-20 mb-24 md:mb-32 max-w-screen-lg mx-auto">
            <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
                the_excerpt();
            } else {
                the_content(__('Continue reading', 'twentytwenty'));
            } ?>
        </div>
        
    <?php } ?>
              
<?php get_footer(); ?>
