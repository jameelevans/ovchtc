<?php
/**
 * The template for displaying the header
 *
 * @package your-wp-project
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<style>
.general-header {
    background-image: linear-gradient(
            to bottom right, 
            rgba(var(--color-dark-blue-a), 0.9) 35%, 
            rgba(var(--color-teal-a), 0.9)
        ),
        url("<?php 
            $queried_id = get_queried_object_id();
            if (has_post_thumbnail($queried_id)) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($queried_id), 'single-post-thumbnail');
                echo esc_url($image[0]);
            } else {
                echo esc_url(get_stylesheet_directory_uri() . '/assets/img/resources-header.jpg');
            }
        ?>");
}

@media screen and (max-width: 800px) {
    .general-header {
        background-image: linear-gradient(
                to bottom, 
                rgba(var(--color-dark-blue-a), .95), 
                rgba(var(--color-blue-a), 0.95)
            ),
            url("<?php 
                $queried_id = get_queried_object_id();
                if (has_post_thumbnail($queried_id)) {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($queried_id), 'single-post-thumbnail');
                    echo esc_url($image[0]);
                } else {
                    echo esc_url(get_stylesheet_directory_uri() . '/assets/img/resources-header.jpg');
                }
            ?>");
    }
}
</style>

<body class="container general">
    <a class="screen-reader-shortcut" href="#main-content" tabindex="1">Skip to main content</a>

    <!-- Header -->
    <header id="top" class="header general-header" role="banner">
        <div class="header__top">
            <!-- Logo -->
            <a class="header__logo" href="/" title="Click here to go to the Home page">
                <?php 
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<img class="header__icon" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" draggable="false">';
                }
                ?>
            </a>

            <!-- Site Navigation -->
            <?php
            echo site_navigation();
            echo mobile_navigation();
            ?>
        </div>

        <div class="header__content">
            <?php if (!is_category()) : ?>
                <?php if (is_front_page()) : ?>
                    <h1 class="header__heading"><?php echo get_bloginfo('description'); ?></h1>
                <?php elseif (is_home()) : ?>
                    <h1 class="header__heading">Start Here</h1>
                <?php elseif (!is_page(['staff-checklist', 'ovc-faqs', 'events']) && !is_search() && !is_single() && !is_404()) : ?>
                    <h1 class="header__heading"><?php the_title(); ?></h1>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            if (is_home()) {
                echo '<p class="header__description">These resources will help you and your partners stay connected to the most effective practices to successfully administer your award.</p>';
            } elseif (!is_404() && !is_category() && !is_page(['staff-checklist', 'tta-provider-partner-highlight', 'ovc-faqs']) && !is_search() && !is_single()) {
                echo the_content();
            }
            ?>

            <?php if (is_home()) : ?>
                <div class="header__cta--wrapper">
                    <a class="header__cta underline" href="<?php echo esc_url(site_url('/staff-checklist')); ?>" title="Go to the Staff Checklist page">Staff Checklist</a>
                    <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                </div>
                <div class="header__cta--wrapper">
                    <a class="header__cta underline" href="<?php echo esc_url(site_url('/orientation')); ?>" title="Go to the Orientations page">Orientations</a>
                    <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                </div>
                <div class="header__cta--wrapper">
                    <a class="header__cta underline" href="<?php echo esc_url(site_url('/ovc-faqs')); ?>" title="Go to the FAQs page">OVC FAQs</a>
                    <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                </div>
                <div class="header__cta--wrapper">
                    <a class="header__cta underline" href="https://www.ovcttac.gov/UnderstandingHumanTrafficking/index.cfm?nm=wbt&ns=ot&nt=ht" target="_blank" title="Go to the OVC's Understanding Human Trafficking page">Understanding Human Trafficking Training</a>
                    <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                </div>
                <div class="header__cta--wrapper">
                    <a class="header__cta underline" href="<?php echo esc_url(site_url('/tta-provider-partner-highlight')); ?>" title="Go to the TTA Provider Partner Highlight page">TTA Provider Partner Highlight</a>
                    <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                </div>
            <?php endif; ?>

            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <?php $link = get_field("header_link_$i"); ?>
                <?php if ($link && !is_home()) : ?>
                    <div class="header__cta--wrapper">
                        <a class="header__cta underline" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" title="Learn more about <?php echo esc_html($link['title']); ?>">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                        <?php echo svg_icon('header__arrow', 'arrow-right'); ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </header><!-- .Header -->
</body>
</html>