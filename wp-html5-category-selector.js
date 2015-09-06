(function($){
  // Only run the rest of the setup if we can find the category box.
  if($("#category-all").length == 0){
    return;
  }

  // Inject the filtering field.
  $("#category-all").after('<div id="category-filter"><label><!--'+objectL10n.filter+': --><input type="search" id="filterCats" placeholder="'+objectL10n.type_to_filter+'" /></label> <!--<a class="clear button">'+objectL10n.clear+'</a>--></div>');

  // Cache the elements we use often.
  var $filterCats = $("#filterCats");
  var $categorydiv = $("#categorydiv");
  var $categorydiv_selectit = $("#categorydiv .selectit");
  var $minQueryLength = 0;

  // If there are lots of categories, only start filtering on the 2nd letter
  if( $("#categorydiv .selectit").length >= 500 ){
    $minQueryLength = 2;
  }

  // Store the lower case version of the category name against the element for faster lookup
  $categorydiv_selectit.each(function(){
    $(this).attr("data-lower-text", $(this).text().toLowerCase().trim());
  });
  
  // Updates the shown categories based on the filter value.
  function updateFiltered(){		
    var queryValue = $filterCats.val().toLowerCase().trim();
    var queryValueSanitized = queryValue.replace(/'/g, "\\'");

    // If the field is empty, show everything.
    if(queryValue.length <= $minQueryLength){
      $categorydiv_selectit.show();
      return;
    }

    $categorydiv.find("[data-lower-text]:not([data-lower-text*='" + queryValueSanitized + "'])").hide();
    $categorydiv.find("[data-lower-text*='" + queryValueSanitized + "']").show();
  }

  // Now add the listeners.
  $filterCats.on('keyup', updateFiltered);
  $filterCats.on('mouseout', updateFiltered);
})(jQuery);
