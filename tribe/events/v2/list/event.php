<?php
/**
 * View: List Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

 use Tribe__Date_Utils as Dates;

/*
 * If the request date is after the event start date, show the request date to avoid users from seeing dates "in the
 * past" in relation to the date they requested (or today's date).
 */
$display_date = empty( $is_past ) && ! empty( $request_date )
	? max( $event->dates->start_display, $request_date )
	: $event->dates->start_display;

$event_month  = $display_date->format_i18n( 'M' );
$event_day_num   = $display_date->format_i18n( 'd' );
$event_date_attr = $display_date->format( Dates::DBDATEFORMAT );


?>
  <!-- Event post  -->
  <article class="events__container">
                    
    <header>
      <time class="events__date" datetime="<?php echo esc_attr( $event_date_attr ); ?>" aria-hidden="true">
        <span class="events__month">
          <?php echo esc_html( $event_month ); ?>
        </span>
        <span class="events__day">
          <?php echo esc_html( $event_day_num ); ?>
        </span>
      </time>
        <?php $this->template( 'list/event/title', [ 'event' => $event ] ); ?>
    </header>

    <?php $this->template( 'list/event/description', [ 'event' => $event ] ); ?>
  
   
        
    <?php $this->template( 'list/event/venue', [ 'event' => $event ] ); ?>
  </article> <!-- .Event post  -->


