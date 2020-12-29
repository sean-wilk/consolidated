<?php
/**
 * Component for post grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$terms = get_the_category();
?>
  <div class="general-post-item col-md-4 col-xs-12 sh-box <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
    <div class="post-item" style="background-image: url('<?php echo $image_url; ?> ');">
      <div class="post-item-overlay"></div>
    </div>
    <div class="post-item-content">
      <h3 class="post-title">
        <?php substr( the_title(), 0, 50 ); ?>
      </h3>
      <p class"post-excerpt fw-light">
        <?php substr( the_excerpt(), 0, 50 ); ?>
      </p>
    </div>
    <a class="btn btn-lg" href="<?php the_permalink() ?>">
      <?php _e('Read More','go'); ?>
    </a>
  </div>
