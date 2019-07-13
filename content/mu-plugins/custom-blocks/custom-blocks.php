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
 * @package HM\Custom_Blocks
 */

namespace HM\Custom_Blocks;

require_once __DIR__ . '/inc/assets.php';
Assets\setup();
