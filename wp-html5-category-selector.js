(function($){
	function updateFiltered(){		
		// If the field is empty, show everything.
		if($("#filterCats").val() == ''){
			$("#categorydiv .selectit").show();
			return true;
		}
		
		// Cycle through the options. Hide those without the text the user inputted.
		$("#categorydiv .selectit").each(function(){
			if($(this).text().toLowerCase().indexOf($("#filterCats").val().toLowerCase()) >= 0){
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	}
	
	// If it can find the element on the page, it will run.
	if($('#category-filter').length > 0){
		// Add the filter input
		$("#category-all").after($('#category-filter'));
			
		$(document).ready(function() {	
			// The listners
			$("#filterCats").keyup(updateFiltered);
			$("#filterCats").mouseout(updateFiltered);
		
			// Support the clear button
			$("#category-filter .clearThis").click(function(){
				$("#filterCats").val('');
				$("#filterCats").trigger('keyup');
			});
		});	
	}
})(jQuery);