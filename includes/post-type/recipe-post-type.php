<?php

function _themename__pluginname_setup_post_type() {
	$labels = array(
		'name'                  => esc_html_x( 'Recipes', 'Post type general name', '_themename-_pluginname' ),
		'singular_name'         => esc_html_x( 'Recipe', 'Post type singular name', '_themename-_pluginname' ),
		'menu_name'             => esc_html_x( 'Recipes', 'Admin Menu text', '_themename-_pluginname' ),
		'name_admin_bar'        => esc_html_x( 'Recipe', 'Add New on Toolbar', '_themename-_pluginname' ),
		'add_new'               => esc_html__( 'Add New', '_themename-_pluginname' ),
		'add_new_item'          => esc_html__( 'Add New Recipe', '_themename-_pluginname' ),
		'new_item'              => esc_html__( 'New Recipe', '_themename-_pluginname' ),
		'edit_item'             => esc_html__( 'Edit Recipe', '_themename-_pluginname' ),
		'view_item'             => esc_html__( 'View Recipe', '_themename-_pluginname' ),
		'view_items'            => esc_html__( 'View Recipes', '_themename-_pluginname' ),
		'all_items'             => esc_html__( 'All Recipes', '_themename-_pluginname' ),
		'search_items'          => esc_html__( 'Search Recipes', '_themename-_pluginname' ),
		'parent_item_colon'     => esc_html__( 'Parent Recipes:', '_themename-_pluginname' ),
		'not_found'             => esc_html__( 'No Recipes found.', '_themename-_pluginname' ),
		'not_found_in_trash'    => esc_html__( 'No Recipes found in Trash.', '_themename-_pluginname' ),
		'featured_image'        => esc_html_x( 'Recipe Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', '_themename-_pluginname' ),
		'set_featured_image'    => esc_html_x( 'Set recipe image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', '_themename-_pluginname' ),
		'remove_featured_image' => esc_html_x( 'Remove recipe image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', '_themename-_pluginname' ),
		'use_featured_image'    => esc_html_x( 'Use as recipe image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', '_themename-_pluginname' ),
		'archives'              => esc_html_x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', '_themename-_pluginname' ),
		'insert_into_item'      => esc_html_x( 'Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', '_themename-_pluginname' ),
		'uploaded_to_this_item' => esc_html_x( 'Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', '_themename-_pluginname' ),
		'filter_items_list'     => esc_html_x( 'Filter recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', '_themename-_pluginname' ),
		'items_list_navigation' => esc_html_x( 'Recipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', '_themename-_pluginname' ),
		'items_list'            => esc_html_x( 'Recipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', '_themename-_pluginname' ),
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-book-alt',
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		'rewrite' => array( 'slug' => 'recipes' ),
		'show_in_rest' => true,
		'taxonomies'  => array( 'category', 'post_tag' )
	);

	register_post_type( '_themename_recipe', $args );
}

add_action( 'init', '_themename__pluginname_setup_post_type' );