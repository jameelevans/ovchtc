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
                        <li class="improve-trainings__item active"><a href="#tab1" class="improve-trainings__link"
                                                                    title="Display all the One Pagers">One Pagers</a></li>
                        <li class="improve-trainings__item"><a href="#tab2" class="improve-trainings__link"
                                                            title="Display all the Training Info">Additional Training Resources</a>
                        </li>
                    </ul>
                </div>

                <div class="improve-training__inner-wrapper">
                    <div id="tab1" class="improve-training__content improve-training__one-pager active">
                        <?php
                        $staff = new WP_Query(array(
                            'posts_per_page' => -1,
                            'post_type' => 'improvements',
                            'category_name' => 'one-pagers',
                            'orderby' => 'title',
                            'order' => 'ASC'
                        ));
                        if ($staff->have_posts()) {
                            while ($staff->have_posts()) {
                                $staff->the_post(); ?>
                                <!-- HTC staff -->
                                <div class="improve-training__container">
                                    <div class="improve-training__details">
                                        <h3 class="improve-training__heading"><?php the_title(); ?></h3>
                                        <div class="improve-training__description"><?php the_content(); ?></div>

                                        <?php
                                        // Get the download PDF fields
                                        $oppdfs = array(
                                            get_field('download_pdf'),
                                            get_field('download_pdf_2'),
                                            get_field('download_pdf_3'),
                                            get_field('download_pdf_4'),
                                            get_field('download_pdf_5'),
                                            get_field('download_pdf_6')
                                        );

                                        // Initialize a variable to check if any download link is found
                                        $foundDownloadLink = false;

                                        foreach ($oppdfs as $index => $oppdf) {
                                            if (!empty($oppdf)) {
                                                // Get the attachment ID from the file URL
                                                $attachment_id = attachment_url_to_postid($oppdf['url']);

                                                // Check if the attachment ID is valid
                                                if ($attachment_id) {
                                                    // Get attachment metadata
                                                    $attachment_metadata = wp_get_attachment_metadata($attachment_id);

                                                    // Check if attachment metadata is not empty and contains the 'file' key
                                                    if (!empty($attachment_metadata['file'])) {
                                                        // Build the full file path
                                                        $file_path = wp_get_upload_dir()['basedir'] . '/' . $attachment_metadata['file'];

                                                        // Check if the file exists
                                                        if (file_exists($file_path)) {
                                                            // Get the file size in bytes
                                                            $file_size_bytes = filesize($file_path);

                                                            // Format the file size for display
                                                            $file_size_formatted = size_format($file_size_bytes, 2);

                                                            // Get the file extension
                                                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                            // Output the download link with the file type and size
                                                            ?>
                                                            <div class="improve-training__cta--wrapper">
                                                                <?php echo svg_icon('improve-training__icon', 'download'); ?>
                                                                <!-- Improve Training download link with file type and size -->
                                                                <a class="improve-training__cta"
                                                                href="<?php echo esc_url($oppdf['url']); ?>"
                                                                target="_blank"
                                                                download>
                                                                    Download <?php echo strtoupper($file_extension); ?>
                                                                    (<?php echo esc_html($file_size_formatted); ?>)
                                                                </a>
                                                            </div>
                                                            <?php

                                                            // Set the flag to indicate that a download link was found
                                                            $foundDownloadLink = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        // If no download link is found, display a message
                                        if (!$foundDownloadLink) {
                                            echo '<!-- If no improve-training downloads paragraph -->';
                                            echo '<p class="improve-training__none">Materials coming soon...Check back later.</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- .HTC staff -->
                            <?php }
                        } else { ?>
                            <p class="improve-training__no-show">There are no One Pagers to show yet</p>
                        <?php } ?>
                    </div>

                    <div id="tab2" class="improve-training_content improve-training__training-info hide">
                        <?php
                        $staff = new WP_Query(array(
                            'posts_per_page' => -1,
                            'post_type' => 'improvements',
                            'category_name' => 'training-info',
                            'orderby' => 'title',
                            'order' => 'ASC'
                        ));
                        if ($staff->have_posts()) {
                            while ($staff->have_posts()) {
                                $staff->the_post(); ?>
                                <!-- TA Navigators Expertise staff -->
                                <div class="improve-training__container">
                                    <div class="improve-training__details">
                                        <h3 class="improve-training__heading"><?php the_title(); ?></h3>
                                        <div class="improve-training__description"><?php the_content(); ?></div>

                                        <?php
                                        // Get the download PDF fields
                                        $atrpdfs = array(
                                            get_field('download_pdf'),
                                            get_field('download_pdf_2'),
                                            get_field('download_pdf_3'),
                                            get_field('download_pdf_4'),
                                            get_field('download_pdf_5'),
                                            get_field('download_pdf_6')
                                        );

                                        // Initialize a variable to check if any download link is found
                                        $foundDownloadLink = false;

                                        foreach ($atrpdfs as $index => $atrpdf) {
                                            if (!empty($atrpdf)) {
                                                // Get the attachment ID from the file URL
                                                $attachment_id = attachment_url_to_postid($atrpdf['url']);

                                                // Check if the attachment ID is valid
                                                if ($attachment_id) {
                                                    // Get attachment metadata
                                                    $attachment_metadata = wp_get_attachment_metadata($attachment_id);

                                                    // Check if attachment metadata is not empty and contains the 'file' key
                                                    if (!empty($attachment_metadata['file'])) {
                                                        // Build the full file path
                                                        $file_path = wp_get_upload_dir()['basedir'] . '/' . $attachment_metadata['file'];

                                                        // Check if the file exists
                                                        if (file_exists($file_path)) {
                                                            // Get the file size in bytes
                                                            $file_size_bytes = filesize($file_path);

                                                            // Format the file size for display
                                                            $file_size_formatted = size_format($file_size_bytes, 2);

                                                            // Get the file extension
                                                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

                                                            // Output the download link with the file type and size
                                                            ?>
                                                            <div class="improve-training__cta--wrapper">
                                                                <?php echo svg_icon('improve-training__icon', 'download'); ?>
                                                                <!-- Improve Training download link with file type and size -->
                                                                <a class="improve-training__cta"
                                                                href="<?php echo esc_url($atrpdf['url']); ?>"
                                                                target="_blank"
                                                                download>
                                                                    Download <?php echo strtoupper($file_extension); ?>
                                                                    (<?php echo esc_html($file_size_formatted); ?>)
                                                                </a>
                                                            </div>
                                                            <?php

                                                            // Set the flag to indicate that a download link was found
                                                            $foundDownloadLink = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        // If no download link is found, display a message
                                        if (!$foundDownloadLink) {
                                            echo '<!-- If no improve-training downloads paragraph -->';
                                            echo '<p class="improve-training__none">Materials coming soon...Check back later.</p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- .TA Navigators Expertise staff -->
                            <?php }
                        } else { ?>
                            <p class="improve-training__no-show">There is no training information to show yet</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

	</main>
<?php get_footer(); ?>