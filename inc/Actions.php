<?php
add_action('chev-down',function (string $style, string $classes) : void {
    echo '<img class="'.$classes.'" src="' . get_bloginfo('stylesheet_directory') . '/assets/images/icons/down-' . $style . '.png"/>';
},10,2);


add_action('magnifier',function(array $classes = []) : void {

    echo '<img src="' . get_bloginfo('stylesheet_directory') . '/assets/images/icons/mag.png" class="' . implode(" ",$classes) . '"/>';
},10,1);

add_action('home-page-top-banner', function() : void {
    load_template(THEME_PATH . 'partials/front-page/top-banner.php');
});


add_action('product-service-what-we-done',function(int $numToShow = 4) : void {
    // get items from portfolio optionM
    if($items = get_field('portfolio_items',get_the_ID())){

        // get colours
        $color = get_field('what_weve_done_theme_colour',get_the_ID());
        $class = imagedata__colourToClass($color,'text-');

        // get text position
        $textPosition = get_field('what_weve_done_text_position',get_the_ID());

        load_template(THEME_PATH . 'partials/what-we-have-done.php',false,[
            'items'=>$items,
            'colorClass'=>$class,
            'textPosition'=>$textPosition,
            'numToShow'=>$numToShow
        ]);

    }


});

add_action('init-slick',function(string $element, array $options = []){

    // convert objects to a json object
    $options = addslashes(json_encode($options));



    ?>
    <script>
        jQuery(document).ready(function($){
            jQuery('<?php echo $element; ?>').slick(JSON.parse('<?php echo $options; ?>'));
        });
    </script>
    <?php
},10,2);




add_action('product-service-top-banner',function(string $type) : void {

    $topImageBgClass = '';
    $topImageHeadingClass = '';
    $topImageBodyTextClass = '';

    if($type === 'product'){

        $topImageBgColour = get_field('top_image_text_background_colour',get_the_ID());
        $topImageHeadingTextColour = get_field('top_image_heading_text_colour',get_the_ID());
        $topImageBodyTextColour = get_field('top_image_text_colour',get_the_ID());

        $topImageBgClass = imagedata__colourToClass($topImageBgColour,'bg-');
        $topImageHeadingClass = imagedata__colourToClass($topImageHeadingTextColour,'text-');
        $topImageBodyTextClass = imagedata__colourToClass($topImageBodyTextColour,'text-');
    }

    load_template(THEME_PATH . 'partials/product-service/top-banner-' . $type . '.php',true,[
        'topImageBgClass'=>$topImageBgClass,
        'topImageHeadingClass'=>$topImageHeadingClass,
        'topImageBodyTextClass'=>$topImageBodyTextClass
    ]);
},10,1);


/***
 * BELOW TO DO
 * @todo Sort
 */


add_action('product-service-content',function(string $type = 'product') : void {

    $benefits=null;
    $fullService=null;
    $points=[];
    $extraPoints=[];

    // get the data
    if($type === 'product'){
        $benefits = get_field('benefits',get_the_ID());
    }else{
        $fullService = get_field('small_description',get_the_ID());
    }

    // get the bullets points
    $points = imagedata__getBulletPointsArray(get_the_ID(),0,6);



    // use extra bullets instead of benefits?
    $dataType = get_field('use_benefits_text_or_extra_bullet_points',get_the_ID());
    $useExtraBullets = $dataType === 'Extra Bullet Points';
    if($useExtraBullets)
        $extraPoints = imagedata__getBulletPointsArray(get_the_ID(),7,12);






    load_template(THEME_PATH . 'partials/product-service/'.$type.'-content.php',true,[
        'benefits'=>$benefits,
        'fullService'=>$fullService,
        'points'=>$points,
        'useExtraBullets'=>$useExtraBullets,
        'extraPoints'=>$extraPoints,

    ]);
},10,1);


add_action('team-member-blocks',function() : void {

    if($teamMembers  = imagedata__getTeamMembers()) {

        load_template(THEME_PATH . 'partials/team/team-member-blocks.php',false,[
                'teamMembers'=>$teamMembers
        ]);
    }
});

add_action('single-team-member',function(WP_Post $teamMember, string $direction, bool $hideQuotes) : void {

    // get bg colour
    $bgColour = get_field('colour',$teamMember->ID);
    $bgClass = imagedata__colourToClass($bgColour);

    // get text colour
    $textColour = get_field('text_colour',$teamMember->ID);
    $textClass = imagedata__colourToClass($textColour,'text-');

    // position
    $position = get_field('position_in_company',$teamMember->ID);

    // email
    $email = get_field('email',$teamMember->ID);

    // Size
    $size = get_field('size',$teamMember->ID);

    load_template(THEME_PATH . 'partials/team/who-we-are-team-member.php',false,[
        'teamMember'=>$teamMember,
        'bgClass'=>$bgClass,
        'textClass'=>$textClass,
        'position'=>$position,
        'email'=>$email,
        'direction'=>$direction,
        'hideQuotes'=>$hideQuotes,
        'size' => $size
    ]);
},10,3);

add_action('post-selected-team-member',function(string $direction,bool $hideQuotes = false) : void {

    // load the team member
    /** @var WP_Post $teamMember */

    $teamMember = new WP_Query( array ( 'post_type' => 'team-member','orderby' => 'rand', 'posts_per_page' => '1', 'ignore_custom_sort' => TRUE) );

    if(is_front_page()) {
        $teamMember = new WP_Query( array ( 'post_type' => 'team-member', 'post__in' => array(508), 'posts_per_page' => '1') );
    }

    while($teamMember->have_posts()): $teamMember->the_post();
        $id = get_the_ID();
            
        // get bg colour
        $bgColour = get_field('colour',$id);
        $bgClass = imagedata__colourToClass($bgColour);

        // get text colour
        $textColour = get_field('text_colour',$id);
        $textClass = imagedata__colourToClass($textColour,'text-');

        // position
        $position = get_field('position_in_company',$id);

        // email
        $email = get_field('email',$id);

        $post_object = get_post();


    endwhile;

    load_template(THEME_PATH . 'partials/team/post-team-member.php',false,[
        'teamMember'=>$post_object,
        'bgClass'=>$bgClass,
        'textClass'=>$textClass,
        'position'=>$position,
        'email'=>$email,
        'direction'=>$direction,
        'hideQuotes'=>$hideQuotes
    ]);

    wp_reset_postdata();

},10,2);

add_action('display-product-testimonial',function() : void {

    /** @var WP_Post $testimonial */
    if($testimonial = get_field('testimonial',get_the_ID())) {

        load_template(THEME_PATH . 'partials/testimonials/product-testimonial.php', false, [
            'testimonial' => $testimonial
        ]);
    }

},10);


add_action('related-services',function() : void {
    load_template(THEME_PATH . 'partials/product-service/related-services.php');
});

add_action('contact-button',function(WP_Post $teamMember, string $classes = '') : void {

    // get bg colour
    $bgColour = get_field('colour',$teamMember->ID);
    $bgClass = imagedata__colourToClass($bgColour);

    // get text colour
    $textColour = get_field('text_colour',$teamMember->ID);
    $textClass = imagedata__colourToClass($textColour,'text-');

    //$email = get_option('email_address', 'enquiries@imagedata.co.uk');
    $email = get_field('email', $teamMember->ID) ?? 'enquiries@imagedata.co.uk';
    if($email) : ?>
        <a class="contact-button <?php echo $classes; ?> <?php echo ($bgClass !== 'bg-site-yellow' ? 'bg-site-yellow text-black' : str_replace('text-','bg-',$textClass) . ' text-site-yellow'); ?> font-HelveticaNeueCondensedBold text-lg px-8 py-3.5" href="mailto:<?php echo $email; ?>">Contact <?php echo apply_filters('the_title',$teamMember->post_title); ?></a>
    <?php endif;
},10,2);
