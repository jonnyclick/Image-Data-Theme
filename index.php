<?php get_header(); ?>

<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<div id="newsListing">
    <div class="h-viewport-80 max-h-792 relative mb-10">
        <div class="h-full">
            <div class="relative h-full">
                <?php if(get_field('news_banner_image', 'options')): ?>
                    <img class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover" src="<?php echo get_field('news_banner_image', 'options') ?>" alt="" />
                <?php else: ?>
                    <img class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover" src="<?php echo imagedata__getThemeImageUrl('news-top.png'); ?>" alt="" />
                <?php endif; ?>
            </div>
        </div>
        <div class="absolute bg-black bg-opacity-80 text-white py-6 px-16 bottom-0 text-center left-1/2 transform -translate-x-1/2">
            <h1 class="font-HelveticaNeueCondensedBlack text-8xl text-site-yellow uppercase">Our <span class="text-white">News</span></h1>
        </div>
    </div>
    <div class="max-w-1642 mx-auto px-8 mb-24">
        <h2 class="leading-2.7 text-center lg:text-left lg:ml-28 uppercase font-HelveticaNeueCondensedBlack text-6xl"><span class="text-site-pink">Current</span> Stories</h2>
        <?php if(have_posts()) : ?>
            <div class="lg:flex flex-wrap -mx-2">
                <?php while(have_posts()) : the_post(); ?>
                    <div class="lg:w-1/2 px-2 mb-4">
                        <div class="border border-light-grey border-solid lg:flex p-4">
                            <div class="w-full lg:w-1/3">
                                <?php the_post_thumbnail('post-thumbnail',[
                                        'class'=>'lg:h-40 object-cover h-full w-full mb-4 lg:mb-0'
                                ]); ?>
                            </div>
                            <div class="w-full lg:w-2/3 lg:px-10">
                                <h3 class="font-HelveticaNeueCondensedBold text-2xl mb-5 overflow-ellipsis overflow-hidden  whitespace-nowrap"><?php the_title(); ?></h3>
                                <div class="h-px bg-site-pink w-full mb-5"></div>
                                <div class="text-sm mb-6 lg:min-h-3.5">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="bg-site-blue uppercase font-HelveticaNeueCondensedBold text-xl text-site-yellow px-5 py-2.5">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <section class="text-center">
                <?php echo paginate_links(); ?>
            </section>
        <?php else: ?>
            Nothing to show
        <?php endif; ?>
    </div>

</div>
<?php get_footer(); ?>
