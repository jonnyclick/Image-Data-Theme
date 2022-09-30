jQuery(document).ready(function($) {
    jQuery('#what-we-done').slick({
        dots:false,
        infinite:true,
        slidesToShow:4,
        slidesToScroll:1,
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev"><img src="' + params.stylesheet_directory + '/assets/images/icons/chev-left.png"/></button>',
        nextArrow:'<button type="button" class="slick-next"><img src="' + params.stylesheet_directory + '/assets/images/icons/chev-right.png"/></button>',
        responsive:[
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    })
});