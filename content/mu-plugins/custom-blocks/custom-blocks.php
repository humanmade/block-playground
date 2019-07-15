<?php
/**
 * Custom Blocks plugin
 *
 * Develop Gutenberg blocks without worrying about script loading!
 *
 * @wordpress-muplugin
 * Plugin Name: Custom Blocks
 * Plugin URI:  https://github.com/humanmade/block-playground/tree/master/content/mu-plugins/custom-blocks
 * Description: Develop Gutenberg blocks without worrying about script loading!
 * Author:      Human Made Limited
 * Author URI:  https://humanmade.com/
 *
 * @package block-playground
 */

namespace Custom_Blocks;

require_once __DIR__ . '/inc/assets.php';
Assets\setup();

require_once __DIR__ . '/inc/autoloader.php';
require_once __DIR__ . '/inc/block-editor-plugins.php';
Block_Editor_Plugins\setup();
