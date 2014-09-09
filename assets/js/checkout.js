jQuery(function($) {
	"use strict";
	var updateTimer;
	var jqxhr;
	var $valid_checkout = false;

	// Init trigger
	$('body').on('jigoshop.checkout.init', function(){
		$('select.country_to_state').trigger('init');
		update_checkout();
	});

	function update_checkout(){
		if(jqxhr) jqxhr.abort();
		var $payment_method = $('input[name=payment_method]:checked');
		var $ship_to_billing = $('#shiptobilling-checkbox');
		var payment_id = $payment_method.attr('id');
		var method = $('#shipping_method').val();
		var coupon = $('#coupon_code').val();
		var payment_method = $payment_method.val();
		var country = $('#billing_country').val();
		var state = $('#billing_state').val();
		var postcode = $('input#billing_postcode').val();
		var s_country = country;
		var s_state = state;
		var s_postcode = postcode;

		if($ship_to_billing.length > 0 && !$ship_to_billing.is(':checked')){
			s_country = $('#shipping_country').val();
			s_state = $('#shipping_state').val();
			s_postcode = $('input#shipping_postcode').val();
		}

		$('#order_methods, #order_review').block({
			message: null,
			overlayCSS: {
				background: '#fff url(' + jigoshop_params.assets_url + '/assets/images/ajax-loader.gif) no-repeat center',
				opacity: 0.6
			}
		});

		jqxhr = $.ajax({
			type: 'POST',
			url: jigoshop_params.ajax_url,
			data: {
				action: 'jigoshop_update_order_review',
				security: jigoshop_params.update_order_review_nonce,
				shipping_method: method,
				country: country,
				state: state,
				postcode: postcode,
				s_country: s_country,
				s_state: s_state,
				s_postcode: s_postcode,
				payment_method: payment_method,
				coupon_code: coupon,
				post_data: $('form.checkout').serialize()
			}
		})
			.success(function(response){
				$('#order_methods, #order_review').remove();
				$('#order_review_heading').after(response);
				// ensure there is no duplicate #payment from themes
				$('div#payment:not(:last)').remove();
				// reset currently selected gateway
				$('#' + payment_id).attr('checked', true);
				$payment_method.click();
			});

		$('body').trigger('jigoshop.update_checkout');
	}

	function validate_postcode($field){
		if(jigoshop_params.validate_postcode == 'no'){
			return true;
		}
		var country = $('#'+$field.attr('rel')).val();
		var pattern = jigoshop_validation.postcodes[country];
		if(pattern === undefined){
			return true;
		}
		var value = $field.val();
		// Special case for GB
		if(country === 'GB'){
			value = value.replace(' ', '').toLowerCase();
		}
		return pattern.test(value);
	}

	function validate_email($field){
		var pattern = jigoshop_validation.email;
		return pattern.test($field.val());
	}

	function validate_field($field){
		// ensure fields aren't empty
		if($field.val() == '' || $field.val() == 'undefined'){
			return false;
		}

		if($field.attr('id').indexOf('postcode') !== -1){
			return validate_postcode($field);
		}

		if($field.attr('id').indexOf('email') !== -1){
			return validate_email($field);
		}

		return true;
	}

	function set_field_validity(is_valid, $parent){
		if(!is_valid){
			$parent.removeClass('jigoshop-validated').addClass('jigoshop-invalid');
		} else {
			$parent.removeClass('jigoshop-invalid').addClass('jigoshop-validated');
		}
	}

	// handle inline validation of all required checkout fields
	$('form.checkout').on('blur change', '.input-required', function(){
		var $this = $(this);
		var $parent = $this.closest('.form-row');
		set_field_validity(validate_field($this), $parent);
	});

	function validate_required(){
		$('.input-required', $('#customer_details div:not(.hidden)')).each(function(){
			var $this = $(this);
			var $parent = $this.closest('.form-row');
			set_field_validity(validate_field($this), $parent);
		});
		if($('.jigoshop-invalid').size() == 0){
			$valid_checkout = true;
		}
	}

	// ensure there is no duplicate #payment from themes
	$('div#payment:not(:last)').remove();
	// handle hiding and showing the login form
	$('form.login').hide();
	$('a.showlogin').click(function(e){
		e.preventDefault();
		$('form.login').slideToggle();
	});

	// handle hiding and showing the shipping fields
	$('#shiptobilling-checkbox').change(function(){
		if($(this).is(':checked')){
			$('div.shipping-address').slideUp(function(){
				$(this).addClass('hidden');
			});
		} else {
			$('div.shipping-address').slideDown(function(){
				$(this).removeClass('hidden');
			});
		}
	}).change();

	// handle clicks on payment methods
	$('.payment_methods').on('click', '.input-radio', function(){
		if($('.payment_methods input.input-radio').length > 1){
			$('div.payment_box').filter(':visible').slideUp(250);
		}
		$('div.payment_box.' + $(this).attr('ID')).slideDown(250);
	});
	$('input[name=payment_method]:checked').click();

	// handle selections from items requiring an update of totals
	$(document.body).on('change', '#shipping_method, #coupon_code, #billing_country, #billing_state, #billing_postcode, #shipping_country, #shipping_state, #shipping_postcode, #shiptobilling', function(){
		clearTimeout(updateTimer);
		update_checkout();
		validate_required();
	});

	var $create_account = $('#create_account'),
		$account_username = $('#account_username'),
		$account_password = $('#account_password'),
		$account_password_2 = $('#account_password_2');
	// handle account panel 'input-required' for guests allowed or not
	if(jigoshop_params.option_guest_checkout === 'no'){
		$create_account.next().append(' <span class="required">*</span>');
		$account_username.prev().append(' <span class="required">*</span>');
		$account_password.prev().append(' <span class="required">*</span>');
		$account_password_2.prev().append(' <span class="required">*</span>');
		$account_username
			.addClass('input-required')
			.closest('.form-row')
			.removeClass('jigoshop-validated jigoshop-invalid');
		$account_password
			.addClass('input-required')
			.closest('.form-row')
			.removeClass('jigoshop-validated jigoshop-invalid');
		$account_password_2
			.addClass('input-required')
			.closest('.form-row')
			.removeClass('jigoshop-validated jigoshop-invalid');
	} else {
		$('div.create-account').hide();
		$create_account.prev().find('span.required').remove();
		$create_account.change(function(){
			if(!$(this).is(':checked')){
				$('div.create-account').slideUp();
				$account_username
					.removeClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_username.prev().find('span.required').remove();
				$account_password
					.removeClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_password.prev().find('span.required').remove();
				$account_password_2
					.removeClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_password_2.prev().find('span.required').remove();
			} else {
				$('div.create-account').slideDown();
				$account_username
					.addClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_username.prev().append(' <span class="required">*</span>');
				$account_password
					.addClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_password.prev().append(' <span class="required">*</span>');
				$account_password_2
					.addClass('input-required')
					.closest('.form-row')
					.removeClass('jigoshop-validated jigoshop-invalid');
				$account_password_2.prev().append(' <span class="required">*</span>');
			}
		}).change();
	}

	// AJAX Form Submission from 'Place Order' button
	$('form.checkout').submit(function(){
		validate_required();
		var $form = $(this);

		$form.block({
			message: null,
			overlayCSS: {
				background: '#fff url(' + jigoshop_params.assets_url + '/assets/images/ajax-loader.gif) no-repeat center',
				opacity: 0.6
			}
		});

		$.ajax({
			type: 'POST',
			url: jigoshop_params.checkout_url,
			data: $form.serialize(),
			success: function(code){
				$('.jigoshop_error, .jigoshop_message').remove();
				var result = {
					result: 'error'
				};

				try {
					var success = $.parseJSON(code);
					if (success.result !== 'success') {
						result.message = success.message;
					} else {
						result = success;
					}
				}	catch(err) {
					result.message = code;
				}

				if(result.result === 'success'){
					window.location.href = decodeURI(result.redirect);
					return;
				}

				$form.prepend(result.message);
				$form.unblock();
				$('html, body').animate({
					scrollTop: ($('form.checkout').offset().top - 150)
				}, 1000);
			},
			dataType: 'html'
		});

		return false;
	});

	// Update on page load
	if(jigoshop_params.is_checkout == 1){
		$('body').trigger('init_checkout');
		$('body').trigger('jigoshop.checkout.init');
	}
});
