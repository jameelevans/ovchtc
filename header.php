<?php
/**
 * * The template for displaying the header
 *
 * @package your-wp-project
 */
?>
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
		.home-header {
				background-image: none;
			}

		@media screen and (max-width: 800px){
		.home-header {
			background-image: linear-gradient(to bottom,
					rgba(var(--color-dark-blue-a), 1), rgba(var(--color-blue-a), 0.9)),
				url("<?php if (has_post_thumbnail()){ the_post_thumbnail();}else{ echo  get_stylesheet_directory_uri() . '/assets/img/brainstorming-bg.jpeg';	}?>");
			}
		}
	</style>

	<body class="container front-page">
		<a class="screen-reader-shortcut" href="#main-content" tabindex="1">Skip to main content</a>
		
		<!-- Header -->
		<header id="top" class="header home-header"  role="banner">
			<?php echo bg_video(); ?>

		
			

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

			<?php
			// Display site navigation
			echo site_navigation();
			echo mobile_navigation();	?>
		</div>

		<div class="header__content">
		<?php if (!is_category()) {?>

				<h1 class="header__heading"><?php
						if(is_front_page()){
							echo get_bloginfo( 'description' );
						}
						else if (is_home()) {
							echo '<h1 class="header__heading">Start Here</h1>';
						}else if (is_page('staff-checklist') || is_page('ovc-faqs') || is_search()) {
								echo '';
						}else if (is_404()) {
							echo '404 Error';
						} else {
						echo the_title();
						}
					?></h1>
		<?php }?>

				<?php
					if (is_home()) {
          	echo '<p class="header__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>';
          }
          else if (is_404()) {
          	echo 'Sorry You may be lost!';
					}else if (is_category() || is_page('staff-checklist') || is_page('ovc-faqs') || is_search()) {
							echo '';
          } else {
						echo the_content();
          }
        ?>

				<?php 
				
				if( is_home() ): ?>
						<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( site_url( '/staff-checklist' ) ); ?>" ?>STAFF CHECKLISTS</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
						<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( site_url( '/orientation' ) ); ?>" ?>Orientations</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
						<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( site_url( '/ovc-faqs' ) );?>" ? title="Go to our FAQs page">OVC FAQs</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
				<?php endif;?>
		
		
				<?php 
				$link = get_field('header_link_1');
				if( $link && !is_home() ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="Learn more about <?php $link_title?> now" ><?php echo esc_html( $link_title ); ?></a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
				<?php endif;
			
		
		$link = get_field('header_link_2');
			if( $link && !is_home()): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="Learn more about <?php $link_title?> now" ><?php echo esc_html( $link_title ); ?></a>
					<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
			<?php endif;

			$link = get_field('header_link_3');
			if( $link && !is_home()): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" title="Learn more about <?php $link_title?> now" ><?php echo esc_html( $link_title ); ?></a>
					<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
			<?php endif;
			?>
			</>
			

			
		</div>

		
		</header><!-- .Header -->