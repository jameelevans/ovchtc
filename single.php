<?php
/**
 * * The template for displaying the single pages
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main>
    <!-- Training setion  -->
    <section class="single">
        <div class="single__wrapper">
            <div class="single__header">
              <h1 class="h2__heading"><?php echo the_title(); ?></h1>
            
            </div>
            <!-- Single grid wrapper  -->
            <div class="single__grid">
              <!-- Single training article  -->
              <article class="single__container">
                  <!-- Training Details -->
                  <div class="single__details">
                    <!-- Single Training date -->
                    <div class="single__date">
                      <p class="single__month">
                        <?php
                          $webinarDate = new DateTime(get_field('webinar_date'));
                          echo $webinarDate->format('M') ?> 
                          <span>
                            <?php
                                echo $webinarDate->format('d')
                              ?>
                          </span> 
                      </p>
                      <p class="single__year">
                        <?php
                          echo $webinarDate->format('Y')
                        ?>
                      </p>
                    </div><!-- .Single single date -->
                  
                    <!-- Single single length -->
                    <?php if(get_field('exact_duration')): ?>
                        <p class="single__length">Length: <?php the_field('exact_duration') ?></p>
                        <?php endif;?>
                    
                    <!-- .Single single length -->
                    <!-- Single single description -->
                    <div class="single__description">
                      <?php the_content();?>
                      
                    </div><!-- Single single description -->
                  </div><!-- .single Details -->
                  <!--Single single materials  -->
                  <div class="single__aside">
                    <div class="single__materials">
                      <h4 class="single__heading">Materials</h4>

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
                        echo '<!--If no single paragrapgh  -->';
                        echo '<p class="single__none"> Sorry no materials at this time. Check back later.</p>';
                      } else {
                          if(get_field('download_transcript')){?>
                            <!--single webinar link  -->
                            <a class="single__link" href="<?php the_field('download_transcript') ?>">View Transcripts (<?php the_field("transcript_size")?>)</a>
                          <?php }

                          if(get_field('webinar_link')){?>
                            <!--single webinar link  -->
                            <a class="single__link" href="<?php the_field('webinar_link') ?>" target="_blank">Listen/View Webinar</a>
                          <?php }

                          if(get_field('webinar_link_2')){?>
                            <!--single webinar link  -->
                            <a class="single__link" href="<?php the_field('webinar_link_2') ?>" target="_blank">Listen/View Webinar</a>
                          <?php }

                          if(get_field('download_pdf')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf['url']; ?>" target="_blank" download>Download the <?php echo $pdf['title']; ?> PDF (<?php the_field("download_size")?>)</a>
                          <?php }

                          if(get_field('download_pdf_2')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf2['url']; ?>" target="_blank" download>Download the <?php echo $pdf2['title']; ?> PDF (<?php the_field("download_size_2")?>)</a>
                          <?php }

                          if(get_field('download_pdf_3')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf3['url']; ?>" target="_blank" download>Download the <?php echo $pdf3['title']; ?> PDF (<?php the_field("download_size_3")?>)</a>
                          <?php }

                          if(get_field('download_pdf_4')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf4['url']; ?>" target="_blank" download>Download the <?php echo $pdf4['title']; ?> PDF (<?php the_field("download_size_4")?>)</a>
                          <?php }

                          if(get_field('download_pdf_5')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf5['url']; ?>" target="_blank" download>Download the <?php echo $pdf5['title']; ?> PDF (<?php the_field("download_size_5")?>)</a>
                          <?php }

                          if(get_field('download_pdf_6')){?>
                            <!--single powerpoint link  -->
                            <a class="single__link" href="<?php echo $pdf6['url']; ?>" target="_blank" download>Download the <?php echo $pdf6['title']; ?> PDF (<?php the_field("download_size_6")?>)</a>
                          <?php }
                          
                        }?>

                        
                      
                      
                    </div>
                  </div> <!-- .Single single materials  -->
                </article> <!--Single single article  -->
        </div><!-- .single grid wrapper  -->
    </section><!-- .Single setion  -->
	</main>
<?php get_footer(); ?>

 
 
 
