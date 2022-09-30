<?php get_header(); ?>
    <div id="caseStudiesListing">
        <div class="h-viewport-80 max-h-792 mt-40 relative mb-10">
            <div class="h-full">
                <div class="relative h-full">
                    <img class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover" src="<?php echo imagedata__getThemeImageUrl('case-study-top.png'); ?>"/>
                </div>
            </div>
            <div class="absolute bg-black bg-opacity-80 text-white py-6 px-16 bottom-0 text-center left-1/2 transform -translate-x-1/2">
                <h1 class="font-HelveticaNeueCondensedBlack text-8xl text-site-yellow uppercase">Case <span class="text-white">Studies</span></h1>
            </div>
        </div>
        <?php do_action('chev-down','dark','hidden lg:block mx-auto mb-2.5'); ?>
        <section class="pb-24">
            <div class="max-w-1642 mx-auto px-8">
                <?php if (have_posts()) : ?>
                    <div class="lg:flex flex-wrap -mx-2.5">
                        <?php while(have_posts()) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="lg:w-1/2 px-2.5">
                                <div class="p-5 mb-5 flex border-1px-grey3 justify-between items-center border border-solid border-light-grey">
                                    <div class="w-2/4">
                                        <?php the_post_thumbnail('medium',['class'=>'border border-solid border-border-grey object-cover h-230']); ?>
                                    </div>
                                    <div class="w-2/4">
                                        <?php echo imagedata__getPostImageAttachmentImg(get_the_ID(),'logo','medium','mx-auto max-w-xs w-full'); ?>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                    <div id="case-study-listing-pagination" class="flex justify-evenly pt-5">
                        <?php echo paginate_links(); ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info mx-auto">
                        There are currently no case studies to show
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
