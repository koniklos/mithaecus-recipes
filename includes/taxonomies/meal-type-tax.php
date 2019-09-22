<?php

function _themename__pluginname_register_meal_type_tax() {
	$labels = array(
		'name'              => esc_html_x('Meal Type', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Meal Type', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Meal Types', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Meal Types', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Meal Type', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Meal Type:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Meal Type', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Meal Type', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Meal Type', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Meal Type Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Meal Types', '_themename-_pluginname'),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true,
		'rewrite' => array('slug' => 'meal'),
		'show_in_rest' => true
	);
	
	register_taxonomy('_themename_meal_type', array('_themename_recipe'), $args);
}

add_action('init', '_themename__pluginname_register_meal_type_tax');