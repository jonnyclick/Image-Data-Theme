<?php get_header(); the_post(); ?>
<div id="homePage" style="overflow-x: hidden;">
    <?php do_action('home-page-top-banner'); ?>
    <div class="block lg:flex mx-auto max-w-1397 px-8 mb-14">
        <div class="mb-12 lg:mb-0 w-full lg:w-1/2 lg:pr-10">
            <?php if(get_field('home_image')): ?>            
                <img class="block mx-auto" src="<?php the_field('home_image'); ?>"/>
                <img class="header-tagline-logo block mt-5 ml-auto mr-auto align-middle" src="<?php echo get_field('tagline', 'options'); ?>" />
            <?php else: ?>
                <img class="block mx-auto" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/images/home-page/paper.png"/>
                <img class="header-tagline-logo block mt-5 ml-auto mr-auto align-middle" src="<?php echo get_field('tagline', 'options'); ?>" />
            <?php endif; ?>
        </div>
        <div class="text-lg dynamic-content w-full lg:w-1/2 lg:pl-10">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="mb-14 lg:mb-0">
        <?php do_action('product-service-what-we-done',5); ?>
    </div>
    <?php do_action('chev-down','light','hidden lg:block mx-auto mt-14 mb-32'); ?>
    <div class="mb-0 lg:mb-5">
        <?php do_action('post-selected-team-member','right'); ?>
    </div>
    <?php do_action('team-member-blocks'); ?>

</div>
<?php get_footer(); ?>
