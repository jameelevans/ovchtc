<?php
/**
 * The template for displaying category pages
 *
 * @package your-wp-project
 */

get_header('general');

?>

<main>
    <!-- Category section  -->
    <section class="categories">
        <div class="categories__wrapper">
            <div class="categories__header">
                <h1 class="categories__heading"><?php single_cat_title(); ?>s</h1>
                <p class="categories__subheader categories__subheader--mobile"><?php echo strip_tags(category_description()); ?></p>
                <div class="categories__sort">
                    <?php sort_webinar_posts(); ?>
                </div>
            </div>
            <p class="categories__subheader categories__subheader--desktop"><?php echo strip_tags(category_description()); ?></p>
            <!-- Categories grid wrapper  -->
            <div class="category">
                <?php
                $category_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => get_query_var('category_name'),
                    'posts_per_page' => -1
                ));

                if ($category_posts->have_posts()) :
                    while ($category_posts->have_posts()) :
                        $category_posts->the_post();
                        ?>
                        <!-- Single category article  -->
                        <article class="category__container">
                            <!-- Category Details -->
                            <div class="category__details">
                                <!-- Single category date -->
                                <div class="category__date">
                                    <p class="category__month">
                                        <?php
                                        $categoryDate = new DateTime(get_field('webinar_date'));
                                        echo $categoryDate->format('M');
                                        ?>
                                        <span>
                                            <?php
                                            echo $categoryDate->format('d');
                                            ?>
                                        </span>
                                    </p>
                                    <p class="category__year">
                                        <?php
                                        echo $categoryDate->format('Y');
                                        ?>
                                    </p>
                                </div><!-- .Single category date -->
                                <!-- Single category header -->
                                <header>
                                    <h2 class="category__heading"><?php echo the_title(); ?></h2>
                                </header><!-- .Single category header -->
                                <!-- Single category length -->
                                <?php if (get_field('exact_duration')) : ?>
                                    <p class="category__length">Length: <?php the_field('exact_duration') ?></p>
                                <?php endif; ?>
                                <!-- .Single category length -->
                                <!-- Single category description -->
                                <div class="category__description">
                                    <?php
                                    if (has_excerpt()) {
                                        echo strip_tags(substr(get_the_excerpt(), 0, 420)) . "...";
                                    } else {
                                        echo wp_trim_words(get_the_content(), 60);
                                    }
                                    ?>
                                    <a class="btn__blue" href="<?php echo the_permalink(); ?>">See More</a>
                                </div><!-- Single category description -->
                            </div><!-- .Category Details -->
                            <!-- Single category materials  -->
                            <div class="category__aside">
                                <div class="category__materials">
                                    <h4 class="category__heading">Materials</h4>
                                    <?php
                                    // Check if download links are available
                                    $pdf = get_field('download_pdf');
                                    $pdf2 = get_field('download_pdf_2');
                                    $pdf3 = get_field('download_pdf_3');
                                    $pdf4 = get_field('download_pdf_4');
                                    $pdf5 = get_field('download_pdf_5');
                                    $pdf6 = get_field('download_pdf_6');

                                    $transcript = get_field('download_transcript');

                                    // Check if any download links are available
                                    $download_links = array(
                                        'PDF 1' => $pdf,
                                        'PDF 2' => $pdf2,
                                        'PDF 3' => $pdf3,
                                        'PDF 4' => $pdf4,
                                        'PDF 5' => $pdf5,
                                        'PDF 6' => $pdf6,
                                    );

                                    $foundDownloadLink = false;

                                    foreach ($download_links as $label => $download) {
                                        if ($download) {
                                            $file_url = $download['url'];
                                            $file_size = size_format(filesize(get_attached_file($download['ID'])), 2);
                                            $file_type = pathinfo($file_url, PATHINFO_EXTENSION);
                                            $file_title = $download['title'];

                                            // Display the download link with label, file type, and size
                                            echo "<a class='category__link' href='{$file_url}' target='_blank' download>Download the {$file_title} PDF ({$file_size})</a>";

                                            $foundDownloadLink = true;
                                        }
                                    }

                                    // Display the webinar link if available
                                    if (get_field('webinar_link')) { ?>
                                        <!-- Category webinar link -->
                                        <a class="category__link" href="<?php the_field('webinar_link'); ?>"
                                           target="_blank">Listen/View Webinar</a>
                                    <?php }

                                    // Display the transcript link if available
                                    if ($transcript) {
                                        $transcript_url = $transcript['url'];
                                        $transcript_size = size_format(filesize(get_attached_file($transcript['ID'])), 2);
                                        // Display the transcript link with file size
                                        echo "<a class='category__link' href='{$transcript_url}' target='_blank' download>View Transcripts ({$transcript_size})</a>";
                                        $foundDownloadLink = true;
                                    }

                                    // If no download link is found, display a message
                                    if (!$foundDownloadLink) {
                                        echo '<!-- If no category paragraph -->';
                                        echo '<p class="category__none">Sorry, no materials at this time. Check back later.</p>';
                                    }
                                    ?>
                                </div>
                            </div> <!-- .Single category materials  -->
                        </article> <!--Single category article  -->
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <!-- Display the message if there are no posts -->
                    <article class="category__container">
                        <div class="category__description">
                            <p>Sorry, there are no posts in this category at this time.</p>
                        </div>
                    </article>
                <?php endif; ?>
            </div><!-- .Single category wrapper  -->
        </div><!-- .Categories grid wrapper  -->
    </section><!-- .Categories section  -->
</main>

<?php get_footer(); ?>
