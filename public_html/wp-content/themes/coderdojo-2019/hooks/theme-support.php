<?php

/**
 * Theme support.
 * Last updated: 2016-05-25.
 * https://codex.wordpress.org/Function_Reference/add_theme_support
 */

if ( !function_exists( 'dojo_theme_support_post_formats' ) )
{
    /**
     * Add theme support for post formats.
     * @return void
     */
    function dojo_theme_support_post_formats()
    {
        add_theme_support( 'post-formats', array(
            // 'aside',
            // 'gallery',
            // 'link',
            // 'image',
            // 'quote',
            // 'status',
            // 'video',
            // 'audio',
            // 'chat',
        ));
    }
    // add_action( 'after_setup_theme', 'dojo_theme_support_post_formats' );
}

if ( !function_exists( 'dojo_theme_support_post_thumbnails' ) )
{
    /**
     * Add theme support for post thumbnails.
     * @return void
     */
    function dojo_theme_support_post_thumbnails()
    {
        // all
        // add_theme_support( 'post-thumbnails' );
        // selected post types
        // add_theme_support( 'post-thumbnails', array(
            // 'post',
            // 'news',
            // 'project',
            // 'review',
            // 'vacancy',
        // ));
    }
    // add_action( 'after_setup_theme', 'dojo_theme_support_post_thumbnails' );
}

if ( !function_exists( 'dojo_theme_support_html5' ) )
{
    /**
     * Add theme support for HTML5.
     * @return void
     */
    function dojo_theme_support_html5()
    {
        $args = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        );
        add_theme_support( 'html5', $args );
    }
    add_action( 'after_setup_theme', 'dojo_theme_support_html5' );
}

if ( !function_exists( 'dojo_theme_support_title_tag' ) )
{
    /**
     * Add theme support for a title tag.
     * @return void
     */
    function dojo_theme_support_title_tag()
    {
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'dojo_theme_support_title_tag' );
}

