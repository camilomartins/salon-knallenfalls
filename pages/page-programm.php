<?php

/**
 *
 * Template Name: Veranstaltungen
 * Template Post Type: page
 *
 */

get_header(); ?>
  <?php
  if ('' !== get_post()->post_content) { ?>
    <div class="gutenberg-content">
      
      <?php if (is_search() || (!is_singular() && 'summary' === get_theme_mod('blog_content', 'full'))) {
      	the_excerpt();
      } else {
      	the_content(__('Continue reading', 'twentytwenty'));
      } ?>
    </div>
      
  <?php }

  /**
   * Veranstaltungen im Salon Knallenfalls — with Year & Spielstätte filters
   */
  ?>

<?php
$args = [
    'post_type'      => 'event',
    'post_status'    => 'publish',
    'posts_per_page' => 100,
    'meta_key'       => 'event-date',
    'meta_value'     => date('Ymd'),
    'meta_compare'   => '>=',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
];
$loop = new WP_Query($args);

// German month names
$month_names = [
    '01' => 'Januar', '02' => 'Februar', '03' => 'März',
    '04' => 'April',  '05' => 'Mai',     '06' => 'Juni',
    '07' => 'Juli',   '08' => 'August',  '09' => 'September',
    '10' => 'Oktober','11' => 'November','12' => 'Dezember',
];

// Collect unique years, months and locations for filter options
$years = [];
$months = [];
$locations = [];
if ($loop->have_posts()) {
    foreach ($loop->posts as $p) {
        $raw_date = get_post_meta($p->ID, 'event-date', true); // raw Ymd format
        if ($raw_date) {
            $year = substr($raw_date, 0, 4);
            $month = substr($raw_date, 4, 2);
            $years[$year] = $year;
            $months[$month] = $month_names[$month];
        }
        $venue = get_field('event-location', $p->ID);
        if ($venue && isset($venue->post_title)) {
            $locations[$venue->ID] = $venue->post_title;
        }
    }
    krsort($years);
    ksort($months);
    asort($locations);
}
?>

<div id="veranstaltungen" class="mt-12 md:mt-24 mx-auto container max-w-screen-lg">

    <?php if ($loop->have_posts()) : ?>
    <!-- Filters -->
    <div class="grid grid-cols-2 md:flex md:flex-wrap gap-2 md:gap-4 mb-6 md:mb-8">
        <select id="filter-year" class="bg-transparent text-white text-sm md:text-base font-serif px-2 py-1 md:px-4 md:py-2 flex-1 md:flex-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-black">
            <option value="">Jahre</option>
            <?php foreach ($years as $y) : ?>
                <option value="<?php echo esc_attr($y); ?>"><?php echo esc_html($y); ?></option>
            <?php endforeach; ?>
        </select>
        <select id="filter-month" class="bg-transparent text-white text-sm md:text-base font-serif px-2 py-1 md:px-4 md:py-2 flex-1 md:flex-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-black">
            <option value="">Monate</option>
            <?php foreach ($months as $mKey => $mName) : ?>
                <option value="<?php echo esc_attr($mKey); ?>"><?php echo esc_html($mName); ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($locations)) : ?>
        <select id="filter-location" class="bg-transparent text-white text-sm md:text-base font-serif px-2 py-1 md:px-4 md:py-2 flex-1 md:flex-none cursor-pointer focus:outline-none focus:ring-1 focus:ring-black">
            <option value="">Spielstätten</option>
            <?php foreach ($locations as $loc) : ?>
                <option value="<?php echo esc_attr($loc); ?>"><?php echo esc_html($loc); ?></option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
    </div>

    <style>
        .program-ticket-btn, .program-ticket-sold {
            position: relative;
            padding-left: 24px;
            padding-right: 24px;
            white-space: nowrap;
        }
        .program-ticket-btn {
            background: white;
            color: black;
            transition: all 0.2s ease;
        }
        .program-ticket-btn:hover {
            background: transparent !important;
            border: 2px solid white !important;
            color: white !important;
        }
        .program-ticket-sold {
            background: #d1d5db;
            color: #555;
        }
        .event-title-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .event-desc-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <?php
    while ($loop->have_posts()) : $loop->the_post();
        $raw_date = get_post_meta(get_the_ID(), 'event-date', true);
        $event_year = '';
        $event_month = '';
        $formatted_date = '';
        if ($raw_date) {
            $event_year = substr($raw_date, 0, 4);
            $event_month = substr($raw_date, 4, 2);
            $day = substr($raw_date, 6, 2);
            $formatted_date = $day . '.' . $event_month . '.' . $event_year;
        }
        $venue = get_field('event-location');
        $venue_name = ($venue && isset($venue->post_title)) ? $venue->post_title : '';
        $is_sold_out = get_field('event-sold-out');
        $description = get_field('event-description');
        $event_time = get_field('event-time');
    ?>
        <div class="event-card border-t border-gray-700 py-5 overflow-hidden"
             data-year="<?php echo esc_attr($event_year); ?>"
             data-month="<?php echo esc_attr($event_month); ?>"
             data-location="<?php echo esc_attr($venue_name); ?>">
            <a class="block md:flex md:items-center md:gap-6 hover:opacity-80 transition-opacity" href="<?php echo esc_url(get_permalink()); ?>">
                
                <!-- Top row: Image + Title -->
                <div class="flex items-start gap-4 md:gap-6 md:flex-1 md:items-center min-w-0">
                    <!-- Image -->
                    <div class="w-20 h-20 md:w-40 md:h-40 flex-shrink-0 bg-slate-300 overflow-hidden">
                        <?php
                        $image = get_field('event-image');
                        if ($image) {
                            echo wp_get_attachment_image($image, 'thumbnail', false, ['class' => 'w-full h-full object-cover']);
                        }
                        ?>
                    </div>

                    <!-- Artist + Info -->
                    <div class="flex-1 min-w-0 md:max-h-40 md:overflow-hidden">
                        <h2 class="font-serif font-extrabold text-primary text-xl md:text-2xl leading-tight event-title-clamp">
                            <?php the_title(); ?>
                        </h2>
                        <?php if ($description) : ?>
                            <p class="hidden lg:block text-base text-gray-400 font-normal mt-0.5 event-desc-clamp"><?php echo esc_html(wp_trim_words($description, 12, '…')); ?></p>
                        <?php endif; ?>
                        <p class="md:hidden text-xs text-gray-400 font-normal mt-1">
                            <?php echo esc_html($formatted_date); ?><?php if ($event_time) echo ' · ' . esc_html($event_time); ?>
                        </p>
                        <?php if ($venue_name) : ?>
                            <p class="md:hidden text-xs text-gray-400 mt-0.5"><?php echo esc_html($venue_name); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Ticket on mobile (full width below image + title) -->
                <div class="md:hidden mt-3">
                    <?php if ($is_sold_out) : ?>
                        <span class="program-ticket-sold block py-2 text-sm font-serif font-bold text-center cursor-not-allowed">Ausverkauft</span>
                    <?php else : ?>
                        <span class="program-ticket-btn block py-2 text-sm font-serif font-bold text-center"><span class="dashicons dashicons-tickets-alt"></span> Tickets</span>
                    <?php endif; ?>
                </div>

                <!-- Ticket + Date (desktop, stacked on md, row on lg) -->
                <div class="hidden md:flex flex-col lg:flex-row items-end lg:items-center flex-shrink-0 gap-2 lg:gap-6">
                    <div class="text-right md:order-2 lg:order-1">
                        <p class="text-primary text-sm font-medium">
                            <?php echo esc_html($formatted_date); ?><?php if ($event_time) echo ' · ' . esc_html($event_time); ?>
                        </p>
                        <?php if ($venue_name) : ?>
                            <p class="text-xs text-gray-400 font-normal mt-0.5"><?php echo esc_html($venue_name); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="md:order-1 lg:order-2">
                        <?php if ($is_sold_out) : ?>
                            <span class="program-ticket-sold py-2 inline-block text-sm font-serif font-bold text-center cursor-not-allowed">Ausverkauft</span>
                        <?php else : ?>
                            <span class="program-ticket-btn py-2 inline-block text-sm font-serif font-bold text-center"><span class="dashicons dashicons-tickets-alt"></span> Tickets</span>
                        <?php endif; ?>
                    </div>
                </div>

            </a>
        </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>

    <!-- Last border -->
    <div class="border-t border-gray-700"></div>

    <div id="no-results-message" class="hidden text-center py-8 text-gray-400 font-serif">
        Keine Veranstaltungen gefunden.
    </div>

    <script>
    (function() {
        var yearSelect = document.getElementById('filter-year');
        var monthSelect = document.getElementById('filter-month');
        var locationSelect = document.getElementById('filter-location');
        var cards = document.querySelectorAll('.event-card');
        var noResults = document.getElementById('no-results-message');

        function filterEvents() {
            var selectedYear = yearSelect ? yearSelect.value : '';
            var selectedMonth = monthSelect ? monthSelect.value : '';
            var selectedLocation = locationSelect ? locationSelect.value : '';
            var visibleCount = 0;

            cards.forEach(function(card) {
                var matchYear = !selectedYear || card.getAttribute('data-year') === selectedYear;
                var matchMonth = !selectedMonth || card.getAttribute('data-month') === selectedMonth;
                var matchLocation = !selectedLocation || card.getAttribute('data-location') === selectedLocation;

                if (matchYear && matchMonth && matchLocation) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (noResults) {
                noResults.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        if (yearSelect) yearSelect.addEventListener('change', filterEvents);
        if (monthSelect) monthSelect.addEventListener('change', filterEvents);
        if (locationSelect) locationSelect.addEventListener('change', filterEvents);
    })();
    </script>

    <?php else : ?>
        <p class="text-gray-400">Keine Veranstaltungen vorhanden.</p>
    <?php endif; ?>
</div>
                
<?php get_footer(); ?>
