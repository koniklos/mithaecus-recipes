<?php

function _themename_serves_add_meta_box() {
	add_meta_box(
		'_themename-_pluginname_serves',
		esc_html__( 'Serves', '_themename-_pluginname' ),
		'_themename_serves_html',
		'_themename_recipe',
		'side',
		'default',
		array(
			'__block_editor_compatible_meta_box' => true,
			'__back_compat_meta_box'             => false,
		)
	);
}

add_action( 'add_meta_boxes', '_themename_serves_add_meta_box' );

function _themename_serves_html( $post ) {
	$serves = get_post_meta( $post->ID,'_themename-_pluginname_serves', true );
	wp_nonce_field( '_themename_serves', '_themename_serves_nonce' );
	?>
	<p>
		<label for="_themename-_pluginname_serves"><?php _e( 'Serves', '_themename-_pluginname' ); ?></label><br>
		<input class="widefat" rows="7" name="_themename-_pluginname_serves" id="_themename-_pluginname_serves" type="number" min="0" value="<?php echo esc_attr( $serves ); ?>"/>
	
	</p><?php
}

function _themename_serves_save( $post_id, $post ) {
	$can_edit = get_post_type_object( $post->post_type )->cap->edit_post;
	if ( ! isset( $_POST['_themename_serves_nonce'] ) || ! wp_verify_nonce( $_POST['_themename_serves_nonce'], '_themename_serves' ) ) return;
	if ( ! current_user_can( $can_edit, $post_id ) ) return;

	if ( isset( $_POST['_themename-_pluginname_serves'] ) )
		update_post_meta( $post_id, '_themename-_pluginname_serves', sanitize_text_field( $_POST['_themename-_pluginname_serves'] ) );
}

add_action( 'save_post', '_themename_serves_save', 10, 2 );