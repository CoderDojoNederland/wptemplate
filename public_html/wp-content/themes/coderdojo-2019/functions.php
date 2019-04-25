<?php

/**
 * Hooks autoloader.
 */

$hooks = glob( get_stylesheet_directory().'/hooks/*.php' );

if ( !empty( $hooks ) )
    foreach ( $hooks as $hook )
        include $hook;

/**
 * Init dojo events.
 */

include get_stylesheet_directory().'/dojo-events/functions.php';

