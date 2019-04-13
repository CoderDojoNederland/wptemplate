<?php

/**
 * Set admin color scheme.
 * Last updated: 2018-09-27.
 */

add_filter( 'get_user_option_admin_color', function ( $scheme ) {
    return 'midnight';
});

