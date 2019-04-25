<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

include( plugin_dir_path( __FILE__ ) . 'api.php');
// include( plugin_dir_path( __FILE__ ) . 'settings.php');
include( plugin_dir_path( __FILE__ ) . 'shortcode.php');
include( plugin_dir_path( __FILE__ ) . 'widget.php');

add_action( 'init', function(){
    wp_enqueue_style( 'coderdojo_leaflet', 'https://unpkg.com/leaflet@1.4.0/dist/leaflet.css' );
    // wp_add_inline_style( 'coderdojo_leaflet', '#dojoevent_map { height: 180px; }' );
    wp_enqueue_script( 'coderdojo_leaflet_eventmap', get_stylesheet_directory_uri().'/dojo-events/leafletembed.js', ['jquery'] );
});

add_action( 'wp_footer', function() {

    ?>
    <script type="text/javascript">
    (function($) {
        if ( $('#dojoevent_map').length )
        {
            initmap();
        }
    })( jQuery );
    </script>
    <?php
});

function coderdojo_output_event()
{
    $dojoId = get_field( 'dojo_id', 'options' );
    if ( !$dojoId )
        return;

    $api = new CoderDojoWP\API();

    try {
        $query = array(
            "query"     => array(
                "dojoId"            => $dojoId,
                // "status"         => "string",
                // "filterPastEvents"  => true,
                // "sort$"              => "string",
                // "limit$"         => "string",
                // "skip$"              => "string"
            ),
        );
        $events_response = $api->post('events/search', $query);

        $events = array();

        foreach ($events_response as $event_response) {

            // get first date
            $date = array_shift($event_response['dates']);

            // reformat address into one line
            // make sure we have one type of newline
            $address = str_replace(array("\r\n", "\r" ),"\n", $event_response['address']);
            // split address lines
            $address_parts = explode("\n", $address);
            foreach ($address_parts as &$address_part) {
                // remove comma
                $address_part = rtrim($address_part,', ');
            }
            // reformate into one line with comma
            $address = implode(', ', $address_parts);
            $events[] = $event = array(
                'Date'          => date_i18n( get_option('date_format'), strtotime( $date['startTime'] ) ),
                'startTime'     => date_i18n( get_option('time_format'), strtotime( $date['startTime'] ) ),
                'endTime'       => date_i18n( get_option('time_format'), strtotime( $date['endTime'] ) ),
                'address'       => $address,
                'location'      => $event_response['position'],
                'description'   => $event_response['description'],
            );

            // we only need the first event
            break;
        }

        $dojo_data_response = $api->get('dojos/'.$dojoId);
        $dojo_data = array(
            'name'      => $dojo_data_response['name'],
            'location'  => $dojo_data_response['geoPoint'],
            'zen-url'   => "https://zen.coderdojo.com/dojos/{$dojo_data_response['urlSlug']}",
        );

        $location = !empty($event['location']) ? $event['location'] : $dojo_data['location'];
        // echo '<pre>';
        // var_export( $event );
        // var_export( $dojo_data );
        // echo '</pre>';
        ?>
        <div class="dojo-next-event">
            <h3 class="event-announcement-title">De volgende dojo is op</h3>
            <?php printf('<div class="event-announcement">%s %s-%s <a href="%s" class="button event-signup">Meld je aan!</a></div>', $event['Date'], $event['startTime'], $event['endTime'], $dojo_data['zen-url'] ); ?>
            <div class="event-announcement-address"><?php echo $event['address']; ?></div>
        </div>

        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
        <script type="text/javascript">var dojoevent_map = <?php echo json_encode($location); ?>;</script>
        <div id="dojoevent_map"></div>
        <?php
    } catch (\Exception $e) {
        $error_message = $e->getMessage();
        echo "Something went wrong: $error_message";
    }
}


