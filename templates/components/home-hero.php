<?php
/**
 * Component for Hero Section on Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $background_video = get_field( 'background_video' );
  $background_video_mobile = get_field( 'background_video_mobile' );
  $fallback_image = get_field( 'fallback_image' );

  /* Popup Fields */
  $enable_popup = get_field( 'enable_popup' );
  $hh_cta_button_text = get_field( 'hh_cta_button_text' );
  $contact_form_title = get_field( 'contact_form_title' );
  $contact_form_shortcode = get_field( 'contact_form_shortcode' );

  if( $background_video || $fallback_image ){
?>
<section class="hero-section home-hero container-fluid">
  <?php if( $background_video ){?>
    <video class="desktop-hero-video <?php if( $background_video_mobile ){ echo("has-mobile-video"); } ?>" preload="auto" muted loop playsinline autoplay poster="<?php if( $fallback_image ){echo($fallback_image["url"]);} ?>" style="opacity:0;">
        <source src="" data-src="<?php echo($background_video["url"]);?>" type="video/mp4">
    </video>
  <?php } ?>

  <?php if( $background_video_mobile ){?>
    <video class="mobile-hero-video <?php if( $background_video ){ echo("has-desktop-video"); } ?>" preload="auto" muted loop autoplay playsinline poster="<?php if( $fallback_image ){echo($fallback_image["url"]);} ?>" style="opacity:0;">
        <source src="<?php echo($background_video_mobile["url"]);?>" type="video/mp4">
    </video>
  <?php } ?>

  <?php if( $enable_popup != false && $contact_form_shortcode ){?>
    <a id="request-meeting-btn" class="btn btn-primary btn-lg btn-xl" href="#">
      <?php if( $hh_cta_button_text ){ echo($hh_cta_button_text); } else { _e('Request Meeting','go'); }  ?>
    </a>
  <?php } ?>
</section>

<?php if( $enable_popup != false && $contact_form_shortcode ){ ?>
  <div id="contact-form-popup" class="mfp-hide">
    <?php if( $contact_form_title ){?>
      <h1 class="contact-form-title">
        <?= $contact_form_title ?>
      </h1>
    <?php } ?>
    <?php echo(do_shortcode($contact_form_shortcode)); ?>
  </div>
<?php } ?>

<?php } ?>
