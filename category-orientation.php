<?php
/**
 * * The template for displaying the Orientation page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main>
    <!-- Orientations setion  -->
    <section class="orientations">
        <div class="orientations__wrapper">
            <div class="orientations__header">
              <h1 class="h2__heading">Orientations</h1>
              <div class="orientations__sort">
                <?php echo do_shortcode('[fe_sort id="3"]');?>
              </div>
            </div>
            <!-- Orientation grid wrapper  -->
            <div class="orientations__grid">
            <?php
                $orientations = new WP_Query(
                  array('post_type'=>'post',
                 'post_status'=>'publish',
                  'category_name'=>'orientation',
                   'posts_per_page'=>-1 ));
                  if( $orientations->have_posts() ):?>
                  <!-- Single orientation wrapper  -->
                  <div class="orientation">
                      <?php while( $orientations->have_posts() ):
                        $orientations->the_post(); ?>
                        <!-- Single orientation article  -->
                        <article class="orientation__container">
                            <!-- Orientation Details -->
                            <div class="orientation__details">
                              <!-- Single orientation date -->
                              <div class="orientation__date">
                                <p class="orientation__month">
                                  <?php
                                    $webinarDate = new DateTime(get_field('webinar_date'));
                                    echo $webinarDate->format('M') ?> 
                                    <span>
                                      <?php
                                          echo $webinarDate->format('d')
                                        ?>
                                    </span> 
                                </p>
                                <p class="orientation__year">
                                  <?php
                                    echo $webinarDate->format('Y')
                                  ?>
                                </p>
                              </div><!-- .Single orientation date -->
                              <!-- Single orientation header -->
                              <header>
                                  <h2 class="orientation__heading"><?php echo the_title(); ?></h2>
                              </header><!-- .Single orientation header -->
                              <!-- Single orientation length -->
                              <?php if(get_field('exact_duration')): ?>
                                  <p class="orientation__length">Length: <?php the_field('exact_duration') ?></p>
                                  <?php endif;?>
                              
                              <!-- .Single orientation length -->
                              <!-- Single orientation description -->
                              <div class="orientation__description">
                                <?php the_content();?>
                              </div><!-- Single orientation description -->
                            </div><!-- .Orientation Details -->
                            <!--Single orientation materials  -->
                            <div class="orientation__aside">
                              <div class="orientation__materials">
                                <h4 class="orientation__heading">Materials</h4>

                                <?php if(!get_field('webinar_link') && !get_field('download_pdf')){
                                  echo '<!--If no orientation paragrapgh  -->';
                                  echo '<p class="orientation__none"> Sorry no materials at this time. Check back later.</p>';
                                } else {
                                    if(get_field('webinar_link')){?>
                                      <!--Orientation webinar link  -->
                                      <a class="orientation__link" href="<?php the_field('webinar_link') ?>">Listen/View Webinar</a>
                                    <?php }

                                    if(get_field('download_pdf')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php the_field("download_pdf") ?>">View PowerPoint (PDF <?php the_field("download_size")?>)</a>
                                    <?php }
                                  }?>

                                 
                               
                                
                              </div>
                            </div> <!-- .Single orientation materials  -->
                          </article> <!--Single orientation article  -->
                      <?php endwhile;
                      wp_reset_postdata();
                  endif; ?>
            </div><!-- .Single orientation wrapper  -->
        </div><!-- .Orientation grid wrapper  -->
    </section><!-- .Orientations setion  -->
	</main>
<?php get_footer(); ?>
