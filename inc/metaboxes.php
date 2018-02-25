<?php

add_action( 'cmb2_admin_init', 'cmb2_skeeter_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_skeeter_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_skeeter_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'about_metabox',
		'title'         => __( 'Column Content', 'skeeter' ),
		'object_types'  => array( 'page', ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'templates/about.php' ),
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// Textarea for left column
	$cmb->add_field( array(
		'name'       => __( 'Left Column', 'skeeter' ),
		'desc'       => __( 'Content for left column', 'skeeter' ),
		'id'         => $prefix . 'left',
		'type'       => 'textarea',
	) );

	// Textarea for right column
	$cmb->add_field( array(
		'name'       => __( 'Right Column', 'skeeter' ),
		'desc'       => __( 'Content for right column', 'skeeter' ),
		'id'         => $prefix . 'right',
		'type'       => 'textarea',
	) );
	
		/**
	 * metabox for project
	 */
	$cmb_project = new_cmb2_box( array(
		'id'            => 'project_metabox',
		'title'         => __( 'Images', 'skeeter' ),
		'object_types'  => array( 'project', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// Images for project
	$cmb_project->add_field( array(
		'name'       => __( 'Images', 'skeeter' ),
		'desc'       => __( 'Upload images', 'skeeter' ),
		'id'         => $prefix . 'images',
		'type'       => 'file_list',
	) );

	// Add other metaboxes as needed
}





// add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
// /**
//  * Define the metabox and field configurations.
//  */
// function cmb2_sample_metaboxes() {

// 	// Start with an underscore to hide fields from custom fields list
// 	$prefix = '_yourprefix_';

// 	/**
// 	 * Initiate the metabox
// 	 */
// 	$cmb = new_cmb2_box( array(
// 		'id'            => 'test_metabox',
// 		'title'         => __( 'Test Metabox', 'cmb2' ),
// 		'object_types'  => array( 'page', ), // Post type
// 		'context'       => 'normal',
// 		'priority'      => 'high',
// 		'show_names'    => true, // Show field names on the left
// 		// 'cmb_styles' => false, // false to disable the CMB stylesheet
// 		// 'closed'     => true, // Keep the metabox closed by default
// 	) );

// 	// Regular text field
// 	$cmb->add_field( array(
// 		'name'       => __( 'Test Text', 'cmb2' ),
// 		'desc'       => __( 'field description (optional)', 'cmb2' ),
// 		'id'         => $prefix . 'text',
// 		'type'       => 'text',
// 		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
// 		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
// 		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
// 		// 'on_front'        => false, // Optionally designate a field to wp-admin only
// 		// 'repeatable'      => true,
// 	) );

// 	// URL text field
// 	$cmb->add_field( array(
// 		'name' => __( 'Website URL', 'cmb2' ),
// 		'desc' => __( 'field description (optional)', 'cmb2' ),
// 		'id'   => $prefix . 'url',
// 		'type' => 'text_url',
// 		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
// 		// 'repeatable' => true,
// 	) );

// 	// Email text field
// 	$cmb->add_field( array(
// 		'name' => __( 'Test Text Email', 'cmb2' ),
// 		'desc' => __( 'field description (optional)', 'cmb2' ),
// 		'id'   => $prefix . 'email',
// 		'type' => 'text_email',
// 		// 'repeatable' => true,
// 	) );

// 	// Add other metaboxes as needed

// }