<?php
/**
 * Component for main content of the About Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $embedded_map = get_field('embedded_map');

  if($embedded_map) {
?>

<section class="map-container container-fluid">
  <?= $embedded_map ?>
</section>

<?php } ?>
