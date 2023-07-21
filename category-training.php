<?php
/**
 * * The template for displaying the Orientation page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main>
    <!-- Training setion  -->
    <section class="orientations">
        <div class="orientations__wrapper">
            <div class="orientations__header">
              <h1 class="h2__heading">Trainings</h1>
              <div class="orientations__sort">
                <?php sort_webinar_posts();?>
              </div>
            </div>
            <!-- Orientation grid wrapper  -->
            <div class="orientations__grid">
            <?php
                $trainings = new WP_Query(
                  array('post_type'=>'post',
                 'post_status'=>'publish',
                  'category_name'=>'training',
                   'posts_per_page'=>-1 ));
                  if( $trainings->have_posts() ):?>
                  <!-- Single training wrapper  -->
                  <div class="orientation">
                      <?php while( $trainings->have_posts() ):
                        $trainings->the_post(); ?>
                        <!-- Single training article  -->
                        <article class="orientation__container">
                            <!-- Training Details -->
                            <div class="orientation__details">
                              <!-- Single Training date -->
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
                              <?php
                                if( has_excerpt() ){
                                echo strip_tags(substr( get_the_excerpt(), 0, 420 ))."...";
                                } else {
                                echo wp_trim_words(get_the_content(), 60);
                                }?> 
                               
                                <a class="btn__blue" href="<?php echo the_permalink();?>">See More</a>
                              </div><!-- Single orientation description -->
                            </div><!-- .Orientation Details -->
                            <!--Single orientation materials  -->
                            <div class="orientation__aside">
                              <div class="orientation__materials">
                                <h4 class="orientation__heading">Materials</h4>

                                <?php
                                $transcript = get_field('download_transcript');
                                $pdf = get_field('download_pdf');
                                $pdf2 = get_field('download_pdf_2');
                                $pdf3 = get_field('download_pdf_3');
                                $pdf4 = get_field('download_pdf_4');
                                $pdf5 = get_field('download_pdf_5');
                                $pdf6 = get_field('download_pdf_6');

                                /* Getting file size
                                $attachment_id = $pdf;
                                $url = wp_get_attachment_url( $attachment_id );
                                $pdfsize = filesize( get_attached_file( $attachment_id ) );
                                $pdfsize = size_format($pdfsize, 2);*/

                                if(!get_field('webinar_link') && !get_field('download_pdf')){
                                  echo '<!--If no orientation paragrapgh  -->';
                                  echo '<p class="orientation__none"> Sorry no materials at this time. Check back later.</p>';
                                } else {
                                    if(get_field('download_transcript')){?>
                                      <!--Orientation webinar link  -->
                                      <a class="orientation__link" href="<?php the_field('download_transcript') ?>">View Transcripts (<?php the_field("transcript_size")?>)</a>
                                    <?php }

                                    if(get_field('webinar_link')){?>
                                      <!--Orientation webinar link  -->
                                      <a class="orientation__link" href="<?php the_field('webinar_link') ?>" target="_blank">Listen/View Webinar</a>
                                    <?php }

                                    if(get_field('webinar_link_2')){?>
                                      <!--Orientation webinar link  -->
                                      <a class="orientation__link" href="<?php the_field('webinar_link_2') ?>" target="_blank">Listen/View Webinar</a>
                                    <?php }

                                    if(get_field('download_pdf')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf['url']; ?>">Download the <?php echo $pdf['title']; ?> PDF (<?php the_field("download_size")?>)</a>
                                    <?php }

                                    if(get_field('download_pdf_2')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf2['url']; ?>">Download the <?php echo $pdf2['title']; ?> PDF (<?php the_field("download_size_2")?>)</a>
                                    <?php }

                                    if(get_field('download_pdf_3')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf3['url']; ?>">Download the <?php echo $pdf3['title']; ?> PDF (<?php the_field("download_size_3")?>)</a>
                                    <?php }

                                    if(get_field('download_pdf_4')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf4['url']; ?>">Download the <?php echo $pdf4['title']; ?> PDF (<?php the_field("download_size_4")?>)</a>
                                    <?php }

                                    if(get_field('download_pdf_5')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf5['url']; ?>">Download the <?php echo $pdf5['title']; ?> PDF (<?php the_field("download_size_5")?>)</a>
                                    <?php }

                                    if(get_field('download_pdf_6')){?>
                                      <!--Orientation powerpoint link  -->
                                      <a class="orientation__link" href="<?php echo $pdf6['url']; ?>">Download the <?php echo $pdf6['title']; ?> PDF (<?php the_field("download_size_6")?>)</a>
                                    <?php }
                                    
                                  }?>

                                 
                               
                                
                              </div>
                            </div> <!-- .Single orientation materials  -->
                          </article> <!--Single orientation article  -->
                      <?php endwhile;
                      wp_reset_postdata();
                      else : ?>
                        <!-- Display the message if there are no posts -->
                        <!-- Single orientation article  -->
                        <article class="orientation__container">
                          <div class="orientation__description">
                            <p>Sorry there are no Training posts at this time.</p>
                          </div>
                        </article>
                      
                 <?php endif; ?>
            </div><!-- .Single orientation wrapper  -->
        </div><!-- .Orientation grid wrapper  -->
    </section><!-- .Orientations setion  -->
	</main>
<?php get_footer(); ?>
