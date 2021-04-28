var $j = jQuery.noConflict();

$j(document).ready(function () {

  $j('.hamburger').click(function(e) {
  	e.preventDefault();

    if ($j(window).width() < 1024) {

      var $menu = $j('#site-navigation .site-menu .mobile-menu');
      var $nav = $j('#site-navigation')

      if ($j(this).hasClass('is-active')) {
          $j(this).removeClass('is-active');
      } else {
          $j(this).addClass('is-active');
      }

      if ($menu.hasClass('dropdown')) {
          $nav.removeClass('dropdown');
          $menu.removeClass('dropdown');
          $menu.slideUp(350);
      } else {
          $nav.addClass('dropdown');
          $menu.addClass('dropdown');
          $menu.slideDown(350);
      }
    }
  });

$j(document).ready(function () {
    //defer html5 video loading
    if($j(window).width() >= 1024){
      if($j(".hero-section video.mobile-hero-video")[0]){
        $j(".hero-section video.mobile-hero-video").remove();
      }

      $j(".hero-section video.desktop-hero-video source").each(function() {
          var sourceFile = $j(this).attr("data-src");
          $j(this).attr("src", sourceFile);
          var video = this.parentElement;
          video.load();
          video.muted = true;
          console.log("muted");
          // uncomment if video is not autoplay
          video.play();
          $j(".hero-section video").fadeTo( 1200 , 1);
      });
    }

    if($j(window).width() < 1024){
      if($j(".hero-section video.mobile-hero-video")[0]){
        $j(".hero-section video.mobile-hero-video source").each(function() {
            var video = this.parentElement;
            video.load();
            video.muted = true;
            console.log("muted");
            // uncomment if video is not autoplay
            video.play();
            $j(".hero-section video").fadeTo( 1200 , 1);
        });
      } else {
          $j(".hero-section video.desktop-hero-video source").each(function() {
              var sourceFile = $j(this).attr("data-src");
              $j(this).attr("src", sourceFile);
              var video = this.parentElement;
              video.load();
              video.muted = true;
              console.log("muted");
              // uncomment if video is not autoplay
              video.play();
              $j(".hero-section video").fadeTo( 1200 , 1);
          });
      }
    }
  });

  $j(".filter-toggle").click(function () {
      $j('.triangle').toggleClass("triangle-down");

      $j(".filter-button-group").slideToggle(500, function () {

      });

  });

});


// Automatically Refresh page when resizing between desktop and mobile.
var threshold = 1024;
var initialDiff = ($j(window).width() > threshold) ? 1:-1;

$j(window).on('resize',function(e){
    var w = $j(window).width();
    var currentDiff = w - threshold;
    if(currentDiff*initialDiff < 0) {
      setTimeout(function(){
        window.location.reload();
      });
    }
});

$j(document).ready(function () {
  if($j(".masonry-grid")[0]){
    $j('.masonry-grid').masonry({
      columnWidth: '.masonry-sizer',
      itemSelector: '.masonry-item',
      percentPosition: true
    });
  }
});

$j('#request-meeting-btn').magnificPopup({
  items: {
    src: '#contact-form-popup',
    type: 'inline',
  }
});
