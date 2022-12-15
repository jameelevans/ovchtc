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
							<h3 class="h3__heading">Data Collection &amp; Analysis</h3>
							<p>Support surrounding data collection analysis considerations with best practices evaluation and program integration.</p>
						</div>

						<div class="innovation">
							<div class="innovation__header">
								<h3 class="h3__heading">Real-Time Innovation</h3>	
								<?php echo svg_icon('innovation__icon', 'innovation');?>
							</div>
							<div class="innovation__description">
								<p class="innovation__p">Host monthly office hours, quarterly communities of practice calls, and trainings on topics such as:</p>
								<ul class="innovation__list">
									<li class="innovation__item">Eploring and conducting euity audits</li>
									<li class="innovation__item">Addressing community and partner service gaps</li>
									<li class="innovation__item">Strengthening programmatic structure</li>
								</ul>
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
								<p class="grantee-support__p">Provide program consultations and needs assessments, policy/procedure review and feedback, and peer support facilitation/mentoring to ensure grantees meet their award goals and objectives. All work is done collaboratively with lived experience experts and field professionals to support and respond to evolving grantee needs.</p>
								
							</div>
						</div>

						<div class="resource-sharing">
							<h3 class="h3__heading">Resource Sharing &amp; Network Navigation</h3>
							<p>Revelop and share important resources relevant to victim service providers disseminate new and existing OVC TTA provider and other federal resources.</p>
						</div>
					</div>
		
					
				</section>

				<section class="staff">
				<h2 class="h2__heading sticky__heading">HTC Staff</h2>
					
						
						<!-- Clip path svg reference-->
						<svg height="0" width="0" aria-hidden="true" role="presentation" style="speak:none;" tabindex="-1">
							<defs>
								<clipPath id="octo-clip">
								<polygon points="186.63,161.78 93.42,215.6 0.21,161.78 0.21,54.15 93.42,0.34 186.63,54.15 	"/>
								</clipPath>
							</defs>
						</svg><!-- .Clip path svg reference-->
				
					<!-- Staff Wrapper -->
					<div class="staff__content">
					<?php
					$staff = new WP_Query(array(
						'posts_per_page' => -1,
						'post_type' => 'staff',
						'category_name' => 'htc-staff',
						'orderby'  => 'title',
						'order' => 'ASC'
						));
						if($staff->have_posts()) {
							while($staff->have_posts()) {
								$staff->the_post();?>
								<!-- Individual staff -->
								<?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
								<a class="staff__member<?php if ( wp_is_mobile() ){echo ' staff__is-mobile';}else{echo ' staff__is-desktop';}?>" href="<?php echo esc_url( site_url( '/about' ) . '#' . $slug ); ?>" title="Learn more about <?php the_title();?>">
									<span class="staff__overlay"></span>
									<img class="staff__headshot" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
									<?php echo svg_icon('staff__icon', 'octogon');?>
									<div class="staff__details">
										<p class="staff__name"><?php the_title();?></p>
										<p class="staff__title"><?php the_field('staff_title');?></p>
									</div>

								</a>
								<!-- .Individual staff -->
							<?php }
								} else { ?>
								<p class="staff__no-show">There is no staff to show yet</p>
							<?php }?>
					</div> <!-- .Staff Wrapper -->

					<h2 class="h2__heading sticky__heading">TA Navigators &amp; Expertise</h2>

					<div class="staff__content">
					<?php
					$staff = new WP_Query(array(
						'posts_per_page' => -1,
						'post_type' => 'staff',
						'category_name' => 'ta-navigators-expertise',
						'orderby'  => 'title',
						'order' => 'ASC'
						));
						if($staff->have_posts()) {
							while($staff->have_posts()) {
								$staff->the_post();?>
													<!-- Individual staff -->
													<?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
								<a class="staff__member<?php if ( wp_is_mobile() ){echo ' staff__is-mobile';}else{echo ' staff__is-desktop';}?>" href="<?php echo esc_url( site_url( '/about' ) . '#tab1'); ?>" title="Learn more about <?php the_title();?>">
									<span class="staff__overlay"></span>
									<img class="staff__headshot" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
									<?php echo svg_icon('staff__icon', 'octogon');?>
									<div class="staff__details">
										<p class="staff__name"><?php the_title();?></p>
										<p class="staff__title"><?php the_field('staff_title');?></p>
									</div>

								</a>
								<!-- .Individual staff -->
							<?php }
								} else { ?>
								<p class="staff__no-show">There is no staff to show yet</p>
							<?php }?>
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
