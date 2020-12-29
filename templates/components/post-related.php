<?php
/**
 * Component for related posts of Shows Post Type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

  //Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
  //Chose 'AND' if you want to query for posts with all terms
  $related_blogs_query = new WP_Query( array(
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'desc',
      'post__not_in'=>array($post->ID)
   ) );
   ?>
   <section class="related-posts-container container-fluid">
     <div class="curved-overlay">
     </div>
     <div class="related-posts-content container">
        <h1 class="section-header color-block-header">
          <?php _e('More News','go'); ?>
        </h1>
       <div class="related-posts row-no-gutters sh-boxes">
         <?php //Loop through posts and display...
            if($related_blogs_query->have_posts()) {
            while ($related_blogs_query->have_posts() ) : $related_blogs_query->the_post();
              get_template_part('templates/components/general', 'post-item');
            endwhile; wp_reset_query();
            }
         ?>
       </div>
         <div class='read-more-container'>
           <a class="btn btn-outline read-more-link" href="<?php echo(get_post_type_archive_link( 'post' )); ?>">
             <?php _e('View All','go'); ?>
           </a>
         </div>
       </div>
   </section>
