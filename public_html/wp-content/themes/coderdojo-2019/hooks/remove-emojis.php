<?php

/**
 * Remove emojis.
 * Last updated: 2017-01-18.
 */

/**
 * Remove hooks.
 */

if ( !function_exists( 'dojo_remove_emojis' ) )
{
    function dojo_remove_emojis()
    {
        // frontend
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        // wp-admin
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        // RSS
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        // Mail
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    }
    add_action( 'init', 'dojo_remove_emojis' );
}

/**
 * Remove TinyMCE plugin.
 */

if ( !function_exists( 'dojo_remove_emojis_tinymce' ) )
{
    function dojo_remove_emojis_tinymce( $plugins )
    {
        if ( !is_array( $plugins ) )
            return [];

        return array_diff( $plugins, [ 'wpemoji' ] );
    }
    add_filter( 'tiny_mce_plugins', 'dojo_remove_emojis_tinymce' );
}

/**
 * Remove prefetching.
 */

add_filter( 'emoji_svg_url', '__return_false' );

