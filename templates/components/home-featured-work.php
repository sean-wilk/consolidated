<?php
/**
 * Component for main content of the Shows Post Type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

$posts = get_field('featured_work');

if( $posts ){ ?>
 <section class="home-featured-post">
     <?php
      $counter = 0;
      foreach( $posts as $post) {
        setup_postdata($post);
        $image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
        $work_subheading = get_field( 'work_subheading' );
        $work_mobile_banner_image = get_field( 'work_mobile_banner_image' );
        $counter++;
      ?>
       <style>
        <?php echo("#featured-work-" . $counter); ?> {
          background-image:url("<?php echo($image_url); ?>");
        }

        <?php if( $work_mobile_banner_image ){ ?>
          @media all and (max-width: 1023px){
            <?php echo("html #featured-work-" . $counter); ?> {
              background-image:url("<?php echo($work_mobile_banner_image["url"]); ?>");
            }
          }
        <?php } ?>
       </style>
       <div class="featured-work container-fluid <?php if($counter % 2 == 0){ echo("right-aligned"); } else { echo("left-aligned"); } ?>" id="featured-work-<?= $counter ?>">
         <div class="featured-work-overlay"></div>
         <div class="featured-work-content container">
           <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="featured-work-text-link col-sm-6 col-xs-8">
             <div class="grid-item">
               <div class="featured-work-header">
                 <h3><?php the_title(); ?></h3>
               </div>
               <?php if( $work_subheading ){ ?>
                 <div class="featured-work-subheader">
                   <p><?php echo($work_subheading);?></p>
                 </div>
               <?php } ?>
             </div>
           </a>
           <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="featured-work-cta-link">
             <h3>Find Out More <i class="fas fa-arrow-right" style="margin-left: 16px;"></i></h3>
           </a>
         </div>
       </div>
      <?php wp_reset_postdata();?>
    <?php } ?>
 </section>
<?php } ?>
