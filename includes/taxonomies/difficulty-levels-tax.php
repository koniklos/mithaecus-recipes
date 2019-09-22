<?php

function _themename__pluginname_register_difficulty_levels_tax() {
	$labels = array(
		'name'              => esc_html_x('Difficulty Levels', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Difficulty Level', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Difficulty Levels', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Difficulty Levels', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Difficulty Level', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Difficulty Level:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Difficulty Level', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Difficulty Level', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Difficulty Level', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Difficulty Level Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Difficulty Levels', '_themename-_pluginname'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'difficulty' ),
		'show_in_rest'      => true
	);
		
	register_taxonomy('_themename_difficulty', array('_themename_recipe'), $args);
}

add_action('init', '_themename__pluginname_register_difficulty_levels_tax');