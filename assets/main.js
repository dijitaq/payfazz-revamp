// Webpack Imports
//import * as bootstrap from 'bootstrap';
import 'bootstrap/js/dist/dropdown';
import ScrollMagic from 'scrollmagic';
import { TweenMax, TimelineMax } from 'gsap'; // What to import from gsap
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';
ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax);


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
	var controller = new ScrollMagic.Controller();

	new ScrollMagic.Scene( { triggerElement: '#hero-image' } )
		.duration( duration )
		.setClassToggle( '#trigger-hero-image', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#payment' } )
		.duration( duration )
		.setClassToggle( '#trigger-payment', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#capital' } )
		.duration( duration )
		.setClassToggle( '#trigger-capital', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#cash' } )
		.duration( duration )
		.setClassToggle( '#trigger-cash', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	new ScrollMagic.Scene( { triggerElement: '#loyalty' } )
		.duration( duration )
		.setClassToggle( '#trigger-loyalty', 'product-navigation__list-item--active' )
		//.addIndicators()
		.addTo( controller );

	/*
	window.addEventListener('load', (event) => {
    console.log( ajaxobject.data.assets.length );
	});*/
	var image_sequence = document.getElementById( 'image-sequence' );

	var images = ajaxobject.data.assets;

	var obj = { currentImg: 0 };

	var tween = new TweenMax.to( obj, 1,
			{
				currentImg: images.length - 1,
				roundProps: "currentImg",
				repeat: 0,
				immediateRender: true,
				onUpdate: function() {
					image_sequence.src = images[ obj.currentImg ].p;
				}
			}
		);

	new ScrollMagic.Scene( { triggerElement: '#product' } )
		//.addIndicators()
		.duration( 500 )
		.triggerHook( "onLeave" )
		.setPin( '#product' )
		.setTween( tween )
		.addTo( controller );

} )();