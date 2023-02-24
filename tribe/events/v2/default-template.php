<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;?>

<!doctype html>
	<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<style>


.general-header {
		background-image: linear-gradient(to bottom right,

					rgba(var(--color-dark-blue-a),0.9) 35%, rgba(var(--color-teal-a), 0.9)),
				url("<?php if (has_post_thumbnail($post->ID)){ $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); echo  $image[0];}else{ echo get_stylesheet_directory_uri() .  '/assets/img/resources-header.jpg';	}?>");	
	}

	@media screen and (max-width: 800px) {
				.general-header{
				background-image: linear-gradient(to bottom,
						rgba(var(--color-dark-blue-a), .95), rgba(var(--color-blue-a), 0.95)),
					url("<?php if (has_post_thumbnail($post->ID)){ $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); echo  $image[0];}else{ echo get_stylesheet_directory_uri() .  '/assets/img/resources-header.jpg';	}?>");
			}
		}
	</style>

	<body class="container general">
		<a class="screen-reader-shortcut" href="#main-content" tabindex="1">Skip to main content</a>
		
		<!-- Header -->
		<header id="top" class="header  general-header"  role="banner">
		

		
			

		<div class="header__top">
			<!-- Logo image-->
			<a class="header__logo" href="/" title="Click here to go to the Home page">
				<?php
				// If logo uploaded to customizer display it, if not show nothing
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
					echo '<img class="header__icon" src="' . esc_url( $logo[0] ) . '"' . 'alt="' . get_bloginfo( 'name' ) . '" draggable="false">';
				} else {
					echo '';
				} ?>
			</a> <!-- .Logo image -->

			 <!-- navigation -->
      <div class="navigation">
            <nav class="navigation__nav" aria-controls="primary-navigation">
          <ul class="navigation__list">
                    <li class="navigation__item">
              <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="navigation__link<?php if(is_page('about')){echo ' navigation__current-page';} ?>" title="Go to the About page">About</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" class="navigation__link<?php if(is_page('grantees')){echo ' navigation__current-page';} ?>" title="Go to the Grantees page">Grantees</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo esc_url( site_url( '/resources' ) ); ?>" class="navigation__link<?php if(is_home() || is_category('orientation') || is_category('capacity-building-webinar') || is_page('staff-checklist') || is_page('ovc-faqs')){echo ' navigation__current-page';} ?>" title="Go to the Resources page">Resources</a>
            </li>
            <li class="navigation__item">
              <a href="<?php echo esc_url( site_url( '/events' ) ); ?>" class="navigation__link navigation__current-page" title="Go to the Events page">Events</a>
            </li>
          
            <li class="navigation__item">
              <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="navigation__link<?php if(is_page('contact')){echo ' navigation__current-page';} ?>" title="Go to the Contact page">Contact</a>
            </li>
          </ul>
        </nav>
      </div><!-- .navigation -->

      <!-- Mobile navigation -->
      <div class="mobile-navigation">
        <!-- Hidden menu label for accessibility-->
        <span hidden id="mobile-menu">Main menu</span>
        <button class="mobile-navigation__menu"  aria-controls="mobile-navigation" tabindex="0" aria-expanded="false" aria-labelledby="mobile-menu">
          <!-- navigation menu icon-->
          <i class="mobile-navigation__icon" alt="Menu icon" aria-hidden="true">&nbsp;</i>
        </button>



          
          <nav class="mobile-navigation__nav" aria-label="Mobile menu" aria-labelledby="mobile-menu" aria-hidden="true">
            <ul class="mobile-navigation__list">
              <li class="mobile-navigation__item">
                <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="mobile-navigation__link<?php if(is_page('about')){echo ' mobile-navigation__current-page';} ?>" title="Go to the About page">About</a>
              </li>
              <li class="mobile-navigation__item">
                <a href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" class="mobile-navigation__link<?php if(is_page('grantees')){echo ' mobile-navigation__current-page';} ?>" title="Go to the Grantees page">Grantees</a>
              </li>
              <li class="mobile-navigation__item">
                <a href="<?php echo esc_url( site_url( '/resources' ) ); ?>" class="mobile-navigation__link<?php if(is_home() || is_category('orientation') || is_category('capacity-building-webinar') || is_page('staff-checklist') || is_page('ovc-faqs')){echo ' mobile-navigation__current-page';} ?>" title="Go to the Resources page">Resources</a>
              </li>
              <li class="mobile-navigation__item">
                <a href="<?php echo esc_url( site_url( '/events' ) ); ?>" class="mobile-navigation__link navigation__current-page" title="Go to the Resources page">Events</a>
              </li>
            
              <li class="mobile-navigation__item">
                <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="mobile-navigation__link<?php if(is_page('contact')){echo ' mobile-navigation__current-page';} ?>" title="Go to the Contact page">Contact</a>
              </li>
              
              <!-- We currently have mo social media
              <li class="mobile-navigation__item">
                    <a href="" class="mobile-navigation__social-link"><?php //echo svg_icon('mobile-navigation__social-icon', 'facebook');?></a>
                    <a href="" class="mobile-navigation__social-link"><?php //echo svg_icon('mobile-navigation__social-icon', 'twitter');?></a>
                    <a href="" class="mobile-navigation__social-link"><?php //echo svg_icon('mobile-navigation__social-icon', 'web');?></a>
              </li>-->
            </ul>
          </nav>
      </div><!-- .Moblie navigation -->
		</div>

		<div class="header__content">
	

			

			
		</div>

		
		</header><!-- .Header -->
  
      <?php echo tribe( Template_Bootstrap::class )->get_view_html();?>
 
<?php


get_footer();
