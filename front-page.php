<?php
/**
 * * The template for displaying the front page
 *
 * @package your-wp-project
 */

get_header();

?>
	<main id="main-content">

				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/honeycomb-bg.png" alt="Hexagon BG Image" class="hexagon-bg rellax" data-rellax-speed="-10" role="presentation">

		
				
        <section class="support">
					
					<h2 class="h2__heading">HTC Support Offered</h2>
					<div class="support__wrapper">
					
						<div class="data-collection">
							<?php echo the_field('content_section_one'); ?>
							
						</div>

						<div class="innovation">
							<div class="innovation__header">
								<h3 class="h3__heading">Real-Time Innovation</h3>	
								<?php echo svg_icon('innovation__icon', 'innovation');?>
							</div>
							<div class="innovation__description">
								<?php echo the_field('content_section_two'); ?>
							</div>
						</div>
					</div>


					<div class="proactive__wrapper">
					
						

						<div class="grantee-support">
							<div class="grantee-support__header">
								<h3 class="h3__heading">Proactive Grantee Support</h3>	
								<?php echo svg_icon('grantee-support__icon', 'proactive');?>
							</div>
							<div class="grantee-support__description">
								<?php echo the_field('content_section_three'); ?>
							</div>
						</div>

						<div class="resource-sharing">
							<?php echo the_field('content_section_four'); ?>
						</div>
					</div>
		
					
				</section>

				

				<section class="statistics">
					<div class="statistics__container">
						<p class="statistics__item"><span class="statistics__heading">28+ years</span> providing tta</p>
						<div class="statistics__divider">&nbsp;</div>
						<p class="statistics__item"><span class="statistics__heading">45+ years</span> in victim services &amp; human trafficking fields</p>
					</div>
				</section>
	</main>
<?php get_footer(); ?>
