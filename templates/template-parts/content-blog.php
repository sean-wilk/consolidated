<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$thumb_size = 'go-blog-thumbnail';
if(is_single()){
    $thumb_size = 'go-single-post-thumbnail';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
    <div class="blog-content">

        <div class="entry-content">
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
    </div><!-- /.blog-content -->
</article>
