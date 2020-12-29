<?php
/**
 * Template Name: About Page
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

?>

<div id="primary" class="content-area content">
  <main id="main" class="site-main">
    <?php
      if($display_page_title != 'off') {
    ?>
      <section class="about-page-header container">
        <div class="col-xs-12">
          <h1 class="section-header color-block-header">
            <?php _e(get_the_title()); ?>
          </h1>
        </div>
      </section>
    <?php } ?>
    <?php get_template_part('templates/components/about', 'header'); ?>
    <?php get_template_part('templates/components/about', 'specialization'); ?>
    <?php get_template_part('templates/components/about', 'contact-cta'); ?>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
