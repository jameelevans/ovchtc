<?php
/**
 * * The template for displaying the Resources page
 *
 * @package your-wp-project
 */

get_header();

?>
	<main>
    <section class="orientations">
        <div class="orientations__wrapper">
            <div class="orientations__header">
              <h2 class="h2__heading">Orientations</h2>
              <div class="orientations__sort"><?php echo do_shortcode('[fe_sort id="2"]');?></div></div>
        
            
            <!-- Orientation wrapper  -->
            <div class="orientations__grid">
            <?php
                $orientations = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'category_name'=>'orientation', 'posts_per_page'=>-1 ));
                    if( $orientations->have_posts() ):?>
                    <div id="orientations-filter" class="orientations-filter">
                        <?php while( $orientations->have_posts() ):
                            $orientations->the_post(); ?>
                            <!-- Orientation post  -->
                            <article class="orientations__container">
                                <div class="orientations__details">
                                  <header>
                                      <h4 class="h4__header"><?php echo the_title(); ?></h4>
                                  </header>

                                  <p class="orientations__length">Length: <?php the_field('exact_duration') ?></p>
                                  

                                  <p class="orientations__description"><?php
                                      if( has_excerpt() ){
                                      echo strip_tags(substr( get_the_excerpt(), 0, 105 ))."...";
                                      } else {
                                      echo wp_trim_words(get_the_content(), 15);
                                      }?>
                                  </p>
                                </div>
                                <div class="orientations__aside">
                                  <div class="orientations__materials">
                                    <h4>Materials</h4>
                                    <p>Listen/View Webinar</p>
                                    <p>View PowerPoint (PDF 476 KB)</p>
                                  </div>
                                </div>

                                    
                        
                                    
                            </article> <!-- .Orientation post  -->
                        <?php endwhile;

                        wp_reset_postdata();
                    endif; ?>


                
            </div><!-- .Orientation wrapper  -->
        </div>
    </section>
    <section class="improve-trainings">
           dghjdgjgh
    </section>
	</main>
<?php get_footer(); ?>
