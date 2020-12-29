<?php
/**
 * Component for main content of the post Index Grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 $contact_cta_header = get_field('contact_cta_header');
 $contact_cta_button_text = get_field('contact_cta_button_text');
 $contact_cta_button_link = get_field('contact_cta_button_link');
 $contact_cta_bottom_text = get_field('contact_cta_bottom_text');

 if( $contact_cta_header || $contact_cta_button_text || $contact_cta_button_link || $contact_cta_bottom_text ) {
 ?>

 <section class="container-fluid primary-bg-section" id="contact-cta">
   <?php if($contact_cta_header) { ?>
    <div class="cta-header-container container">
      <div class="col-xs-12">
        <h1 class="fw-bold contact-cta-header">
          <?= $contact_cta_header ?>
        </h1>
      </div>
    </div>
    <?php } ?>
    <?php if($contact_cta_button_text || $contact_cta_button_link ) { ?>
     <div class="cta-button-container container">
       <div class="col-xs-12">
         <a class="btn btn-outline read-more-link cta-button" href="<?= $contact_cta_button_link ?>">
 					<?= $contact_cta_button_text ?>
 				</a>
       </div>
     </div>
     <?php } ?>
     <?php if( $contact_cta_bottom_text ) { ?>
      <div class="cta-description container">
        <div class="col-xs-12">
					<?= $contact_cta_bottom_text ?>
        </div>
      </div>
      <?php } ?>
  </section>
<?php } ?>
