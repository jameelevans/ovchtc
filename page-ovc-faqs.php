<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main  id="main-content">
    <section class="faq">
      <div class="faq__details">
        <h1 class="h2__heading"><?php the_title();?></h1>
          <div class="faq__content">
            <?php the_content();?>
          </div>
      </div>
      <div class="hr">&nbsp;</div>

      <div id="faqs__top" class="faq__main">
       
        
        <div class="faqs" role="tablist" aria-live="polite" data-behavior="accordion">
          <?php
            $faqs = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'faqs',
              'orderby'  => 'title',
              'order' => 'ASC'
              ));
              if($faqs->have_posts()) {
                      while($faqs->have_posts()) {
                              $faqs->the_post();?>
                              <!-- Faqs Category -->
                                <?php
                                $get_cat        = get_the_category();
                                $first_cat      = $get_cat[0];
                                $category_name  = $first_cat->cat_name;
                                $category_link  = get_category_link( $first_cat->cat_ID ); ?>
                                <h2 class="faqs__heading">Topic - <?php echo  $category_name; ?></h2>
                                <!-- .Faqs Category -->
                                <!-- Faqs -->
                                <article class="faqs__item js-show-item-default" data-binding="expand-accordion-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                  <span id="tab-<?php echo get_the_ID();?>" tabindex="0" class="faqs__title" aria-controls="panel-<?php echo get_the_ID();?>" role="tab" aria-selected="false" aria-expanded="false" data-binding="expand-accordion-trigger">
                                    <h5 itemprop="name"><?php the_title();?></h5>
                                  </span>

                                  <div id="panel-<?php echo get_the_ID();?>" class="faqs__content" role="tabpanel" aria-hidden="true" aria-labelledby="tab-<?php echo get_the_ID();?>" data-binding="expand-accordion-container" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div class="faqs__content-inner">
                                      <?php the_content();?>
                                    </div>
                                  </div>

                                </article>
                            
                            
                          <!-- .FAQs -->
                      <?php }
                              } else { ?>
                              <p class="faqs__no-show">There are no FAQs to show yet</p>
                      <?php }?>


        </div>
        
        <div class="faqs__sidebar">
          <div class="faqs__sort"><?php echo do_shortcode('[fe_sort id="5"]');?></div>

          
        </div>
      </div>

      <div class="faq__bottom">
        <a class="faq__backtop" href="#faqs__top"> <?php echo svg_icon('faq__icon', 'angle-up');?></a>
      </div>
      
    </section>
	</main>
<?php get_footer(); ?>
