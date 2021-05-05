<?php
/**
 * Component for main content of the post Index Grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 if (function_exists('ot_get_option')){
   	$industries_sorting	= ot_get_option('industries_sorting');
 }
 ?>

 <section class="work-grid-container home-work-grid container-fluid white-bg-section" id="industry-grid">
    <?php
    $terms = get_terms([
              'taxonomy' => 'industries',
              'hide_empty' => true,
              'orderby' => 'name',
              'order' => $industries_sorting
          ]);
    if ( $terms != null ){
    ?>
    <div class="post-grid row-no-gutters isotope-grid" id="industry-isotope-grid">

      <?php
       $counter = 0;
       foreach( $terms as $term ) {
        $counter = $counter + 1;

        if ( $term->name != null ) {

          get_template_part( 'templates/components/industry', 'post-item', array(
            'counter'                     => $counter,
            'title'                       => $term->name,
            'slug'                        => $term->slug,
            'image'                       => get_field( 'industry_image', $term ),
          ));

          // Get rid of the other data stored in the object, since it's not needed
          } else {
           unset($term);
          }
        }
        ?>

    </div>
  <?php } ?>
  <?php
    /**************************************************
    * AJAX Content Container
    **************************************************/
  ?>
  <div id="main-slider-container" class="container-fluid white-bg-section" style="display: none;">
  </div>

  <?php
    /**************************************************
    * Loading Animation
    **************************************************/
  ?>
  <div id="loading-animation" class="animation" style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
      <circle cx="50" cy="50" fill="none" stroke="#f0008b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"/>
      </circle>
    </svg>
  </div>
</section>


  <?php
    /**************************************************
    * Post Popup Container - Filled in via AJAX


  <section id="post-popup-container" class="mfp-hide">
    <div class="post-container">
    </div>
    <div id="popup-loading-animation" class="animation" style="display: none;">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent none repeat scroll 0% 0%; display: block; shape-rendering: auto; animation-play-state: running; animation-delay: 0s;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#f0008b" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" style="animation-play-state: running; animation-delay: 0s;">
          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" style="animation-play-state: running; animation-delay: 0s;"/>
        </circle>
      </svg>
    </div>
  </section>
  **************************************************/
  ?>
   <!-- .hentry -->
