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
        <div class="relative overflow-x-hidden">
            <header id="main-header" class="fixed top-0 bg-light-grey w-full z-50 py-8 lg:py-14 px-8 transition-all duration-300">
                <div class="max-w-1644 mx-auto flex justify-between items-center">
                    <div id="header-left" class="max-w-15 lg:max-w-20">
                        <a href="<?php echo home_url(); ?>">
                            <img class="header-logo inline-block align-middle;" src="<?php echo imagedata__getThemeImageUrl('logo.png'); ?>"/>
                        </a>
                        <!-- <div id="header-tagline" class="header-tagline">
                        </div> -->
                    </div>
                    <div id="header-right" class="text-lg">
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
            </script>
