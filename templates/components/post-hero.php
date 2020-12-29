<?php
/**
 * Component for Hero Section for Other Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
  $thumb_url = $thumb_url_array[0];
?>

<section class="home-featured-post hero-section general-hero post-hero">
  <div class="featured-work hero-container container-fluid left-aligned" id="post-header" style='background-image:url("<?php if( $thumb_url ){echo($thumb_url);} ?>")'>
    <div class="featured-work-overlay"></div>
    <div class="featured-work-content container">
      <div class="featured-work-text-link col-sm-6 col-xs-8">
        <div class="grid-item">
          <div class="featured-work-header">
            <h3><?php echo(get_the_title()); ?></h3>
          </div>
          <div class="featured-work-subheader">
            <p><?php the_time('F jS, Y'); ?></p>
            <p><?php the_category(', '); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
