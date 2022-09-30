<?php

/**
 * @var array $args
 * @var iterable|WP_Post[] $teamMembers
 */
$teamMembers = $args['teamMembers'];
?>
<div class="team-member-blocks">
    <div class="hidden lg:block justify-between -mx-2.5 mb-6 team-member-blocks-track" style="width: 100%; max-width: 100%;">
        <?php
        /** @var WP_Post $teamMember */
        foreach($teamMembers as $teamMember) : ?>
            <div class="w-1/5 mb-3 px-2.5">
                <div class="mb-2.5 relative flex items-end h-viewport-vw-18 pt-4 <?php echo imagedata__colourToClass(get_field('colour',$teamMember->ID),'bg-'); ?>">
                    <?php if(get_field('home_image', $teamMember->ID)): ?>
                    <img class="max-h-full block object-contain mx-auto w-full" src="<?php echo get_field('home_image', $teamMember->ID); ?>" alt="" />
                    <?php else: ?>
                        <?php echo get_the_post_thumbnail($teamMember->ID,'full',[
                                'class'=>'max-h-full block object-contain mx-auto w-full'
                        ]); ?>
                    <?php endif; ?>
                </div>
                <h3 class="text-center font-HelveticaNeueCondensedBlack uppercase text-3xl"><?php echo apply_filters('the_title',$teamMember->post_title); ?><span class="font-HelveticaNeueCondensedBold text-lg"> | <?php echo get_field('position_in_company',$teamMember->ID); ?></span></h3>
            </div>
        <?php endforeach; ?>
    </div>
</div>