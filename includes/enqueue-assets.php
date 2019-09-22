<?php

function _themename__pluginname_admin_scripts() {
	global $pagenow;
	global $post;

	if ( $pagenow !== 'post.php' ) {
		return;
	}

	if ( $post->post_type === '_themename_recipe' ) {
		// Enqueue...

		wp_enqueue_script( '_themename-_pluginname-admin-scripts', plugins_url(
			'_themename-recipes/dist/assets/js/admin.js'
		), array( 'jquery' ), date('ydmGis'), true );
	
		// wp_enqueue_style( '_themename-_pluginname-admin-stylesheets', plugins_url(
		// 	'_themename-metaboxes/dist/assets/css/admin.css'
		// ), array(), date('ydmGis'), 'all' );
	}
	
}

add_action( 'admin_enqueue_scripts', '_themename__pluginname_admin_scripts' );