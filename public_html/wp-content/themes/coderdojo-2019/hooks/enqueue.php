<?php

if ( !function_exists( 'dojo_styles_frontend' ) )
{
    /**
     * Load styles on the frontend.
     * @return void
     */
    function dojo_styles_frontend()
    {
        // register
        wp_register_style(
            'parent-style',
            get_template_directory_uri().'/style.css'
            // [],
            // '1.0.0',
            // 'all'
        );
        wp_register_style(
            'coderdojo-2019-fonts',
            'https://fonts.googleapis.com/css?family=Open+Sans|Roboto+Slab:400,700', // src
            [],
            '1.0.0',
            'all'
        );
        wp_register_style(
            'owl-carousel',
            'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', // src
            [],
            '1.0.0',
            'all'
        );
        wp_register_style(
            'owl-carousel-theme',
            'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', // src
            [],
            '1.0.0',
            'all'
        );
        wp_register_style(
            'coderdojo-2019-theme',
            get_stylesheet_directory_uri().'/assets/css/theme.min.css', // src
            ['owl-carousel','owl-carousel-theme'],
            '1.0.0',
            'all'
        );
        // enqueue
        wp_enqueue_style( 'parent-style' );
        wp_enqueue_style( 'coderdojo-2019-fonts' );
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'owl-carousel-theme' );
        wp_enqueue_style( 'coderdojo-2019-theme' );
    }
    add_action( 'wp_enqueue_scripts', 'dojo_styles_frontend' );
}

if ( !function_exists( 'dojo_scripts_frontend' ) )
{
    /**
     * Load scripts on the frontend.
     * @return void
     */
    function dojo_scripts_frontend()
    {
        // register
        wp_register_script(
            'owl-carousel',
            'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
            [],
            '1.0.0',
            true
        );
        wp_register_script(
            'coderdojo-theme',
            get_stylesheet_directory_uri().'/assets/js/theme.min.js',
            [],
            '1.0.0',
            true
        );
        wp_register_script(
            'livereload',
            'http://'.$_SERVER['HTTP_HOST'].':35729/livereload.js',
            [],
            '1.0.0',
            true
        );
        // enqueue
        wp_enqueue_script( 'owl-carousel' );
        wp_enqueue_script( 'coderdojo-theme' );
        wp_enqueue_script( 'livereload' );
    }
    add_action( 'wp_enqueue_scripts', 'dojo_scripts_frontend' );
}

