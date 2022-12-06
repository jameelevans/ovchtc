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

	<body class="container <?php if (is_front_page() && (!wp_is_mobile())) { echo 'front-page';} else {echo 'general';} ?>">
	
		
		<!-- Header -->
		<header id="top" class="header<?php if (is_front_page() && (!wp_is_mobile())) { echo ' home-header';} else {echo ' general-header';} ?>">
			<?php if (is_front_page()) { echo bg_video();} ?>

		
			

		<div class="header__top">
			<!-- Logo image-->
			<a class="header__logo" href="/">
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
			<h1 class="header__heading"><?php
					if(is_front_page()){
						echo get_bloginfo( 'description' );
					}
          else if (is_home()) {
          	echo '<h1 class="header__heading">Start Here</h1>';
          }
          else if (is_404()) {
          	echo '404 Error';
          } else {
          echo the_title();
          }
        ?></h1>


<?php
					if (is_home()) {
          	echo '<p class="header__description">xxxLorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.xxx</p>';
          }
          else if (is_404()) {
          	echo 'Sorry You may be lost!';
          } else {
						echo the_content();
          }
        ?>

				<?php 
				
				if( is_home() ): ?>
						<div class="header__cta--wrapper"><a class="header__cta" href="#" ?>STAFF CHECKLISTS</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
						<div class="header__cta--wrapper"><a class="header__cta" href="#" ?>Orientations</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
						<div class="header__cta--wrapper"><a class="header__cta" href="#" ?>OVC FAQs</a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
				<?php endif;?>
		
		
				<?php 
				$link = get_field('header_link_1');
				if( $link && !is_home() ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
				<?php endif;
			
		
		$link = get_field('header_link_2');
			if( $link && !is_home()): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
			<?php endif;

			$link = get_field('header_link_3');
			if( $link && !is_home()): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="header__cta--wrapper"><a class="header__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php echo svg_icon('header__arrow', 'arrow-right');?></div>
			<?php endif;
			?>
			</>
			

			
		</div>

		
		</header><!-- .Header -->