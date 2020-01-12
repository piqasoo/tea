$(document).ready(function(){

	// Main slider
	if($('.slider').length > 0){
		$('.slider').slick({
			autoplay: true,
		    dots: true,
			infinite: true,
			speed: 300,
			fade: true,
			cssEase: 'linear'
		});
	}

	if($('.reviews-container').length > 0){
		$('.reviews-container').slick({
			autoplay: true,
			slidesToScroll: 1,
		    dots: true,
			infinite: true,
			speed: 300,
			fade: true,
			cssEase: 'linear',
			arrows: false,
		});
	}
	
	if($('.fancybox').length > 0){
		$('.fancybox').fancybox();
	}

});