<?php get_header(); the_post(); ?>
    <div id="singlePostPage">
        <div class="h-viewport-80 max-h-792 relative mb-6">
            <div class="h-full">
                <div class="relative h-full">
                    <?php the_post_thumbnail('full',[
                            'class'=>'block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover'
                    ]); ?>
                </div>
            </div>
            <?php
                $colours = array('blue', 'yellow', 'pink', 'light_cyan', 'light_magenta');
                $colour_name = $colours[array_rand($colours)];
                $colour = imagedata__colourToClass($colour_name, 'bg-');
            ?>

            <div class="z-20 absolute bg-opacity-80 <?php echo $colour; ?> py-16 px-7 lg:px-44 text-white bottom-0 text-center w-full max-w-90 lg:max-w-1352 left-1/2 transform -translate-x-1/2">
                <h1 class="font-HelveticaNeueCondensedBlack text-6xl text-white uppercase"><?php echo imagedata__spanFirstWords(get_the_title(),'text-black','',3); ?></h1>
            </div>
        </div>
    </div>
    <?php do_action('chev-down','dark','block mx-auto mb-16'); ?>
    <div class="max-w-1642 mx-auto px-16">
        <div class="relative lg:-top-52 z-10 dynamic-content text-lg px-16 lg:px-28 pt-20 lg:pt-48 pb-20 mb-16">
            <?php the_content(); ?>
        </div>
        <?php if($posts = imagedata__getBlogPosts(6,[get_the_ID()])) : ?>
            <div class="mb-24">
                <h2 class="text-site-pink uppercase font-HelveticaNeueCondensedBlack text-6xl leading-2.7 text-center lg:text-left">Other <span class="text-black">Stories</span></h2>
                <div class="lg:flex flex-wrap -mx-2" id="other-posts-slider">
                    <?php /** @var WP_Post $post */
                    foreach($posts as $post) : ?>
                        <div class="lg:w-1/2 px-2 mb-4">
                            <div class="border border-light-grey border-solid lg:flex p-4">
                                <div class="w-full lg:w-1/3">
                                    <?php echo get_the_post_thumbnail($post->ID,'post-thumbnail',[
                                        'class'=>'w-full h-auto md:h-48 lg:w-56 lg:h-56 object-cover  mb-4 lg:mb-0'
                                    ]); ?>
                                </div>
                                <div class="w-full lg:w-2/3 lg:px-10">
                                    <h3 class="font-HelveticaNeueCondensedBold text-2xl mb-5 overflow-hidden overflow-ellipsis whitespace-nowrap"><?php echo get_the_title($post->ID); ?></h3>
                                    <div class="h-px bg-site-pink w-full mb-5"></div>
                                    <div class="text-sm mb-6">
                                        <?php echo get_the_excerpt($post->ID); ?>
                                    </div>
                                    <a href="<?php echo get_the_permalink($post->ID); ?>" class="bg-site-blue uppercase font-HelveticaNeueCondensedBold text-xl text-site-yellow px-5 py-2.5">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php do_action('init-slick','#other-posts-slider',[
                        'slidesToShow'=>2,
                        'dots'=>false,
                        'arrows'=>true,
                        'prevArrow'=>'<button type="button" class="slick-prev absolute top-1/2 left-0 -ml-12 z-20 transform -translate-y-1/2 bg-black px-3 slick-arrow w-14 h-14"><img src="'.get_bloginfo('stylesheet_directory') . '/assets/images/icons/chev-left-yellow.png"/></button>',
                        'nextArrow'=>'<button type="button" class="slick-prev absolute top-1/2 right-0 -mr-12 z-20 transform -translate-y-1/2 bg-black px-3 slick-arrow w-14 h-14"><img src="'.get_bloginfo('stylesheet_directory') . '/assets/images/icons/chev-right-yellow.png"/></button>',
                        'responsive'=>[

                            [
                                'breakpoint'=>1024,
                                'settings'=>[
                                    'slidesToShow'=>2
                                ]
                            ],
                            [
                                'breakpoint'=>768,
                                'settings'=>[
                                    'slidesToShow'=>1
                                ]
                            ]
                        ]
                    ]); ?>
            </div>

        <?php endif; ?>
    </div>

<?php get_footer(); ?>
