<?php

add_action( 'init', 'post_types_adding' );

function post_types_adding() {

        /*************************************************************/
        /************Slider POST TYPE***************************/
        /*************************************************************/

  $labels = array(
    'name' => __('Slider', 'Demo'),
    'singular_name' => __('Slider', 'Demo'),
    'add_new' => __('Add New', 'Demo'),
    'add_new_item' => __('Add New Slide', 'Demo'),
    'edit_item' => __('Edit Slide', 'Demo'),
    'new_item' => __('New Slide', 'Demo'),
    'all_items' => __('All Slides', 'Demo'),
    'view_item' => __('View this Slide', 'Demo'),
    'search_items' => __('Search Slides', 'Demo'),
    'not_found' =>  __('No Slides', 'Demo'),
    'not_found_in_trash' => __('No Slides in Trash', 'Demo'),
    'parent_item_colon' => '',
    'menu_name' => __('Slides', 'Demo'),

  );
  $args = array(
    'exclude_from_search' => true,
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'pt-slides'),
    'capability_type' => 'page',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => get_template_directory_uri().'/inc/images/icon.png',
    'supports' => array('title', 'thumbnail','page-attributes','excerpt','editor'),

);
  register_post_type('pt_slides',$args);

  flush_rewrite_rules();

}



?>