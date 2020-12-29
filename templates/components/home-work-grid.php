<?php
/**
 * Component for main content of the post Index Grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 if (function_exists('ot_get_option')){
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

 $wg_title = get_field('wg_title');
 $wg_description = get_field('wg_description');
 ?>

 <section class="work-grid-container home-work-grid container-fluid white-bg-section" id="work-grid">
    <div class="container">
      <div class="col-md-9 col-xs-12">
        <?php if($wg_title) { ?>
          <h1 class="color-block-header fw-bold work-grid-header secondary-color">
            <?= $wg_title ?>
          </h1>
        <?php } ?>
        <?php if($wg_description) { ?>
          <div class="work-grid-description dark-grey-color">
            <?= $wg_description ?>
          </div>
        <?php } ?>
      </div>
    </div>
		<!-- .entry-header -->
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
	</section>
  <script>
    var initial_items = <?= $number_of_work_posts_to_display ?>;
    var next_items = <?= $number_of_work_posts_to_load_on_click ?>;
   </script>
   <!-- .hentry -->
