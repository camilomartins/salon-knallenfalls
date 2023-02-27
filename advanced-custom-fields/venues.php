<?php 
/**
 * 
 *  Spielstätten Setup
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
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62335a40ef73c',
        'title' => 'Mitglieder',
        'fields' => array(
            array(
                'key' => 'field_62335a4daf81f',
                'label' => 'Vorname',
                'name' => 'vorname',
                'type' => 'text',
                'instructions' => 'Trage hier den Vornamen des Vereinsmitglieds ein.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_62335a6baf821',
                'label' => 'Nachname',
                'name' => 'nachname',
                'type' => 'text',
                'instructions' => 'Trage hier den Nachnamen des Vereinsmitglieds ein.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_62335a69af820',
                'label' => 'E-Mail',
                'name' => 'mail',
                'type' => 'email',
                'instructions' => 'Trage hier die E-Mail Adresse des Vereinsmitglieds ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_62335ab7af822',
                'label' => 'Telefonnummer',
                'name' => 'phone',
                'type' => 'number',
                'instructions' => 'Trage hier die Telefonnummer des Vereinsmitglieds ein.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_62335af22fbfe',
                'label' => 'Lieblingsort im Freibad',
                'name' => 'lieblingsort',
                'type' => 'textarea',
                'instructions' => 'Hier kannst du den Lieblingsort eintragen.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_6236489941701',
                'label' => 'Foto',
                'name' => 'image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'members',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;

/**
 *  --------------------------------------------------------
 *  2. Mitglieder Post Type
 *  --------------------------------------------------------
 */
function cptui_register_my_cpts_members() {

	/**
	 * Post Type: Mitglieder.
	 */

	$labels = [
		"name" => __( "Spielstätten", "salonknallenfalls" ),
		"singular_name" => __( "Spielstätte", "salonknallenfalls" ),
	];

	$args = [
		"label" => __( "Spielstätte", "salonknallenfalls" ),
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
		"rewrite" => [ "slug" => "locations", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-tickets-alt",
		"supports" => ["title"],
		"show_in_graphql" => false,
	];

	register_post_type( "locations", $args );
}

add_action( 'init', 'cptui_register_my_cpts_members' );




 

 ?>