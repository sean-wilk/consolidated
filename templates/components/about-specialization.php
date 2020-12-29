<?php
/**
 * Component for main content of the post Index Grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 $spec_header_text = get_field('spec_header_text');
 $as_specilizations = get_field('as_specilizations');

 if( $as_specilizations || $spec_header_text ) {
 ?>

 <section class="container-fluid white-bg-section" id="about-specialization">
   <?php if($spec_header_text) { ?>
    <div class="container">
      <div class="col-xs-12">
        <h1 class="color-block-header fw-bold work-grid-header secondary-color">
          <?= $spec_header_text ?>
        </h1>
      </div>
    </div>
    <?php } ?>
		<!-- .entry-header -->
    <div class="specialization-container container">
      <div class="col-xs-12">
        <?php
        if( $as_specilizations ){
          $counter = 0;
          $total_count = count(get_field('as_specilizations'));
        ?>
          <h1 id="specialization-list" class="fw-medium specialization">
        <?php

          while ( have_rows( 'as_specilizations' ) ) : the_row();
            $specialty = get_sub_field( 'specialty' );
            $counter++;

            if( $specialty ){
              _e( $specialty );

              if($counter < $total_count) {
                _e(" | ");
              }
            }

          endwhile;
        ?>
          </h1>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>
