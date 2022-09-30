<?php


$serviceTextColourClass = imagedata__colourToClass('white','text-');
$serviceColourClass =  imagedata__colourToClass('black','text-');

if(get_field('service_colour')) {
    $serviceColour = get_field('service_colour',get_the_ID());
    $serviceColourClass = imagedata__colourToClass($serviceColour,'bg-');
} else {
    $serviceColourClass = 'bg-black';
}

if(get_field('service_colour') == 'yellow') {
    $serviceTextColourClass = imagedata__colourToClass('black','text-');
} else {
    $serviceTextColourClass = imagedata__colourToClass('white','text-');
}


    if(is_singular('plants')):
        /* Specific Plant List Banner Structure */
        ?>
        <div class="mt-60 relative mb-9 lg:mb-6">
            <div class="">
                <div class="relative">
                    <img style="max-width: 900px; height: auto; width: 100%;" class="mr-auto ml-auto mb-20" src="<?php the_post_thumbnail_url('full'); ?>" />
                </div>
            </div>
            <div class="<?php echo $serviceColourClass; ?> bg-opacity-80 text-white py-8 px-11 w-full mb-20">
                <div class="max-w-1226 mx-auto">
                <h1 class="<?php echo $serviceTextColourClass; ?> font-HelveticaNeueCondensedBlack text-6xl uppercase mb-5">
                    <?php if(get_field('service_colour') == 'yellow'): ?>
                        <span class="<?php echo $serviceTextColourClass ?>"><?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),'text-site-blue','',1); ?></span>
                    <?php else: ?>
                        <?php if(str_word_count(get_the_title(get_the_ID())) == 1): ?>
                            <span class="<?php echo imagedata__colourToClass($serviceTextColour,'yellow'); ?>"><?php echo get_the_title(get_the_ID()); ?></span>
                        <?php else: ?>
                            <?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),'text-site-yellow','',1); ?>
                        <?php endif; ?>
                <?php endif; ?>
                </h1>
                </h1>
                <?php if(get_field('service_colour') == 'yellow'): ?>
                    <div class="text-black dynamic-content">
                        <?php the_content(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-white dynamic-content">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

                </div>
            </div>
        </div>
        <?php
    else:

        ?> 

        <div class="h-viewport-80 max-h-792 relative mb-9 lg:mb-6">
            <div class="h-full">
                <div class="relative h-full">
                    <?php
                        echo get_the_post_thumbnail(get_the_ID(),'full',[
                                'class'=>'block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover'
                            ]); 
                    ?>
                </div>
            </div>
            <div class="absolute <?php echo $serviceColourClass; ?> bg-opacity-80 text-white py-8 px-11 w-full max-w-90 lg:max-w-2xl bottom-0 lg:left-64 left-1/2 transform -translate-x-1/2 lg:-translate-x-0">
            <h1 class="<?php echo $serviceTextColourClass; ?> font-HelveticaNeueCondensedBlack text-6xl uppercase mb-5">
                    <?php if(get_field('service_colour') == 'yellow'): ?>
                        <span class="<?php echo $serviceTextColourClass ?>"><?php echo get_the_title(get_the_ID()); ?></span>
                    <?php else: ?>
                        <?php if(str_word_count(get_the_title(get_the_ID())) == 1): ?>
                            <span class="<?php echo imagedata__colourToClass($serviceTextColour,'yellow'); ?>"><?php echo get_the_title(get_the_ID()); ?></span>
                        <?php else: ?>
                            <?php echo imagedata__spanLastWords(get_the_title(get_the_ID()),'text-site-yellow','',1); ?>
                        <?php endif; ?>
                <?php endif; ?>
                </h1>  
                <?php if(get_field('service_colour') == 'yellow'): ?>
                    <div class="text-black dynamic-content">
                        <?php the_content(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-white dynamic-content">
                        <?php the_content(); ?>
                    </div>
        <?php endif; ?>
            </div>
        </div>

        <?php
    endif;

?>


