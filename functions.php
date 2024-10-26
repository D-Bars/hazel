<?php

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('main-css',get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style( 'font-Montserrat', get_template_directory_uri() . '/assets/fonts', array(), false, true);
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('main-js',   get_template_directory_uri() . '/assets/js/main.js',array(), false, true);
    wp_enqueue_script('jquery' );
});