<div id="front-top-banner" class="h-viewport-47 xl:h-viewport-65 relative mb-186vw sm:mb-28">
    <div id="front-top-video-wrapper" class="h-full">
        <div id="front-top-video-container" class="relative h-full">
	    <?php
		if(get_field('home_video_image')) {
			?>
			<img style="width: 100%;" src="<?php echo get_field('home_video_image') ?>" alt="" />
			<?php
		}

	    ?>
            <video playsinline loop autoplay muted class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover">
                <?php if(get_field('home_video')): ?>
                    <source type="video/mp4" src="<?php echo get_field('home_video'); ?>"
                <?php else: ?>
                    <source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/video.mp4"/>
                <?php endif; ?>
            </video>
        </div>
    </div>
	<!-- -top-45vw -->
	<!--  -translate-x-1/2 -->
    <div class="max-w-1644 w-full mx-auto px-8 left-1/2 -top-45vw transform -translate-x-1/2 relative sm:absolute sm:-bottom-24 sm:top-auto" style="max-width: 1315px; margin: 0 auto;">
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-0">

            <?php
                $home_posts = get_field('home_products');
                $default_color = 'bg-black';
                $default_text_color = 'text-white';
                $icon = imagedata__getThemeImageUrl('home-page/top-blocks/icon1.png');
                $row_count = 4;
                $i = 0;
                $swap = false;

                foreach($home_posts as $post):

                    $text_color = $default_text_color;

                    if(!empty(get_field('product_colour'))):
                        $color = get_field('product_colour');
                   
                    else:
                        $color = $default_color;
                    endif;

                    $colorClass = imagedata__colourToClass($color,'bg-');

                    if(get_field('product_colour') == 'yellow') {
                        $text_color = 'text-black';
                    }
        
                    if(!empty(get_field('product_icon'))):
                        $icon = get_field('product_icon');
                    endif;

                    if($i >= $row_count) {
                        $swap = true;
                    }

                    if(!$swap) {
                        ?>
                        <div class="hidden lg:block">
                            <a href="<?php the_permalink(); ?>">
                            <img style="object-fit: cover;" class="block w-full h-full" src="<?php echo $icon; ?>"/>
                            </a>
                        </div>
                        <div class="<?php echo $colorClass; ?>">
                            <a href="<?php the_permalink(); ?>" class="block h-full">
                                <div class="w-full h-full flex items-center justify-center text-center font-bold max-h-full pl-6 pr-6 lg:pr-2 lg:pl-2 <?php echo $text_color; ?>" style="height: 150px; line-height: 1.2; font-size: 1.2rem;"><?php the_title(); ?></div>
                            </a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="<?php echo $colorClass; ?>">
                            <a href="<?php the_permalink(); ?>" class="block h-full">
                            <div class="w-full h-full flex items-center justify-center text-center font-bold max-h-full pl-6 pr-6 lg:pr-2 lg:pl-2 <?php echo $text_color; ?>" style="height: 150px; line-height: 1.2; font-size: 1.2rem;"><?php the_title(); ?></div>
                            </a>
                        </div>
                        <div class="hidden lg:block">
                            <a href="<?php the_permalink(); ?>" class="w-full h-full">
                            <img style="object-fit: cover;" class="block w-full h-full" src="<?php echo $icon; ?>"/>
                            </a>
                        </div>
                        <?php
                    }
                    $i++;
                endforeach;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php do_action('chev-down','light','hidden sm:block mx-auto mb-24'); ?>
