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
  add_image_size( 'staff-headshot', 304, 350, true);
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
  <svg class="<?php echo $class ?>" aria-hidden="true">
    <use
      xlink:href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/sprite.svg' ); ?>#icon-<?php echo $icon ?>">
    </use>
  </svg>
  <?php } 
  // .Display inline svg icon from sprite sheet with custom class

  //* 8. Display Home BG Video
  function bg_video() { ?>
  <div class="bg-video">
    <video class="bg-video__content" poster="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-bg-video.jpg" autoplay muted playsinline loop>
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-bg-video.mp4" type="video/mp4"> 
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-bg-video.webm" type="video/webm"> 
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
          <a href="<?php echo esc_url( site_url( '/about' ) ); ?>" class="navigation__link<?php if(is_page('about')){echo ' navigation__current-page';} ?>" title="Go to the About page">About</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" class="navigation__link<?php if(is_page('grantees')){echo ' navigation__current-page';} ?>" title="Go to the Grantees page">Grantees</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/resources' ) ); ?>" class="navigation__link<?php if(is_home() || is_category('orientation') || is_category('capacity-building-webinar') || is_page('staff-checklist') || is_page('ovc-faqs')){echo ' navigation__current-page';} ?>" title="Go to the Resources page">Resources</a>
        </li>
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/events' ) ); ?>" class="navigation__link<?php if(is_page_template('default-template.php')){echo ' navigation__current-page';} ?>" title="Go to the Events page">Events</a>
        </li>
       
        <li class="navigation__item">
          <a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" class="navigation__link<?php if(is_page('contact')){echo ' navigation__current-page';} ?>" title="Go to the Contact page">Contact</a>
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
            <a href="<?php echo esc_url( site_url( '/events' ) ); ?>" class="mobile-navigation__link<?php if(is_page_template('default-template.php')){echo ' navigation__current-page';} ?>" title="Go to the Resources page">Events</a>
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




  // Training Improvements Post Type
  register_post_type('improvements', array(
    'show_in_rest' => true,
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt','thumbnail'),
    'rewrite' => array('slug' => 'training-improvement'),
    'taxonomies'  => array( 'category' ),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Training Improvements',
      'add_new_item' => 'Add New Training Improvement',
      'edit_item' => 'Edit Training Improvements',
      'all_items' => 'All Training Improvements'
    ),
    'menu_icon' => 'dashicons-lightbulb'
  ));


    // Staff Checklists Post Type
    register_post_type('checklists', array(
      'show_in_rest' => true,
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'excerpt','thumbnail'),
      'rewrite' => array('slug' => 'staff-checklists'),
      'public' => true,
      'labels' => array(
        'name' => 'Staff Checklists',
        'add_new_item' => 'Add New Staff Checklist',
        'edit_item' => 'Edit Staff Checklists',
        'all_items' => 'All Staff Checklists',
        'singular_name' => 'Checklist'
      ),
      'menu_icon' => 'dashicons-clipboard'
    ));

    // FAQs Post Type
    register_post_type('faqs', array(
      'show_in_rest' => true,
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'excerpt','thumbnail'),
      'rewrite' => array('slug' => 'faqs'),
      'taxonomies'  => array( 'category' ),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'FAQs',
        'add_new_item' => 'Add New FAQ',
        'edit_item' => 'Edit FAQs',
        'all_items' => 'All FAQs'
      ),
      'menu_icon' => 'dashicons-editor-help'
    ));

}
 
  add_action('init', 'custom_post_types');
  // . 8 Enable custom post types


// Change dashboard Posts to Webinars
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Webinars';
        $labels->singular_name = 'Webinars';
        $labels->add_new = 'Add Webinars';
        $labels->add_new_item = 'Add Webinars';
        $labels->edit_item = 'Edit Webinars';
        $labels->new_item = 'Webinars';
        $labels->view_item = 'View Webinars';
        $labels->search_items = 'Search Webinars';
        $labels->not_found = 'No Webinars found';
        $labels->not_found_in_trash = 'No Webinars found in Trash';
        $labels->all_items = 'All Webinars';
        $labels->menu_name = 'Webinars';
        $labels->name_admin_bar = 'Webinars';
}
add_action( 'init', 'cp_change_post_object' );


  //* 14 Register widgets UI
  function quickchic_widgets_init() {
    register_sidebar(array(
    'name' => __( 'Sidebar 1', 'quickchic' ),
    'id' => 'sidebar-1',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
    ));
    }
    add_action( 'init', 'quickchic_widgets_init' );
 //14 Register widgets UI

 //* Add even and odd post classes
 function oddeven_post_class ( $classes ) {
  global $current_class;
  $classes[] = $current_class;
  $current_class = ($current_class == 'odd') ? 'even' : 'odd';
  return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';
  
 //* Webinar Sorting 
function sort_webinar_posts() {
  ?>

<div class="sort" aria-haspopup="true" aria-expanded="false">
  <button class="sort__button" id="sort__posts-button">
  <?php echo svg_icon('arrow', 'angle-down');?> 
  <?php if (is_page('ovc-faqs')){
    echo 'Sort By';
  }else{
    echo 'Sort Posts';
  }
    ?>
  </button>
  <div class="sort__content" aria-labelledby="sort__posts-button">
  <?php
     $get_cat        = get_the_category();
     $first_cat      = $get_cat[0];
     $category_name  = $first_cat->cat_name;
    if (is_home()) {?>
      <a href="<?php echo esc_url('?ordr=title');?>" data-sort="Ascending">Ascending</a>
      <a href="<?php echo esc_url('?ordr=title-desc');?>" data-sort="Descending">Descending</a>
      <a href="<?php echo esc_url('?ordr=date-desc');?>" data-sort="Most Recent">Most Recent</a>
      <a href="<?php echo esc_url('?ordr=date');?>" data-sort="Oldest First">Oldest First</a>
   <?php }else if (is_page('ovc-faqs')) {?>
      <a href="<?php echo esc_url( '?ordr=title' );?>" data-sort="A to Z">A to Z</a>
      <a href="<?php echo esc_url( '?ordr=title-desc' );?>" data-sort="Z to A">Z to A</a>
    <?php }else if (is_category()) {?>
      <a href="<?php echo esc_url('?ordr=title');?>" data-sort="newest">Ascending</a>
      <a href="<?php echo esc_url('?ordr=title-desc');?>" data-sort="oldest">Descending</a>
      <a href="<?php echo esc_url('?ordr=date-desc');?>" data-sort="newest">Most Recent</a>
      <a href="<?php echo esc_url('?ordr=date');?>" data-sort="newest">Oldest First</a>
   <?php }
  ?> 
  </div>
</div>

  
  <script>
    var sortButton = document.querySelector('.sort__button');
    var sortContent = document.querySelector('.sort__content');
    sortButton.addEventListener('click', function() {
      sortContent.classList.toggle('active');
      sortButton.classList.toggle('active');
      sortButton.setAttribute('aria-expanded', sortContent.classList.contains('active'));
    });
  </script>
  <?php
}

// Use custom template for event series posts
add_filter(
  'template_include',
  static function ( $template ) {
    if ( is_singular( 'tribe_event_series' ) ) {
      // Point this to the template you want to use.
      $template = locate_template( 'templates/series.php' );
    }
 
    return $template;
  }
);








