<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

get_header();

?>
	<main>
    <section class="staff-checklists">
      <div class="staff-checklists__header">
        <h2 class="staff-checklists__heading h2__heading">Staff Checklists</h2>
      </div>
      <div class="staff-checklists__wrapper">
      <?php
          $checklists = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'checklists',
            'orderby'  => 'title',
            'order' => 'ASC'
            ));
            if($checklists->have_posts()) {
                    while($checklists->have_posts()) {
                            $checklists->the_post();?>
                            <!-- Staff Checklists -->
                            <div class="staff-checklist__inner">
                              <div class="staff-checklist <? if ( is_single( 267 ) ) {echo 'grantee';} else {echo 'new-award';}?>"  style="background-image: url('<?php echo  get_template_directory_uri()?>/assets/img/about-1.jpg');">
                                <div class="staff-checklist__header">
                                  <h4 class="staff-ckecklist__h4"><?php the_title();?></h4>
                                  <div class="staff-ckecklist__cta">
                                    <a class="staff-ckecklist__link" href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo svg_icon('staff-ckecklist__icon', 'download');?> Download PDF (<?php echo the_field('download_size');?>)</a>
                                  </div>
                                </div>
                              </div>
                              <div class="hr">&nbsp</div>
                              <div class="staff-checklist__details">
                                <?php the_content();?>
                              </div>
                            </div><!-- .Staff Checklists -->
                    <?php }
                            } else { ?>
                            <p class="staff__no-show">There is no staff to show yet</p>
                    <?php }?>
 
        

      </div>
    </section>
	</main>
<?php get_footer(); ?>