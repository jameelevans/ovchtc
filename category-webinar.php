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
                  'category_name'=>'webinar',
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
                                <?php
                                    if( has_excerpt() ){
                                    echo strip_tags(substr( get_the_excerpt(), 0, 420 ))."...";
                                    } else {
                                    echo wp_trim_words(get_the_content(), 60);
                                    }?> 
                                
                                  <a class="btn__blue" href="<?php echo the_permalink();?>">See More</a>
                              </div><!-- Single Capacity Building Webinar description -->
                            </div><!-- .Capacity Building Webinar Details -->
                            <!--Single Capacity Building Webinar materials  -->
                            <div class="capacity-building-webinar__aside">
                              <div class="capacity-building-webinar__materials">
                                <h4 class="capacity-building-webinar__heading">Materials</h4>

                                <?php
                                
                                
                                $transcript = get_field('download_transcript');
                                $pdfcb = get_field('download_pdf');
                                $pdfcb2 = get_field('download_pdf_2');
                                $pdfcb3 = get_field('download_pdf_3');
                                $pdfcb4 = get_field('download_pdf_4');
                                $pdfcb5 = get_field('download_pdf_5');
                                $pdfcb6 = get_field('download_pdf_6');

                                /* Getting file size
                                $attachment_id = $pdfcb;
                                $url = wp_get_attachment_url( $attachment_id );
                                $pdfcbsize = filesize( get_attached_file( $attachment_id ) );
                                $pdfcbsize = size_format($pdfcbsize, 2);*/

                                if(!get_field('webinar_link') && !get_field('download_pdf')){
                                  echo '<!--If no capacity-building-webinar paragrapgh  -->';
                                  echo '<p class="capacity-building-webinar__none"> Sorry no materials at this time. Check back later.</p>';
                                } else {
                                  if(get_field('download_transcript')){?>
                                    <!--Capacity Building Webinar webinar link  -->
                                    <a class="capacity-building-webinar__link" href="<?php the_field('download_transcript') ?>">View Transcripts (TXT <?php the_field("transcript_size")?>)</a>
                                  <?php }

                                  if(get_field('webinar_link')){?>
                                    <!--Capacity Building Webinar webinar link  -->
                                    <a class="capacity-building-webinar__link" href="<?php the_field('webinar_link') ?>" target="_blank">Listen/View Webinar</a>
                                  <?php }

                                  if(get_field('download_pdf')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb['url']; ?>">Download the <?php echo $pdfcb['title']; ?> PDF (<?php the_field("download_size")?>)</a>
                                  <?php }

                                  if(get_field('download_pdf_2')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb2['url']; ?>">Download the <?php echo $pdfcb2['title']; ?> PDF (<?php the_field("download_size_2")?>)</a>
                                  <?php }

                                  if(get_field('download_pdf_3')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb3['url']; ?>">Download the <?php echo $pdfcb3['title']; ?> PDF (<?php the_field("download_size_3")?>)</a>
                                  <?php }

                                  if(get_field('download_pdf_4')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb4['url']; ?>">Download the <?php echo $pdfcb4['title']; ?> PDF (<?php the_field("download_size_4")?>)</a>
                                  <?php }

                                  if(get_field('download_pdf_5')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb5['url']; ?>">Download the <?php echo $pdfcb5['title']; ?> PDF (<?php the_field("download_size_5")?>)</a>
                                  <?php }

                                  if(get_field('download_pdf_6')){?>
                                    <!--Capacity Building Webinar powerpoint link  -->
                                    <a class="capacity-building-webinar__link" href="<?php echo $pdfcb6['url']; ?>">Download the <?php echo $pdfcb6['title']; ?> PDF (<?php the_field("download_size_6")?>)</a>
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
