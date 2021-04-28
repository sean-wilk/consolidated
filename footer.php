<?php get_footer(); ?>

  <?php if (
      is_active_sidebar('footer-col-1')
      || is_active_sidebar('footer-col-2')
      || is_active_sidebar('footer-col-3')
  ) :
  ?>
  <?php
  	if (function_exists('ot_get_option')){
  			$script_content	= ot_get_option('script_content');
        $copyright_content	= ot_get_option('copyright_content');
  	}

  	if(!empty($script_content)) {
	?>
  <script>
    var $j = jQuery.noConflict();
    <?php _e($script_content) ?>
  </script>
  <?php } ?>
    <footer class="consolidated-footer container-fluid">
      <div class="container">
          <div class="row">
            <div class="footer-cols col-sm-3 col-xs-12" id="footer-col-1">
              <?php dynamic_sidebar('footer-col-1'); ?>
            </div>
            <div class="footer-cols col-sm-3 col-xs-12" id="footer-col-2">
              <?php dynamic_sidebar('footer-col-2'); ?>
            </div>
            <div class="footer-cols col-sm-6 col-xs-12" id="footer-col-3">
              <?php dynamic_sidebar('footer-col-3'); ?>
            </div>
          </div>
          </div>
      </div>
  </footer>
<?php endif;
    wp_footer();
?>
</body>
</div>

</html>
