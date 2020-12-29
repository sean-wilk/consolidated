var $j = jQuery.noConflict();
$j(document).ready(function () {

  if ( $j("#work-grid")[0] ) {

    var $grid = $j('.isotope-grid').isotope({
      itemSelector: '.grid-item-link',
      layoutMode: 'fitRows',
    });

    $j('.filter-button-group').on( 'click', 'button', function() {
      var filterValue = $j(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });

      $j(this).addClass('is-checked').siblings().removeClass('is-checked');
    });$

    // bind filter button click
    $j('.filter-button-group').on('click', 'button', function () {
        var filterValue = $j(this).attr('data-filter');
        // use filterFn if matches value
        $grid.isotope({filter: filterValue});
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
      }
      else {
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
  }

  // function that hides items when page is loaded
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
