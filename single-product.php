<?php get_header(); the_post(); ?>
<div id="singleProductPage">
    <?php
    do_action('product-service-top-banner','product');
    do_action('chev-down','dark','hidden lg:block mx-auto mb-48');
    ?>
    <div class="max-w-1532 mx-auto mb-28">
        <?php do_action('product-service-what-we-done',4); ?>
    </div>
    <div class="mb-20">
        <?php do_action('product-service-content','product'); ?>
    </div>

    <div class="mb-2.5">
        <?php do_action('post-selected-team-member','left'); ?>
    </div>
    <div class="max-w-1687 mx-auto px-8 py-32 testimonial relative">
        <?php do_action('display-product-testimonial'); ?>
    </div>
</div>
<?php get_footer(); ?>
