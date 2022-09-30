<?php /** @var array $args */ ?>
<?php if($args['items']) : ?>
    <div class="w-full lg:flex text-center lg:text-left <?php echo ($args['textPosition'] === 'right' ? 'flex-row-reverse lg:text-right' : ''); ?>">
        <div class="w-full lg:w-1/2 lg:<?php echo ($args['textPosition'] === 'right' ? 'pr-20' : 'pl-20'); ?>">
            <h2 class="uppercase text-6xl font-HelveticaNeueCondensedBlack leading-2.6">What <span class="<?php echo $args['colorClass']; ?>">We've Done</span></h2>
        </div>
        <div class="hidden lg:w-1/2"></div>
    </div>
    <div id="what-we-have-done-slider" class="-ml-2.5 -mr-2.5">
        <?php
        /**
         * @var int $itemK
         * @var WP_Post $item
         */
        foreach($args['items'] as $itemK => $item) : ?>
            <div class="px-2.5">
                <a class="block relative bg-light-grey" href="<?php echo get_field('large_image',$item->ID); ?>" data-lightbox="what-we-done-image-<?php echo get_the_ID(); ?>">
                    <img class="w-full block" src="<?php echo get_field('thumbnail_image',$item->ID); ?>"/>
                    <?php do_action('magnifier',[
                        'absolute','top-1/2','left-1/2','lg:top-auto','lg:left-auto','transform','-translate-x-2/4','-translate-y-2/4','lg:-translate-x-0','lg:-translate-y-0','right-0','bottom-0','bg-black','block','p-3.5'
                    ]); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php do_action('init-slick','#what-we-have-done-slider',[
        'slidesToShow'=>$args['numToShow'],
        'dots'=>false,
        'arrows'=>true,
        'prevArrow'=>'<button type="button" class="slick-prev absolute top-0 left-2.5 z-20 top-2/4 transform -translate-y-1/2 bg-slider-grey-arrow h-full px-3"><img src="'.get_bloginfo('stylesheet_directory') . '/assets/images/icons/chev-left.png"/></button>',
        'nextArrow'=>'<button type="button" class="slick-prev absolute top-0 right-2.5 z-20 top-2/4 transform -translate-y-1/2 bg-slider-grey-arrow h-full px-3"><img src="'.get_bloginfo('stylesheet_directory') . '/assets/images/icons/chev-right.png"/></button>',
        'responsive'=>[
            [
                'breakpoint'=>1060,
                'settings'=>[
                    'slidesToShow'=>4
                ]
            ],
            [
                'breakpoint'=>1024,
                'settings'=>[
                    'slidesToShow'=>3
                ]
            ],
            [
                'breakpoint'=>768,
                'settings'=>[
                    'slidesToShow'=>2
                ]
            ],
            [
                'breakpoint'=>640,
                'settings'=>[
                    'slidesToShow'=>1
                ]
            ]
        ]
    ]);

endif; ?>
