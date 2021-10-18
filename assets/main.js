// Webpack Imports
//import * as bootstrap from 'bootstrap';
import ScrollMagic from "scrollmagic/scrollmagic/uncompressed/ScrollMagic";
//import addIdicators from "scrollmagic/scrollmagic/uncompressed/plugins/debug.addIdicators.js";


( function () {
	'use strict';

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

} )();