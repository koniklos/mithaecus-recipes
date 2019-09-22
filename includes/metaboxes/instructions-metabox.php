<?
// Based on "Repeatable Custom Fields in a Metabox"
// by "Helen Hou-Sandi"
// https://gist.github.com/helen/1593065
 
function _themename_instructions_add_meta_box() {
	add_meta_box( 
		'_themename-_pluginname_instructions',
		esc_html__( 'Instructions', '_themename-_pluginname' ),
		'_themename_instructions_meta_box_html',
		'_themename_recipe',
		'advanced',
		'default',
		array(
			'__block_editor_compatible_meta_box' => true,
			'__back_compat_meta_box'             => false,
		)
	);
}

add_action('admin_init', '_themename_instructions_add_meta_box', 1);

function _themename_instructions_meta_box_html( $post ) {
	$instructions_fields = get_post_meta( $post->ID, '_themename_instructions_fields', true );

	wp_nonce_field( '_themename_instructions_nonce', '_themename_instructions_nonce' );
	?>
<div class="instrictions-list">
	<p>Tip: You can add additional instructions by pressing the "Return/Enter" key.</p>
	<table id="instructions-list" width="100%">
		<tbody>
	<?php
	
	if ( $instructions_fields ) :
	
	foreach ( $instructions_fields as $field ) {
	?>
			<tr>
				<td width="90%"><textarea rows="7" class="widefat _themename_repeat_input" name="instruction[]"><?php if($field['instruction'] != '') echo esc_textarea( $field['instruction'] ); ?></textarea></td>
				<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
			</tr>
	<?php
	}
	else :
	// show a blank one
	?>
			<tr>
				<td width="90%"><textarea rows="7" class="widefat _themename_repeat_input" name="instruction[]"></textarea></td>
				<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
			</tr>
	<?php endif; ?>
	
	<!-- empty hidden one for jQuery -->
			<tr class="hidden">
				<td width="90%"><textarea rows="7" class="widefat _themename_repeat_input" name="instruction[]"></textarea></td>
				<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
			</tr>
		</tbody>
	</table>
	
	<p><button class="button _themename_repeat_add"><?php esc_html_e( 'Add another', '_themename-_pluginname' ); ?></button></p>
</div>
	<?php
}


function _themename_instructions_meta_box_save($post_id) {
	if ( ! isset( $_POST['_themename_instructions_nonce'] ) ||
	! wp_verify_nonce( $_POST['_themename_instructions_nonce'], '_themename_instructions_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, '_themename_instructions_fields', true);
	$new = array();
	
	$instructions = $_POST['instruction'];

	$count = count( $instructions );
	
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $instructions[$i] != '' ) :
			$new[$i]['instruction'] = stripslashes( strip_tags( $instructions[$i] ) );
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, '_themename_instructions_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, '_themename_instructions_fields', $old );
}

add_action('save_post', '_themename_instructions_meta_box_save');