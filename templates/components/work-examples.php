<?php
/**
 * Component for Hero Section for Other Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

  $work_example_grid = get_field("work_example_grid");
  $work_desktop_column_count = get_field("work_desktop_column_count");
  $work_mobile_column_count = get_field("work_mobile_column_count");

  if($work_desktop_column_count != 0){
    $desktop_count = 12/$work_desktop_column_count;
  } else {
    $desktop_count = 12;
  }

  $desktop_grid_class = "col-md-" . $desktop_count;

  if($work_mobile_column_count != 0){
    $mobile_count = 12/$work_mobile_column_count;
  } else {
    $mobile_count = 12;
  }

  $mobile_grid_class = "col-sm-" . $mobile_count;
?>

<section class="work-examples container">
  <div class="examples-container masonry-grid row">
    <div class="masonry-sizer <?= $desktop_grid_class ?> <?= $mobile_grid_class ?> col-xs-12">
    </div>
    <?php
       $counter = 0;
       while ( have_rows( 'work_example_grid' ) ) : the_row();
         $grid_item_type = get_sub_field( 'grid_item_type' );
         $image = get_sub_field( 'image' );
         $html_code = get_sub_field( 'html_code' );
         $video_file = get_sub_field( 'video_file' );
         $counter++;

         if( $image || $html_code || $video_file ){ ?>
           <div class="example-item masonry-item <?= $desktop_grid_class ?> <?= $mobile_grid_class ?> col-xs-12 <?= $grid_item_type ?>-item-type" id="example-item-<?php echo($counter);?>">

             <?php if( $image && $grid_item_type=="image" ){ ?>
               <img class="example-image" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
             <?php } ?>

             <?php if( $html_code && $grid_item_type=="html" ){ ?>
               <div class="html-code">
                 <?= $html_code ?>
               </div>
             <?php } ?>

             <?php if( $video_file && $grid_item_type=="video" ){ ?>
               <video class="example-video" preload="auto">
                   <source src="<?php echo($video_file["url"]);?>" type="video/mp4">
               </video>
             <?php } ?>

           </div>
         <?php } ?>
       <?php endwhile; ?>
  </div>
</section>
