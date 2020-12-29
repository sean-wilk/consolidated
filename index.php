<?php
/**
 * The Index template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Go
 * @since 1.0.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="news-header container">
				<div class="col-md-6 col-xs-12">
					<h1 class="section-header color-block-header">
						<?php _e('News','go'); ?>
					</h1>
				</div>
				<div class="button-group sort-button-group col-md-6 col-xs-12">
           <button id="sort-button-recent" class="btn btn-sm sort-button is-checked" data-sort-by="date">
						 <?php esc_html_e('Most Recent', 'go'); ?>
					 </button>
					 <button id="sort-button-popular" class="btn btn-sm sort-button" data-sort-by="popularity">
						<?php esc_html_e('Most Popular', 'go'); ?>
					</button>
        </div>
			</section>
			<div class="blog-index-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
								<?php if ( have_posts() ) : ?>

										<?php
										/*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
										get_template_part( 'templates/components/post-index', 'grid' );
										?>

								<?php else : ?>


								<?php endif; ?>
						</div> <!-- .col-## -->

					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .blog-wrapper --> 
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_footer();
