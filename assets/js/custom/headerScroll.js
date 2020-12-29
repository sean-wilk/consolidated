var $j = jQuery.noConflict();

$j(document).ready(function () {
    $j(window).scroll(function () {
        if ($j(document).scrollTop() > 100) {
            $j("#site-navigation").addClass("scrolled");
        } else {
            $j("#site-navigation").removeClass("scrolled");
        }
    });
});

// Admin Bar Fix for Fixed Mobile Header

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
