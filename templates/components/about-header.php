<?php
/**
 * Component for header of About Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $about_hero_text = get_field( 'about_hero_text' );

  if( $about_hero_text){
?>

<section class="about-hero-container container">
  <div class="about-hero-content col-xs-12">
    <h1 class="about-hero-text jumbo">
      <?= $about_hero_text ?>
    </h1>
  </div>
</section>

<?php } ?>
