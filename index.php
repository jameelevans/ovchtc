<?php
/**
 * * The template for displaying the Resources page
 *
 * @package your-wp-project
 */

get_header();

?>
	<main>
    <section class="webinars">
        <div class="webinars__header"><h2 class="h2__heading">Webinars</h2></div>
        <!-- Webinar wrapper  -->
        <div class="webinars__wrapper">
        <?php
            $webinars = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'category_name' => 'webinar', 'posts_per_page'=>-1));
                if( $webinars->have_posts() ):
                    while( $webinars->have_posts() ):
                        $webinars->the_post(); ?>
                        <!-- Webinar post  -->
                        <article class="webinar__container">
                            <header>
                                <h4 class="h4__header"><?php echo the_title(); ?></h4>
                            </header>
                            

                            <p class="webinar__description"><?php
                                if( has_excerpt() ){
                                echo strip_tags(substr( get_the_excerpt(), 0, 210 ))."...";
                                } else {
                                echo wp_trim_words(get_the_content(), 30);
                                }?> </p>
                                
                       
                                <a class="webinar__cta" href="<?php the_permalink();?>" title="Click here to learn more about <?php the_title();?>">View Webinars</a>
                        </article> <!-- .Webinar post  -->
                    <?php endwhile;

                     wp_reset_postdata();
                endif; ?>


            
        </div><!-- .Webinar wrapper  -->
 
    </section>
    <section class="improve-trainings">
           dghjdgjgh
    </section>
	</main>
<?php get_footer(); ?>
