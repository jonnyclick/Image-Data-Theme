<?php get_header(); the_post(); ?>
<div id="singlePage" class="pt-60">
    <div class="max-w-1642 mx-auto px-8">
        <div class="relative  z-10 dynamic-content text-lg border border-light-grey border-solid px-16 lg:px-28 pt-20  pb-20 mb-16">
            <h1 class="font-HelveticaNeueCondensedBlack text-6xl uppercase mb-7"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

