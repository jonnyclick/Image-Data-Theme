<!DOCTYPE html>
<html class="font-helvetica-regular" <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <?php wp_head(); ?>
        <link rel="shortcut icon" type="image/jpg" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/favicon.png"/>
        <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=e9vawkwcnh5xf90x984qww" async="true"></script>
        <link rel="stylesheet" href="https://use.typekit.net/gjn0xas.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src='https://www.googletagmanager.com/gtag/js?id=UA-128437377-1'></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-128437377-1');
	</script>
    </head>
    <body <?php body_class(); ?>>
        <div class="relative">
            <div class="header-wrapper z-50 top-0" style="position: sticky">
                <header id="main-header" class="top-0 bg-light-grey w-full z-50 py-8 lg:py-4 px-8 transition-all duration-300">
                    <div class="max-w-1644 mx-auto flex justify-between items-center">
                        <div id="header-left" class="max-w-15 lg:max-w-20">
                            <a href="<?php echo home_url(); ?>">
                                <img class="header-logo inline-block align-middle;" src="<?php echo imagedata__getThemeImageUrl('logo.png'); ?>"/>
                            </a>
                            <!-- <div id="header-tagline" class="header-tagline">
                            </div> -->
                        </div>
                        <div id="header-right" class="text-lg" style="z-index: 200;">
                            <?php wp_nav_menu([
                                'theme_location'=>'main',
                                'container'=>'nav',
                                'container_id'=>'main-nav-wrap',
                                'container_class'=>'hidden lg:block',
                                'menu_id'=>'main-nav',
                                'menu_class'=>'px-4 lg:px-0 left-0 hidden lg:flex top-40.8 lg:top-auto fixed h-full lg:h-auto lg:relative w-full bg-light-grey lg:w-auto'
                            ]); ?>
                            <?php wp_nav_menu([
                                'theme_location'=>'mobile-main',
                                'container'=>'nav',
                                'container_id'=>'mobile-main-nav-wrap',
                                'container_class'=>'block lg:hidden',
                                'menu_id'=>'mobile-main-nav',
                                'menu_class'=>'px-4 lg:px-0 left-0 hidden top-28 lg:top-auto fixed h-full lg:h-auto lg:relative w-full bg-light-grey lg:w-auto'
                            ]); ?>
                            <button id="mobile-menu-button" class="block lg:hidden">
                                <img class="block" id="mobile-menu-open-icon" src="<?php echo imagedata__getThemeImageUrl('icons/mobile-menu.png'); ?>"/>
                                <img class="hidden" id="mobile-menu-close-icon" src="<?php echo imagedata__getThemeImageUrl('icons/x.png'); ?>"/>
                            </button>
                        </div>
                    </div>
            </header>
            <div class="ticker-master" style="background-color: #413f3f; font-size: 14px;">
                <div class="ticker-holder max-w-1644 mx-auto">
                    <div class="ticker-wrap py-2 px-2">
                        <div class="ticker max-w-1644">
                            <div class="ticker__item">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Blocks.jpg" style="display: inline-block; max-width: 100px; vertical-align: middle;" />
                            </div>
                            <?php for($i = 0; $i !== 1; $i++): ?>
                            <?php while(have_rows('news_bar', 'options')): the_row(); ?>
                            <div class="ticker__item" style="line-height: 1.2;">
                                <?php
                                    $start = get_sub_field('colour_block_start');
                                    $end = get_sub_field('colour_block_end');

                                    $colours = array(
                                        'blue' => '#009de0',
                                        'pink'  => '#c5017a',
                                        'yellow' => '#ffee00',
                                        'black' => '#000000',
                                        'white' => '#fff',
                                        'light_magenta' => '#9dcff4',
                                        'light_cyan' => '#df9dc3'
                                    )
                                ?>

                                <span style="display: inline-block; position: relative;">
                                    <span style="padding-left: 10px; padding-right: 10px; vertical-align: middle;"><?php the_sub_field('text'); ?>
                                </span>
                            </div>
                            <div class="ticker__item">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Blocks.jpg" style="display: inline-block; max-width: 100px; vertical-align: middle;" />
                            </div>
                        <?php endwhile; ?>
                        <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
                                    </div>

            <script>
                var i = 0;
                var txt = ' Leading the way in data-driven print and imaging';
                var speed = 50;

                function typeWriter() {
                    if (i < txt.length) {
                        document.getElementById("header-tagline").innerHTML += txt.charAt(i);
                        i++;
                        setTimeout(typeWriter, speed);
                    } else {
                        document.getElementById("header-tagline").classList.add("header-tagline--complete");
                    }
                }

                // typeWriter();
                // restartTypeWriter();

                function restartTypeWriter() {
                    setInterval(function() {
                        document.getElementById("header-tagline").innerHTML = "";
                        i = 0;
                        typeWriter();
                    }, 10000);
                }

                // jQuery('.header__news').slick({
                //     arrows: false,
                //     draggable: false,
		        //     autoplaySpeed: 0,
		        //     autoplay: 1,
                //     pauseOnHover: false,
                //     continousSliding: true,
		        //     cssEase: 'linear',
                //     initialSlide: 0,
                //     infinite: true,
                //     arrows: false,
                //     buttons: false,
		        //     speed: 6000,
                //     variableWidth: true,
                //     centerMode: true
                // });

            </script>

            <style>
                @-webkit-keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }
                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
                }
                @keyframes ticker {
                0% {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }
                100% {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }
                }
                .ticker-wrap {
                    bottom: 0;
                    width: 100%;
                    overflow: hidden;
                    padding-left: 100%;
                    box-sizing: content-box;
                }
                .ticker-wrap .ticker {
                    display: inline-block;
                    line-height: 1;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    white-space: nowrap;
                    padding-right: 100%;
                    box-sizing: content-box;
                    -webkit-animation-iteration-count: infinite;
                    animation-iteration-count: infinite;
                    -webkit-animation-timing-function: linear;
                    animation-timing-function: linear;
                    -webkit-animation-name: ticker;
                    animation-name: ticker;
                    -webkit-animation-duration: 30s;
                    animation-duration: 30s;
                }
                .ticker-wrap .ticker__item {
                    display: inline-block;
                    padding: 0 1rem;
                    font-size: 17px;
                    color: white;
                }

                .ticker-holder {
                    overflow: hidden;
                }

                html {
                    overflow-x: hidden;
                }
            </style>
