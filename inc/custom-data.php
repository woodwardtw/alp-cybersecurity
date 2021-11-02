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

add_action( 'init', 'create_objective_taxonomies', 0 );
function create_objective_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'objective', 'taxonomy general name' ),
    'singular_name' => _x( 'objective', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Objectives' ),
    'popular_items' => __( 'Popular Objectives' ),
    'all_items' => __( 'All Objectives' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Objectives' ),
    'update_item' => __( 'Update objective' ),
    'add_new_item' => __( 'Add New objective' ),
    'new_item_name' => __( 'New objective' ),
    'add_or_remove_items' => __( 'Add or remove Objectives' ),
    'choose_from_most_used' => __( 'Choose from the most used Objectives' ),
    'menu_name' => __( 'Objectives' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Objectives',array('card'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'objective' ),
    'show_in_rest'          => true,
    'rest_base'             => 'objective',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_focus_taxonomies', 0 );
function create_focus_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Focus', 'taxonomy general name' ),
    'singular_name' => _x( 'focus', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Focus' ),
    'popular_items' => __( 'Popular Focus' ),
    'all_items' => __( 'All Focus' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Focus' ),
    'update_item' => __( 'Update focus' ),
    'add_new_item' => __( 'Add New focus' ),
    'new_item_name' => __( 'New focus' ),
    'add_or_remove_items' => __( 'Add or remove Focus' ),
    'choose_from_most_used' => __( 'Choose from the most used Focus' ),
    'menu_name' => __( 'focus' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('focus',array('card'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'focus' ),
    'show_in_rest'          => true,
    'rest_base'             => 'focus',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}




function cyber_make_objectives(){
  $terms = array('Allocate Adequate Resources Assigned',
'Audit of Data Privacy and Security Practices',
'Conduct Penetration Testing',
'Conduct Vulnerability Assessment',
'Conduct Vulnerability Testing',
'Create Teacher and C&I Implementation Plans',
'Demonstrate Dedicated Leadership',
'Develop District Website Practices',
'Develop Training and Professional Development',
'Enforce Internet Content Filtering',
'Enforce Student Record Policies',
'Ensure Access Control',
'Ensure Appropriate Teacher Communication to Parents',
'Ensure Leadership Understanding',
'Ensure Privacy & Confidentiality',
'Ensure Teacher Awareness about Online Resources',
'Ensure Teachers Model Appropriate Use',
'Ensure Up-To-Date Policies',
'Ensure Vetted Online Service Education',
'Establish Account Management',
'Evaluate External Vendors and Third Party Providers',
'Exercise Security Oversight and Governance',
'Implement Audit Logging',
'Implement Beta Testing',
'Implement Business Continuity / Disaster Recovery',
'Implement Business Process Requirements',
'Implement Change Management',
'Implement Cloud Usage and Security',
'Implement Communication of Incidents/Breaches',
'Implement Contingency Planning',
'Implement Control Oversight and Safeguard Assurance',
'Implement Critical Information Asset Inventory',
'Implement Cryptography',
'Implement Cyber-Security Incident Response',
'Implement Data Classification',
'Implement Data Loss Prevention',
'Implement Disaster Recovery Procedures',
'Implement Enterprise Architecture, Roadmap & Emerging Technology',
'Implement Enterprise Security Policy, Standards and Guidelines',
'Implement Identification & Authentication',
'Implement Information Security Risk Management',
'Implement Malware Protection',
'Implement Media Protection',
'Implement Network Access and Perimeter Controls',
'Implement Personnel Security',
'Implement Physical and Environmental Protection',
'Implement Portable & Remote Computing',
'Implement Privacy Awareness and Training',
'Implement Privacy Incident Response',
'Implement Secure Application Development',
'Implement Secure Configuration Management',
'Implement Secure System Services, Acquisition and Development',
'Implement Security Assessment and Authorization/ Technology Risk Assessments',
'Implement Security Awareness and Training',
'Implement Security Monitoring and Event Analysis',
'Implement Security Systems Management',
'Implement Share Agreement Contracts',
'Implement Spam Filtering',
'Implement Student Record Roles and Rights',
'Implement System Communications Protection',
'Implement System Configuration Hardening & Patch Management',
'Implement Systems Currency',
'Implement Third-Party Personnel Security',
'Implement Vetted Online Service Process',
'Mandate Employee Training Participation',
'Monitor Security Compliance and Regulatory Requirements Mgmt',
'Offer Parent Training',
'Protect Student Records',
'Provide Accessible Communications',
'Provide Accessible Resources',
'Set Clear Expectations');
  foreach ($terms as $key => $term) {
    var_dump(wp_insert_term($term,'Objectives'));
    // code...
  }
}

function cyber_make_focus(){
  $terms = array('1 - Identify',
    '2  - Protect',
    '3 - Detect',
    '4 - Respond',
    '5 - Recover',
    'Business',
    'Classroom',
    'Data Security',
    'Leadership',
    'Professional Development');
  foreach ($terms as $key => $term) {
    var_dump(wp_insert_term($term,'focus'));
    // code...
  }

}
