<?php

if ( !function_exists( 'dojo_register_nav_menus' ) )
{
    function dojo_register_nav_menus()
    {
        /**
         * Register navigation menus.
         * @return void
         */
        register_nav_menus([
            'header' => 'Header Nav',
            'footer' => 'Footer Nav',
        ]);
    }
    // add_action( 'init', 'dojo_register_nav_menus' );
}

