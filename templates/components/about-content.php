<?php
/**
 * Component for main content of the About Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $about_awards = get_field( 'about_awards' );
?>

<section class="about-content-container container">
  <div class="about-content">
    <div class="about-main col-md-8">
      <?php the_content(); ?>
    </div>
    <div class="about-sidebar col-md-4">
      <div class="sidebar-content">
        <?php if( $about_awards ){ ?>
          <div class="about-awards">
            <div class="award-container">
            <?php
    				$counter = 0;
    				while ( have_rows( 'about_awards' ) ) : the_row();
    					$award = get_sub_field( 'award' );
    					$link = get_sub_field( 'link' );
    					$counter++;

    					if( $award || $link ){ ?>
              <div id="award-<?php echo($counter);?>" class="award-item col-sm-6 col-xs-12">
                <?php if( $link ){ ?>
                  <a href="<?php echo($link);?>">
                <?php } ?>
                  <?php if( $award ){ ?>
                    <img class="awards-image" src="<?php echo $award['url']; ?>" alt="<?php echo $award['alt']; ?>">
                  <?php } ?>
                <?php if( $link ){ ?>
                  </a>
                <?php } ?>
              </div>
              <?php } ?>
            <?php endwhile; ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
