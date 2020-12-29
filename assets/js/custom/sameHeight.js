var $j = jQuery.noConflict();

$j(document).ready(function(){

    // Select and loop the container element of the elements you want to equalise
    $j('.sh-boxes').each(function(){

      // Cache the highest
      var highestBox = 0;

      // Select and loop the elements you want to equalise
      $j('.sh-box', this).each(function(){

        // If this box is higher than the cached highest then store it
        if($j(this).height() > highestBox) {
          highestBox = $j(this).height();
        }

      });

      // Set the height of all those children to whichever was highest
      $j('.sh-box',this).height(highestBox);

    });

});

$j(window).resize(function(){

  $j('.sh-boxes').each(function(){

    // Cache the highest
    var highestBox = 0;

    // Select and loop the elements you want to equalise
    $j('.sh-box', this).each(function(){

      // If this box is higher than the cached highest then store it
      if($j(this).height() > highestBox) {
        highestBox = $j(this).height();
      }

    });

    // Set the height of all those children to whichever was highest
    $j('.sh-box',this).height(highestBox);

  });

});

//---------------------------
// Desktop Only - Same Height
//---------------------------

var $j = jQuery.noConflict();

$j(document).ready(function(){

  if ($j(window).width() >= 1024) {

    // Select and loop the container element of the elements you want to equalise
    $j('.do-sh-boxes').each(function(){

      // Cache the highest
      var highestBox = 0;

      // Select and loop the elements you want to equalise
      $j('.do-sh-box', this).each(function(){

        // If this box is higher than the cached highest then store it
        if($j(this).height() > highestBox) {
          highestBox = $j(this).height();
        }

      });

      // Set the height of all those children to whichever was highest
      $j('.do-sh-box',this).height(highestBox);

    });
  }

});

$j(window).resize(function(){

  if ($j(window).width() >= 1024) {

    $j('.do-sh-boxes').each(function(){

      // Cache the highest
      var highestBox = 0;

      // Select and loop the elements you want to equalise
      $j('.do-sh-box', this).each(function(){

        // If this box is higher than the cached highest then store it
        if($j(this).height() > highestBox) {
          highestBox = $j(this).height();
        }

      });

      // Set the height of all those children to whichever was highest
      $j('.do-sh-box',this).height(highestBox);

    });
  }

});
