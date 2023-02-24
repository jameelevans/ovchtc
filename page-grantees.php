<?php
/**
 * * The template for displaying the grantees page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main  id="main-content">
    <section class="map">
      <div class="map__wrapper">
        <div class="map__top">
          <div class="map__description">
            <?php echo the_field('content_section_one'); ?>
          </div>

        </div>
        <!-- Map section -->
        <div class="map__bottom">
          <div class="map__dropdown">
            <div id="dropdown-container" class="dropdown-solid">
              <div class="dropdown-toggle click-dropdown">
              State Served
              </div>
              
              <div id="dropdown-menu">
              </div>
            </div>
          </div>
          <!-- US Map -->
          <?php  echo do_shortcode('[mapsvg id="1"]'); ?>
          </div>     
         
        </div><!-- .Map section -->
      </div>       
    </section>
    <section class="awards">
      <div class="awards__header"><h2 class="h2__heading">Awards List</h2></div>
      <div class="awards__wrapper">
        <div class="awards__column">
          <div class="awards__description">
            <?php echo the_field('content_section_two'); ?>
          </div>
          <div class="awards__location">
            <?php echo the_field('content_section_three'); ?>
          </div>

        </div>
        <div class="awards__column">
          <?php echo the_field('content_section_four'); ?>
        </div>
      </div>
    </section>
	</main>
<?php get_footer(); ?>
