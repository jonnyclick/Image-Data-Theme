<h2 class="text-center lg:text-left uppercase font-HelveticaNeueCondensedBlack text-6xl leading-2.7">Other <span class="text-site-pink">Services</span></h2>

<div class="block lg:grid grid-cols-5 w-full font-HelveticaNeueCondensedBold text-2xl text-white uppercase">

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
                if(get_field('service_colour')) {
                    $serviceColour = get_field('service_colour',get_the_ID());
                    $serviceColourClass = imagedata__colourToClass($serviceColour,'bg-');
                } else {
                    $serviceColourClass = 'bg-black';
                }
            
                if(get_field('service_text_colour')) {
                    $serviceTextColour = get_field('service_text_colour',get_the_ID());
                    $serviceTextColourClass = imagedata__colourToClass($serviceTextColour,'text-');
                } else {
                    $serviceTextColourClass = "text-white";
                }
    

                    ?>
                    <div class="py-5 lg:py-0 <?php echo $serviceColourClass; ?> text-center relative flex" style="height: 197px;">
                        <div class="w-full self-center">
                            <a href="<?php the_permalink(); ?>">
                            <img  class="block mx-auto max-w-4.5 mb-3.5" src="<?php echo get_field('service_icon'); ?>"/>
                                <h6 class="<?php echo $serviceTextColourClass; ?>"><?php the_title(); ?></h6>
                            </a>
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
