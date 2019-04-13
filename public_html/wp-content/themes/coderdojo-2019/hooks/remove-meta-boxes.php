<?php

/**
 * Remove meta boxes.
 * Last updated: 2018-10-17.
 */

add_action( 'do_meta_boxes', function () {
    // example
    // remove_meta_box( 'divname', 'dashboard|post|page|cptslug', 'normal|side|advanced' );

    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    // remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );
});

