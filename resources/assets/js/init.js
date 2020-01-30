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
        // console.log(elementHeight, scrollTop);
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
    if($('.burger-menu').length > 0){
    	$('.burger-menu').click(function(){
    		$('.header-mobile').toggleClass('active');
    		$('body').toggleClass('unscrollable');

    		if($('.header-mobile .subs').length > 0){
				var length = $('.header-mobile .subs').length;
				for (var i = 0; i <= length; i++) {
					$('.header-mobile .subs').eq(i).removeClass('active');
					// console.log(i);
				}
			}
			$(this).toggleClass('close-burger');
    	});
    }
    var length = $('.tab-item').length;
	// console.log(length);
	if(length > 0){
		$('.tab-item').click(function(){
			for (var i = 0; i < length; i++) {
				$('.tab-item').eq(i).removeClass('current');
			}
			$(this).addClass('current');
			// console.log($(this));
		});
	}

	
	$('.header nav ul li').mouseout(function(){
		$(this).find('.sub-nav').css({"opacity": "0", "visibility":"hidden"});
		// console.log($(this));
	});
	$('.header nav ul li.subs').mouseover(function(){
		$(this).find('.sub-nav').css({"opacity": "1", "visibility":"visible"});
		// console.log($(this));
	});
	$('.header-fixed nav ul li').mouseout(function(){
		$(this).find('.sub-nav').css({"opacity": "0", "visibility":"hidden"});
		// console.log($(this));
	});
	$('.header-fixed nav ul li.subs').mouseover(function(){
		$(this).find('.sub-nav').css({"opacity": "1", "visibility":"visible"});
		// console.log($(this));
	});
	$('.header-mobile .subs').click(function(){
		console.log($('.header-mobile .subs').length);
		if($('.header-mobile .subs').length > 0){
			var length = $('.header-mobile .subs').length;
			for (var i = 0; i <= length; i++) {
				$('.header-mobile .subs').eq(i).removeClass('active');
				console.log(i);
			}
		}
		$(this).toggleClass('active');
	})

});