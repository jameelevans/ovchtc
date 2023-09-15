<?php
/**
 * * The template for displaying the about page
 *
 * @package your-wp-project
 */

get_header('general');

?>
<main  id="main-content">
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
            if ($checklists->have_posts()) {
                $postCount = 1;
                while ($checklists->have_posts()) {
                    $postCount++;
                    $checklists->the_post(); ?>
                    <!-- Staff Checklists -->
                    <div class="staff-checklist__inner">
                        <?php
                        $pdf = get_field('download_pdf');
                        $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                        $file_size = size_format(filesize(get_attached_file($pdf['ID'])), 2);
                        $file_type = pathinfo($pdf['url'], PATHINFO_EXTENSION);
                        ?>
                        <div class="staff-checklist <?php if ($postCount == 2) {
                            echo 'grantee';
                        } else {
                            echo 'new-award';
                        } ?>" style="background-image: linear-gradient(to bottom right,
        rgba(var(--color-dark-blue-a),0.8) 35%, rgba(var(--color-teal-a), 0.8)),url('<?php echo $img ?>'); background-position: 0% -60px; background-size: cover;">
                            <div class="staff-checklist__header">
                                <div class="staff-ckecklist__cta">
                                <?php echo svg_icon('staff-ckecklist__icon', 'download'); ?>
                                    <a class="staff-ckecklist__link underline" href="<?php echo $pdf['url']; ?>"
                                       target="_blank"
                                       title="Download the <?php the_title(); ?> pdf now">
                                        Download the <?php the_title(). $file_type; ?> PDF (<?php echo $file_size; ?>)</a>
                                </div>
                            </div>
                        </div>
                        <div class="hr">&nbsp;</div>
                        <div class="staff-checklist__details">
                            <?php the_content(); ?>
                        </div>
                    </div><!-- .Staff Checklists -->
                <?php }
            } else { ?>
                <p class="staff__no-show">There is no staff to show yet</p>
            <?php } ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
