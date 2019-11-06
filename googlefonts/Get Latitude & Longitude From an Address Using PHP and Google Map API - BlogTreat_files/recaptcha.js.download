/*
 * Plugin:      Google reCAPTCHA in WP comments
 * Path:        /js
 * File:        recaptcha.js
 * Since:       0.0.2
 */

/* 
 * Module:      Recaptcha functions for init form and verify responses
 * Version:     9.1.1
 * Description: This module changes the HTML structure of the form when it's displayed for prevent automatic sending, then it verifies the user's response and when
 *              the user's response is correct it rewrites the HTML structure of the form.
 */
// Global var for storing the form attributes until the verification process is completed and correct.
var attrsa = {};

// Write/rewrite form HTML structure and block/unblock send button.
function griwpcChangeButton ( value, address  ) {
	
	var a, 
		form = GriwpcTools.getForm(),
		ele  = GriwpcTools.getButton( form ), 
		groupElem;

	if ( ( ele === undefined ) || ( form === undefined ) )
		return;

	ele  = jQuery( ele );
	form = jQuery( form );

	if ( value === null ) {
		
		// ID compatibility	themes
		if ( ele.length > 0 )
			ele.attr( 'disabled', '' );
		
		// Forcing blocked mode to all button, anchor, input, span type=submit HTML elements, even without ID
		groupElem = form.find( '[type=submit]' ); 
		if ( groupElem.length > 0 )
			groupElem.attr( 'disabled', '' );
		
		a = form[0].attributes;
		jQuery.each ( a, function (i, v ) {
			if ( v != undefined ) 
				attrsa[ v.name ] = v.value; 
		}); 
		jQuery.each ( attrsa, function (i, v ) {
			if ( ( i != 'id' ) && ( i != 'class' ) ) 
				form.removeAttr( i );
		});
		
		if ( 1 === parseInt( griwpco.allowCreditMode ) ) {
			jQuery( '.google-recaptcha-container' ).append ( '<span class="plugin-credits" style="font-size:0.62rem" ><a target="_blank" href="' + griwpco.home_link_address + '" title="' + griwpco.home_link_title + '" rel="nofollow" >' + griwpco.home_link_text + '</a></span>' );
		}
		
	}
	if ( value === true ) {
		
		// ID compatibility	themes
		if ( ele.length > 0 )
			ele.removeAttr ('disabled');
		
		// Forcing blocked mode to all button, anchor, input, span type=submit HTML elements, even without ID
		groupElem = form.find( '[type=submit]' );
		if ( groupElem.length > 0 )
			groupElem.removeAttr ('disabled');
		
		jQuery.each ( attrsa, function (i, v ) { 
			form.attr( i, v );
		});
		
		form.append( '<input type="hidden" name="griwpcva" value="' + address + '">' );
		
	}
	
}

var griwpcProcessAjaxResponse = function( ajaxResponse ) {
	if ( ( ajaxResponse.status === 200 ) && ( ajaxResponse.readyState === 4 ) && ( ajaxResponse.statusText === "OK" ) ) {
		let processed = JSON.parse( ajaxResponse.response );
		if ( processed.data.result === 'OK' )
			griwpcChangeButton ( true, processed.data.address );
		else
			console.log ( 'Error verifying reCAPTCHA: ', processed );
	} else {
		console.log ( 'Error AJAX Call: ', ajaxResponse );
	}

}

var griwpcVerifyCallback = function( griwpcr ) {
	GriwpcAjax.post ( griwpco.ajax_url, { 'action' : 'griwpc_verify_recaptcha', 'resp' : griwpcr }, griwpcProcessAjaxResponse, true );
}


// Global onload Method
var griwpcOnloadCallback = function() {
	griwpco.recaptcha_elem = grecaptcha.render( griwpco.recaptcha_id, {
	  'sitekey' : griwpco.recaptcha_skey,
	  'theme'	: griwpco.recaptcha_theme,
	  'type'	: griwpco.recaptcha_type,
	  'size'	: griwpco.recaptcha_size,
	  'tabindex' : 0,
	  'callback' : griwpcVerifyCallback
	});
};
(function ($) { griwpcChangeButton ( null, null); })(jQuery);
