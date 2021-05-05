<?php
/**
 * Component for post grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

$work_video = get_field( 'work_video', $post->ID );

?>
<div class="post-container" data-id="<?= $post->ID ?>">
  <div class="container slider-title-section">
    <div class="slide-title col-sm-9 col-xs-12">
        <h1 class="color-block-header fw-bold work-grid-header secondary-color">
          <?php the_title(); ?>
        </h1>
    </div>
    <div class="back-biutton col-sm-3 hide-mobile">
      <a class="back-industry-btn back-btn btn btn-primary btn-lg btn-xl" href="#">
        <i class="fas fa-chevron-left"></i> Back
      </a>
    </div>
  </div>
  <div class="post-video-container">
    <div class="post-video-content">
      <?php echo($work_video); ?>
    </div>
  </div>

  <div class="col-xs-12 show-mobile">
    <a class="back-industry-btn back-btn btn btn-primary btn-lg btn-xl" href="#">
      <i class="fas fa-chevron-left"></i> Back
    </a>
  </div>
</div>
