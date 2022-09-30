<?php get_header(); the_post(); ?>
<div id="contactPage">
    <div class="h-viewport-80 max-h-595 mt-40 relative mb-20 lg:mb-24">
        <div class="h-full">
            <div class="relative h-full">
                    <?php if(get_field('contact_banner_image', 'options')): ?>
                        <img src="<?php echo get_field('contact_banner_image', 'options') ?>" class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover" alt="" />
                    <?php else: ?>
                        <?php echo get_the_post_thumbnail(get_the_ID(),'full',[
                            'class'=>'block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover'
                        ]); ?>
                    <?php endif; ?>
            </div>
        </div>
        <div class="absolute max-w-90 w-full lg:max-w-3xl bg-opacity-80 bg-site-blue text-white py-6 px-7 -bottom-12 left-1/2 transform -translate-x-1/2">
            <h1 class="text-black text-center font-HelveticaNeueCondensedBlack text-7xl uppercase">How Can We <span class="text-white">Help You</span></h1>
        </div>
    </div>
    <div class="text-3xl mb-8 max-w-957 mx-auto px-8">
        <?php the_content(); ?>
    </div>
    <div class="font-HelveticaNeueCondensedBlack text-4xl lg:text-5xl max-w-957 mx-auto mb-8 px-8 text-center">
        <p class="mb-2"><span class="text-site-blue">t.</span> <a href="tel:<?php echo ($phone = get_option('phone_number')) ? $phone : PHONE_NUMBER; ?>"><?php echo ($phone = get_option('phone_number')) ? $phone : PHONE_NUMBER; ?></a></p>
        <p><span class="text-site-pink">e.</span> <a href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a></p>
    </div>
    <div class="my-20">
        <?php if($offices  = imagedata__getOffices()) : ?>
            <div class="max-w-1226 mx-auto px-8">
                <?php $c=1; foreach($offices as $office) : ?>
                    <div class="lg:flex items-center">
                        <div class="hidden lg:block w-3/100 h-200 border border-light-grey border-solid <?php echo ($c % 2 ? 'order-3 lg:border-l-0' : 'order-1 lg:border-r-0'); ?>">

                        </div>
                        <div class="w-full lg:max-w-525 lg:order-2">
                            <?php echo get_the_post_thumbnail($office->ID,'medium',['class'=>'w-full']); ?>
                        </div>
                        <div class="h-200 w-full lg:w-97/100 border border-light-grey border-solid border-t-0 lg:border-t py-8 pl-16 pr-16 <?php echo ($c % 2 ? 'order-1 lg:border-r-0' : 'order-2 lg:border-l-0'); ?>">
                            <h3 class="font-HelveticaNeueCondensedBold text-2.5 capitalize mb-5">
                                <?php echo apply_filters('the_title',$office->post_title); ?><?php if($tag = get_field('tag',$office->ID)) : ?><span class="text-base pl-5">(<?php echo $tag; ?>)</span><?php endif; ?>
                                <?php if($linkedIn = get_field('linkedin_url',$office->ID)) : ?>
                                    <a href="<?php echo $linkedIn; ?>" target="_blank"><img class="float-right top-4 relative" src="<?php echo imagedata__getThemeImageUrl('icons/li.png'); ?>"/></a>
                                <?php endif; ?>
                            </h3>
                            <div class="h-px w-full bg-site-pink mb-5"></div>
                            <p class="text-base"><?php echo get_field('address',$office->ID); ?></p>

                        </div>
                    </div>
                <?php $c++; endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
