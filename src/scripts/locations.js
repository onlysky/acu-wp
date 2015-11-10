/**
 * locations.js
 *
 * Locations page scripts
 */

/*jQuery Wrapper*/
(function ($) {

/* Document Ready */
$(document).ready(function () {
	console.log("locations ran");

	$('.locations-iframe').iFrameResize({
		checkOrigin: false,
		log: true,
		heightCalculationMethod: 'lowestElement'
	});

	//!TODO 
	// Need to place the content file in the frame:
	// https://github.com/davidjbradshaw/iframe-resizer

});// END doc.ready

}(jQuery));
