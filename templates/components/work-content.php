<?php
/**
 * Component for main content of the Shows Post Type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

?>

<article id="work-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
    <div class="blog-content">
        <div class="entry-content col-md-5 col-xs-12">
          <h3 class="work-title">
            <?= get_the_title(); ?>
          </h3>
            <?php
                the_content(esc_html__( 'Read More', 'go' ));

                wp_link_pages(array(
                    'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'go') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            ?>
        </div><!-- .entry-content -->
        <?php
  				/* Header Custom Fields */
  				$work_video = get_field( 'work_video' );
  			?>
  			<?php if($work_video) {?>
  			  <div class="col-md-6 col-xs-12 col-md-push-1 video-container">
  					<div class="video-content">
  				    <?php echo($work_video); ?>
  					</div>
  			  </div>
  			<?php } ?>
    </div><!-- /.blog-content -->
</article>
