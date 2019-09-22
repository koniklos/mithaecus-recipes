<?php

function _themename_additional_info_add_meta_box() {
	add_meta_box(
		'_themename-_pluginname_additional-info',
		esc_html__( 'Additional Info', '_themename-_pluginname' ),
		'_themename_additional_info_html',
		'_themename_recipe',
		'advanced',
		'default',
		array(
			'__block_editor_compatible_meta_box' => true,
			'__back_compat_meta_box'             => false,
		)
	);
}

add_action( 'add_meta_boxes', '_themename_additional_info_add_meta_box' );

function _themename_additional_info_html( $post ) {
	$info = get_post_meta( $post->ID,'_themename-_pluginname_additional-info', true );
	wp_nonce_field( '_themename_additional_info', '_themename_additional_info_nonce' );
	?>

	<p>Write any information you may think it will be useful for the readers.</p>

	<p>
		<label for="_themename-_pluginname_additional-info"><?php _e( 'Additional Info', '_themename-_pluginname' ); ?></label><br>
		<textarea class="widefat" rows="7" name="_themename-_pluginname_additional-info" id="_themename-_pluginname_additional-info" ><?php echo $info; ?></textarea>
	
	</p><?php
}

function _themename_additional_info_save( $post_id, $post ) {
	$can_edit = get_post_type_object( $post->post_type )->cap->edit_post;
	if ( ! isset( $_POST['_themename_additional_info_nonce'] ) || ! wp_verify_nonce( $_POST['_themename_additional_info_nonce'], '_themename_additional_info' ) ) return;
	if ( ! current_user_can( $can_edit, $post_id ) ) return;

	if ( isset( $_POST['_themename-_pluginname_additional-info'] ) )
		update_post_meta( $post_id, '_themename-_pluginname_additional-info', sanitize_text_field( $_POST['_themename-_pluginname_additional-info'] ) );
}

add_action( 'save_post', '_themename_additional_info_save', 10, 2 );