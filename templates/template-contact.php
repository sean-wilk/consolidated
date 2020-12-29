<?php
/**
 * Template Name: Contact Page
 *
 * This is the template for the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Go
 */

get_header();

if (function_exists('ot_get_option')){
		$display_page_title	= ot_get_option('display_page_title');
}


$cd_header = get_field('cd_header');
$cd_description = get_field('cd_description');
$add_header = get_field('add_header');
$add_address = get_field('add_address');
$display_social_media_icons = get_field('display_social_media_icons');
$embedded_map = get_field('embedded_map');
$contact_social_header = get_field('contact_social_header');

?>

<div id="primary" class="content-area content">
  <main id="main" class="site-main">
    <?php
      if($display_page_title != 'off') {
    ?>
      <section class="contact-page-header container">
        <div class="col-xs-12">
          <h1 class="section-header color-block-header">
            <?php _e(get_the_title()); ?>
          </h1>
        </div>
      </section>
    <?php } ?>
    <section class="contact-container container-fluid">
      <div class="content-container container">
      <?php if( $cd_header || $cd_description ){ ?>
        <div class="contact-details col-md-4 col-xs-12">
          <h2 class="contact-header">
            <?= $cd_header ?>
          </h2>
          <?= $cd_description ?>
        </div>
      <?php } ?>

      <?php if( $add_header || $add_address ){ ?>
        <div class="contact-address col-md-4 col-xs-12">
          <h2 class="address-header">
            <?= $add_header ?>
          </h2>
          <?= $add_address ?>
        </div>
      <?php } ?>

      <?php if( $display_social_media_icons ){ ?>
        <div class="contact-socials col-md-3 col-xs-12">
          <h2 class="social-header">
            <?= $contact_social_header ?>
          </h2>
          <?php
          if (function_exists('ot_get_option')){
        			$linkedin_link    					= ot_get_option('linkedin_link');
        			$vimeo_link    						= ot_get_option('vimeo_link');
        			$instagram_link    					= ot_get_option('instagram_link');
        	}

          echo ('<div class="social-icons">');

          if ($vimeo_link!="") {
            echo('<a href="' . $vimeo_link . '" class="social-icon social-vim" target="_blank">
                    <i class="fab fa-vimeo"></i>
                  </a>');
          }
          if ($instagram_link!="") {
              echo('<a href="' . $instagram_link . '" class="social-icon social-ig" target="_blank">
                      <i class="fab fa-instagram"></i>
                    </a>');
           }
          if ($linkedin_link!="") {
            echo('<a href="' . $linkedin_link . '" class="social-icon social-li" target="_blank">
                    <i class="fab fa-linkedin"></i>
                  </a>');
          }

          echo('</div>');
          ?>
        </div>
      <?php } ?>
      </div>
    </section>
    <section class="map-container container-fluid">
      <?= $embedded_map ?>
    </section>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
