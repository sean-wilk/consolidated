<?php
/**
 * Component for post grid item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

$counter = $args['counter'];
$title = $args['title'];
$slug = $args['slug'];
$image = $args['image'];

?>
  <a id="grid-item-<?= $counter ?>" href="#" title="<?= $title; ?>" class="industry-link grid-item-link col-md-4 col-xs-12 <?= $slug ?>" data-industry="<?= $slug ?>">
    <div class="grid-item" style="background-image: url('<?= $image['url']; ?> ');">
    </div>
    <div class="grid-item-overlay">
      <?= $title; ?>
    </div>
  </a>
