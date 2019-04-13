<?php

/**
 * ACF Options Pages.
 * Last updated: 2018-05-17.
 */

add_action( 'init', function () {
    if ( !function_exists( 'acf_add_options_page' ) )
        return;

    acf_add_options_page([
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'menu_slug'  => 'site-settings',
        'capability' => 'edit_posts',
        'redirect'   => false, // false = its own page, true = redirect to first child
    ]);

    /*
    acf_add_options_sub_page([
        'page_title'  => 'General settings',
        'menu_title'  => 'General',
        'parent_slug' => 'site-settings',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Social Media settings',
        'menu_title'  => 'Social Media',
        'parent_slug' => 'site-settings',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Images',
        'menu_title'  => 'Images',
        'parent_slug' => 'site-settings',
    ]);
    */
});

