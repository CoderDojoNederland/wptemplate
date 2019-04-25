<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode( 'dojoevent', function(){
	coderdojo_output_event();
});

// gutenberg ready?
// add_shortcode( 'dojoevent', function(){
//     ob_start();
//     coderdojo_output_event();
//     return ob_get_clean();
// });