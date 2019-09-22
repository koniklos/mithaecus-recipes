<?php

function _themename__pluginname_register_seasonals_tax() {
	$labels = array(
		'name'              => esc_html_x('Seasonals', 'taxonomy general name', '_themename-_pluginname'),
		'singular_name'     => esc_html_x('Season', 'taxonomy singular name', '_themename-_pluginname'),
		'search_items'      => esc_html__('Search Seasonals', '_themename-_pluginname'),
		'all_items'         => esc_html__('All Seasonals', '_themename-_pluginname'),
		'parent_item'       => esc_html__('Parent Season', '_themename-_pluginname'),
		'parent_item_colon' => esc_html__('Parent Season:', '_themename-_pluginname'),
		'edit_item'         => esc_html__('Edit Season', '_themename-_pluginname'),
		'update_item'       => esc_html__('Update Season', '_themename-_pluginname'),
		'add_new_item'      => esc_html__('Add New Season', '_themename-_pluginname'),
		'new_item_name'     => esc_html__('New Season Name', '_themename-_pluginname'),
		'menu_name'         => esc_html__('Seasonals', '_themename-_pluginname'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'seasonal' ),
		'show_in_rest'      => true
	);
		
	register_taxonomy('_themename_seasonal', array('_themename_recipe'), $args);
}

add_action('init', '_themename__pluginname_register_seasonals_tax');