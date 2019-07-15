<?php
/**
 * Provide utilities which may be used to locate block & block editor plugin
 * PHP files within the `src/` JS directory tree, then load and initialize
 * those located namespaces.
 */

namespace Custom_Blocks\Autoloader;

/**
 * Extract the filename slug from a directory path.
 *
 * @param string $directory_path Path to a php file.
 * @return string The filename, without preceeding path or .php suffix.
 */
function get_filename_slug_from_path( string $file_path ) : string {
	return basename( str_replace(
		[ '/namespace.php', '.php' ],
		[ '', '' ],
		$file_path
	) );
}

/**
 * Get the expected PHP namespace from the filename slug.
 *
 * @param string $filename_slug A filename slug, expected as `kebab-case`.
 * @return string Expected PHP namespace, in `Upper_Snake_Case`.
 */
function get_namespace_from_filename_slug( string $filename_slug ) : string {
	return str_replace( ' ', '_', ucwords( implode( ' ', explode( '-', $filename_slug ) ) ) );
}

/**
 * Dynamically require and set up PHP files matching $glob_pattern.
 *
 * @param string $glob_pattern   The glob pattern for which to find & load PHP files.
 * @param string $base_namespace A base namespace to prepend to matched files.
 * @return void
 */
function load( string $glob_pattern, string $base_namespace ) {
	foreach ( glob( $glob_pattern ) as $file ) {
		require_once $file;

		// Convert the file path to a filename slug.
		$filename_slug = get_filename_slug_from_path( $file );

		// Attempt to deduce the name for the loaded namespace's setup method.
		$setup = $base_namespace . '\\' . get_namespace_from_filename_slug( $filename_slug ) . '\\setup';

		if ( function_exists( $setup ) ) {
			call_user_func( $setup );
		} else {
			error_log( printf(
				'Could not find setup method at namespace path %s',
				$setup
			) );
		}
	}
}
