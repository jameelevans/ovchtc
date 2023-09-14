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
            <!-- Webinar wrapper  -->
            <div class="webinars__grid">
                <?php
                $categories = get_categories( array(
                    'hide_empty' => 0,
                   'include'=> array( 3, 12, 7, 11 ),  //live categories 
                   // 'include'=> array( 12, 5, 14, 4 ), // local dev categories 
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
                            <div class="webinars__cta" >View <?php echo $category->name ; ?>s</div>
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
                        <li class="improve-trainings__item"><a href="#tab2" class="improve-trainings__link" title="Display all the Training Info">Additional Training Resources</a></li>
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
                                   
                                            <div class="improve-training__cta--wrapper">

                                            <?php
                                
                            
                                            $oppdf = get_field('download_pdf');
                                            $oppdf2 = get_field('download_pdf_2');
                                            $oppdf3 = get_field('download_pdf_3');
                                            $oppdf4 = get_field('download_pdf_4');
                                            $oppdf5 = get_field('download_pdf_5');
                                            $oppdf6 = get_field('download_pdf_6');


                                            if(!get_field('download_pdf')){
                                            echo '<!--If no improve-training downloads paragrapgh  -->';
                                            echo '<p class="improve-training__none"> Materials coming soon...Check back later.</p>';
                                            } else {

                                            if(get_field('download_pdf')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf['title']; ?> (<?php the_field("download_size")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_2')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf2['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf2['title']; ?> (<?php the_field("download_size_2")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_3')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf3['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf3['title']; ?> (<?php the_field("download_size_3")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_4')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf4['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf4['title']; ?> (<?php the_field("download_size_4")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_5')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf5['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf5['title']; ?> (<?php the_field("download_size_5")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_6')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $oppdf6['url']; ?>" target="_blank" download>Download PDF <?php echo $oppdf6['title']; ?> (<?php the_field("download_size_6")?>)</a>
                                            </div>
                                            <?php }
                                            
                                            }?>

                                            </div>
                                     
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
                                
                            
                                            $atrpdf = get_field('download_pdf');
                                            $atrpdf2 = get_field('download_pdf_2');
                                            $atrpdf3 = get_field('download_pdf_3');
                                            $atrpdf4 = get_field('download_pdf_4');
                                            $atrpdf5 = get_field('download_pdf_5');
                                            $atrpdf6 = get_field('download_pdf_6');
            

                                            if(!get_field('download_pdf')){
                                            echo '<!--If no improve-training downloads paragrapgh  -->';
                                            echo '<p class="improve-training__none"> Materials coming soon...Check back later.</p>';
                                            } else {

                                            if(get_field('download_pdf')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf['title']; ?> (<?php the_field("download_size")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_2')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf2['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf2['title']; ?> (<?php the_field("download_size_2")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_3')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf3['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf3['title']; ?> (<?php the_field("download_size_3")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_4')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf4['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf4['title']; ?> (<?php the_field("download_size_4")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_5')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf5['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf5['title']; ?> (<?php the_field("download_size_5")?>)</a>
                                                </div>
                                            <?php }

                                            if(get_field('download_pdf_6')){?>
                                                <div class="improve-training__cta--wrapper">
                                                    <?php echo svg_icon('improve-training__icon', 'download');?>
                                                    <!--Improve Training download link  -->
                                                    <a class="improve-training__cta" href="<?php echo $atrpdf6['url']; ?>" target="_blank" download>Download PDF <?php echo $atrpdf6['title']; ?> (<?php the_field("download_size_6")?>)</a>
                                            </div>
                                            <?php }
                                            }?>
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