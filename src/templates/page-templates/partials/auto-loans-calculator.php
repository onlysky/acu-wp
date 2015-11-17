<?php
/**
 * Auto Loans Calculator
 * 
 * The payments calculator on the auto loans page
 * 
 *
 * @package onlysky_wp_framework
 */
?>

<section class="auto-loans-calc">
	<h2>Monthly Payment Calculator</h2>
	
	<div id="auto-loans-calc-inputs" class="auto-loans-calc-section">
		
		<div class="vehicle calc-field-container">
			$<input class="calc-field" id="field_vehicle" min="1" type="number" /> Vehicle
			<div class="calc-error vehicle-error">Loan amount must be greater than $0.</div>
		</div>

		<div class="downpayment calc-field-container">
			<div class="calc-field" id="downpayment-slider"></div>
			<div class="calc-error downpayment-error">Downpayment must be less than vehicle price.</div>
		</div>

		<div class="term calc-field-container">
			Paid within <select class="calc-field" name="term" id="field_term">
				<option value="24">24</option>
				<option value="36" selected="selected">36</option>
				<option value="48">48</option>
				<option value="60">60</option>
				<option value="72">72</option>
				<option value="84">96</option>
			</select> Months
		</div>

		<div class="interest calc-field-container">
			At <input class="calc-field" id="field_interest" min="0.1" max="100" type="number" /> % Interest
			<div class="calc-error interest-error">Interest rate must be greater than 0.</div>
		</div>
		
	</div>

	<div id="auto-loans-calc-results" class="auto-loans-calc-section">
		
		<div class="calc-button-container">
			<button id="calc-button">Calculate Payments</button>
			<div class="calc-error general-errors">Please correct any errors</br> and try again.</div><!-- END.calc-error -->
		</div><!-- END.calc-button-container -->


		<div class="results-container">
			<h3>Estimated monthly payments:</h3>
			<span id="monthly-payment"></span>
			<a href="https://secure.loanspq.com/Consumer/login/default.aspx?enc2=CjDDGQgp6ViDEpMSQAmj1BrznXiYXI9_mgrD6HHA_0bvm1Hg6qS5mEakL1T37HGGZ-9ScKrrPEdSQf2zQYxTnsqrSL1JAlRoTQCYd2VHAjAi5n-lmPYXoKBNbC6Py5l1" id="auto-loans-calc-apply-button" class="button">Apply Online</a>
			<span id="auto-loans-reset">Reset the calculator</span>
		</div><!-- END.results -->
	</div><!-- END.auto-loans-calc-section -->
	
</section>