<?php
/**
 * Component for main content of the post Index Grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 if (function_exists('ot_get_option')){
		$number_of_posts_to_display	= ot_get_option('number_of_posts_to_display');
   	$number_of_posts_to_load_on_click	= ot_get_option('number_of_posts_to_load_on_click');
 }

 if ($number_of_posts_to_display <= 0) {
   $number_of_posts_to_display = 8;
 }

 if ($number_of_posts_to_load_on_click <= 0) {
   $number_of_posts_to_load_on_click = 4;
 }

 ?>

 <section class="taxonomy-grid-container container">
		<!-- .entry-header -->
    <div class="grid-container">

    <?php
    setup_postdata($post);
      $args = array(
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1,
        'post_status'     => 'publish',
        'orderby' => 'desc',
       );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :?>
        <div class="post-grid row-no-gutters isotope-grid sh-boxes" id="post-grid">
          <?php
          while ( $query->have_posts() ) : $query->the_post();
              get_template_part('templates/components/post', 'item');
          endwhile;
          ?>
        </div>
     <?php
      endif;
      wp_reset_postdata();
      ?>
      <div class='read-more-container'>
        <a id="showMorePG" class="btn btn-outline read-more-link" href="#">
          <?php _e('Load More','go'); ?>
        </a>
      </div>
    </div>
	</section>

  <script>
    var initial_items = <?= $number_of_posts_to_display ?>;
    var next_items = <?= $number_of_posts_to_load_on_click ?>;
  </script>

   <!-- .hentry -->
