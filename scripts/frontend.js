$ = jQuery;

$(document).ready(function () {
	$('.blog-carousel').owlCarousel({
		loop: true,
		margin: 50,
		autoplay: true,
		autoplayTimeout: 3000,
		nav: true,
		dots: false,
		responsive: {
			480: {
				items: 1,
				nav: true,
				dots: false
			},
			768: {
				items: 2
			},
			1024: {
				items: 3
			},
			1300: {
				items: 3
			}
		}
	});
});