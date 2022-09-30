<?php /** @var array $args */ ?>
<?php
    $class = 'standard';
    if(is_singular('service')):
        $serviceTextColourClass = imagedata__colourToClass('white','text-');
        $serviceColourClass =  imagedata__colourToClass('black','text-');
        if(get_field('service_colour')) {
            $serviceColour = get_field('service_colour',get_the_ID());
            $serviceColourClass = imagedata__colourToClass($serviceColour,'bullet-');
        } else {
            $serviceColourClass = 'bullet-black';
        }
        $class = $serviceColourClass;
    endif;
?>

<div class="block lg:flex max-w-1226 mx-auto px-8 items-start">
    <div class="w-full lg:w-1/2">
    <?php if(is_singular('plants')): ?>
            <!-- <h2 class="font-HelveticaNeueCondensedBlack uppercase text-6xl mb-3.5">Plant <span class="text-site-pink">Information</span></h2> -->
        <?php else: ?>
            <h2 class="font-HelveticaNeueCondensedBlack uppercase text-6xl mb-3.5">Full <span class="text-site-pink">Service</span></h2>
        <?php endif; ?>
        <div class="dynamic-content text-lg">
            <?php echo apply_filters('the_content',get_field('small_description',get_the_ID())); ?>
        </div>
        <?php if(is_singular('plants')): ?>
            <div class="mb-10">
                <a class="contact-button  bg-site-yellow text-black font-HelveticaNeueCondensedBold text-lg px-8 py-3.5" href="<?php echo get_option('plant_list_url'); ?>" target='_blank'>See Full Plant List</a>
            </div>
    <?php endif; ?>
    </div>
    <div class="w-full lg:w-1/2 lg:pl-40">
        <ul class="bullet-list <?php echo $class; ?>">
            <?php foreach($args['points'] as $pKey => $point) : ?>
                <li class="text-2xl font-HelveticaNeueBold mb-5 before:block before:bg-site-pink before:w-5 before:h-5"><?php echo $point; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>
