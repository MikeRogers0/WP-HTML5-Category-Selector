(function($){
	// If it can find the element on the page, it will run.
	if($("#category-all").length > 0){
	
		// Inject the filtering field.
		$("#category-all").after('<div id="category-filter"><label><!--'+objectL10n.filter+': --><input type="search" id="filterCats" placeholder="'+objectL10n.type_to_filter+'" /></label> <!--<a class="clear button">'+objectL10n.clear+'</a>--></div>');
		
		// Cache the elements we use often.
		var $filterCats = $("#filterCats");
		var $categorydiv_selectit = $("#categorydiv .selectit");
		//var $categoryFilter_clear = $("#category-filter .clear");
		
		// Updates the shown categories based on the filter value.
		function updateFiltered(){		
			// If the field is empty, show everything.
			if($filterCats.val() == ''){
				$categorydiv_selectit.show();
				return true;
			}
			
			// Cycle through the options. Hide those without the text the user inputted.
			$categorydiv_selectit.each(function(){
				var $this = $(this); // Caching again to save a few ms
				if($this.text().toLowerCase().indexOf($filterCats.val().toLowerCase()) >= 0){
					$this.show();
				} else {
					$this.hide();
				}
			});
		}
		
		// Now add the listeners.
		$filterCats.keyup(updateFiltered);
		$filterCats.mouseout(updateFiltered);
	
		// Support the clear button
		//$categoryFilter_clear.click(function(){
		//	$filterCats.val('');
		//	$filterCats.trigger('keyup');
		//});	
	}
})(jQuery);