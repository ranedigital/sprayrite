(function($) {
	$(function() {
		if ($('.js-sprayrite-hero').length) {
			$('.js-sprayrite-hero').slick({
				arrows: false,
				dots: true,
				autoplay: true,
				autoplaySpeed: 5000,
				fade: true,
				speed: 600
			});
		}

		if ($('.js-sprayrite-reviews').length && window.matchMedia('(max-width: 767px)').matches) {
			$('.js-sprayrite-reviews').slick({
				arrows: false,
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1
			});
		}
	});
})(jQuery);
