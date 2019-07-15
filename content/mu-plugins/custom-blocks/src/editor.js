/**
 * Dynamically locate, load & register all Gutenberg blocks & plugins.
 */
import {
	autoloadBlocks,
	autoloadPlugins,
} from 'block-editor-hmr';

/**
 * Opt a generated Webpack require context into hot updates.
 *
 * @param {Object}   context     The generated require.context.
 * @param {Function} loadModules Method which orchestrates module replacement.
 */
const enableHMR = ( context, loadModules ) => {
	if ( module.hot ) {
		module.hot.accept( context.id, loadModules );
	}
}

// Load all block files matching the path `./blocks/{ block directory }/index.js`.
autoloadBlocks( {
	getContext: () => require.context( './blocks', true, /index\.js$/ ),
}, enableHMR );

// Load all plugin files matching the path `./plugins/{ plugin directory }/index.js`.
autoloadPlugins( {
	getContext: () => require.context( './plugins', true, /index\.js$/ ),
}, enableHMR );
