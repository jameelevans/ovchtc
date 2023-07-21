<?php
/**
 * * The template for displaying the Resources page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main id="main-content">
    <section class="webinars">
        <div class="webinars__wrapper">
            <div class="webinars__header"><h2 class="h2__heading">Online Trainings</h2></div>
            <!--
            <div class="webinars__nav">
                <div class="webinars__search"><?php //echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
                <div class="webinars__filter-control-wrapper"><a href="#webinars-filter" class="webinars__filter-control" title="Click here to open filters"><?php //echo svg_icon('webinars__icon', 'filter');?>Filter Webinars By</a></div>  
                <div class="webinars__sort"><?php //sort_webinar_posts();?></div>
            </div>-->
            
            <!-- Webinar wrapper  -->
            <div class="webinars__grid">
            


                <?php
                $categories = get_categories( array(
                    'hide_empty' => 0,
                    'include'=> array( 3, 12, 7, 16, 17 ),
                ) );
                ?>
                    <div id="webinars-filter" class="webinars-filter">
                        <div class="webinars-filter__content">
                            <a href="#section-tours" class="webinars-filter__exit" title="Click here to close filters">&times;</a>
                            <h4 class="webinars-filter__heading">Filters</h4>
                            <?php 
                                echo do_shortcode('[fe_chips]');  
                                echo do_shortcode('[fe_widget]')
                            ?>
                        </div>
                    </div>

                        <?php foreach( $categories as $category ) {

                            //print_r($category);
                            $category_link = get_category_link( $category->term_id );
                            ?>
                           
                            <a class="webinars__container" href="<?php echo esc_url( $category_link ); ?>" title="Click here to veiw all <?php echo esc_attr( $category_name ); ?> webinars">
                                <header><h4 class="h4__header"><?php echo $category->name ; ?>s</h4></header>
                                <p class="webinars__description"><?php echo $category->description;?></p>
                                <div class="webinars__cta" >View Online Trainings</div>
                            </a> <!-- .Webinar post  -->

                            <?php
                            }
                            ?>
                           
                     


                
            </div><!-- .Webinar wrapper  -->
        </div>
    </section>
    <section class="improve-trainings">
        <div class="improve-trainings__header"><h2 class="h2__heading">Improve Your Trainings</h2></div>
        <div class="improve-trainings__wrapper">
            <div>
            <ul class="improve-trainings__list">
                    <li class="improve-trainings__item active"><a href="#tab1" class="improve-trainings__link" title="Display all the One Pagers">One Pagers</a></li>
                    <li class="improve-trainings__item"><a href="#tab2" class="improve-trainings__link" title="Display all the Training Info">Training Info</a></li>
            </ul>
            </div>

            <div class="improve-training__inner-wrapper">
                    <div id="tab1" class="improve-training__content improve-training__one-pager active">
                    <?php
                        $staff = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'improvements',
                    'category_name' => 'one-pagers',
                    'orderby'  => 'title',
                    'order' => 'ASC'
                    ));
                    if($staff->have_posts()) {
                            while($staff->have_posts()) {
                                    $staff->the_post();?>
                                    <!-- HTC staff -->
                                    <div class="improve-training__container">
                                           
                                        <div class="improve-training__details">
                                            <h3 class="improve-training__heading"><?php the_title();?></h3>
                                            <div class="improve-training__description"><?php the_content();?></div>
                                            <?php 
                                                $link = get_field('download_pdf');
                                                if( $link ): 
                                                $link_url = $link['url'];
                                            ?>
                                            <div class="improve-training__cta--wrapper">
                                                <?php echo svg_icon('improve-training__icon', 'download');?>
                                                <a class="improve-training__cta" href="<?php echo esc_url( $link_url ); ?>" target="_blank" title="Download the PDF now">Download PDF (<?php echo the_field('download_size');?>)</a>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div> 
                                    <!-- .HTC staff -->
                            <?php }
                                    } else { ?>
                                    <p class="improve-training__no-show">There is no One Pager's to show yet</p>
                            <?php }?>
                    </div>

                    

                    <div id="tab2" class="improve-training_content improve-training__training-info hide">
                    <?php
            $staff = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'improvements',
                    'category_name' => 'training-info',
                    'orderby'  => 'title',
                    'order' => 'ASC'
                    ));
                    if($staff->have_posts()) {
                            while($staff->have_posts()) {
                                    $staff->the_post();?>
                                    <!-- TA Navigators Expertise staff -->
                                    <div class="improve-training__container">
                                    <div class="improve-training__details">
                                            <h3 class="improve-training__heading"><?php the_title();?></h3>
                                            <div class="improve-training__description"><?php the_content();?></div>
                                            <?php 
                                                $link = get_field('download_pdf');
                                                if( $link ): 
                                                $link_url = $link['url'];
                                            ?>
                                            <div class="improve-training__cta--wrapper">
                                                <?php echo svg_icon('improve-training__icon', 'download');?>
                                                <a class="improve-training__cta" href="<?php echo esc_url( $link_url ); ?>" target="_blank" title="Download the PDF now">Download PDF (<?php echo the_field('download_size');?>)</a>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div> 
                                    <!-- .TA Navigators Expertise staff -->
                            <?php }
                                    } else { ?>
                                    <p class="improve-training__no-show">There is no training information to show yet</p>
                            <?php }?>

                    </div>

            </div> 
        </div>
    </section>
	</main>
<?php get_footer(); ?>
