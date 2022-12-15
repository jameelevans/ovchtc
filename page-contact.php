<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

 get_header('general');

?>
	<main  id="main-content">
    <section class="faqs">
      <div class="faqs__details">
        <h1 class="h2__heading">OVC Human Trafficking Program FAQs</h1>
        <p class="faqs__p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna.
          Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus.
          Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur
          pellentesque nibh nibh, at maximus ante fermentum sit amet.</p>

          <blockquote class="faqs__quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit Ut et massa mi.</blockquote>

          <p class="faqs__p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna.
          Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus.
          Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur
          pellentesque nibh nibh, at maximus ante fermentum sit amet.</p>
      </div>
      <div class="hr">&nbsp;</div>

      <div id="faqs__top" class="faqs__main">
        <?php the_content();?>
      </div>
      
    </section>
	</main>
<?php get_footer(); ?>
