var $j = jQuery.noConflict();

$j(".industry-link").on("click", function (e) {
  e.preventDefault();
  var industry_slug = $j(this).data("industry");
  industry_ajax_get(industry_slug);
});

function industry_ajax_get(industry_slug) {
  $j("#industry-isotope-grid").hide();
  $j("#loading-animation").show();
  var ajaxurl = '/wp-admin/admin-ajax.php';

  $j.ajax({
      type: 'POST',
      url: ajaxurl,
      data: {"action": "load-filter", "industry": industry_slug },
      success: function(response) {
          $j("#main-slider-container").html(response);

          $j('.industry-slider').on('init', function(event, slick){
            $j("#loading-animation").hide();
            $j("#main-slider-container").show();
          });

          if($j(".industry-slider")[0]){
            $j('.industry-slider').slick({
              dots: false,
              infinite: true,
              speed: 300,
              slidesToShow: 3,
              slidesToScroll: 1,
              nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
              prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
            });
          }

          $j(".back-main-btn").on("click", function (e) {
            e.preventDefault();
            $j("#industry-slider-container").hide();
            $j("#main-slider-container").hide();
            $j("#industry-isotope-grid").show();
          });

          $j(".back-industry-btn").on("click", function (e) {
            e.preventDefault();
            $j("#industry-post-slider-container").hide();
            $j("#industry-slider-container").show();
            $j('.industry-post-slider').slick('unslick');
          });

          $j(window).resize(function(){
            $j('.industry-slider')[0].slick.refresh();
          });


          post_slider_init();

          return false;
      }
  });
}

function post_slider_init() {
  $j('a.ajax-popup').click(function(e){
    e.preventDefault();
    var post_id = $j(this).data("id");

    $j("#industry-slider-container").hide();
    $j("#loading-animation").show();

    $j('.industry-post-slider').on('init', function(event, slick){
      $j("#loading-animation").hide();
      $j('.industry-post-slider').show();
      $j("#industry-post-slider-container").show();
    });

    if($j(".industry-post-slider")[0]){
      $j('.industry-post-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
      });

      var $slide = $j("#industry-post-slider.slick-slider [data-id=" + post_id + "]");
      var slideIndex = $slide.data("slick-index");
      $j(".industry-post-slider").slick("slickGoTo", slideIndex, true);
    }

    $j(window).resize(function(){
      $j('.industry-post-slider')[0].slick.refresh();
    });
  });
}
