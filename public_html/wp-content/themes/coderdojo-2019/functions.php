<?php

/**
 * Hooks autoloader.
 */


$hooks = glob( get_stylesheet_directory().'\hooks\*.php' );

if ( !empty( $hooks ) )
    foreach ( $hooks as $hook )
        include $hook;

