<?php
/** 
 * Custom Functions
 *
 * ! What the custom functions do:
 * *    1. Enqueues all styles and scripts
 * *    2. Asynchronously load scripts for speed optimization
 *      
 */

// * * --------| Actions and filters in order |-------- *

  // Action to enque styles and scripts
  add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

  // Asynchronously load scripts
  add_filter( 'clean_url', 'async_scripts', 11, 1 ); 




// * * --------| Functions in order |-------- *

  //Enqueuing styles and scripts
  function theme_enqueue_scripts() {
  wp_enqueue_script( 'Bundled_js', get_template_directory_uri() . '/assets/js/scripts-bundled.js#asyncload', array(), '1.0.0', true );
  wp_enqueue_style('ovchtc_main_styles', get_stylesheet_uri());
  }


 
  //add_action('wp_footer', 'rellax_enqueue');

  /*add_action('wp_enqueue_scripts', 'rellax_enqueue');
function rellax_enqueue() {
    if (is_front_page()) {
        wp_enqueue_script('rellax', get_template_directory_uri().'/node_modules/rellax/rellax.min.js', array( ), '', true);
    }
}*/

  // Asynchronously load scripts
  function async_scripts($url){
  if ( strpos( $url, '#asyncload') === false )
    return $url;
  else if ( is_admin() )
    return str_replace( '#asyncload', '', $url );
  else
    return str_replace( '#asyncload', '', $url )."' async='async";
  }

   //* 3. Activates the ability to add custom logo in customizer
function jameelevans_custom_logo_setup() {
  $defaults = array(
      'height'      => 38,
      'width'       => 38,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'Jameel Evans', 'Wordpress Developer & Consultant' ),
  );
  add_theme_support( 'custom-logo', $defaults );

  //* 4. Enable support for custom sized Post Thumbnails on posts and pages
  add_image_size( 'my-thumbnail', 300, 169, false);
  add_image_size( 'x-small', 450, 253, false);
  add_image_size( 'small', 600, 338, false);
  add_image_size( 'medium', 768, 432, false);
  add_image_size( 'regular', 1024, 576, false);
  add_image_size( 'large', 1200, 675, false);
  add_image_size( 'med-large', 1600, 901, false);
  add_image_size( 'x-large', 2000, 1125, false);
  add_image_size( 'xx-large', 3000, 1688, false);
  add_image_size( 'full-size', 3200, 1801, false);
  add_image_size('pageBanner', 1300, 700, true);
}
add_action( 'after_setup_theme', 'jameelevans_custom_logo_setup' );
add_theme_support( 'post-thumbnails' );
// .Activate the ability to add custom logo in customizer
// .Enable support for Post Thumbnails on posts and pages


//* 5. Add site link to logo on login screen
function ourHeaderUrl() {
  return esc_url(site_url('/'));
}
add_filter('login_headerurl', 'ourHeaderUrl');
// .Add site link to logo on login screen





//* 4. Make css styles available to login screen
function ovchtc_login_css() {
  wp_enqueue_style('ovchtc_main_styles', get_stylesheet_uri());
  }
add_action('login_enqueue_scripts', 'ovchtc_login_css');
// .Make css styles available to login screen

//* 5. Replace WP logo with site title name on login screen
function ovchtc_login_title() {
  return get_bloginfo('name');
}
add_filter('login_headertitle', 'ovchtc_login_title');
// .Replace WP logo with site title name on login screen


//* 7. Add theme title to login screen
function ourLoginTitle() {
  return get_bloginfo('name');
}
add_filter('login_headertitle', 'ourLoginTitle');
// .Add theme title to login screen

 //* 7.  Display inline svg icon from sprite sheet with custom class
function svg_icon($class, $icon) { ?>
  <svg class="<?php echo $class ?>">
    <use
      xlink:href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/sprite.svg' ); ?>#icon-<?php echo $icon ?>">
    </use>
  </svg>
  <?php } 
  // .Display inline svg icon from sprite sheet with custom class

  //* 8. Display Home BG Video
  function bg_video() { ?>
  <div class="bg-video">
    <video class="bg-video__content" autoplay muted loop>
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/braingstroming-bg.mp4" type="video/mp4"> 
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/braingstroming-bg.webm" type="video/webm"> 
      Your browser is not supported! Please upgrade to a modern browser.
    </video>
  </div>
  <?php }
  //. Display Home bg video


  //* 10. Display site navigation
function site_navigation() { ?>
  <!-- navigation -->
  <div class="navigation">
        <nav class="navigation__nav" aria-controls="primary-navigation">
      <ul class="navigation__list">
                <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="navigation__link<?php if(is_page('about')){echo ' navigation__current-page';} ?>">About</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" class="navigation__link<?php if(is_page('grantees')){echo ' navigation__current-page';} ?>">Grantees</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/resources' ) ); ?>" class="navigation__link<?php if(is_home()){echo ' navigation__current-page';} ?>">Resources</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '#' ) ); ?>" class="navigation__link<?php if(is_page('combat-to-coding')){echo ' navigation__current-page';} ?>">Contact</a>
        </li>
      </ul>
    </nav>
  </div><!-- .navigation -->
  <?php }
  // .Display site navigation

   //* 11. Display mobile navigation
function mobile_navigation() { ?>
  <!-- Mobile navigation -->
  <div class="mobile-navigation">
    <input id="navi-toggle" type="checkbox" class="mobile-navigation__checkbox">
    <!-- navigation menu toggle-->
    <label for="navi-toggle" class="mobile-navigation__button">
      <!-- navigation menu icon-->
      <span class="mobile-navigation__icon">&nbsp;</span>
    </label>
    <div class="mobile-navigation__background">&nbsp;</div>

      <div class="navigation__background">&nbsp;</div>
      <nav class="mobile-navigation__nav" aria-controls="mobile-navigation" aria-expanded="false">
        <ul class="mobile-navigation__list">
          <li class="mobile-navigation__item">
            <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="mobile-navigation__link<?php if(is_page('services')){echo ' mobile-navigation__current-page';} ?>">About</a>
          </li>
          <li class="mobile-navigation__item">
            <a href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" class="mobile-navigation__link<?php if(is_page('grantees')){echo ' mobile-navigation__current-page';} ?>">Grantees</a>
          </li>
          <li class="mobile-navigation__item">
            <a href="<?php echo esc_url( site_url( '/resources' ) ); ?>" class="mobile-navigation__link<?php if(is_home()){echo ' mobile-navigation__current-page';} ?>">Resources</a>
          </li>
          <li class="mobile-navigation__item">
            <a href="<?php echo esc_url( site_url( '#' ) ); ?>" class="mobile-navigation__link<?php if(is_page('combat-to-coding')){echo ' mobile-navigation__current-page';} ?>">Contact</a>
          </li>
          <li class="mobile-navigation__item">
                <a href="" class="mobile-navigation__social-link"><?php echo svg_icon('mobile-navigation__social-icon', 'facebook');?></a>
                <a href="" class="mobile-navigation__social-link"><?php echo svg_icon('mobile-navigation__social-icon', 'twitter');?></a>
                <a href="" class="mobile-navigation__social-link"><?php echo svg_icon('mobile-navigation__social-icon', 'web');?></a>
          </li>
        </ul>
      </nav>
  </div><!-- .Moblie navigation -->
  <?php }
  // .Display mobile site navigation


  //* 8.  Enable custom post types
function custom_post_types() {

// Staff Post Type
register_post_type('staff', array(
  'show_in_rest' => true,
  'supports' => array('title', 'editor', 'thumbnail'),
  'rewrite' => array('slug' => 'staff'),
  'taxonomies'  => array( 'category' ),
  'public' => true,
  'labels' => array(
    'name' => 'Staff',
    'add_new_item' => 'Add New Staff',
    'edit_item' => 'Edit Staff',
    'all_items' => 'All Staff',
    'singular_name' => 'Staff'
  ),
  'menu_icon' => 'dashicons-admin-users'
));


// States Served Post Type
register_post_type('states-served', array(
  'show_in_rest' => true,
  'supports' => array('title', 'editor'),
  'rewrite' => array('slug' => 'states-served'),
  'taxonomies'  => array( 'category' ),
  'public' => true,
  'labels' => array(
    'name' => 'States Served',
    'add_new_item' => 'Add New State',
    'edit_item' => 'Edit State',
    'all_items' => 'All States Served',
    'singular_name' => 'State'
  ),
  'menu_icon' => 'dashicons-admin-site'
));




 // Events Post Type
 register_post_type('events', array(
  'show_in_rest' => true,
  'map_meta_cap' => true,
  'supports' => array('title', 'editor', 'excerpt','thumbnail'),
  'rewrite' => array('slug' => 'event'),
  'has_archive' => true,
  'public' => true,
  'labels' => array(
    'name' => 'Events',
    'add_new_item' => 'Add New Event',
    'edit_item' => 'Edit Events',
    'all_items' => 'All Events'
  ),
  'menu_icon' => 'dashicons-calendar'
));

}
 
  add_action('init', 'custom_post_types');
  // . 8 Enable custom post types

  






