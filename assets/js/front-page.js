jQuery(document).ready(($) => {

    $('#home-slider-wrapper').slick({
        dots:true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:false
    });

    $('.team-member-blocks-track').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        autoplaySpeed: 0,
        cssEase: 'linear',          
        speed: 2500,
        cssEase: 'linear',  
        pauseOnHover: false,
        autoplay: true,
        infinite: true,
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('#home-project-slider').slick({
        dots:false,
        infinite:true,
        slidesToShow:5,
        slidesToScroll:1,
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev"><img src="' + params.stylesheet_directory + '/assets/images/icons/chev-left.png"/></button>',
        nextArrow:'<button type="button" class="slick-next"><img src="' + params.stylesheet_directory + '/assets/images/icons/chev-right.png"/></button>',
        responsive:[
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('#home-team-slider').slick({
       dots:false,
       infinite:true,
       slidesToShow:5,
       slidesToScroll:1,
       arrows:false,
        responsive:[
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});
