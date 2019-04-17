<?php

/**
 * Disable block editor.
 * Last updated: 2019-01-02.
 */

// disable block editor for all post types
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
/*
// disable block editor for certain post types
add_filter( 'use_block_editor_for_post_type', function ( $is_enabed, $post_type ) {
    // disabled
    if ( in_array( $post_type, [ 'movie', 'actor' ] ) )
        return false;
    // default
    return $is_enabed;
}, 10, 2 );
*/
