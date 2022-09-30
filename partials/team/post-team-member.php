<?php
/**
 * @var array $args
 * @var WP_Post $teamMember
 * @var string $direction
 * @var bool $hideQuotes
 */
$teamMember = $args['teamMember'];
$direction = $args['direction'];
$hideQuotes =$args['hideQuotes'];
?>
<div class="max-w-1352 mx-auto px-8">
    <h2 class="ml-20 text-6xl font-HelveticaNeueCondensedBlack leading-2.6 uppercase text-center  <?php echo ($direction === 'left') ? 'lg:text-right' : 'lg:text-left'; ?>">MEET <span class="<?php echo str_replace('bg-','text-',$args['bgClass']); ?>"><?php echo apply_filters('the_title',$teamMember->post_title); ?></span></h2>
</div>
<div class="<?php echo $args['bgClass']; ?>">
    <div class="max-w-1352 mx-auto relative px-8">
        <div class="block lg:flex <?php echo ($direction === 'left') ? 'flex-row-reverse' : ''; ?>">
            <div class="w-full lg:w-8/12 py-11">
                <h3 class="pl-20 font-HelveticaNeueCondensedBold text-4xl <?php echo $args['textClass']; ?> mb-3.5"><?php echo imagedata__spanLastWords($args['position'],($args['bgClass'] !== 'bg-site-yellow' ? 'text-site-yellow' : $args['textClass']),'',2); ?></h3>
                <div class="pl-20 pr-20">
                    <div class="h-px <?php echo ($args['bgClass'] !== 'bg-site-yellow' ? 'bg-site-yellow' : str_replace('text-','bg-',$args['textClass'])); ?> w-full mb-3.5"></div>
                </div>
                <div class="text-white text-base dynamic-content">
                    <div class="team-member-blurb <?php echo ($hideQuotes === true ? 'hide-quotes' : ''); ?>">
                        <div class="team-member-content pl-20 pr-10 <?php echo $args['textClass']; ?>">
                            <?php echo apply_filters('the_content',$teamMember->post_content); ?>
                            <?php do_action('contact-button',$teamMember); ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" w-full lg:w-4/12">
                <?php if(get_field('home_image', $teamMember->ID)): ?>
                    <img class="max-h-full block object-contain mx-auto w-full" src="<?php echo get_field('home_image', $teamMember->ID); ?>" alt="" />
                    <?php else: ?>
                        <?php echo get_the_post_thumbnail($teamMember->ID,'full',[
                                'class'=>'max-h-full block object-contain mx-auto w-full'
                        ]); ?>
                    <?php endif; ?>
                </div>
        </div>
    </div>
</div>
