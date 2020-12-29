<?php
/**
 * Component for post grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$terms = get_the_terms( $post->ID, 'industries' );
?>
  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="grid-item-link col-md-4 col-xs-12 <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
    <div class="grid-item" style="background-image: url('<?php echo $image_url; ?> ');">
    </div>
    <div class="grid-item-overlay">
      <?php
      the_title();
      ?>
    </div>
  </a>
