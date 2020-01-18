$(document).ready(function(){
	scrolledHeader();
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

	window.addEventListener('scroll',function(e){
        scrolledHeader();
    });

    function scrolledHeader(){
    	var scrollTop = document.documentElement.scrollTop;
        var elementHeight = document.querySelector('.header-fixed').offsetHeight;
        // document.documentElement.scrollTop || window.pageYOffset;
        // console.log(scrollTop, elementHeight);
        if (scrollTop > elementHeight) {
            document.querySelector('.header-fixed').classList.add('active')
        }else {
            document.querySelector('.header-fixed').classList.remove('active')
        }
    }

    if($('.albumn-item-container').length > 0 && $('.albumn-items-container').length > 0){
    	
    	$('.albumn-items').mouseover(function(){
    		var src = $(this).find('img').attr('src');
    		$('#albumn-item').attr('src', src);
    		console.log(src);
    	})
    }

});