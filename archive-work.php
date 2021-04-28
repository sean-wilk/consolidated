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

if(function_exists('ot_get_option')){
	 $work_archive_title = ot_get_option('work_archive_title');
	 $work_archive_description = ot_get_option('work_archive_description');
	 $number_of_work_posts_to_display	= ot_get_option('number_of_work_posts_to_display');
	 $number_of_work_posts_to_load_on_click	= ot_get_option('number_of_work_posts_to_load_on_click');
	 $industries_sorting	= ot_get_option('industries_sorting');
}

if ($number_of_work_posts_to_display <= 0) {
	$number_of_work_posts_to_display = 9;
}

if ($number_of_work_posts_to_load_on_click <= 0) {
	$number_of_work_posts_to_load_on_click = 9;
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="news-header container">
				<div class="col-md-8 col-xs-12">
					<h1 class="section-header color-block-header">
						<?php
							if($work_archive_title) {
								_e($work_archive_title);
							} else {
								_e('News','go');
							}
						?>
					</h1>
					<?php if($work_archive_description) { ?>
	          <div class="work-grid-description">
	            <?= $work_archive_description ?>
	          </div>
	        <?php } ?>
				</div>
			</section>
			<div id="work-grid" class="blog-index-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
								<?php if ( have_posts() ) : ?>

									<div class="grid-container container">

										<?php
											$terms = get_terms([
																'taxonomy' => 'industries',
																'hide_empty' => true,
																'orderby' => 'name',
																'order' => $industries_sorting
														]);
											if ( $terms != null ){
											?>
											<div class="filter-toggle">
												<div class=triangle></div>
												<h3 class="fw-medium secondary-color">Filter <h3>
											</div>
											<div class="button-group filter-button-group">
												<div class="flex-container">
												 <button class="btn btn-primary btn-lg filter-button is-checked" data-filter="*"><?php esc_html_e('All', 'go'); ?></button>
													<?php
														 foreach( $terms as $term ) {
															if ( $term->name != null ) {
													?>
														<button class="filter-button btn btn-primary btn-lg" data-filter=".<?php echo $term->slug; ?>">
															<?php echo $term->name; ?>
														</button>
													<?php
														// Get rid of the other data stored in the object, since it's not needed
														} else {}
														 unset($term);
														}
														?>
													</div>
												</div>
										<?php } ?>

									<?php
									setup_postdata($post);
										$args = array(
											'post_type'       => 'work',
											'posts_per_page' => -1,
											'ignore_sticky_posts' => 1,
											'post_status'     => 'publish',
											'orderby' => 'desc',
										 );

										$query = new WP_Query( $args );
										if ( $query->have_posts() ) :?>
											<div class="post-grid row-no-gutters isotope-grid" id="work-isotope-grid">
												<?php
												while ( $query->have_posts() ) : $query->the_post();
														get_template_part('templates/components/work', 'post-item');
												endwhile;
												?>
											</div>
									 <?php
										endif;
										wp_reset_postdata();
										?>
										<div class='read-more-container'>
											<a id="showMore" class="btn btn-primary btn-lg read-more-link" href="#">
												<?php _e('View More','go'); ?> <i class="fas fa-arrow-right" style="margin-left: 16px;"></i>
											</a>
										</div>
									</div>

								<?php else : ?>


								<?php endif; ?>
						</div> <!-- .col-## -->

					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- .blog-wrapper -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<script>
    var initial_items = <?= $number_of_work_posts_to_display ?>;
    var next_items = <?= $number_of_work_posts_to_load_on_click ?>;
   </script>
<?php
get_footer();
