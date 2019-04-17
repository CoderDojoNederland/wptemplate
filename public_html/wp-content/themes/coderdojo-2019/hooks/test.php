<?php

/**
 * Hero.
 */

add_action( 'dojo_beforecontent', function () {
    if ( !is_front_page() )
        return;

    $hero_image = get_field( 'hero_image' );
    if ( !$hero_image )
        return;

    $hero_image_url = wp_get_attachment_image_src( $hero_image, 'full' )[0];
?>
    <div class="dojo-hero-image">
        <img src="<?=$hero_image_url;?>" alt="">
    </div>
<?php
}, 3 );

/**
 * Next meeting.
 */

add_action( 'dojo_beforecontent', function () {
    if ( !is_front_page() )
        return;
    do_shortcode( '[dojoevent]' );
}, 6 );






add_action( 'the_content', function ( $stuff ) {
    $slides = get_field( 'slider', false, false );
    if ( empty( $slides ) )
        return $stuff;

    $slides_url = [];
    foreach ( $slides as $slide )
        $slides_url[] = wp_get_attachment_image_src( $slide, 'medium_large' )[0];

    $new = '';
    $new .= '<div class="owl-carousel carousel">';
    foreach ( $slides_url as $i )
        $new .= '<div class="item"><img src="'.$i.'" alt=""></div>';
    $new .= '</div>';

    $stuff = $stuff.$new;

    return $stuff;
} );

