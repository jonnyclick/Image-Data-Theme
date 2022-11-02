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
                // if(get_field('service_colour')) {
                //     $serviceColour = get_field('service_colour',get_the_ID());
                //     $serviceColourClass = imagedata__colourToClass($serviceColour,'bg-');
                // } else {
                //     $serviceColourClass = 'bg-black';
                // }
            
                // if(get_field('service_text_colour')) {
                //     $serviceTextColour = get_field('service_text_colour',get_the_ID());
                //     $serviceTextColourClass = imagedata__colourToClass($serviceTextColour,'text-');
                // } else {
                //     $serviceTextColourClass = "text-white";
                // }

                $serviceTextColourClass = imagedata__colourToClass('white','text-');
                $serviceColourClass =  imagedata__colourToClass('black','text-');
                
                if(get_field('service_colour')) {
                    $serviceColour = get_field('service_colour',get_the_ID());
                    $serviceColourClass = imagedata__colourToClass($serviceColour,'bg-');
                } else {
                    $serviceColourClass = 'bg-black';
                }
                
                if(get_field('service_colour') == 'yellow') {
                    if(get_field('service_text_colour') !== 'white') {
                        $serviceTextColourClass = imagedata__colourToClass('black','text-');
                    }
                } else {
                    $serviceTextColourClass = imagedata__colourToClass('white','text-');
                }
    
                    ?>
                    <div>
                        <div class="py-5 lg:py-0 px-4 <?php echo $serviceColourClass; ?> text-center relative flex" style="height: 197px;">
                            <div class="w-full self-center">
                                <a href="<?php the_permalink(); ?>">
                                <img  class="block mx-auto max-w-4.5 mb-3.5" src="<?php echo get_field('service_icon'); ?>"/>
                                    <h6 style="line-height: 1.4;" class="<?php echo $serviceTextColourClass; ?>">
                                    <?php if(get_field('service_colour') == 'yellow'): ?>
                                        <?php if(str_word_count(get_the_title(get_the_ID())) == 1): ?>
                                            <span class="<?php echo $serviceTextColourClass ?>">
                                                <?php echo get_the_title(get_the_ID()); ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="<?php echo $serviceTextColourClass ?>"> <?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),'text-white','',1); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(str_word_count(get_the_title(get_the_ID())) == 1): ?>
                                            <span class="<?php echo imagedata__colourToClass($serviceTextColour,'yellow'); ?>"><?php echo get_the_title(get_the_ID()); ?></span>
                                        <?php else: ?>
                                            <?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),'text-site-yellow','',1); ?>
                                        <?php endif; ?>
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
