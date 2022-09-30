<?php /** @var array $args */ ?>


<?php
$serviceTextColourClass = imagedata__colourToClass('white','text-');
$serviceColourClass =  imagedata__colourToClass('black','text-');

if(get_field('product_colour')) {
    $serviceColour = get_field('product_colour',get_the_ID());
    $serviceColourClass = imagedata__colourToClass($serviceColour,'bullet-');
} else {
    $serviceColourClass = 'bullet-black';
}
?>

<div class="flex flex-col-reverse lg:flex-row max-w-1226 mx-auto px-8 items-start">
    <div class="w-full lg:w-1/2 lg:pr-36">
        <ul class="bullet-list <?php echo $serviceColourClass; ?> text-left lg:text-right product">
            <?php foreach($args['points'] as $pKey => $point) : ?>
                <?php 
                  $point = rtrim($point, '.');  
                ?>
                <li class="text-2xl font-HelveticaNeueBold mb-5 before:block before:bg-site-pink before:w-5 before:h-5"><?php echo $point; ?></li>
            <?php endforeach; ?>
        </ul>

    </div>
    <div class="w-full lg:w-1/2">
        <?php if($args['useExtraBullets']) : ?>
            <ul class="bullet-list product text-left lg:text-right product">
                <?php foreach($args['extraPoints'] as $pKey => $point) : ?>
                    <li class="text-2xl font-HelveticaNeueBold mb-5 before:block before:bg-site-pink before:w-5 before:h-5"><?php echo $point; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h2 class="font-HelveticaNeueCondensedBlack uppercase text-6xl mb-3.5">Benefits</h2>
            <div class="dynamic-content text-lg">
                <?php echo apply_filters('the_content',get_field('benefits',get_the_ID())); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

