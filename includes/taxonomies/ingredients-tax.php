<?php

function _themename__pluginname_register_ingredients_tax() {
	$labels = array(
		'name'              => esc_html_x('Ingredients', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Ingredient', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Ingredients', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Ingredients', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Ingredient', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Ingredient:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Ingredient', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Ingredient', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Ingredient', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Ingredient Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Ingredients', '_themename-_pluginname'),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_admin_column' => false,
		'rewrite'           => array( 'slug' => 'ingredients' ),
		'show_in_rest'      => true
	);
		
	register_taxonomy('_themename_ingredients', array('_themename_recipe'), $args);
}

add_action('init', '_themename__pluginname_register_ingredients_tax');