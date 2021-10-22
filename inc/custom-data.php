<?php
/**
 * Understrap custom data
 *
 * @package Understrap
 */


//card custom post type

// Register Custom Post Type card
// Post Type Key: card

function create_card_cpt() {

  $labels = array(
    'name' => __( 'Cards', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Card', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Card', 'textdomain' ),
    'name_admin_bar' => __( 'Card', 'textdomain' ),
    'archives' => __( 'Card Archives', 'textdomain' ),
    'attributes' => __( 'Card Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Card:', 'textdomain' ),
    'all_items' => __( 'All Cards', 'textdomain' ),
    'add_new_item' => __( 'Add New Card', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Card', 'textdomain' ),
    'edit_item' => __( 'Edit Card', 'textdomain' ),
    'update_item' => __( 'Update Card', 'textdomain' ),
    'view_item' => __( 'View Card', 'textdomain' ),
    'view_items' => __( 'View Cards', 'textdomain' ),
    'search_items' => __( 'Search Cards', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into card', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this card', 'textdomain' ),
    'items_list' => __( 'Card list', 'textdomain' ),
    'items_list_navigation' => __( 'Card list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Card list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'card', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'card', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_card_cpt', 0 );

add_action( 'init', 'create_framework_taxonomies', 0 );
function create_framework_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Frameworks', 'taxonomy general name' ),
    'singular_name' => _x( 'framework', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Frameworks' ),
    'popular_items' => __( 'Popular Frameworks' ),
    'all_items' => __( 'All Frameworks' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Frameworks' ),
    'update_item' => __( 'Update framework' ),
    'add_new_item' => __( 'Add New framework' ),
    'new_item_name' => __( 'New framework' ),
    'add_or_remove_items' => __( 'Add or remove Frameworks' ),
    'choose_from_most_used' => __( 'Choose from the most used Frameworks' ),
    'menu_name' => __( 'Frameworks' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Frameworks',array('card'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'framework' ),
    'show_in_rest'          => true,
    'rest_base'             => 'framework',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_level_taxonomies', 0 );
function create_level_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Levels', 'taxonomy general name' ),
    'singular_name' => _x( 'level', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Levels' ),
    'popular_items' => __( 'Popular Levels' ),
    'all_items' => __( 'All Levels' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Levels' ),
    'update_item' => __( 'Update level' ),
    'add_new_item' => __( 'Add New level' ),
    'new_item_name' => __( 'New level' ),
    'add_or_remove_items' => __( 'Add or remove Levels' ),
    'choose_from_most_used' => __( 'Choose from the most used Levels' ),
    'menu_name' => __( 'Levels' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Levels',array('card'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'level' ),
    'show_in_rest'          => true,
    'rest_base'             => 'level',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_type_taxonomies', 0 );
function create_type_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'popular_items' => __( 'Popular Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Types' ),
    'update_item' => __( 'Update type' ),
    'add_new_item' => __( 'Add New type' ),
    'new_item_name' => __( 'New type' ),
    'add_or_remove_items' => __( 'Add or remove Types' ),
    'choose_from_most_used' => __( 'Choose from the most used Types' ),
    'menu_name' => __( 'Types' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Types',array('card'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
    'show_in_rest'          => true,
    'rest_base'             => 'type',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

