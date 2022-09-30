<?php

use ImageData\Slider\Slider;

const PHONE_NUMBER = '+44 (0) 1482 652323';
const REGISTERED_NUMBER = '02452106';
const REGISTERED_COUNTRY = 'England';
const COMPANY_NAME = 'imageData Group Limited';
const THEME_PATH = __DIR__ . '/';


require_once __DIR__ . '/inc/Actions.php';
require_once __DIR__ . '/inc/Slider.class.php';

/**
 * Wordpress Actions
 */
add_action('admin_menu',function() : void {
    add_menu_page('ImageData Options','ImageData Options','administrator',__FILE__,function(){
        load_template(__DIR__ . '/admin/options.php');
    });
});

add_theme_support( 'title-tag' );


if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
    ));
}

add_action('admin_init',function() : void {
    register_setting('imagedata-options-group','linked_in_url');
    register_setting('imagedata-options-group','twitter_url');
    register_setting('imagedata-options-group','pinterest_url');
    register_setting('imagedata-options-group','careers_url');
    register_setting('imagedata-options-group','modern_slavery_act_url');
    register_setting('imagedata-options-group','plant_list_url');
    register_setting('imagedata-options-group','phone_number');
    register_setting('imagedata-options-group','email_address');
});

add_action('wp_enqueue_scripts',function() : void {
    // main js
    wp_enqueue_script('main',get_bloginfo('stylesheet_directory') . '/assets/js/main.js',['jquery']);
    wp_enqueue_script('lightbox',get_bloginfo('stylesheet_directory') . '/assets/js/lightbox.js',['jquery']);

    wp_enqueue_style('slick', get_bloginfo('stylesheet_directory') . '/assets/slick/slick.css');
    wp_enqueue_script('slick', get_bloginfo('stylesheet_directory') . '/assets/slick/slick.js', ['jquery']);

    // if on the home page include slick slider
    if (is_front_page()) {
        wp_enqueue_script('front-page', get_bloginfo('stylesheet_directory') . '/assets/js/front-page.js', ['jquery']);
        wp_localize_script('front-page', 'params', [
            'stylesheet_directory' => get_bloginfo('stylesheet_directory')
        ]);
    }elseif(is_singular('product') || is_singular('service')){
        wp_enqueue_script('service-product',get_bloginfo('stylesheet_directory') . '/assets/js/service-product.js',['jquery']);
        wp_localize_script('service-product', 'params', [
            'stylesheet_directory' => get_bloginfo('stylesheet_directory')
        ]);
    } else {
        wp_enqueue_script('jquery');
    }


    // main theme
    wp_enqueue_style('lightbox',get_bloginfo('stylesheet_directory') . '/assets/css/lightbox.css');
    wp_enqueue_style('ImageData',get_bloginfo('stylesheet_directory') . '/style.css',['lightbox']);
    wp_enqueue_style('Tailwind',get_bloginfo('stylesheet_directory') . '/main.css',['ImageData']);
});


add_action('after_setup_theme',function() : void {
    register_nav_menu('main','Main Navigation Bar');
    register_nav_menu('mobile-main','Mobile Main Navigation Bar');
    register_nav_menu('footer','Footer Navigation Bar');
});


add_action('init',function(){
    add_theme_support('post-thumbnails');
    register_post_type('slider',[
       'labels'=>[
           'name'=>'Sliders',
           'singular_name'=>'Slider'
       ],
        'public'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title'
        ]
    ]);

    register_post_type('team-member',[
        'labels'=>[
            'name'=>'Team Members',
            'singular_name'=>'Team Member'
        ],
        'public'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ]
    ]);

    register_post_type('product',[
        'labels'=>[
            'name'=>'Products',
            'singular_name'=>'Product'
        ],
        'public'=>true,
        'has_archive'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ],
        'rewrite'=>true
    ]);

    register_post_type('service',[
        'labels'=>[
            'name'=>'Services',
            'singular_name'=>'Service'
        ],
        'publicly_queryable'=>true,
        'public'=>true,
        'has_archive'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ],
        'rewrite'=>true
    ]);


    register_post_type('plants',[
        'labels'=>[
            'name'=>'Plants',
            'singular_name'=>'Plant'
        ],
        'public'=>true,
        'has_archive'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ],
        'rewrite'=>true
    ]);

    register_post_type('testimonial',[
        'labels'=>[
            'name'=>'Testimonials',
            'singular_name'=>'Testimonial'
        ],
        'public'=>false,
        'has_archive'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ]
    ]);


    register_post_type('case-study',[
        'labels'=>[
            'name'=>'Case Studies',
            'singular_name'=>'Case Study'
        ],
        'public'=>true,
        'has_archive'=>true,
        'show_ui'=>true,
        'supports'=>[
            'title','editor','thumbnail','page-attributes'
        ],
        'rewrite'=>[
            'slug'=>'case-study'
        ]
    ]);


    register_post_type('office',[
        'labels'=>[
            'name'=>'Offices',
            'singular_name'=>'Office'
        ],
        'public'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title','thumbnail','page-attributes'
        ]
    ]);

    register_post_type('portfolio',[
       'labels'=>[
           'name'=>'Portfolio',
           'singular_name'=>'Portfolio Item'
       ],
        'public'=>false,
        'show_ui'=>true,
        'supports'=>[
            'title',
            'page-attributes'
        ]
    ]);

    add_shortcode('slider',function(?array $args) : void {

        // only works if slug is provided
        if($args && $args['slug']){
            if($slider = imagedata__getSlider($args['slug'])){
                ob_start();
                include __DIR__ . '/partials/slider.php';
                $html = ob_get_contents();
                ob_end_clean();

                echo $html;
            }
        }
    });

});

/**
 * Filters
 */

add_filter( 'show_admin_bar', '__return_false' );

add_filter('excerpt_length', function(int $length) : int {
    return 20;
});


add_filter('excerpt_more',function(string $more) : string {
    return '...';
});

add_filter('body_class',function(array $classes) : array{

    $classes[] = 'font-HelveticaNeue';

    return $classes;
});

add_filter('wp_title',function() : string {

    if (is_front_page()) {

        return 'Welcome to ' . get_bloginfo('name');
    } elseif (is_page() || is_single()) {

        return get_bloginfo('name') . ' | ' . get_the_title(get_the_ID());
    } elseif (is_category()) {
        return get_bloginfo('name') . ' | ' . single_cat_title();
    } elseif (is_tax()) {
        return get_bloginfo('name') . ' | ' . get_queried_object()->name;
    }elseif (is_home()){
        return get_bloginfo('name') . ' | News';
    } else {

        return get_bloginfo('name');
    }
});


/**
 * Overrides
 */

/**
 * Theme functions
 */

/**
 * @param string $filename
 * @return string
 */
function imagedata__getThemeImageUrl(string $filename) : string
{
    return get_bloginfo('stylesheet_directory') . '/assets/images/' . $filename;
}


/**
 * @param int|null $number
 * @param bool $includeHomePageExclusions
 * @return iterable|null
 */
function imagedata__getTeamMembers(int $number = null, bool $includeHomePageExclusions = true) : ?iterable
{
    $args = [
        'post_type'=>'team-member',
        'orderby'=>'menu_order',
        'order'=>'ASC',
        'post_status'=>'publish'
    ];

    if($includeHomePageExclusions){
        $args['meta_query']=[
            'relation'=>'OR',
            [
                'key'=>'exclude_from_home_page_list',
                'compare'=>'NOT EXISTS'
            ],
            [
                'key'=>'exclude_from_home_page_list',
                'value'=>'No'
            ]
        ];
    }
    if($number !== null){
        $args['numberposts']=$number;
    }else{
        $args['numberposts']=-1;
    }



    $members = get_posts($args);

    return $members && !empty($members) ? $members : null;
}

/**
 * @param int|null $number
 * @return WP_Post[]|null
 */
function imagedata__getProducts(int $number = null) : ?iterable
{
    $args = [
        'post_type'=>'product',
        'orderby'=>'menu_order',
        'order'=>'ASC',
        'post_status'=>'publish'
    ];

    if($number !== null){
        $args['numberposts']=$number;
    }

    $members = get_posts($args);

    return $members && !empty($members) ? $members : null;
}

/**
 * @param int $postId
 * @param int $offset
 * @param int $limit
 * @return iterable|null
 */
function imagedata__getProductBulletPointsArray(int $postId, int $offset = 1, int $limit = 12) : ?iterable
{

    $points=[];
    for($i = $offset; $i <= $limit; $i++){
        $points[] = get_field('bullet_point_' . $i,$postId);
    }


    return !empty($points) ? array_filter($points) : null;
}

/**
 * @param string $slug
 * @return Slider|null
 */
function imagedata__getSlider(string $slug) : ?Slider
{
    $slider = get_posts([
        'post_type'=>'slider',
        'name'=>$slug,
        'numberposts'=>1,
        'post_status'=>'publish'
    ]);

    if($slider){

        /** @var WP_Post $post */
        $post = $slider[0];

        return (new Slider)->setPost($post)
            ->setType(get_field('slide_type',$post->ID))
            ->setVideoUrl(get_field('video_url',$post->ID))
            ->setImage1Url(get_field('slide_image_1',$post->ID))
            ->setImage2Url(get_field('slide_image_2',$post->ID))
            ->setImage3Url(get_field('slide_image_3',$post->ID))
            ->setImage4Url(get_field('slide_image_4',$post->ID))
            ->setImage5Url(get_field('slide_image_5',$post->ID))
            ->setImage6Url(get_field('slide_image_6',$post->ID));

    }

    return null;
}

/**
 * @param string $slug
 * @return bool
 */
function imagedata__sliderExists(string $slug) : bool
{
    $slider = get_posts([
        'post_type'=>'slider',
        'name'=>$slug,
        'numberposts'=>1,
        'post_status'=>'publish'
    ]);

    return (bool)$slider;
}

/**
 * @return WP_Post[]|null
 */
function imagedata__getHomeSliderBlocks() : ?iterable
{

    $blocks = get_posts([
       'post_type'=>'home-slider-blocks',
       'numberposts'=>-1,
       'post_status'=>'publish',
       'orderby'=>'menu_order',
       'order'=>'ASC'
    ]);

    return $blocks ?? null;


}

/**
 * @return WP_Post[]|null
 */
function imagedata__getOffices() : ?iterable
{
    $offices = get_posts([
        'post_type'=>'office',
        'numberposts'=>-1,
        'post_status'=>'publish',
        'orderby'=>'menu_order',
        'order'=>'ASC'
    ]);

    return $offices ?? null;
}

/**
 * @param int $number
 * @return WP_Post[]|null
 */
function imagedata__getPortfolioItems(int $number = 10) : ?iterable
{
    $items = get_posts([
        'post_type'=>'portfolio',
        'numberposts'=>$number,
        'post_status'=>'publish',
        'orderby'=>'menu_order',
        'order'=>'ASC'
    ]);

    return $items ?? null;
}

/**
 * @param string $hex
 * @param float|int $opacity
 * @return string
 */
function imagedata_hexToRgba(string $hex, float $opacity = 1) : string
{
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

    return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
}

/**
 * @param string $type
 * @param string $message
 */
function imagedata__showAlert(string $type, string $message) : void
{
    if($type != 'danger' && $type != 'warning' && $type != 'success' && $type != 'info')
        return;


    include __DIR__ . '/partials/alert.php';
}

/**
 * @param string $string
 * @param string $spanClass
 * @param string $spanStyle
 * @param int $numWords
 * @return string
 */
function imagedata__spanLastWords(
    string $string,
    string $spanClass = '',
    string $spanStyle = '',
    int $numWords = 1
) : string
{

    // split the string
    $split = explode(" ",$string);

    for($w = 1; $w <= $numWords; $w++){
        if(isset($split[count($split)-$w])) {
            $split[count($split) - $w] = '<span style="' . $spanStyle . '" class="' . $spanClass . '">' . $split[count($split) - $w] . '</span>';
        }
    }


    return implode(" ",$split);
}

/**
 * @param string $string
 * @param string $spanClass
 * @param string $spanStyle
 * @param int $numWords
 * @return string
 */
function imagedata__spanFirstWords(
    string $string,
    string $spanClass = '',
    string $spanStyle = '',
    int $numWords = 1
) : string
{

    // split the string
    $split = explode(" ",$string);

    for($w = 0; $w < $numWords; $w++){
        if(isset($split[$w])) {
            $split[$w] = '<span style="' . $spanStyle . '" class="' . $spanClass . '">' . $split[$w] . '</span>';
        }
    }


    return implode(" ",$split);
}


/**
 * @param int $postId
 * @param string $fieldName
 * @param string $size
 * @return string|null
 */
function imagedata__getPostImageAttachmentImg(int $postId, string $fieldName, string $size = 'medium', string $class = '') : ?string
{
    $image = get_field($fieldName);
    if( $image ) {
        return wp_get_attachment_image( $image, $size,false,['class'=>$class] );
    }

    return null;
}



/**
 * @param string $text
 * @param string $colourClass
 * @return string
 */
function colourLastWord(string $text, string $colourClass) : string
{
    $split = explode(" ",$text);
    $split[count($split)-1] = '<span class="' . $colourClass . '">' . $split[count($split)-1] . '</span>';
    return implode(" ",$split);
}

/**
 * @param int $postId
 * @param int $offset
 * @param int $limit
 * @return iterable|null
 */
function imagedata__getBulletPointsArray(int $postId, int $offset = 1, int $limit = 12) : ?iterable
{

    $points=[];
    for($i = $offset; $i <= $limit; $i++){
        $points[] = get_field('bullet_point_' . $i,$postId);
    }


    return !empty($points) ? array_filter($points) : null;
}


/**
 * @param string $colour
 * @param string $prefix
 * @return string
 */
function imagedata__colourToClass(string $colour, string $prefix = 'bg-') : string
{
    switch ($colour){
        case 'blue':
            $class = $prefix . 'site-blue';
            break;
        case 'pink':
            $class = $prefix . 'site-pink';
            break;
        case 'yellow':
            $class = $prefix . 'site-yellow';
            break;
        case 'grey':
            $class = $prefix . 'light-grey';
            break;
        case 'black':
            $class = $prefix . 'black';
            break;
        case 'white':
            $class = $prefix . 'white';
            break;
        case 'light_cyan':
            $class = $prefix . 'light_cyan';
            break;
        case 'light_magenta':
            $class = $prefix . 'light_magenta';
            break;
        default:
            $class = $prefix . 'site-blue';

    }

    return $class;
}


/**
 * @param int $number
 * @param array $excludeIds
 * @return array|null
 */
function imagedata__getAllServices(int $number = -1, array $excludeIds = []) : ?array
{

    $args = [
        'post_type'=>'service',
        'numberposts'=>$number,

    ];

    if(!empty($excludeIds)){
        $args['exclude'] = $excludeIds;
    }

    $services = get_posts($args);

    return $services ?? null;

}

/**
 * @param int $number
 * @param array $excludeIds
 * @return iterable|null
 */
function imagedata__getBlogPosts(int $number = -1, array $excludeIds = []) : ?iterable
{
    $args = [
        'post_type'=>'post',
        'numberposts'=>$number
    ];

    if(!empty($excludeIds)){
        $args['exclude']=$excludeIds;
    }

    $posts = get_posts($args);

    return $posts ?? null;
}

/**
 * @param int $id
 * @return array|null
 */
function imagedata__getCaseStudyPhotos(int $id) : ?array
{

    $photos=[];
    for($c = 1; $c <= 4; $c++){
        if($photo = get_field('photo'.$c,$id))
            $photos[] = $photo;
    }

    return $photos ?? null;

}
