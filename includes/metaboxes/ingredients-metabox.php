<?
// Based on "Repeatable Custom Fields in a Metabox"
// by "Helen Hou-Sandi"
// https://gist.github.com/helen/1593065
 
function _themename_ingredients_add_meta_box() {
	add_meta_box( 
		'_themename-_pluginname_ingredients',
		esc_html__( 'Ingredients', '_themename-_pluginname' ),
		'_themename_ingredients_meta_box_html',
		'_themename_recipe',
		'advanced',
		'default',
		array(
			'__block_editor_compatible_meta_box' => true,
			'__back_compat_meta_box'             => false,
		)
	);
}

add_action('admin_init', '_themename_ingredients_add_meta_box', 1);

function _themename_ingredients_meta_box_html( $post ) {
	$ingredient_fields = get_post_meta( $post->ID, '_themename_indegient_fields', true );

	wp_nonce_field( '_themename_ingredients_nonce', '_themename_ingredients_nonce' );
	?>
	<div class="ingredients-listt"></div>
	<p>Tip: You can add additional ingredients by pressing the "Return/Enter" key.</p>
	<table id="ingredients-list" width="100%">
	<tbody>
	<?php
	
	if ( $ingredient_fields ) :
	
	foreach ( $ingredient_fields as $field ) {
	?>
	<tr>
		<td width="90%"><input type="text" class="widefat _themename_repeat_input" name="ingredient[]" value="<?php if($field['ingredient'] != '') echo esc_attr( $field['ingredient'] ); ?>" /></td>
		<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
	</tr>
	<?php
	}
	else :
	// show a blank one
	?>
	<tr>
		<td width="90%"><input type="text" class="widefat _themename_repeat_input" name="ingredient[]" /></td>
		<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
	</tr>
	<?php endif; ?>
	
	<!-- empty hidden one for jQuery -->
	<tr class="hidden">
		<td width="90%"><input type="text" class="widefat _themename_repeat_input" name="ingredient[]" /></td>
		<td width="10%"><button class="button _themename_repeat_remove"><?php esc_html_e( 'Remove', '_themename-_pluginname' ); ?></button></td>
	</tr>
	</tbody>
	</table>
	
	<p><button class="button _themename_repeat_add"><?php esc_html_e( 'Add another', '_themename-_pluginname' ); ?></button></p>
	</div>
	<?php
}


function _themename_ingredients_meta_box_save($post_id) {
	if ( ! isset( $_POST['_themename_ingredients_nonce'] ) ||
	! wp_verify_nonce( $_POST['_themename_ingredients_nonce'], '_themename_ingredients_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
	$old = get_post_meta($post_id, '_themename_indegient_fields', true);
	$new = array();
	
	$ingredients = $_POST['ingredient'];

	$count = count( $ingredients );
	
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $ingredients[$i] != '' ) :
			$new[$i]['ingredient'] = stripslashes( strip_tags( $ingredients[$i] ) );
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, '_themename_indegient_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, '_themename_indegient_fields', $old );
}

add_action('save_post', '_themename_ingredients_meta_box_save');