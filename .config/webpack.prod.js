// Example webpack.config.prod.js file.
const { externals, helpers, presets } = require( '@humanmade/webpack-helpers' );
const { filePath } = helpers;

module.exports = presets.production( {
	externals,
	entry: {
		frontend: filePath( 'content/mu-plugins/custom-blocks/src/frontend.js' ),
		editor: filePath( 'content/mu-plugins/custom-blocks/src/editor.js' ),
	},
	output: {
		path: filePath( 'content/mu-plugins/custom-blocks/build' ),
	},
} );
