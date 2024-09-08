( function( api ) {

	// Extends our custom "newspaper-eye-pro" section.
	api.sectionConstructor['newspaper-eye-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
