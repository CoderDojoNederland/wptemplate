<?php

/**
 * Remove post type support.
 * Last updated: 2018-09-03.
 */

add_action( 'init', function () {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
});

