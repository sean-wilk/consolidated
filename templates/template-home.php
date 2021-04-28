<?php
/**
 * Template Name: Home
 *
 * This is the template for the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Go
 */

get_header();
?>

<div id="primary" class="content-area content">
  <main id="main" class="site-main">
    <?php get_template_part('templates/components/home', 'hero'); ?>
    <?php get_template_part('templates/components/home', 'statement'); ?>
    <?php //get_template_part('templates/components/home', 'quote'); ?>
    <?php //get_template_part('templates/components/home', 'featured-work'); ?>
    <?php //get_template_part('templates/components/home', 'work-grid'); ?>
    <?php get_template_part('templates/components/home', 'form'); ?>
    <?php get_template_part('templates/components/general', 'map'); ?>

    </section>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
