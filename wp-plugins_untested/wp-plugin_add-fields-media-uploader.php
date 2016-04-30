<?PHP
/**
 * Add Photographer Name and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */

//Explanation of the code: 
// In the first function, we are simply using an array to specify the field’s label, input type, value, and help text. 
// The second function is checking to see if a value has been set for those fields. IF the value is set, then the post metadata is updated.

// Paste the following code inside the loop TO Display the fields in your attachments template.
// // echo get_post_meta($post->ID, 'be_photographer_url', true);

// If you want to display the fields for your featured image in your archive template or any other template, then simply use:
// // echo get_post_meta(get_post_thumbnail_id(), 'be_photographer_url', true);
 
function be_attachment_field_credit( $form_fields, $post ) {
	$form_fields['be-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
		'helps' => 'If provided, photo credit will be displayed',
	);

	$form_fields['be-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'helps' => 'Add Photographer URL',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function be_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['be-photographer-name'] ) )
		update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );

	if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );
?>