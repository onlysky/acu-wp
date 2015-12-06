/**
 * auto-loans-calc.js
 *
 * Auto Loans Calculator Page
 */

/*jQuery Wrapper*/
(function ($) {

// Load defaults
function loadDefaults() {
	// Set defaults in values
	vehicle = $("#auto-loans-calc-def-vehicle").val();
	//downpayment = $("#auto-loans-calc-def-down").val();
	downpayment = 10000;
	term = $("#auto-loans-calc-def-term").val();
	interest = $("#auto-loans-calc-def-interest").val();
	monthlyPayment = null;

	// Tool Tip for slider
	tooltip = $('<div class="tooltip">$' + downpayment + ' Down</div>');

	// Set defaults in inputs
	$("#field_vehicle").val(vehicle);
	$("#field_term").val(term);
	$("#field_interest").val(interest);

	/*
	console.log("_____defaults____");
	console.log("vehicle: " + vehicle );
	console.log("downpayment: " + downpayment );
	console.log("term: " + term );
	console.log("interest: " + interest );
	*/
}

// Validate Interest
function validateInterest(){
	if( $("#field_interest").val() === '' ){  
    	 $(".interest-error").addClass('error');
  	} else {
  		 $(".interest-error").removeClass('error');
  	}
}

// Validate Vehicle 
function validateVehicle(){
  	if( $("#field_vehicle").val() === '' ){  
    	 $(".vehicle-error").addClass('error');
  	} else {
  		 $(".vehicle-error").removeClass('error');
  	}
}

//Reset the form
function calcReset(){
	//console.log("reset");

	loadDefaults();
	slider.noUiSlider.set(downpayment);

	$('.calc-error').removeClass('error');
	$(".auto-loans-calc").removeClass('results');
	$(".calc-field").prop( "disabled", false );
	slider.removeAttribute('disabled');
	
}

// Calculate the payment
function calculatePayment(){
	//console.log("payment calculated");

	validateInterest();
  	validateVehicle();

  	// Validate downpayment
  	if($("#field_vehicle").val() < downpayment) {
  		 $(".downpayment-error").addClass('error');
  	} else {
  		 $(".downpayment-error").removeClass('error');
  	}


  	//console.log(parseInt($("#field_vehicle").val()));
  	//console.log(downpayment);

  	// Break if either of above are empty
    if ( ($("#field_vehicle").val() === "") || 
    	 ($("#field_interest").val() === "") ||  
    	 ($("#field_vehicle").val() < downpayment )
    )  {  
    	//console.log("validation errors");   
    	$('.general-errors').addClass('error');   
        return false;
    } else {
    	//console.log("validation success");
    	$('.calc-error').removeClass('error');
    }

    // Show Results
	$(".auto-loans-calc").addClass('results');

	// Disable fields
	$(".calc-field").prop( "disabled", true );
	//$("#downpayment-slider").slider("disable");
	slider.setAttribute('disabled', true);

	// Set interest to decimal
	interestDec = interest / 100;
	
	/*
	console.log("+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_");
	console.log("vehicle: " + vehicle); 
	console.log("downpayment: " + downpayment);
	console.log("term: " + term);
	console.log("interest: " + interest); 
	console.log("interest %: " + interestDec); 
	console.log("+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_+_");
	*/

	monthlyPayment = Math.round(( (vehicle - downpayment) * ( (interestDec) / 12)  ) / ( 1 - Math.pow( (1 + (interestDec / 12)), ( (-1) * term ) ) ));

	//console.log("monthly payment: " + monthlyPayment);
	
	// Set the payment
	$("#monthly-payment").text(monthlyPayment);

}

/* Document Ready */
$(document).ready(function () {
	//console.log("autoloans ran");
		
	loadDefaults();

	// Slider for Downpayments
	slider = document.getElementById('downpayment-slider');
	//console.log(downpayment);

	noUiSlider.create(slider, {
		start: downpayment,
		connect: 'lower',
		step:100,
		tooltips: true,
		range: {
			'min': 0,
			'max': 30000,

		},
		format: wNumb({
			decimals: 0,
			thousand: ',',
			prefix: '$',
			postfix: ' Down'
		})
	});

	slider.noUiSlider.on('update', function() {
		downpayment =  parseInt(slider.noUiSlider.get().replace(",", "").replace("$", ""));
		//console.log(downpayment);
	});

	// Init the slider at 0
	//$("#downpayment-slider").slider('value', 0);


	$("#field_vehicle").bind("keyup change", function() {
	  	vehicle = $(this).val();
  		validateVehicle();
		//console.log("vehicle: " + vehicle); 
	});

	// Term
	$("#field_term").on('change', function() {
	   	term = parseInt($(this).val());
	   	//console.log("term: " + term); 
	});

	// interest
	$("#field_interest").bind("keyup change", function() {
	  	interest = $(this).val();
	  	validateInterest();
	  	//console.log("interest: " + interest); 
	});

	// Calculate Value Action
	$("#calc-button").on('click', function() {
	  	calculatePayment();
	});

	// Reset the calc
	$("#auto-loans-reset").on('click', function() {
	  	calcReset();
	});

});// END doc.ready

}(jQuery));
