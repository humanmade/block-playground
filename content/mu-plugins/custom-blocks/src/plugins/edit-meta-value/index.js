import { compose } from '@wordpress/compose';
import { withDispatch, withSelect } from '@wordpress/data';
import { RichText } from '@wordpress/editor';
import { PluginSidebar } from '@wordpress/edit-post';
import { PanelBody } from '@wordpress/components';

const metaSlug = global.EDIT_META_VALUE_DEMO.meta_slug;

/**
 * Inject property values into the component derived from the wp.data store.
 *
 * @param {Function} select wp.data.select method.
 * @return {Object} Injected properties derived from store data.
 */
const mapSelectToProps = select => {
	const meta = select( 'core/editor' ).getEditedPostAttribute( 'meta' );
	console.log( meta, metaSlug, meta[ metaSlug ] );
	return {
		values: meta[ metaSlug ],
	};
};

/**
 * Inject function properties into the component which use wp.data.dispatch.
 *
 * @param {Function} dispatch wp.data.dispatch method.
 * @return {Object} Injected properties which may utilize dispatch().
 */
const mapDispatchToProps = dispatch => ( {
	updateMeta( values ) {
		console.log( metaSlug );
		dispatch( 'core/editor' ).editPost( {
			meta: {
				[ metaSlug ]: values,
			},
		} );
	},
} );

/**
 * Render the plugin sidebar component.
 *
 * @param {Object}   props      Component properties.
 * @param {String[]} values     Value of custom meta key.
 * @param {Function} updateMeta Function to persist meta updates.
 */
const Sidebar = ( { values, updateMeta } ) => {
	console.log( values );
	return (
	<PluginSidebar
		name={ `${ name }-sidebar` }
		icon="list-view"
		title="Meta Sidebar"
	>
		<PanelBody>
			<h3>Arbitrary list of strings</h3>
			<p>Add or remove lines of text from this editable <code>pre</code> element to update a list of strings in post meta.</p>
			<RichText
				placeholder="Add some text divided by newlines"
				tagName="pre"
				value={ values.join( '<br>' ) }
				onChange={ value => updateMeta( value.split( '<br>' ) ) }
			/>
		</PanelBody>
	</PluginSidebar>
) };

export const name = 'demo-meta-values-editor-plugin';

export const settings = {
	icon: 'list-view',

	render: compose(
		withSelect( mapSelectToProps ),
		withDispatch( mapDispatchToProps ),
	)( Sidebar ),
};
