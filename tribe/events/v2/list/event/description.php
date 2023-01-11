<?php
/**
 * View: List Single Event Description
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/description.php
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

if ( empty( (string) $event->excerpt ) ) {
	return;
}
?>
<div class="events__description">
	<?php
      if( has_excerpt() ){
      echo strip_tags(substr( get_the_excerpt(), 0, 105 ))."...";
      } else {
      echo wp_trim_words(get_the_content(), 15);
      }
    ?>
	<?php //echo (string) $event->excerpt; ?>
</div>
