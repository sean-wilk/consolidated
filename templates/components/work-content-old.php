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
        <div class="entry-content col-md-6 col-xs-12">
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
          $terms = get_terms([
                    'taxonomy' => 'industries',
                    'hide_empty' => true,
                ]);
          if ( $terms != null ){
          ?>
          <div class="tag-list col-md-5 col-md-push-1 col-xs-12">
            <div class="tag-list-content">
              <?php
                 foreach( $terms as $term ) {
                  if ( $term->name != null ) {
              ?>
                <h4 class="tag-item fw-medium" id="tag-<?php echo $term->name; ?>">
                  <?php echo $term->name; ?>
                </h4>
              <?php
                // Get rid of the other data stored in the object, since it's not needed
                } else {}
                 unset($term);
                }
                ?>
              </div>
            </div>
          <?php } ?>
    </div><!-- /.blog-content -->
</article>
