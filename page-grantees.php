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
            <h2 class="map__heading">Map of OVC-Funded Human Trafficking Services and Task Forces Events</h2>
            <p class="map__p">OVC began funding trafficking victim service providers under the Services for Victims of Human Trafficking Program in 2003. OVC is now the largest federal funder of services for human trafficking victims in the United States.</p>

            <p class="map__p">The interactive map below shows the breadth of victim services and supportcoverage provided by OVC grantees and OVC-funded human trafficking taskforces. This information is also available in the searchable Matrix of OVCFundedHuman Trafficking Services Grantees and Task Forces.</p>
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
          <?php  echo do_shortcode('[mapsvg id="4"]'); ?>
          </div>     
         
        </div><!-- .Map section -->
      </div>       
    </section>
    <section class="awards">
      <div class="awards__header"><h2 class="h2__heading">Awards List</h2></div>
      <div class="awards__wrapper">
        <div class="awards__column">
          <div class="awards__description">
            <p class="awards__p">Each year, OVC awards formula and discretionary grants to enhance the delivery of crime victim services throughout the Nation.</p>
            <p class="awards__p">You may browse the table below and use filter options to view awards by award status, State, fiscal year, awardee name, city or perform a keyword search.</p>
            <p class="awards__p">Click on the Title for more details about the award and click on the Original Solicitation title to view the funding opportunity.</p>
          </div>
          <div class="awards__location">
            <h2 class="h3__heading">Location</h2>
            <p>State denotes the state of the organization that received the funding. States Served indicates the state in which services provided. If an organization focuses their attention to a specific community in that state, the service area is identified as the Geographical Areas Served.</p>
          </div>

        </div>
        <div class="awards__column">
        <h2 class="h3__heading">New Grants and Payment Management Systems Now Available!</h2>
            <p>The Justice Grants System (JustGrants) and the Department of the Treasury's Automated Standard Application for Payments (ASAP) are now available for all award management and payment activities. Award recipients with the Office of Justice Programs (OJP) can login to JustGrants or visit the informational website for further resources and support. Additionally, ASAP is now available for enrolled Department of Justice award recipients to request funds. For more information on how to request funds in ASAP, please reference the user guide.</p>
        </div>
      </div>
    </section>
	</main>
<?php get_footer(); ?>
