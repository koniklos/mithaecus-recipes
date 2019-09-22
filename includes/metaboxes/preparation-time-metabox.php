<?php

$fields = array(
	array(
		'id' => '_themename-preparation-time',
		'label' => esc_html__('Preparation Time (in minutes)', '_themename-_pluginname'),
		'type' => 'number',
	),
	array(
		'id' => '_themename-cook-time',
		'label' => esc_html__('Cook Time (in minutes)', '_themename-_pluginname'),
		'type' => 'number',
	),
);


function _themename_add_req_time_meta_box() {
	add_meta_box(
		'_themename-_pluginname_required_time',
		esc_html__( 'Required Time', '_themename-_pluginname' ),
		'_themename_req_time_meta_box_html',
		'_themename_recipe',
		'advanced',
		'default',
		array(
			'__block_editor_compatible_meta_box' => true,
			'__back_compat_meta_box'             => false,
		)
	);
}

add_action( 'add_meta_boxes', '_themename_add_req_time_meta_box' );


function _themename_req_time_meta_box_html( $post ) {
	global $fields;
	wp_nonce_field( '_themename_required_time_data', '_themename_required_time_nonce' );
	
	$output = '';
	foreach ( $fields as $field ) {
		$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
		$db_value = get_post_meta( $post->ID, '_themename-_pluginname_required_time_' . $field['id'], true );

		$input = '<input class="regular-text" id="' . $field['id'] . '" name="' . $field['id'] . '" type="number" value="' . $db_value . '" min="0">';
		
		$output .= '<tr><th scope="row">' . $label . '</th><td>' . $input . '</td></tr>';
	}
	echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
}


function _themename_save_req_time_meta_box( $post_id, $post ) {
	global $fields;

	$can_edit = get_post_type_object( $post->post_type )->cap->edit_post;
	
	if( !current_user_can( $can_edit, $post_id )) {
		return;
	}
	
	if ( ! isset( $_POST['_themename_required_time_nonce'] ) || !wp_verify_nonce( $_POST['_themename_required_time_nonce'], '_themename_required_time_data' ) ) {
		return;
	}

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field['id'] ] ) && absint( $_POST[ $field['id'] ] ) ) {
			
			$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );

			update_post_meta( $post_id, '_themename-_pluginname_required_time_' . $field['id'], $_POST[ $field['id'] ] );
		}
	}
}

add_action( 'save_post', '_themename_save_req_time_meta_box', 10, 2 );