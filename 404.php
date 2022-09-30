<?php get_header(); ?>
    <div id="404page">
        <div class="h-viewport-60 mt-40 relative mb-10">
            <div class="h-full">
                <div class="relative h-full">
                    <img class="block mx-auto w-full h-full absolute top-0 left-0 right-0 object-cover" src="<?php echo imagedata__getThemeImageUrl('news-top.png'); ?>"/>
                </div>
            </div>
            <div class="absolute text-white bottom-0 text-center w-full lg:w-auto lg:right-60">
                <h1 class="font-HelveticaNeueCondensedBlack text-8xl text-black uppercase leading-4.4">Page Not Found!</h1>
            </div>
        </div>
        <div class="max-w-1642 mx-auto px-8 mb-24">
            <p>Sorry but we couldn't find the page you were looking for.</p>
        </div>
    </div>
<?php get_footer(); ?>
