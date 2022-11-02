<h2 class="text-center lg:text-left uppercase font-HelveticaNeueCondensedBlack text-6xl leading-2.7">Other <span class="text-site-pink">Services</span></h2>

<div id="other-services-slider" class="block w-full font-HelveticaNeueCondensedBold text-2xl text-white uppercase">

    <?php
        $current_id = get_the_ID();
        $services =  new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post__not_in' => array($current_id)
        ));

        $i = 0;
            while($services->have_posts()): $services->the_post();

                // Get Data.
                $serviceTextColour = get_field('service_text_colour');
                $serviceLastWordColour = get_field('service_last_word_colour');
                $serviceBackgroundColour = get_field('service_colour');
                $serviceImageColour = get_field('service_image_colour');

                // Get Classes.
                $serviceTextColourClass = imagedata__colourToClass($serviceTextColour,'text-');
                $serviceColourClass =  imagedata__colourToClass($serviceBackgroundColour,'bg-');
                $serviceColourClass =  imagedata__colourToClass($serviceBackgroundColour,'bg-');

                // Set Image colour depending on option
                if($serviceImageColour == 'black') {
                    $img_css = 'filter: brightness(0) invert(0)';
                } else {
                    $img_css = 'filter: brightness(0) invert(1)';
                }

                if($serviceLastWordColour) {
                    $serviceLastWordClass = imagedata__colourToClass($serviceLastWordColour,'text-');
                } else {
                    $serviceLastWordClass = 'text-white';
                }

                ?>
                    <div>
                        <div class="py-5 lg:py-0 px-4 <?php echo $serviceColourClass; ?> text-center relative flex" style="height: 197px;">
                            <div class="w-full self-center">
                                <a href="<?php the_permalink(); ?>">
                                <img  class="block mx-auto max-w-4.5 mb-3.5" style="<?php echo $img_css ?>" src="<?php echo get_field('service_icon'); ?>"/>
                                    <h6 style="line-height: 1.4;" class="<?php echo $serviceTextColourClass; ?>">
                                        <?php if(str_word_count(get_the_title(get_the_ID())) == 1): ?>
                                            <span class="<?php echo $serviceTextColourClass ?>">
                                                <?php echo get_the_title(get_the_ID()); ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="<?php echo $serviceTextColourClass ?>"> <?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),$serviceLastWordClass,'',1); ?></span>
                                        <?php endif; ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                $i++;
                ?> 
                <?php
            endwhile;
            wp_reset_postdata();
    ?>

</div>

<script>
        jQuery('#other-services-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
            speed: 8000,
            autoplaySpeed: 0,
            autoplay: true,
            cssEase: 'linear',
            arrows: false,
            draggable: false,
            pauseOnHover: false,
            pauseOnFocus: false,
            infinite: true,
            prevArrow:'<button type="button" class="slick-prev"><img src="' + '<?php echo get_stylesheet_directory_uri(); ?>' + '/assets/images/icons/chev-left.png"/></button>',
            nextArrow:'<button type="button" class="slick-next"><img src="' + '<?php echo get_stylesheet_directory_uri(); ?>' + '/assets/images/icons/chev-right.png"/></button>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
</script>

<style>
    #other-services-slider {
        position: relative;
    }

    #other-services-slider .slick-prev  {
        left: -60px;
        top: 50%;
        transform: translateY(-50%);
        position: absolute;
    }

    
    #other-services-slider .slick-next  {
        right: -60px;
        top: 50%;
        transform: translateY(-50%);
        position: absolute;
    }

    @media(max-width: 1200px) {
        #other-services-slider .slick-next  {
            position: absolute;
            top: -50px;
            transform: none;
            right: 0;
        }

        #other-services-slider .slick-prev  {
            position: absolute;
            top: -50px;
            transform: none;
            right: 70px;
            left: auto;
        }
    }

</style>
