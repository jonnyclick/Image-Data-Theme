        <footer class="bg-footer bg-cover filter grayscale">
            <div class="bg-footer-black w-full h-full py-28">
                <div class="max-w-1226 mx-auto px-8">
                    <h3 class="uppercase font-HelveticaNeueCondensedBlack text-7xl text-center mb-5">How Can We Help You?</h3>
                    <p class="text-2xl text-center mb-12">Fill out our enquiry form or drop us a line if you would like to have a chat about how we can help you.</p>
                    <?php echo do_shortcode('[contact-form-7 id="247" title="Contact form 1"]'); ?>
                    <h4 class="font-HelveticaNeueCondensedBlack text-5xl text-center mt-14">Call <a href="tel:<?php echo (($phoneNumber = get_option('phone_number')) ? $phoneNumber : PHONE_NUMBER); ?>"><?php echo (($phoneNumber = get_option('phone_number')) ? $phoneNumber : PHONE_NUMBER); ?></a></h4>
                </div>
            </div>
        </footer>
        <footer id="secondary-footer" class="bg-light-grey py-16">
            <div class="xl:flex max-w-1642 mx-auto px-8 justify-between items-center">
                <div>
                    <?php wp_nav_menu([
                        'theme_location'=>'footer',
                        'container'=>'nav',
                        'container_id'=>'footer-nav-wrap',
                        'menu_id'=>'footer-nav',
                        'menu_class'=>'lg:flex text-left mb-4 md:mb-0 footer-nav'
                    ]); ?>
                </div>
                <div style="display: flex; align-items: center;">
                    <ul class="flex-wrap lg:flex-nowrap flex mt-5 items-center lg:mt-0 justify-evenly lg:justify-start">
                        <li class="mb-5 mt-5" style="margin-right: 50px;">
                        <img style="" class=" inline-block" src="<?php the_field('logo_1', 'option'); ?>"/>
                        </li>
                        <li class="mb-5 mt-5" style="margin-right: 50px;">
                        <img style="max-width: 70px;" class=" inline-block" src="<?php the_field('logo_2', 'option'); ?>"/>
                        </li>
                        <li class="mb-5 mt-5" style="margin-right: 50px;">
                        <img style="max-width: 115px;" class=" inline-block" src="<?php the_field('logo_3', 'option'); ?>"/>
                        </li>
                        <li style="vertical-align: middle; display: inline-block;">
                            <a class="inline-block" style="" href="<?php echo get_option('linked_in_url'); ?>" target="_blank">
                            <img style="max-width: 110px;" class=" inline-block" src="<?php echo imagedata__getThemeImageUrl('icons/linkedin-full.png'); ?>"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="max-w-1642 mx-auto px-8 mt-7">
                <div class="h-px bg-border-grey w-full md-5 lg:mb-3"></div>
                <ul id="bottom-footer-nav" class="lg:flex text-sm">
                    <li class="mr-2.5 mb-1.5 lg:mb-0">Copyright &copy; <?php echo COMPANY_NAME; ?> <?php echo date('Y',time()); ?></li>
                    <li class="mr-2.5 mb-1.5 lg:mb-0">Registered Number: <?php echo REGISTERED_NUMBER; ?></li>
                    <li class="mr-2.5 mb-1.5 lg:mb-0">Registered In <?php echo REGISTERED_COUNTRY; ?></li>
                    <li class="mr-2.5 font-HelveticaNeueBold mb-1.5 lg:mb-0"><a href="<?php echo get_option('plant_list_url'); ?>" target="_blank">Plant List</a></li>
                    <li class="mr-2.5 font-HelveticaNeueBold mb-1.5 lg:mb-0"><a href="/privacy-policy">Privacy Policy</a></li>
                    <li class="mr-2.5 font-HelveticaNeueBold mb-1.5 lg:mb-0"><a href="<?php echo get_option('modern_slavery_act_url'); ?>" target="_blank">Modern Slavery Act</a></li>
                </ul>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
