

<?php get_header(); the_post(); ?>
    <div id="singleServicePage">
        <?php
        do_action('product-service-top-banner','service');
        do_action('chev-down','dark','hidden lg:block mx-auto mb-32');
        ?>
        <div class="mb-36">
            <?php do_action('product-service-content','service'); ?>
        </div>
        <div class="max-w-1532 mx-auto mb-16">
            <?php do_action('product-service-what-we-done',4); ?>
        </div>
        <?php do_action('chev-down','dark','hidden lg:block mx-auto mb-32'); ?>
        <div class="max-w-1088 mx-auto mb-12 px-8">
            <?php do_action('related-services'); ?>
        </div>
        <?php do_action('post-selected-team-member','left',false); ?>
    </div>
<?php get_footer(); ?>
