<?php

function _themename__pluginname_admin_scripts() {
	$screen = get_current_screen();

	if ( $screen->base !== 'post' ) return;

	if ( $screen->post_type === '_themename_recipe' ) {
		wp_enqueue_script( '_themename-_pluginname-admin-scripts', plugins_url(
			'_themename-recipes/dist/assets/js/admin.js'
		), array( 'jquery' ),'20190923', true );
	}
	
}

add_action( 'admin_enqueue_scripts', '_themename__pluginname_admin_scripts' );