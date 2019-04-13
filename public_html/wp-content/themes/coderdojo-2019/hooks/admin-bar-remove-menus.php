<?php

/**
 * Admin Bar Remove Menus.
 * Last updated: 2018-09-27.
 */

// backend
add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' ); // WP core links menu
    // $wp_admin_bar->remove_menu( 'site-name' );
    $wp_admin_bar->remove_menu( 'view-site' );
    // $wp_admin_bar->remove_menu( 'updates' );
    $wp_admin_bar->remove_menu( 'comments' );
    $wp_admin_bar->remove_menu( 'new-content' );
    // $wp_admin_bar->remove_menu( 'my-account' ); // Howdy
    // $wp_admin_bar->remove_menu( 'user-actions' ); // Howdy dropdown
    $wp_admin_bar->remove_menu( 'user-info' ); // Name of user, looks better if you disable avatars
    // $wp_admin_bar->remove_menu( 'edit-profile' );
    // $wp_admin_bar->remove_menu( 'logout' );
});

// frontend
add_action( 'admin_bar_menu', function ( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'dashboard' );
    $wp_admin_bar->remove_node( 'themes' );
    $wp_admin_bar->remove_node( 'menus' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'search' );
}, 999 );

