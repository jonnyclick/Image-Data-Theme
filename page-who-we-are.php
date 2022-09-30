<?php get_header(); the_post(); ?>

<?php
    $title = explode(' ', get_the_title());

    if(is_array($title)) {
        $initial = $title[0];
        $rest = str_replace($initial, '', get_the_title());
    }
?>
<div id="whoWeArePage">
    <div class="relative mb-12 lg:mb-6 bg-site-gradient relative text-center">
        <div class="bg-black bg-opacity-60 text-white py-8 px-14 max-w-90 top-12 z-10 left-1/2 inline-block" style="margin-top: 10px; margin-bottom: 10px;">
            <?php if(isset($initial)): ?>
                <h1 class="font-HelveticaNeueCondensedBlack text-8xl uppercase text-center"><?php echo $initial; ?><span class="text-site-yellow"><?php echo $rest; ?></h1>
            <?php endif; ?>
        </div>
        <?php if(get_field('team_banner_image', 'options')): ?>
                    <img class="max-w-90 mx-auto bottom-0 left-0 w-full object-cover z-20 left-1/2" src="<?php echo get_field('team_banner_image', 'options'); ?>"/>
                <?php else: ?>
                    <img class="max-w-90 mx-auto bottom-0 left-0 w-full object-cover z-20 left-1/2" src="<?php echo get_the_post_thumbnail_url($post_id); ?>"/>
                <?php endif; ?>

    </div>
    <div class="max-w-1352 mx-auto text-lg mb-16 dynamic-content px-8">
        <?php the_content(); ?>
    </div>
    <?php do_action('chev-down','dark','block mx-auto mb-20'); ?>
    <?php if($members = imagedata__getTeamMembers(null,false)) : ?>
        <?php $i = 0; ?>
        <div class="max-w-1644 mx-auto px-8 overflow-hidden">
            <div class="-mx-2.5 block md:flex flex-wrap">
                <?php foreach($members as $member) : ?>
                    <?php if(get_field('size', $member->ID) == 'full'): ?>
                        <div class="w-full mb-16 px-2.5"><?php do_action('single-team-member',$member,'left',true, false); ?></div>
                    <?php else: ?>
                        <div class="w-full lg:w-1/2 mb-16 px-2.5"><?php do_action('single-team-member',$member,'left',true, false); ?></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
