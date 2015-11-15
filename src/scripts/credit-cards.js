/**
 * credit-cards.js
 *
 * Credit Cards Page Script
 */

/*jQuery Wrapper*/
(function ($) {

// Toggle Credit Card Accordion Item
function toggleCreditCard(creditCard) {
	$(creditCard).toggleClass('open');
}

/* Document Ready */
$(document).ready(function () {

	// Credit Card accordion item toggle switch
	$('.credit-card-toggle').on( "click", function() {
	  var creditCard = this.closest('.credit-card');
	  toggleCreditCard(creditCard);
	});

});// END doc.ready

}(jQuery));
