<?php
namespace CoderDojoWP;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class EventWidget extends \WP_Widget {

	function __construct() {
		parent::__construct( false, 'coderdojo event' );
	}

	function widget( $args, $instance ) {
		coderdojo_output_event();
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titel:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
}

function register_dojowidget() {
	register_widget( 'CoderDojoWP\EventWidget' );
}

add_action( 'widgets_init', 'CoderDojoWP\register_dojowidget' );