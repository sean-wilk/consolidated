<?php
/**
 * Component for Agency Statement on Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 /* Header Custom Fields */
  $as_header = get_field( 'as_header' );
  $as_keywords = get_field( 'as_keywords' );
  $as_statement = get_field( 'as_statement' );

  if( $as_header || $as_keywords || $as_statement ){
?>
<section class="home-statement container-fluid">
  <div class="container statement-content">
    <h1 class="color-block-100w mega fw-bold">
      <?= $as_header ?>
    </h1>
    <div class="as-keywords">
      <?php
      if( $as_keywords ){
        $counter = 0;
        $total_count = count(get_field('as_keywords'));

        while ( have_rows( 'as_keywords' ) ) : the_row();
          $as_keyword = get_sub_field( 'as_keyword' );
          $counter++;

          if( $as_keyword ){ ?>
            <h1 id="keyword-<?php echo($counter);?>" class="fw-medium keyword jumbo <?php if($counter < $total_count) { echo("not-last"); } ?>">
              <?= $as_keyword ?>
            </h1>
            <?php if($counter < $total_count) { ?>
              <span class="trailing-elipsis"></span>
            <?php } ?>
          <?php }
        endwhile;
      } ?>
    </div>
    <div class="statement-text">
      <?= $as_statement ?>
    </div>
  </div>
</section>

<?php } ?>
