<?php
/**
 * @var array $args
 * @var WP_Post $testimonial
 */

$testimonial = $args['testimonial'];

$serviceTextColourClass = imagedata__colourToClass('black','text-');

if(get_field('product_colour')) {
    $serviceColour = get_field('product_colour',get_the_ID());
    $serviceTextColourClass = imagedata__colourToClass($serviceColour,'text-');
} else {
    $serviceColourClass = 'bg-black';
}


?>
<div class="max-w-957 mx-auto pt-12 relative">
    <div class="mb-12">
        <?php echo get_the_post_thumbnail($testimonial->ID,'full',['class'=>'block mx-auto']); ?>
    </div>
    <div class="text-xl dynamic-content mb-9 text-center">
        <?php echo apply_filters('the_content',$testimonial->post_content); ?>
    </div>
    <div class="font-HelveticaNeueCondensedBlack text-center text-black uppercase text-4xl">
        <?php echo get_field('name',$testimonial->ID); ?>, <span class="<?php echo $serviceTextColourClass;  ?>"><?php echo get_field('position',$testimonial->ID); ?></span>
    </div>
</div>
