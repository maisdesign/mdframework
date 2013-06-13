<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'md_cfield_';

global $meta_boxes;

$meta_boxes = array();

/* Image meta box */
$meta_boxes[] = array(
	'title' => __( 'Images Uploader', 'rwmb' ),

	'fields' => array(
		/* HEADING */
		array(
			'type' => 'heading',
			'name' => __( 'Upload here your images', 'rwmb' ),
		),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( '<code>Slideshow Custom Image 960px * 300px</code>', 'rwmb' ),
			'id'               => "{$prefix}slideshow_top",
			'type'             => 'plupload_image',
			'max_file_uploads' => 1,
		),
		array(
			'name'             => __( '<code>Preview Custom Image 150px * 75px</code>', 'rwmb' ),
			'id'               => "{$prefix}preview_custom",
			'type'             => 'plupload_image',
			'max_file_uploads' => 1,
		),
		/* IMAGE ADVANCED (WP 3.5+) 
		array(
			'name'             => __( 'Image Advanced Upload', 'rwmb' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		), */
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function md_cfield_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'md_cfield_register_meta_boxes' );
