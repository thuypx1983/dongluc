(function($){
    $(document).ready(function(){
        $('.news-category ul.product-slider-right').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            vertical: true,
            autoplaySpeed: 2000,
            nextArrow: '<i class="fa fa-chevron-down custom-slick-arr slick-arr-down"></i>',
            prevArrow: '<i class="fa fa-chevron-up custom-slick-arr slick-arr-up"></i>',
			responsive: [
				{
				  breakpoint: 769,
				  settings: {
					slidesToShow: 2,
					vertical: false,
					nextArrow: '<i class="fa fa-chevron-right custom-slick-arr slick-arr-right"></i>',
					prevArrow: '<i class="fa fa-chevron-left custom-slick-arr slick-arr-left"></i>',
				  }
				}
			  ]
        });
        $('.videos ul.video-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            nextArrow: '<i class="fa fa-chevron-right custom-slick-arr slick-arr-right"></i>',
            prevArrow: '<i class="fa fa-chevron-left custom-slick-arr slick-arr-left"></i>',
			responsive: [
				{
				  breakpoint: 767,
				  settings: {
					slidesToShow: 1,					
				  }
				}
			  ]
        });

        $('.news-service ul.news-items').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '<i class="fa fa-chevron-right custom-slick-arr slick-arr-right"></i>',
            prevArrow: '<i class="fa fa-chevron-left custom-slick-arr slick-arr-left"></i>',
			responsive: [
				{
				  breakpoint: 767,
				  settings: {
					slidesToShow: 2,					
				  }
				}
			  ]
        });
		
		$('.popular-product ul.popular_product').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            nextArrow: '<i class="fa fa-chevron-right custom-slick-arr slick-arr-right"></i>',
            prevArrow: '<i class="fa fa-chevron-left custom-slick-arr slick-arr-left"></i>',
			responsive: [
				{
				  breakpoint: 767,
				  settings: {
					slidesToShow: 2,					
				  }
				}
			  ]
        });
		
		$('.partner ul.partner-items').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
			autoplay: true,
            autoplaySpeed: 2000,
			nextArrow: '<i class="fa fa-chevron-right custom-slick-arr slick-arr-right"></i>',
            prevArrow: '<i class="fa fa-chevron-left custom-slick-arr slick-arr-left"></i>',
			responsive: [
				{
				  breakpoint: 767,
				  settings: {
					slidesToShow: 2,					
				  }
				}
			  ]
        });
		
        $(".video-items .thumb300.thumbblock").click(function() {
            $.fancybox({
                'padding'		: 0,
                'autoScale'		: false,
                'transitionIn'	: 'none',
                'transitionOut'	: 'none',
                'title'			: this.title,
                'width'			: 640,
                'height'		: 385,
                'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                'type'			: 'swf',
                'swf'			: {
                    'wmode'				: 'transparent',
                    'allowfullscreen'	: 'true'
                }
            });

            return false;
        });
    });
})(jQuery)
