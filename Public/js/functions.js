//LOADER
$(window).on("load", function() {
    "use strict";
    $(".loader").fadeOut(800);

});

jQuery(function($) {
  "use strict";
  // +++++ open for Search section
  $(".toggler").on("click", function() {
    $(".property-query-area").slideToggle(300);
  });

  
  //Filter Property
  $('#property-gallery').cubeportfolio({
    filters: '#filters-property',
    layoutMode: 'grid',
    mediaQueries: [{
      width: 1500,
      cols: 4
    }, {
      width: 1100,
      cols: 3
    }, {
      width: 800,
      cols: 3
    }, {
      width: 480,
      cols: 2
    }, {
      width: 320,
      cols: 1
    }],
    defaultFilter: '*',
    animationType: 'fadeOut',
    gapHorizontal: 30,
    gapVertical: 30,
    gridAdjustment: 'responsive',
    caption: 'zoom',
    displayType: 'sequentially',
    displayTypeSpeed: 100,
  });


});