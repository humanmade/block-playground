<?php
/**
 * Plugin Name: HM MU Plugin Loader
 * Description: Loads the MU plugins required to run the site
 * Author:      Human Made Limited
 * Author URI:  https://humanmade.com/
 * Version:     1.0
 *
 * @package siemens-milestones
 */

if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
	return;
}

// Plugins to be loaded for any site.
$global_mu_plugins = [
	'asset-loader/asset-loader.php',
	'custom-blocks/custom-blocks.php',
];

// Load the plugin files, if they exist.
foreach ( $global_mu_plugins as $file ) {
	if ( file_exists( WPMU_PLUGIN_DIR . '/' . $file ) ) {
		require_once WPMU_PLUGIN_DIR . '/' . $file;
	}
}
