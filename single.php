<?php
/**
 * The template for displaying the single pages
 *
 * @package your-wp-project
 */

get_header('general');
?>
<main>
    <!-- Training section  -->
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
                        <?php endif; ?>
                        <!-- .Single single length -->

                        <!-- Single single description -->
                        <div class="single__description">
                            <?php the_content();?>
                        </div><!-- Single single description -->
                    </div><!-- .single Details -->

                    <!-- Single single materials -->
                    <?php
                    // Check if any materials exist
                    if (get_field('webinar_link') || get_field('download_pdf') || get_field('download_pdf_2') || get_field('download_pdf_3') || get_field('download_pdf_4') || get_field('download_pdf_5') || get_field('download_pdf_6') || get_field('download_transcript')): 
                    ?>
                        <div class="single__aside">
                            <div class="single__materials">
                                <h4 class="single__heading">Materials</h4>
                                <?php
                                $transcript = get_field('download_transcript');

                                if ($transcript) { 
                                    // Get the transcript file path
                                    $transcript_path = get_attached_file($transcript['ID']);
                                    // Calculate the transcript file size
                                    $transcript_size = size_format(filesize($transcript_path), 2);
                                    ?>
                                    <!-- Single transcript link -->
                                    <a class="single__link" href="<?php echo $transcript['url']; ?>"
                                       target="_blank" download>View Transcripts (<?php echo $transcript_size; ?>)</a>
                                <?php }

                                if (get_field('webinar_link')) { ?>
                                    <!-- Single webinar link -->
                                    <a class="single__link" href="<?php the_field('webinar_link') ?>"
                                       target="_blank">Listen/View Webinar</a>
                                <?php }

                                // Helper function to display PDF links with file size and type
                                function display_pdf_link($pdf_field) {
                                    $pdf_data = get_field($pdf_field);
                                    if ($pdf_data) {
                                        $pdf_url = $pdf_data['url'];
                                        $pdf_size = size_format(filesize(get_attached_file($pdf_data['ID'])), 2);
                                        $pdf_type = pathinfo($pdf_url, PATHINFO_EXTENSION);
                                        $pdf_title = $pdf_data['title'];
                                        ?>
                                        <!-- Single PDF link -->
                                        <a class="single__link" href="<?php echo $pdf_url; ?>"
                                           target="_blank" download>Download the <?php echo ucfirst($pdf_title); ?> <span class="uppercase"><?php echo $pdf_type; ?></span> (<?php echo $pdf_size; ?>)</a>
                                        <?php
                                    }
                                }

                                display_pdf_link('download_pdf');
                                display_pdf_link('download_pdf_2');
                                display_pdf_link('download_pdf_3');
                                display_pdf_link('download_pdf_4');
                                display_pdf_link('download_pdf_5');
                                display_pdf_link('download_pdf_6');
                                ?>
                            </div>
                        </div><!-- .Single single materials -->
                    <?php endif; ?>
                </article><!-- Single single article -->
            </div><!-- .single grid wrapper -->
        </div><!-- .single wrapper -->
    </section><!-- .Single section -->
</main>
<?php get_footer(); ?>