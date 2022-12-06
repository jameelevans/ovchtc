<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

get_header();

?>
	<main>
                <section class="about">
                        <div class="about__wrapper about__wrapper--odd">
                                <div class="about__description about__description--odd">
                                        <p class="about__p">The HTC understands that effective TTA requires a collaborative approach that leverages the expertise of all training recipients and subject matter experts to further elevate the support provided to victims of trafficking. This collective approach leads to sustainable actions that are rooted in best practice, in addition to innovative solutions that meet the unique needs of each agency.</p>
                                </div>
                                <div class="about__header about__header--odd">
                                       <div  style="background-image: url('<?php echo  get_template_directory_uri()?>/assets/img/about-2.jpg');" class="about__image">
                                        &nbsp;
                                        </div>
                                </div>
                        </div>

                        <div class="about__wrapper about__wrapper--even">
                                <div class="about__description about__description--even">
                                        <p class="about__p">The HTC's TTA support is
                                        available to OVC human
                                        trafficking victim service
                                        grantees (including those
                                        providing tailored services to
                                        minor victims of sex and
                                        labor trafficking).</p>
                                </div>
                                <div class="about__header about__header--even">
                                        <div  style="background-image: url('<?php echo  get_template_directory_uri()?>/assets/img/about-1.jpg');" class="about__image">
                                        &nbsp;
                                        </div>
                                </div>
                        </div>
                </section>
                <section class="bios">
                        <div class="bios__wrapper">
                        <div>
                        <ul class="bios__list">
                                <li class="bios__item active"><a href="#tab1" class="bios__link ">HTC Staff</a></li>
                                <li class="bios__item"><a href="#tab2" class="bios__link">TA Navigators and Expertise</a></li>
                        </ul>
                        </div>

                        <div class="bio__inner-wrapper">
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
                                                <div class="bio__container">
                                                        <div class="bio__media">
                                                                <img class="bio__headshot" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
                                                                <?php echo svg_icon('bio__icon', 'octogon');?>
                                                        </div>
                                                        <div class="bio__details">
                                                                <h3 class="bio__heading"><?php the_title();?> <i class="bio__pike">|</i> <span><?php the_field('staff_title')?></span></h3>
                                                                <div class="bio__description"><?php the_content();?></div>
                                                                <?php 
                                                                        $link = get_field('staff_email');
                                                                        if( $link ): 
                                                                       
                                                                        ?>
                                                                        <div class="bio__cta--wrapper"><a class="bio__cta" href="<?php echo esc_url( $link ); ?>" target="_blank">Contact</a>
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
                                                <div class="bio__container">
                                                        <div class="bio__media">
                                                                <img class="bio__headshot" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>">
                                                                <?php echo svg_icon('bio__icon', 'octogon');?>
                                                        </div>
                                                        <div class="bio__details">
                                                                <h3 class="bio__heading"><?php the_title();?> <i class="bio__pike">|</i> <span><?php the_field('staff_title')?></span></h3>
                                                                <div class="bio__description"><?php the_content();?></div>
                                                                <?php 
                                                                        $link = get_field('staff_email');
                                                                        if( $link ): 
                                                                       
                                                                        ?>
                                                                        <div class="bio__cta--wrapper"><a class="bio__cta" href="<?php echo esc_url( $link ); ?>" target="_blank">Contact</a>
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
