<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('font-Montserrat', get_template_directory_uri() . '/assets/fonts', array(), false, true);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/slick.css');
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/slick/slick-theme.css');

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), null, true);


    wp_localize_script('slick-js', 'themeData', array(
        'templateUrl' => get_template_directory_uri()
    ));

    //slick settings
    wp_add_inline_script('slick-js', "
        jQuery('.why__us__slider__block').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            lazyLoad: 'progressive',
            prevArrow: '<button type=\"button\" class=\"slick-prev\"><img src=\"' + themeData.templateUrl + '/assets/img/arrowL.png\" alt=\"Previous\"></button>',
            nextArrow:'<button type=\"button\" class=\"slick-next\"><img src=\"' + themeData.templateUrl + '/assets/img/arrowR.png\" alt=\"Next\"></button>'
        });
    ");


});

add_action('after_setup_theme', function(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
});

function hazel_dump( $data ) {
	echo "<pre>" . print_r( $data, 1 ) . "</pre>";
}

require_once get_template_directory() . '/incs/cpt.php';