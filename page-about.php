<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main id="main-content">
                <section class="about">
                        <div class="about__wrapper about__wrapper--odd">
                                <div class="about__description about__description--odd">
                                        <?php echo the_field('content_section_one'); ?>
                                </div>
                                <div class="about__header about__header--odd">
                                       <div  class="about__image">
                                        &nbsp;
                                        </div>
                                </div>
                        </div>

                        <div class="about__wrapper about__wrapper--even">
                                <div class="about__description about__description--even">
                                        <?php echo the_field('content_section_two'); ?>
                                </div>
                                <div class="about__header about__header--even">
                                        <div  class="about__image">
                                        &nbsp;
                                        </div>
                                </div>
                        </div>
                </section>
                <section class="bios">
                        <div class="bios__wrapper">
                                <div class="bios__sticky">
                                        <ul class="bios__list">
                                                <li class="bios__item active"><a href="#tab1" class="bios__link" title="Display the HTC Staff section">HTC Staff</a></li>
                                                <li class="bios__item"><a href="#tab2" class="bios__link" title="Display the TA Navigators and Expertise section">TA Navigators and Expertise</a></li>
                                        </ul>
                                </div>
                       
                    
                

                        <div class="bio__inner-wrapper">
                                <!-- Clip path svg reference-->
                                <svg height="0" width="0" aria-hidden="true" role="presentation" style="speak:none;" tabindex="-1">
                                        <defs>
                                                <clipPath id="octo-clip">
                                                <polygon points="186.63,161.78 93.42,215.6 0.21,161.78 0.21,54.15 93.42,0.34 186.63,54.15 	"/>
                                                </clipPath>
                                        </defs>
                                </svg><!-- .Clip path svg reference-->
                                <div id="tab1" class="bio__content bio__staff active">
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
                                                <!-- HTC staff -->
                                                <?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
                                                <div id="<?php echo $slug;?>" class="bio__container">
                                                        <div class="bio__media">
                                                                <img class="bio__headshot" src="<?php the_post_thumbnail_url('staff-headshot'); ?>" alt="Headshot of <?php the_title();?>">
                                                                <?php echo svg_icon('bio__icon', 'octogon');?>
                                                        </div>
                                                        <div class="bio__details">
                                                                <h3 class="bio__heading"><?php the_title();?> <i class="bio__pike">|</i> <span><?php the_field('staff_title')?></span></h3>
                                                                <div class="bio__description"><?php the_content();?></div>
                                                                <?php 
                                                                        $link = get_field('staff_email');
                                                                        if( $link ): 
                                                                       
                                                                        ?>
                                                                        <div class="bio__cta--wrapper"><a class="bio__cta" href="mailto:<?php echo  $link ?>" target="_blank" title="Email <?php the_title();?> now">Contact</a>
                                                                        <?php echo svg_icon('bio__arrow', 'arrow-right');?></div>
                                                                        <?php endif;?>
                                                        </div>
                                                </div> 
                                                <!-- .HTC staff -->
                                        <?php }
                                                } else { ?>
                                                <p class="staff__no-show">There is no staff to show yet</p>
                                        <?php }?>
                                </div>

                                

                                <div id="tab2" class="bio_content bio__ta hide">
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
                                                <!-- TA Navigators Expertise staff -->
                                                <?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
                                                <div id="<?php echo $slug;?>" class="bio__container">
                                                        <div class="bio__media">
                                                                <img class="bio__headshot" src="<?php the_post_thumbnail_url('staff-headshot'); ?>" alt="Headshot of <?php the_title();?>">
                                                                <?php echo svg_icon('bio__icon', 'octogon');?>
                                                        </div>
                                                        <div class="bio__details">
                                                                <h3 class="bio__heading"><?php the_title();?> <i class="bio__pike">|</i> <span><?php the_field('staff_title')?></span></h3>
                                                                <div class="bio__description"><?php the_content();?></div>
                                                                <?php 
                                                                        $link = get_field('staff_email');
                                                                        if( $link ): 
                                                                       
                                                                        ?>
                                                                        <div class="bio__cta--wrapper"><a class="bio__cta" href="mailto:<?php echo  $link ?>" target="_blank" title="Email <?php the_title();?> now">Contact</a>
                                                                        <?php echo svg_icon('bio__arrow', 'arrow-right');?></div>
                                                                        <?php endif;?>
                                                        </div>
                                                </div> 
                                                <!-- .TA Navigators Expertise staff -->
                                        <?php }
                                                } else { ?>
                                                <p class="staff__no-show">There is no staff to show yet</p>
                                        <?php }?>

                                </div>


                               
                        </div> 
                        </div>
                        
                </section>
	</main>
<?php get_footer(); ?>
