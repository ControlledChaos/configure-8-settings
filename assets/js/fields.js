/**
 * Plugin form fields
 *
 * @package    Configure 8 Options
 * @subpackage Assets
 * @category   Scripts
 * @since      1.0.0
 */

jQuery(document).ready( function($) {

	// Page loader options.
	$( '#page_loader' ).on( 'change', function() {
    	var showLoader = $(this).val();
		if ( showLoader == 'true' ) {
			$( "#loader_options" ).fadeIn( 250 );
			$( 'html, body' ).animate( {
				scrollTop: $( '#loader_options' ).offset().top
			}, 1000 );
		} else if ( showLoader == 'false' ) {
			$( "#loader_options" ).fadeOut( 250 );
		}
    });

	// Cover image background.
	$( '#loader_bg_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		showAlpha       : false,
		palette         : [],
		preferredFormat : "hex",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#loader_bg_color' ).show();

	$( '#loader_bg_color_default' ).click( function() {
		$( '#loader_bg_color' ).spectrum( 'set', $( '#loader_bg_default' ).val() );
	});

	// Cover image text.
	$( '#loader_text_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		showAlpha       : false,
		palette         : [],
		preferredFormat : "hex",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#loader_text_color' ).show();

	$( '#loader_text_color_default' ).click( function() {
		$( '#loader_text_color' ).spectrum( 'set', $( '#loader_text_default' ).val() );
	});

	// Cover image background.
	$( '#cover_bg_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		palette         : [],
		preferredFormat : "rgb",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#cover_bg_color' ).show();

	$( '#cover_bg_color_default' ).click( function() {
		$( '#cover_bg_color' ).spectrum( 'set', $( '#cover_bg_default' ).val() );
	});

	// Cover image text.
	$( '#cover_text_color' ).spectrum({
		type            : "component",
		showPalette     : true,
		palette         : [],
		preferredFormat : "rgb",
		showInitial     : true,
		allowEmpty      : false,
		showSelectionPalette : false
	});
	$( '#cover_text_color' ).show();

	$( '#cover_text_color_default' ).click( function() {
		$( '#cover_text_color' ).spectrum( 'set', $( '#cover_text_default' ).val() );
	});

	// Sidebar options.
	$( '#sidebar_social' ).on( 'change', function() {
		var showLoader = $(this).val();
		if ( showLoader == 'true' ) {
			$( "#sb_social_heading_wrap" ).fadeIn( 250 );
			$( 'html, body' ).animate( {
				scrollTop: $( '#sb_social_heading_wrap' ).offset().top
			}, 1000 );
		} else if ( showLoader == 'false' ) {
			$( "#sb_social_heading_wrap" ).fadeOut( 250 );
		}
	});

	// Sidebar options.
	$( '#footer_social' ).on( 'change', function() {
		var showLoader = $(this).val();
		if ( showLoader == 'true' ) {
			$( "#ftr_social_heading_wrap" ).fadeIn( 250 );
			$( 'html, body' ).animate( {
				scrollTop: $( '#ftr_social_heading_wrap' ).offset().top
			}, 1000 );
		} else if ( showLoader == 'false' ) {
			$( "#ftr_social_heading_wrap" ).fadeOut( 250 );
		}
	});

	// Copyright options.
	$( '#copyright' ).on( 'change', function() {
		var showLoader = $(this).val();
		if ( showLoader == 'true' ) {
			$( "#copyright_options" ).fadeIn( 250 );
			$( 'html, body' ).animate( {
				scrollTop: $( '#copy_date' ).offset().top
			}, 1000 );
		} else if ( showLoader == 'false' ) {
			$( "#copyright_options" ).fadeOut( 250 );
		}
	});
});