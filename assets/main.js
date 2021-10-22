// Webpack Imports
//import * as bootstrap from 'bootstrap';
import { Dropdown, Popover } from 'bootstrap';
import ScrollMagic from 'scrollmagic';
import gsap from 'gsap';
import { TweenMax, TimelineMax, ScrollToPlugin } from 'gsap/all'; // What to import from gsap
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';
import Swiper, { Navigation, Pagination } from 'swiper';

gsap.registerPlugin( ScrollToPlugin );
ScrollMagicPluginGsap( ScrollMagic, TweenMax, TimelineMax );
Swiper.use([Navigation, Pagination]);


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

	var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-bs-toggle="popover"]' ) );
	var popoverList = popoverTriggerList.map( function ( popoverTriggerEl ) {
		return new Popover( popoverTriggerEl, {
			trigger: 'focus',
		} );
	} );

	// product page
	var swiper = new Swiper( "#testimonial-swiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    centeredSlides: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

	// home page
	if ( document.body.classList.contains( 'page-template-page-homepage' ) ) {
		var heroImagePopover = new Popover( document.getElementById( '#hero-image' ), {
		  container: document.getElementById( '#hero-image' )
		});

		var paymentPopover = new Popover( document.getElementById( '#payment' ), {
		  container: document.getElementById( '#payment' )
		});

		var capitalPopover = new Popover( document.getElementById( '#capital' ), {
		  container: document.getElementById( '#capital' )
		});

		var cashPopover = new Popover( document.getElementById( '#cash' ), {
		  container: document.getElementById( '#cash' )
		});

		var loyaltyPopover = new Popover( document.getElementById( '#loyalty' ), {
		  container: document.getElementById( '#loyalty' )
		});

		var duration = window.innerHeight;
		var controller = new ScrollMagic.Controller();

		new ScrollMagic.Scene( { triggerElement: '#hero-image' } )
			.duration( duration )
			.setClassToggle( '#trigger-hero-image', 'product-navigation__list-item--active' )
			.on( 'enter', function() { 
				heroImagePopover.show();

			} )
			.on( 'leave', function() { 
				heroImagePopover.hide();

			} )
			.addTo( controller );

		new ScrollMagic.Scene( { triggerElement: '#payment' } )
			.duration( duration )
			.setClassToggle( '#trigger-payment', 'product-navigation__list-item--active' )
			.on( 'enter', function() { 
				paymentPopover.show();

			} )
			.on( 'leave', function() { 
				paymentPopover.hide();

			} )
			.addTo( controller );

		new ScrollMagic.Scene( { triggerElement: '#capital' } )
			.duration( duration )
			.setClassToggle( '#trigger-capital', 'product-navigation__list-item--active' )
			.on( 'enter', function() { 
				capitalPopover.show();

			} )
			.on( 'leave', function() { 
				capitalPopover.hide();

			} )
			.addTo( controller );

		new ScrollMagic.Scene( { triggerElement: '#cash' } )
			.duration( duration )
			.setClassToggle( '#trigger-cash', 'product-navigation__list-item--active' )
			.on( 'enter', function() { 
				cashPopover.show();

			} )
			.on( 'leave', function() { 
				cashPopover.hide();

			} )
			.addTo( controller );

		new ScrollMagic.Scene( { triggerElement: '#loyalty' } )
			.duration( duration )
			.setClassToggle( '#trigger-loyalty', 'product-navigation__list-item--active' )
			.on( 'enter', function() { 
				loyaltyPopover.show();

			} )
			.on( 'leave', function() { 
				loyaltyPopover.hide();

			} )
			.addTo( controller );

		document.addEventListener( 'click', function( event ) {
			if ( !event.target.matches( '.product-navigation__link' ) ) return;

			event.preventDefault();

			var id = event.target.id;

			gsap.to( window, { duration: 0.5, scrollTo: id } );
		} );

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
			.setTween( tween )
			.addTo( controller );
	}

} )();