<?php
/**
 * The Archive file for Video Page
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
	<section id="primary" class="content-area 404-page">
		<main id="main" class="site-main">
			<div class="container" style="padding-top: 32px;">
		    <div class="content-container col-md-8 col-md-push-2">
	        <h1 class="section-header jumbo" style="text-align:center;">
	          <?php _e('404 Page Not Found','go'); ?>
	        </h1>
		    </div>
		  </div>
			<div class="container" style="padding: 16px 0 64px 0;">
				<div class="col-md-8 col-md-push-2">
					<h3 style="text-align:center;"><?php _e('The page you were looking for wasn\'t found','go'); ?></h3>
				</div>
				<div class="404-btn-container col-xs-12" style="text-align: center; padding-top: 32px;">
          <a id="404-btn" class="btn btn-outline read-more-link" href="<?php echo(get_home_url()); ?>">
            <?php _e('Go Home','go'); ?>
          </a>
				</div>
			</div> <!-- .blog-wrapper -->

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_footer();
