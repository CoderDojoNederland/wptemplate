<?php

/**
 * Add dojo location to the header.
 */

add_filter( 'get_custom_logo', function ( $html, $blog_id ) {
    $location = get_field( 'dojo_location', 'options' );
    if ( !empty( $location ) )
        $html .= '<div class="dojo-location">'.$location.'</div>';
    return $html;
}, 10, 2 );

