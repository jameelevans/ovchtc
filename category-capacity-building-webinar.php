<?php
/**
 * * The template for displaying the Orientation page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main>
    <!-- Capacity Building Webinar setion  -->
    <section class="capacity-building-webinars">
        <div class="capacity-building-webinars__wrapper">
            <div class="capacity-building-webinars__header">
              <h1 class="h2__heading">Capacity Building Webinars</h1>
              <div class="capacity-building-webinars__sort">
                <?php sort_webinar_posts();?>
              </div>
            </div>
            <!-- Capacity Building Webinar grid wrapper  -->
            <div class="capacity-building-webinars__grid">
            <?php
                $capacitybuilding = new WP_Query(
                  array('post_type'=>'post',
                 'post_status'=>'publish',
                  'category_name'=>'capacity-building-webinar',
                   'posts_per_page'=>-1 ));
                  if( $capacitybuilding->have_posts() ):?>
                  <!-- Single Capacity Building Webinar wrapper  -->
                  <div class="capacity-building-webinar">
                      <?php while( $capacitybuilding->have_posts() ):
                        $capacitybuilding->the_post(); ?>
                        <!-- Single Capacity Building Webinar article  -->
                        <article class="capacity-building-webinar__container">
                            <!-- Capacity Building Webinar Details -->
                            <div class="capacity-building-webinar__details">
                              <!-- Single Capacity Building Webinar date -->
                              <div class="capacity-building-webinar__date">
                                <p class="capacity-building-webinar__month">
                                  <?php
                                    $webinarDate = new DateTime(get_field('webinar_date'));
                                    echo $webinarDate->format('M') ?> 
                                    <span>
                                      <?php
                                          echo $webinarDate->format('d')
                                        ?>
                                    </span> 
                                </p>
                                <p class="capacity-building-webinar__year">
                                  <?php
                                    echo $webinarDate->format('Y')
                                  ?>
                                </p>
                              </div><!-- .Single Capacity Building Webinar date -->
                              <!-- Single Capacity Building Webinar header -->
                              <header>
                                  <h2 class="capacity-building-webinar__heading"><?php echo the_title(); ?></h2>
                              </header><!-- .Single Capacity Building Webinar header -->
                              <!-- Single Capacity Building Webinar length -->
                              <?php if(get_field('exact_duration')): ?>
                                  <p class="capacity-building-webinar__length">Length: <?php the_field('exact_duration') ?></p>
                                  <?php endif;?>
                              
                              <!-- .Single Capacity Building Webinar length -->
                              <!-- Single Capacity Building Webinar description -->
                              <div class="capacity-building-webinar__description">
                                <?php the_content();?>
                              </div><!-- Single Capacity Building Webinar description -->
                            </div><!-- .Capacity Building Webinar Details -->
                            <!--Single Capacity Building Webinar materials  -->
                            <div class="capacity-building-webinar__aside">
                              <div class="capacity-building-webinar__materials">
                                <h4 class="capacity-building-webinar__heading">Materials</h4>

                                <?php if(!get_field('webinar_link') && !get_field('download_pdf')){
                                  echo '<!--If no capacity-building-webinar paragrapgh  -->';
                                  echo '<p class="capacity-building-webinar__none"> Sorry no materials at this time. Check back later.</p>';
                                } else {
                                    if(get_field('webinar_link')){?>
                                      <!--Capacity Building Webinar webinar link  -->
                                      <a class="capacity-building-webinar__link" href="<?php the_field('webinar_link') ?>">Listen/View Webinar</a>
                                    <?php }

                                    if(get_field('download_pdf')){?>
                                      <!--Capacity Building Webinar powerpoint link  -->
                                      <a class="capacity-building-webinar__link" href="<?php the_field("download_pdf") ?>">View PowerPoint (PDF <?php the_field("download_size")?>)</a>
                                    <?php }
                                  }?>

                                 
                               
                                
                              </div>
                            </div> <!-- .Single Capacity Building Webinar materials  -->
                          </article> <!--Single Capacity Building Webinar article  -->
                      <?php endwhile;
                      wp_reset_postdata();
                  endif; ?>
            </div><!-- .Single Capacity Building Webinar wrapper  -->
        </div><!-- .Capacity Building Webinar grid wrapper  -->
    </section><!-- .Capacity Building Webinars setion  -->
	</main>
<?php get_footer(); ?>
