<?php
/**
 * Set up meta values which will be used in the demo block editor plugin.
 *
 * Normally this sort of work should go into a (WordPress) plugin-level meta
 * registration namespace, but each of these demo plugins & blocks is meant
 * to be as standalone as possible.
 *
 * @package block-playground
 */

namespace Custom_Blocks\Block_Editor_Plugins\Edit_Meta_Value;

const META_SLUG = 'demo_editor_plugin_meta';

/**
 * Bind action & filter callbacks.
 *
 * @return void
 */
function setup() {
	add_action( 'init', __NAMESPACE__ . '\\register_block_editor_plugin_meta' );
	// Once block editor assets are enqueued, inject our localization data.
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\localize_script_data', 11 );
}

/**
 * Register the meta key used in this demo block editor plugin.
 *
 * @return void
 */
function register_block_editor_plugin_meta() {
	register_post_meta( 'post', META_SLUG, [
		'show_in_rest' => true,
	] );
}


/**
 * Inject block editor plugin-specific values into the JS context.

 * @return void
 */
function localize_script_data() {
	wp_localize_script(
		'custom-blocks',
		'EDIT_META_VALUE_DEMO',
		[
			'meta_slug' => META_SLUG,
		]
	);
}
