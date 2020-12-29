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

  $work_banner_image = get_field("work_banner_image");
  $work_mobile_banner_image = get_field("work_mobile_banner_image");
  $work_header = get_field("work_header");
  $work_subheading = get_field("work_subheading");
?>

<style>
  #post-header {
    background-image:url("<?php if( $work_banner_image ){ echo($work_banner_image["url"]); } else { echo($thumb_url); } ?>");
  }

  <?php if( $work_mobile_banner_image ){ ?>
    @media all and (max-width: 1023px){
      html #post-header {
        background-image:url("<?php echo($work_mobile_banner_image["url"]); ?>");
      }
    }
  <?php } ?>
</style>

<section class="home-featured-post hero-section general-hero work-hero">
  <div class="featured-work hero-container container-fluid left-aligned" id="post-header">
    <div class="featured-work-overlay"></div>
    <div class="featured-work-content container">
      <div class="featured-work-text-link col-sm-6 col-xs-8">
        <div class="grid-item">
          <div class="featured-work-header">
            <h1><?php if ($work_header) { echo($work_header); } else { echo(get_the_title()); } ?></h1>
          </div>
          <?php if ($work_subheading) { ?>
            <div class="featured-work-subheader">
              <p><?= $work_subheading ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
