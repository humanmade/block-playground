<?php
/**
 * Register and load all custom block scripts & style bundles.
 *
 * @package HM\Custom_Blocks
 */

namespace HM\Custom_Blocks\Assets;

use Asset_Loader;

/**
 * Bind callbacks.
 *
 * @return void
 */
function setup() {
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_editor_assets' );
	add_action( 'enqueue_block_assets', __NAMESPACE__ . '\\enqueue_frontend_assets' );
}

/**
 * Enqueue editor assets from the generated `asset-manifest.json` file.
 *
 * @return void
 */
function enqueue_editor_assets() {
	Asset_Loader\autoenqueue(
		dirname( plugin_dir_path( __FILE__ ) ) . '/build/asset-manifest.json',
		// Expect the bundle to be generated as editor.js.
		'editor.js',
		[
			'handle'  => 'custom-blocks',
			'scripts' => [
				'wp-blocks',
				'wp-components',
				'wp-data',
				'wp-element',
			],
		]
	);
}

/**
 * Enqueue assets from manifest which apply to both block editor & frontend.
 *
 * @return void
 */
function enqueue_frontend_assets() {
	Asset_Loader\autoenqueue(
		plugin_dir_path( __FILE__ ) . 'build/asset-manifest.json',
		// Expect the bundle to be generated as frontend.js.
		'frontend.js',
		[
			'handle'  => 'custom-blocks-frontend',
			'scripts' => [],
		]
	);
}
