<?php
/**
 * View: List Single Event Venue
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/venue.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 4.9.11
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

if ( ! $event->venues->count() ) {
	return;
}

$separator            = esc_html_x( ', ', 'Address separator', 'the-events-calendar' );
$venue                = $event->venues[0];
$append_after_address = array_filter( array_map( 'trim', [ $venue->state_province, $venue->state, $venue->province ] ) );
$address              = $venue->address . ( $venue->address && ( $append_after_address || $venue->city ) ? $separator : '' );
?>
<a class="events__cta" href="<?php echo esc_url( $event->permalink ); ?>" title="<?php echo esc_attr( $event->title ); ?>"
		rel="bookmark">
	<span class="tribe-events-calendar-list__event-venue-title tribe-common-b2--bold">
		<?php echo wp_kses_post( $venue->post_title ); ?>
	</span>
	
</a>
