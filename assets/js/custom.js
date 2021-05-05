"use strict";

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
    data: {
      "action": "load-filter",
      "industry": industry_slug
    },
    success: function success(response) {
      $j("#main-slider-container").html(response);
      $j('.industry-slider').on('init', function (event, slick) {
        $j("#loading-animation").hide();
        $j("#main-slider-container").show();
      });

      if ($j(".industry-slider")[0]) {
        $j('.industry-slider').slick({
          dots: false,
          infinite: true,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 1,
          nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
          prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
          responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          }, {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }]
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
      $j(window).resize(function () {
        $j('.industry-slider')[0].slick.refresh();
      });
      post_slider_init();
      return false;
    }
  });
}

function post_slider_init() {
  $j('a.ajax-popup').click(function (e) {
    e.preventDefault();
    var post_id = $j(this).data("id");
    $j("#industry-slider-container").hide();
    $j("#loading-animation").show();
    $j('.industry-post-slider').on('init', function (event, slick) {
      $j("#loading-animation").hide();
      $j('.industry-post-slider').show();
      $j("#industry-post-slider-container").show();
    });

    if ($j(".industry-post-slider")[0]) {
      $j('.industry-post-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>'
      });
      var $slide = $j("#industry-post-slider.slick-slider [data-id=" + post_id + "]");
      var slideIndex = $slide.data("slick-index");
      $j(".industry-post-slider").slick("slickGoTo", slideIndex, true);
    }

    $j(window).resize(function () {
      $j('.industry-post-slider')[0].slick.refresh();
    });
  });
}
"use strict";

var $j = jQuery.noConflict();
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  $j('.hamburger').click(function (e) {
    e.preventDefault();

    if ($j(window).width() < 1024) {
      var $menu = $j('#site-navigation .site-menu .mobile-menu');
      var $nav = $j('#site-navigation');

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
    if ($j(window).width() >= 1024) {
      if ($j(".hero-section video.mobile-hero-video")[0]) {
        $j(".hero-section video.mobile-hero-video").remove();
      }

      $j(".hero-section video.desktop-hero-video source").each(function () {
        var sourceFile = $j(this).attr("data-src");
        $j(this).attr("src", sourceFile);
        var video = this.parentElement;
        video.load();
        video.muted = true;
        console.log("muted"); // uncomment if video is not autoplay

        video.play();
        $j(".hero-section video").fadeTo(1200, 1);
      });
    }

    if ($j(window).width() < 1024) {
      if ($j(".hero-section video.mobile-hero-video")[0]) {
        $j(".hero-section video.mobile-hero-video source").each(function () {
          var video = this.parentElement;
          video.load();
          video.muted = true;
          console.log("muted"); // uncomment if video is not autoplay

          video.play();
          $j(".hero-section video").fadeTo(1200, 1);
        });
      } else {
        $j(".hero-section video.desktop-hero-video source").each(function () {
          var sourceFile = $j(this).attr("data-src");
          $j(this).attr("src", sourceFile);
          var video = this.parentElement;
          video.load();
          video.muted = true;
          console.log("muted"); // uncomment if video is not autoplay

          video.play();
          $j(".hero-section video").fadeTo(1200, 1);
        });
      }
    }
  });
  $j(".filter-toggle").click(function () {
    $j('.triangle').toggleClass("triangle-down");
    $j(".filter-button-group").slideToggle(500, function () {});
  });
}); // Automatically Refresh page when resizing between desktop and mobile.

var threshold = 1024;
var initialDiff = $j(window).width() > threshold ? 1 : -1;
$j(window).on('resize', function (e) {
  var w = $j(window).width();
  var currentDiff = w - threshold;

  if (currentDiff * initialDiff < 0) {
    setTimeout(function () {
      window.location.reload();
    });
  }
});
$j(document).ready(function () {
  if ($j(".masonry-grid")[0]) {
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
    type: 'inline'
  }
});
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  $j(window).scroll(function () {
    if ($j(document).scrollTop() > 100) {
      $j("#site-navigation").addClass("scrolled");
    } else {
      $j("#site-navigation").removeClass("scrolled");
    }
  });
}); // Admin Bar Fix for Fixed Mobile Header

$j(document).ready(function () {
  $j(window).scroll(function () {
    if ($j(window).width() < 1024) {
      if ($j(document).scrollTop() > 32) {
        $j(".admin-bar #site-navigation").addClass("admin-bar-hidden");
      } else {
        $j(".admin-bar #site-navigation").removeClass("admin-bar-hidden");
      }
    }
  });
});
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  // Select and loop the container element of the elements you want to equalise
  $j('.sh-boxes').each(function () {
    // Cache the highest
    var highestBox = 0; // Select and loop the elements you want to equalise

    $j('.sh-box', this).each(function () {
      // If this box is higher than the cached highest then store it
      if ($j(this).height() > highestBox) {
        highestBox = $j(this).height();
      }
    }); // Set the height of all those children to whichever was highest

    $j('.sh-box', this).height(highestBox);
  });
});
$j(window).resize(function () {
  $j('.sh-boxes').each(function () {
    // Cache the highest
    var highestBox = 0; // Select and loop the elements you want to equalise

    $j('.sh-box', this).each(function () {
      // If this box is higher than the cached highest then store it
      if ($j(this).height() > highestBox) {
        highestBox = $j(this).height();
      }
    }); // Set the height of all those children to whichever was highest

    $j('.sh-box', this).height(highestBox);
  });
}); //---------------------------
// Desktop Only - Same Height
//---------------------------

var $j = jQuery.noConflict();
$j(document).ready(function () {
  if ($j(window).width() >= 1024) {
    // Select and loop the container element of the elements you want to equalise
    $j('.do-sh-boxes').each(function () {
      // Cache the highest
      var highestBox = 0; // Select and loop the elements you want to equalise

      $j('.do-sh-box', this).each(function () {
        // If this box is higher than the cached highest then store it
        if ($j(this).height() > highestBox) {
          highestBox = $j(this).height();
        }
      }); // Set the height of all those children to whichever was highest

      $j('.do-sh-box', this).height(highestBox);
    });
  }
});
$j(window).resize(function () {
  if ($j(window).width() >= 1024) {
    $j('.do-sh-boxes').each(function () {
      // Cache the highest
      var highestBox = 0; // Select and loop the elements you want to equalise

      $j('.do-sh-box', this).each(function () {
        // If this box is higher than the cached highest then store it
        if ($j(this).height() > highestBox) {
          highestBox = $j(this).height();
        }
      }); // Set the height of all those children to whichever was highest

      $j('.do-sh-box', this).height(highestBox);
    });
  }
});
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  if ($j("#industry-grid")[0]) {
    var $grid = $j('.isotope-grid').isotope({
      itemSelector: '.grid-item-link',
      layoutMode: 'fitRows'
    });
    $grid.isotope('layout');
  }
});
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  if ($j("#post-grid")[0]) {
    var visible_items = initial_items;
    var $grid = $j('#post-grid').isotope({
      itemSelector: '.general-post-item',
      layoutMode: 'fitRows',
      getSortData: {
        date: '.date',
        // text from querySelector
        popularity: '.popularity parseInt'
      }
    });
    $j('.sort-button-group #sort-button-popular').on('click', function () {
      $j(this).addClass('is-checked').siblings().removeClass('is-checked');
      $j('#post-grid').append($j('#post-grid .index-post-item').sort(function (a, b) {
        return b.getAttribute('data-popularity') - a.getAttribute('data-popularity');
      }));
      $j('.index-post-item').each(function () {
        $j('.index-post-item').removeClass('visible_item');
      });
      var post_count = 0;
      $j('.general-post-item').each(function () {
        if (post_count >= visible_items) {
          $j(this).addClass('visible_item');
        }

        post_count++;
      });
      $grid.isotope('layout');
      $grid.isotope({
        sortBy: 'popularity',
        sortAscending: false
      });
    });
    $j('.sort-button-group #sort-button-recent').on('click', function () {
      $j(this).addClass('is-checked').siblings().removeClass('is-checked');
      $j('#post-grid').append($j('#post-grid .index-post-item').sort(function (a, b) {
        return new Date(b.getAttribute('data-date')) > new Date(a.getAttribute('data-date'));
      }));
      $j('.index-post-item').each(function () {
        $j('.index-post-item').removeClass('visible_item');
      });
      var post_count = 0;
      $j('.general-post-item').each(function () {
        if (post_count >= visible_items) {
          $j(this).addClass('visible_item');
        }

        post_count++;
      });
      $grid.isotope('layout');
      $grid.isotope({
        sortBy: 'date',
        sortAscending: false
      });
    });
    $j('#showMorePG').on('click', function (e) {
      e.preventDefault();
      showNextItems(next_items);
      visible_items += next_items;
    });
    hideItems(initial_items);
  }

  function showNextItems(pagination) {
    var itemsMax = $j('.visible_item').length;
    var itemsCount = 0;
    $j('.visible_item').each(function () {
      if (itemsCount < pagination) {
        $j(this).removeClass('visible_item');
        itemsCount++;
      }
    });

    if (itemsCount >= itemsMax) {
      $j('#showMorePG').hide();
    }

    $grid.isotope('layout');
  } // function that hides items when page is loaded


  function hideItems(pagination) {
    var itemsMax = $j('.general-post-item').length;
    var itemsCount = 0;
    $j('.general-post-item').each(function () {
      if (itemsCount >= pagination) {
        $j(this).addClass('visible_item');
      }

      itemsCount++;
    });

    if (itemsCount < itemsMax || initial_items >= itemsMax) {
      $j('#showMorePG').hide();
    }

    $grid.isotope('layout');
  }
});
"use strict";

var $j = jQuery.noConflict();
$j(document).ready(function () {
  if ($j("#work-grid")[0]) {
    var $grid = $j('.isotope-grid').isotope({
      itemSelector: '.grid-item-link',
      layoutMode: 'fitRows'
    });
    $j('.filter-button-group').on('click', 'button', function () {
      var filterValue = $j(this).attr('data-filter');
      $grid.isotope({
        filter: filterValue
      });
      $j(this).addClass('is-checked').siblings().removeClass('is-checked');
    });
    $; // bind filter button click

    $j('.filter-button-group').on('click', 'button', function () {
      var filterValue = $j(this).attr('data-filter'); // use filterFn if matches value

      $grid.isotope({
        filter: filterValue
      });
      updateFilterCounts();
    });
    $j('#showMore').on('click', function (e) {
      e.preventDefault();
      showNextItems(next_items);
    });
    hideItems(initial_items);
  }

  function updateFilterCounts() {
    // get filtered item elements
    var itemElems = $grid.isotope('getFilteredItemElements');
    var count_items = $j(itemElems).length;

    if (count_items > initial_items) {
      $j('#showMore').show();
    } else {
      $j('#showMore').hide();
    }

    if ($j('.grid-item-link').hasClass('visible_item')) {
      $j('.grid-item-link').removeClass('visible_item');
    }

    var index = 0;
    $j(itemElems).each(function () {
      if (index >= initial_items) {
        $j(this).addClass('visible_item');
      }

      index++;
    });
    $grid.isotope('layout');
  }

  function showNextItems(pagination) {
    var itemsMax = $j('.visible_item').length;
    var itemsCount = 0;
    $j('.visible_item').each(function () {
      if (itemsCount < pagination) {
        $j(this).removeClass('visible_item');
        itemsCount++;
      }
    });

    if (itemsCount >= itemsMax) {
      $j('#showMore').hide();
    }

    $grid.isotope('layout');
  } // function that hides items when page is loaded


  function hideItems(pagination) {
    var itemsMax = $j('.grid-item-link').length;
    var itemsCount = 0;
    $j('.grid-item-link').each(function () {
      if (itemsCount >= pagination) {
        $j(this).addClass('visible_item');
      }

      itemsCount++;
    });

    if (itemsCount < itemsMax || initial_items >= itemsMax) {
      $j('#showMore').hide();
    }

    $grid.isotope('layout');
  }
});