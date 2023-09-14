<?php
/**
 * The template for displaying the Resources page
 *
 * @package your-wp-project
 */

get_header('general');

function display_pdf_links($pdf, $size)
{
    if ($pdf) {
        echo '<div class="improve-training__cta--wrapper">';
        echo svg_icon('improve-training__icon', 'download');
        echo '<a class="improve-training__cta" href="' . esc_url($pdf['url']) . '">Download PDF ' . esc_html($pdf['title']) . ' (' . esc_html($size) . ')</a>';
        echo '</div>';
    } else {
        echo '<!-- If no improve-training downloads paragraph  -->';
        echo '<p class="improve-training__none">Materials coming soon... Check back later.</p>';
    }
}

?>

<main id="main-content">
    <!-- Webinars Section -->
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

    <!-- Improve Trainings Section -->
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
                <div id="tab1" class="improve-training__content improve-training__one-pager
                    <?php
                    $improve_args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'improvements',
                        'orderby'  => 'title',
                        'order' => 'ASC'
                    );

                    $improvements = new WP_Query($improve_args);

                    if ($improvements->have_posts()) {
                        while ($improvements->have_posts()) {
                            $improvements->the_post();
                    ?>
                            <div class="improve-training__container">
                                <div class="improve-training__details">
                                    <h3 class="improve-training__heading"><?php the_title(); ?></h3>
                                    <div class="improve-training__description"><?php the_content(); ?></div>

                                    <?php
                                    for ($i = 1; $i <= 6; $i++) {
                                        display_pdf_links(get_field("download_pdf_$i"), get_field("download_size_$i"));
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p class="improve-training__no-show">There is no training information to show yet</p>';
                    }
                    wp_reset_postdata(); // Restore original post data.
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
