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
$size = $args['size'];
?>

<div class="w-full">
    <h2 class="relative left-0 xl:left-1/2 ml-0 text-6xl font-HelveticaNeueCondensedBlack leading-2.6 uppercase text-left">MEET <span class="<?php echo str_replace('bg-','text-',$args['bgClass']); ?>"><?php echo apply_filters('the_title',$teamMember->post_title); ?></span></h2>
</div>
<div class="<?php echo $args['bgClass']; ?>">
    <div class="mx-auto relative px-16 xl:px-0">
        <div class="block lg:flex <?php echo ($direction === 'left') ? 'flex-row-reverse' : ''; ?>">
            <div class="w-full xl:w-1/2 py-11">
                <h3 class="font-HelveticaNeueCondensedBold text-4xl <?php echo $args['textClass']; ?> mb-3.5"><?php echo imagedata__spanLastWords($args['position'],($args['bgClass'] !== 'bg-site-yellow' ? 'text-site-yellow' : $args['textClass']),'',2); ?></h3>
                <div class="pr-8">
                    <div class="h-px <?php echo ($args['bgClass'] !== 'bg-site-yellow' ? 'bg-site-yellow' : str_replace('text-','bg-',$args['textClass'])); ?> w-full mb-3.5"></div>
                </div>
                <div class="text-white text-lg dynamic-content lg:max-h-40 lg:overflow-auto">
                    <div class="team-member-blurb <?php echo ($hideQuotes === true ? 'hide-quotes' : ''); ?>">
                        <div class="max-h-20 overflow-auto text-sm team-member-content pr-8 <?php echo $args['textClass']; ?>">
                            <?php echo apply_filters('the_content',$teamMember->post_content); ?>
                        </div>
                    </div>

                </div>
                <?php do_action('contact-button',$teamMember,'relative inline-block mt-10'); ?>
            </div>
            <div class="relative w-full xl:w-1/2 pr-8 text-center xl:text-left">
                <?php if($size == 'full'): ?>
                    <?php echo get_the_post_thumbnail($teamMember->ID, 'full', [
                        'class' => 'h-auto w-auto lg:right-1/2 lg:translate-x-2/4 lg:absolute lg:transform block mx-auto bottom-0 pr-0 xl:pr-4'
                    ]); ?>
                <?php else: ?>
                    <?php echo get_the_post_thumbnail($teamMember->ID, 'full', [
                        'class' => 'xl:w-11/12 lg:w-full md:w-3/4 w-full lg:absolute bottom-0 block mx-auto bottom-0 pr-0 xl:pr-4',
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
