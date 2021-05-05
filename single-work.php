<?php
/**
 * The template for displaying all single  posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Go
 */

get_header();
?>

	<div id="primary" class="blog-wrapper content-area content">
		<main id="main" class="site-main posts-content">
			<?php get_template_part('templates/components/work', 'hero'); ?>
			<div class="container">
        <?php
				while ( have_posts() ) : the_post();

            get_template_part('templates/components/work', 'content');

        endwhile; // End of the loop.
				?>
		 	</div> <!-- .container -->
			<?php get_template_part('templates/components/work', 'examples'); ?>
			<section class='read-more-container'>
				<a class="btn btn-outline read-more-link" href="/work/">
					<?php _e('Back To Work','go'); ?>
				</a>
			</section>
		</main> <!-- .posts-content -->
	</div> <!-- .content-wrapper -->

<?php
get_footer();
