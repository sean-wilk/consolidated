<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
				<section class="page-header container">
					<div class="col-xs-12">
						<h1 class="section-header color-block-header">
							<?php _e(get_the_title()); ?>
						</h1>
					</div>
				</section>
			<?php } ?>
			<section class="container default-page-content">
				<div class="col-xs-12">
				<?php while (have_posts()) :
          the_post(); ?>
              <?php get_template_part('templates/template-parts/content', 'page'); ?>
        <?php endwhile; ?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
