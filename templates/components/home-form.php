<?php
/**
 * Component for Agency Statement on Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $home_form_title = get_field( 'home_form_title' );
  $home_form_shortcode = get_field( 'home_form_shortcode' );

  if( $home_form_shortcode ){
?>
<section class="home-form container-fluid primary-bg-section">
  <div class="container form-content">
    <h1 class="contact-form-title">
      <?= $home_form_title ?>
    </h1>
    <?php echo(do_shortcode($home_form_shortcode)); ?>
  </div>
</section>

<?php } ?>
