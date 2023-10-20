<?php
/**
 * * The template for displaying the Resources page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main id="main-content">
    <!-- Training section  -->
    <section class="single">
        <div class="single__wrapper">
           
            <!-- Single grid wrapper  -->
            <div class="single__grid">
                <!-- Single training article  -->
                <article class="single__container-tta-provider">
                    <!-- Training Details -->
                    <div class="single__details">
                        <!-- Single single description -->
                        <div class="single__description">
                            <?php the_content();?>
                        </div><!-- Single single description -->
                    </div><!-- .single Details -->
                </article> <!--Single single article  -->
            </div><!-- .single grid wrapper  -->
        </div><!-- .single wrapper  -->
    </section><!-- .Single section  -->
	</main>
<?php get_footer(); ?>