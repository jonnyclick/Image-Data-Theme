jQuery(document).ready(function($){

    $('#mobile-menu-button').click(function(e){
        e.preventDefault();

        $('#mobile-main-nav').toggleClass('hidden').toggleClass('block');
        $('#mobile-menu-open-icon').toggleClass('block').toggleClass('hidden');
        $('#mobile-menu-close-icon').toggleClass('block').toggleClass('hidden');
    })


    $('#mobile-main-nav li.menu-item-has-children a').click(function(e){


        if($(this).attr('href') === '#')
            e.preventDefault();

        let parent = $(this).parents('li').first();

        $('ul.sub-menu',parent).slideToggle();
    })

});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    const header = document.getElementById('main-header');
    const headerTagline = document.getElementById('header-tagline');
    
    // if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    //     header.classList.remove('lg:py-14');
    //     header.classList.add('lg:py-4');
    //     jQuery('#header-tagline').fadeOut();
        
    // } else {
    //     header.classList.remove('lg:py-4');
    //     header.classList.add('lg:py-14');
    //     jQuery('#header-tagline').fadeIn();
    // }
}
