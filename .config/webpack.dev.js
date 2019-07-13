// Example webpack.config.prod.js file.
const { externals, helpers, presets } = require( '@humanmade/webpack-helpers' );
const { choosePort, filePath } = helpers;

module.exports = choosePort( 8080 )
	.then( port => presets.development( {
		externals,
		devServer: {
			port,
		},
		entry: {
			editor: filePath( 'content/mu-plugins/custom-blocks/src/editor.js' ),
			frontend: filePath( 'content/mu-plugins/custom-blocks/src/frontend.js' ),
		},
		output: {
			path: filePath( 'content/mu-plugins/custom-blocks/build' ),
			publicPath: `http://localhost:${ port }/`,
		},
	} ) );
