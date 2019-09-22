<?php

function _themename__pluginname_register_course_type_tax() {
	$labels = array(
		'name'              => esc_html_x('Couse Type', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Couse Type', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Couse Types', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Couse Types', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Couse Type', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Couse Type:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Couse Type', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Couse Type', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Couse Type', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Couse Type Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Couse Types', '_themename-_pluginname'),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_admin_column' => true,
		'rewrite' => array('slug' => 'course'),
		'show_in_rest' => true
	);
	
	register_taxonomy('_themename_course_type', array('_themename_recipe'), $args);
}

add_action('init', '_themename__pluginname_register_course_type_tax');