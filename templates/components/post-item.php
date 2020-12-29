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

$capped_title = substr( get_the_title(), 0, 50 );
$capped_excerpt = substr( get_the_excerpt(), 0, 240 );

$title_suffix = "";
$title_test  = html_entity_decode( get_the_title(), ENT_XML1, 'UTF-8' );
$title_length = mb_strlen( $title_test, 'utf-8' );

if ($title_length > 50) {
  $title_suffix = "...";
}

$excerpt_suffix = "";
$excerpt_test  = html_entity_decode( get_the_excerpt(), ENT_XML1, 'UTF-8' );
$excerpt_length = mb_strlen( $excerpt_test, 'utf-8' );

if ($excerpt_length > 240) {
  $excerpt_suffix = "...";
}
?>
  <div class="general-post-item index-post-item col-md-6 col-xs-12 sh-box <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>" data-date="<?php echo(get_the_date('Y-m-d H:i')); ?>" data-popularity="<?php echo(wpb_get_post_views(get_the_ID())); ?>">
    <div class="post-item" style="background-image: url('<?php echo $image_url; ?> ');">
      <div class="post-item-overlay"></div>
    </div>
    <div class="post-item-content">
      <h3 class="post-title">
        <?= $capped_title ?><?= $title_suffix ?>
      </h3>
      <p class"post-excerpt fw-light">
        <?= $capped_excerpt ?><?= $excerpt_suffix ?>
      </p>
    </div>
    <a class="btn btn-lg" href="<?php the_permalink() ?>">
      <?php _e('Read More','go'); ?>
    </a>
    <div class="sorting-attributes hidden">
      <p class="date"><?php echo(get_the_date('Y-m-d H:i')); ?></p>
      <p class="popularity"><?php echo(wpb_get_post_views(get_the_ID())); ?></p>
    </div>
  </div>
