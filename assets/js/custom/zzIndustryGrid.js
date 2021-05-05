var $j = jQuery.noConflict();
$j(document).ready(function () {

  if ( $j("#industry-grid")[0] ) {

    var $grid = $j('.isotope-grid').isotope({
      itemSelector: '.grid-item-link',
      layoutMode: 'fitRows',
    });

    $grid.isotope('layout');
  }

});
