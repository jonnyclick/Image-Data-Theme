<?php get_header(); the_post(); ?>
<div id="singlePostPage">
    <div class="h-viewport-80 max-h-792 relative mb-6">
        <div class="h-full">
            <div class="relative h-full">
                <?php the_post_thumbnail('full',[
                    'class'=>'block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover'
                ]); ?>
            </div>
        </div>
        <div class="z-20 absolute bg-opacity-80 bg-black py-16 px-7 lg:px-44 text-white bottom-0 text-center w-full max-w-90 lg:max-w-1352 left-1/2 transform -translate-x-1/2">
            <h1 class="font-HelveticaNeueCondensedBlack text-6xl text-white uppercase"><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<?php do_action('chev-down','dark','block mx-auto mb-16'); ?>
<div class="max-w-1642 mx-auto px-8">
    <div class="relative lg:-top-52 z-10 dynamic-content text-lg px-16 lg:px-28 pt-20 lg:pt-48 pb-20 mb-16">
        <?php the_content(); ?>
    </div>
</div>
<?php if ($photos = imagedata__getCaseStudyPhotos(get_the_ID())) : ?>
    <div class="max-w-1642 mx-auto px-8 mb-16">
        <div class="-mx-2 flex flex-wrap">
            <?php foreach($photos as $k => $photo) : ?>
                <div class="w-full md:w-1/2 h-96 overflow-hidden px-2 mb-4">
                    <a class="block relative w-full h-full" href="<?php echo $photo['url']; ?>" data-lightbox="photo-<?php echo $k; ?>">
                        <img class="object-cover w-full h-full" src="<?php echo $photo['sizes']['medium']; ?>"/>
                        <?php do_action('magnifier',[
                            'absolute','bottom-0','right-0','bg-black','block','p-3.5'
                        ]); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
