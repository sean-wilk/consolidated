<?php
/**
 * Go functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Go
 * @subpackage Go Functions
 * @since 1.0.0
 */

 /**
  * Setting up Go Theme
  *
  * @since  1.0.0
  * @access public
  * @return void
  */

 if ( ! function_exists( 'go_setup' ) ) :
 	/**
 	 * Sets up theme defaults and registers support for various WordPress features.
 	 *
 	 * Note that this function is hooked into the after_setup_theme hook, which
 	 * runs before the init hook. The init hook is too late for some features, such
 	 * as indicating support for post thumbnails.
 	 */
 	function go_setup() {
 		/*
 		 * Make theme available for translation.
 		 * Translations can be filed in the /languages/ directory.
 		 * If you're building a theme based on Spark Up, use a find and replace
 		 * to change 'go' to the name of your theme in all the template files.
 		 */
 		load_theme_textdomain( 'go', get_template_directory() . '/languages' );

 		// Add default posts and comments RSS feed links to head.
 		add_theme_support( 'automatic-feed-links' );

 		/*
 		 * Let WordPress manage the document title.
 		 * By adding theme support, we declare that this theme does not use a
 		 * hard-coded <title> tag in the document head, and expect WordPress to
 		 * provide it for us.
 		 */
 		add_theme_support( 'title-tag' );

 		/*
 		 * Enable support for Post Thumbnails on posts and pages.
 		 *
 		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 		 */
 		add_theme_support( 'post-thumbnails' );

    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    // default post thumbnail size
    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    set_post_thumbnail_size(1140);

    add_image_size('go-blog-thumbnail', 330, 280, TRUE);
    add_image_size('go-single-post-thumbnail', 1170, 500, TRUE);


 		// This theme uses wp_nav_menu() in one location.
 		register_nav_menus( array(
 			'desktop-menu' => esc_html__( 'Desktop Menu', 'go' ),
 			'mobile-menu' => esc_html__( 'Mobile Menu', 'go' ),
 		) );

 		/*
 		 * Switch default core markup for search form, comment form, and comments
 		 * to output valid HTML5.
 		 */
 		add_theme_support( 'html5', array(
 			'search-form',
 			'comment-form',
 			'comment-list',
 			'gallery',
 			'caption',
 		) );

 		// Set up the WordPress core custom background feature.
 		add_theme_support( 'custom-background', apply_filters( 'go_custom_background_args', array(
 			'default-color' => 'ffffff',
 			'default-image' => '',
 		) ) );

 		// Add theme support for selective refresh for widgets.
 		add_theme_support( 'customize-selective-refresh-widgets' );

 		/**
 		 * Add support for core custom logo.
 		 *
 		 * @link https://codex.wordpress.org/Theme_Logo
 		 */
 		add_theme_support( 'custom-logo', array(
 			'height'      => 50,
 			'width'       => 220,
 			'flex-width'  => true,
 			'flex-height' => true,
 		) );
 	}
 endif;
 add_action( 'after_setup_theme', 'go_setup' );

 /**
  * Add Go Scripts
  *
  * @since  1.0.0
  * @access public
  * @return void
  */

    function go_scripts_function() {

      wp_enqueue_style( 'main', get_template_directory_uri() . '/main.min.css');

      wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), null, true);

      wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), null, true);
    }


  /**
   * Activates Theme Mode
   */

  //add_filter( 'ot_theme_mode', '__return_true' );

  /**
   * Loads OptionTree
   */
  //require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

  /**
   * Loads Theme Options
   */

  //require( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

  // Remove Option Tree Settings Menu

  //add_filter( 'ot_show_pages', '__return_false' );

  /**
  * Hide the ACF admin menu item.

  //add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
  //function my_acf_settings_show_admin( $show_admin ) {
      //return true;
  //}
  */

  /**
 * Setup suggested plugin system.
 *
 * Include the Go_Plugin_Manager class and add
 * an interface for users to to manage suggested
 * plugins.
 *
 * @since x.x.x
 *
 * @see  Go_Plugin_Manager
 * @link http://mypluginmanager.com
 */
function go_plugin_manager() {

	if ( ! is_admin() ) {
		return;
	}

	/**
	 * Include plugin manager class.
	 *
	 * No other includes are needed. The Go_Plugin_Manager
	 * class will handle including any other files needed.
	 *
	 * If you want to move the "plugin-manager" directory to
	 * a different location within your theme, that's totally
	 * fine; just make sure you adjust this include path to
	 * the plugin manager class accordingly.
	 */
	require_once( get_parent_theme_file_path( '/plugin-manager/class-go-plugin-manager.php' ) );

	/*
	 * Setup suggested plugins.
	 *
	 * It's a good idea to have a filter applied to this so your
	 * loyal users running child themes have a way to easily modify
	 * which plugins show as suggested for the site they're setting
	 * up for a client.
	 */
    	$plugins = apply_filters( 'go_plugins', array(
        array(
    			'name'    => 'Advanced Custom Fields PRO',
    			'slug'    => 'advanced-custom-fields-pro',
    			'version' => '5.9.3+',
    		),
        array(
    			'name'    => 'Classic Editor',
    			'slug'    => 'classic-editor',
    			'version' => '1.6+',
    		),
    		array(
    			'name'    => 'Consolidated Content Company - Custom Plugin',
    			'slug'    => 'consolidated-functionality',
    			'version' => '1.0.0+',
    			'url'     => 'https://github.com/sean-wilk/consolidated-functionality',
    		),
        array(
    			'name'    => 'OptionTree',
    			'slug'    => 'option-tree',
    			'version' => '2.7.3+',
    		),
        array(
    			'name'    => 'Safe SVG',
    			'slug'    => 'safe-svg',
    			'version' => '1.9.9+',
    		),
        array(
    			'name'    => 'Yoast SEO',
    			'slug'    => 'wordpress-seo',
    			'version' => '15.5+',
    		),
        array(
    			'name'    => 'ACF Content Analysis for Yoast SEO',
    			'slug'    => 'acf-content-analysis-for-yoast-seo',
    			'version' => '3.0.1+',
    		),
    	));

    	/*
    	 * Setup optional arguments for plugin manager interface.
    	 *
    	 * See the set_args() method of the Go_Plugin_Manager
    	 * class for full documentation on what you can pass in here.
    	 */
    	$args = array(
    		'page_title' => __( 'Suggested Plugins', 'go' ),
    		'menu_slug'  => 'go-suggested-plugins',
    	);

    	/*
    	 * Create plugin manager object, passing in the suggested
    	 * plugins and optional arguments.
    	 */
    	$manager = new Go_Plugin_Manager( $plugins, $args );

    }
    add_action( 'after_setup_theme', 'go_plugin_manager' );

  /**
   * SVG Icons class.
   */
  require get_template_directory() . '/classes/class-go-svg-icons.php';

  /**
   * Custom Comment Walker template.
   */
  require get_template_directory() . '/classes/class-go-walker-comment.php';


  add_action('wp_enqueue_scripts','go_scripts_function');

  /**
   * Enhance the theme by hooking into WordPress.
   */
  require get_template_directory() . '/inc/template-functions.php';

  /**
   * SVG Icons related functions.
   */
  require get_template_directory() . '/inc/icon-functions.php';

  /**
   * Custom template tags for the theme.
   */
  require get_template_directory() . '/inc/template-tags.php';

  /**
   * Customizer additions.
   */
  require get_template_directory() . '/inc/customizer.php';


// remove dashicons in frontend to non-admin
add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );
function bs_dequeue_dashicons() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
}

/**
 * AJAX Query for Categories Post
 */

add_action( 'wp_ajax_nopriv_load-filter', 'prefix_load_industry_posts' );
add_action( 'wp_ajax_load-filter', 'prefix_load_industry_posts' );
function prefix_load_industry_posts () {
  $industry_slug = $_POST[ 'industry' ];
  $term = get_term_by('slug', $industry_slug, 'industries');
  $industry_name = $term->name;

  $args = array (
    'tax_query' => array(
        array(
           'taxonomy' => 'industries',
           'field' => 'slug',
           'terms' => array( $industry_slug )
        )
    ),
    'post_type'       => 'work',
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1,
    'post_status' => 'publish',
    'orderby' => 'desc',
  );

  $post_args = array (
    'tax_query' => array(
        array(
           'taxonomy' => 'industries',
           'field' => 'slug',
           'terms' => array( $industry_slug )
        )
    ),
    'meta_query' => array(
        //'relation' => 'AND',
        array(
            'key'     => 'work_video',
            'value'   => '',
            'compare' => '!='
        ),
    ),
    'post_type'       => 'work',
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1,
    'post_status' => 'publish',
    'orderby' => 'desc',
  );

  $industry_query = new WP_Query( $args );
  $post_query = new WP_Query( $post_args );

  ob_start ();
  if ( $industry_query->have_posts() ) :?>
  <div id="industry-slider-container" class="container-fluid white-bg-section">
    <div class="container slider-title-section">
      <div class="col-sm-9 col-xs-12">
          <h1 class="color-block-header fw-bold work-grid-header secondary-color">
            <?= $industry_name ?>
          </h1>
      </div>
      <div class="col-sm-3 col-xs-12 hide-mobile">
        <a id="back-btn" class="back-main-btn back-btn btn btn-primary btn-lg btn-xl" href="#">
          <i class="fas fa-chevron-left"></i> Back
        </a>
      </div>
    </div>
    <div class="post-grid row-no-gutters industry-slider" id="industry-slider">
      <?php
      while ( $industry_query->have_posts() ) : $industry_query->the_post();
          get_template_part( 'templates/components/work', 'post-item', array(
            'type' => 'ajax-popup',
          ));
      endwhile;
      ?>
    </div>
    <div class="col-xs-12 show-mobile">
      <a id="back-btn" class="back-main-btn back-btn btn btn-primary btn-lg btn-xl" href="#">
        <i class="fas fa-chevron-left"></i> Back
      </a>
    </div>
  </div>
  <?php if($post_query->have_posts()) { ?>
  <div id="industry-post-slider-container" class="container" style="display: none;">
    <div class="post-grid row-no-gutters industry-post-slider" id="industry-post-slider">
      <?php
      while ( $post_query->have_posts() ) : $post_query->the_post();
        get_template_part( 'templates/components/video-summary', 'post-item');
      endwhile;
      ?>
    </div>
  </div>
  <?php } ?>

  <?php
  endif;
  wp_reset_postdata();

  $response = ob_get_contents();
  ob_end_clean();

  echo $response;
  die(1);
}

/**
 * AJAX Query for Video Popup


add_action( 'wp_ajax_nopriv_load-filter', 'prefix_load_post_video' );
add_action( 'wp_ajax_load-filter', 'prefix_load_post_video' );
function prefix_load_post_video () {
  $industry_slug = $_POST[ 'industry' ];
  $term = get_term_by('slug', $industry_slug, 'industries');
  $industry_name = $term->name;

  $post_args = array (
    'tax_query' => array(
        array(
           'taxonomy' => 'industries',
           'field' => 'slug',
           'terms' => array( $industry_slug )
        )
    ),
    'meta_query' => array(
        //'relation' => 'AND',
        array(
            'key'     => 'work_video',
            'value'   => '',
            'compare' => '!='
        ),
    )
    'post_type'       => 'work',
    'posts_per_page' => -1,
    'ignore_sticky_posts' => 1,
    'post_status' => 'publish',
    'orderby' => 'desc',
  );

  $query = new WP_Query( $args );
  ob_start ();
  if($video_url) { ?>
    <div class="post-grid row-no-gutters industry-post-slider" id="industry-post-slider">
      <?php
      while ( $query->have_posts() ) : $query->the_post();
        $work_video = get_field( 'work_video', $post_ID );
      ?>
      <div class="post-container">
        <div class="container slider-title-section">
          <div class="col-md-9 col-xs-12">
              <h1 class="color-block-header fw-bold work-grid-header secondary-color">
                <?php the_title(); ?>
              </h1>
          </div>
          <div class="col-md-3 col-xs-12">
            <a id="back-industry-btn" class="back-btn btn btn-primary btn-lg btn-xl" href="#">
              <i class="fas fa-chevron-left"></i> Back
            </a>
          </div>
        </div>
        <div class="post-video-container">
          <div class="post-video-content">
            <?php echo($work_video); ?>
          </div>
        </div>
      </div>
      <?php
      endwhile;
      ?>
    </div>
  <?php }
  wp_reset_postdata();

  $response = ob_get_contents();
  ob_end_clean();

  echo $response;
  die(1);
}
 */
