<?php
/**
 *
 *  Veranstaltungen Setup
 *
 *  1. ACF
 *  2. CPT
 *
 */

/**
 *  --------------------------------------------------------
 *  1. Veranstaltungen ACF
 *  --------------------------------------------------------
 */
// if (function_exists('acf_add_local_field_group')):
//   acf_add_local_field_group([
//     'key' => 'group_63ed1512f0af1',
//     'title' => 'Veranstaltungen',
//     'fields' => [
//       [
//         'key' => 'field_63ed153286d1d',
//         'label' => 'Beschreibung der Veranstaltung',
//         'name' => 'event-description',
//         'aria-label' => '',
//         'type' => 'textarea',
//         'instructions' => '',
//         'required' => 1,
//         'conditional_logic' => 0,
//         'wrapper' => [
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ],
//         'default_value' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'placeholder' => '',
//         'new_lines' => '',
//       ],
//       [
//         'key' => 'field_63ed155686d1e',
//         'label' => 'Datum der Veranstaltung',
//         'name' => 'event-date',
//         'aria-label' => '',
//         'type' => 'date_picker',
//         'instructions' => '',
//         'required' => 1,
//         'conditional_logic' => 0,
//         'wrapper' => [
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ],
//         'display_format' => 'd/m/Y',
//         'return_format' => 'd.m.Y',
//         'first_day' => 1,
//       ],
//       [
//         'key' => 'field_63ed15bd86d1f',
//         'label' => 'Uhrzeit der Veranstaltung',
//         'name' => 'event-time',
//         'aria-label' => '',
//         'type' => 'time_picker',
//         'instructions' => '',
//         'required' => 0,
//         'conditional_logic' => 0,
//         'wrapper' => [
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ],
//         'display_format' => 'g:i a',
//         'return_format' => 'H:i',
//       ],
//       [
//         'key' => 'field_63ed15f386d21',
//         'label' => 'Link zum Ticketverkauf',
//         'name' => 'event-ticket',
//         'aria-label' => '',
//         'type' => 'url',
//         'instructions' => '',
//         'required' => 0,
//         'conditional_logic' => 0,
//         'wrapper' => [
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ],
//         'default_value' => '',
//         'placeholder' => '',
//       ],
//       [
//         'key' => 'field_63ed15d686d20',
//         'label' => 'Bild der Veranstaltung',
//         'name' => 'event-image',
//         'aria-label' => '',
//         'type' => 'image',
//         'instructions' => '',
//         'required' => 1,
//         'conditional_logic' => 0,
//         'wrapper' => [
//           'width' => '',
//           'class' => '',
//           'id' => '',
//         ],
//         'return_format' => 'array',
//         'library' => 'all',
//         'min_width' => '',
//         'min_height' => '',
//         'min_size' => '',
//         'max_width' => '',
//         'max_height' => '',
//         'max_size' => '',
//         'mime_types' => '',
//         'preview_size' => 'medium',
//       ],
//     ],
//     'location' => [
//       [
//         [
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'event',
//         ],
//       ],
//     ],
//     'menu_order' => 0,
//     'position' => 'normal',
//     'style' => 'default',
//     'label_placement' => 'top',
//     'instruction_placement' => 'label',
//     'hide_on_screen' => '',
//     'active' => true,
//     'description' => '',
//     'show_in_rest' => 0,
//   ]);
// endif;

/**
 *  --------------------------------------------------------
 *  2. Veranstaltungen Post Type
 *  --------------------------------------------------------
 */

function cptui_register_my_cpts_event()
{
  /**
   * Post Type: Veranstaltungen.
   */

  $labels = [
    "name" => __("Veranstaltungen", "salonknallenfalls"),
    "singular_name" => __("Veranstaltung", "salonknallenfalls"),
    "add_new_item" => __(
      "Erstelle eine neue Veranstaltung",
      "salonknallenfalls"
    ),
  ];

  $args = [
    "label" => __("Veranstaltungen", "salonknallenfalls"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => ["slug" => "event", "with_front" => true],
    "query_var" => true,
    "menu_icon" => "dashicons-calendar-alt",
    "supports" => ["title"],
    "show_in_graphql" => false,
  ];

  register_post_type("event", $args);
}

add_action('init', 'cptui_register_my_cpts_event');

?>
