// Webpack Imports
//import * as bootstrap from 'bootstrap';
import 'bootstrap/js/dist/dropdown';
import ScrollMagic from "scrollmagic/scrollmagic/uncompressed/ScrollMagic";


( function () {
	'use strict';

	// Focus input if Searchform is empty
	[].forEach.call( document.querySelectorAll( '.search-form' ), ( el ) => {
		el.addEventListener( 'submit', function ( e ) {
			var search = el.querySelector( 'input' );
			if ( search.value.length < 1 ) {
				e.preventDefault();
				search.focus();
			}
		} );
	} );

	// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers
	var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-bs-toggle="popover"]' ) );
	var popoverList = popoverTriggerList.map( function ( popoverTriggerEl ) {
		return new bootstrap.Popover( popoverTriggerEl, {
			trigger: 'focus',
		} );
	} );

	//
	var duration = window.innerHeight;
	var controller = new ScrollMagic.Controller( { globalSceneOptions: { duration: duration } } );

	new ScrollMagic.Scene( { triggerElement: '#hero-image' } )
		.setClassToggle( '#trigger-hero-image', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#payment' } )
		.setClassToggle( '#trigger-payment', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#capital' } )
		.setClassToggle( '#trigger-capital', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#cash' } )
		.setClassToggle( '#trigger-cash', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#loyalty' } )
		.setClassToggle( '#trigger-loyalty', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	//
	window.addEventListener('load', (event) => {
    //console.log( ajaxobject.data.assets );
	});

} )();