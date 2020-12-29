var $j = jQuery.noConflict();
$j(document).ready(function () {

  if ( $j("#post-grid")[0] ) {

      var visible_items = initial_items;

      var $grid = $j('#post-grid').isotope({
        itemSelector: '.general-post-item',
        layoutMode: 'fitRows',
        getSortData: {
          date: '.date', // text from querySelector
          popularity: '.popularity parseInt',
        }
      });

      $j('.sort-button-group #sort-button-popular').on( 'click', function() {

        $j(this).addClass('is-checked').siblings().removeClass('is-checked');

        $j('#post-grid').append($j('#post-grid .index-post-item').sort(function(a,b){
           return b.getAttribute('data-popularity')-a.getAttribute('data-popularity');
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

      $j('.sort-button-group #sort-button-recent').on( 'click', function() {

        $j(this).addClass('is-checked').siblings().removeClass('is-checked');

        $j('#post-grid').append($j('#post-grid .index-post-item').sort(function(a,b){
           return new Date( b.getAttribute('data-date') ) > new Date( a.getAttribute('data-date') );
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
    }

    // function that hides items when page is loaded
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
