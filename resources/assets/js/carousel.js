$(document).ready(function() {
	$(".owl-carousel").owlCarousel({
		items : 3,
		autoPlay: true,
		pagination: false
	});

	$(".owl-carousel-slide").owlCarousel({
		singleItem : true,
		autoPlay: true,
		pagination: false
	});

	$(".owl-carousel-featured").owlCarousel({
		items : 4,
		autoPlay: true,
		pagination: false
	});
});