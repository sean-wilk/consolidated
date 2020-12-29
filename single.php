<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Go
 */

get_header();

// Function to record views of post (for some reason the readings are double, but consistenly so we will take it for our purposes)
wpb_set_post_views(get_the_ID());
?>

	<div id="primary" class="blog-wrapper content-area content">
		<main id="main" class="site-main posts-content">
			<?php get_template_part('templates/components/post', 'hero'); ?>
			<div class="container">
        <?php
				while ( have_posts() ) : the_post();

            get_template_part( 'templates/template-parts/content-blog');

        endwhile; // End of the loop.
				?>
		 	</div> <!-- .container -->
			<div class="row related-posts">
				<?php get_template_part('templates/components/post', 'related'); ?>
			</div>
		</main> <!-- .posts-content -->
	</div> <!-- .content-wrapper -->

<?php
get_footer();
