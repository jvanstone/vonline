(function ($) {

	var vonlineTeamCarouselrun = function ($scope, $) {

		if ( $().owlCarouselFork ) {
			$(".roll-team:not(.roll-team.no-carousel)").owlCarouselFork({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 3,
				itemsDesktopSmall: [1400,3],
				itemsTablet:[970,2],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: false,
				autoPlay: false,
			}); // end owlCarouselFork
		} // end if  		
	};

    var vonlineTestimonialsCarouselrun = function ($scope, $) {

		if ( $().owlCarouselFork ) {
			$('.roll-testimonials').not('.owl-carousel').owlCarouselFork({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 1,
				itemsDesktop: [3000,1],
				itemsDesktopSmall: [1400,1],
				itemsTablet:[970,1],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: true,
				autoPlay: $('.roll-testimonials').data('autoplay')
			});
		} 

    };    

    var vonlineNewsCarouselrun = function ($scope, $) {

		if ( $().owlCarouselFork ) {
			$(".panel-grid-cell .latest-news-wrapper").owlCarouselFork({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 3,
				itemsDesktopSmall: [1400,3],
				itemsTablet:[970,2],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: false,
				autoPlay: false
			}); // end owlCarouselFork

		} // end if

	}; 	
	
	var vonlinegroupProductYITHActions = function() {

		var product = $( '.woocommerce ul.products li.product' );
		product.each(function (index, el) {
			var placeholder = $( el ).find( '.yith-placeholder' );

			var wcqv 		= $( el ).find( '.yith-wcqv-button' );
			var wcwl 	= $( el ).find( '.yith-wcwl-add-to-wishlist' );
			var compare		= $( el ).find( '.compare.button' );

			placeholder.append( wcqv, wcwl, compare);

		});
	}	

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/vonline-testimonials.default', vonlineTestimonialsCarouselrun);
        elementorFrontend.hooks.addAction('frontend/element_ready/vonline-posts.default', vonlineNewsCarouselrun);		
		elementorFrontend.hooks.addAction('frontend/element_ready/vonline-employee-carousel.default', vonlineTeamCarouselrun);

		elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
			vonlinegroupProductYITHActions();
		} );		
	});


})(jQuery);