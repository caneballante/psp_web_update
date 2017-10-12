$(document).ready(function(){
		$(".showMoreLink").click(function(){
			var whoClicked = $(this).attr("data-attr");
			$('#morePara'+whoClicked).show();
			$('#showMore'+whoClicked).hide();	
			$('#showLess'+whoClicked).show();	
			console.log(whoClicked)
		});		

});
$(document).ready(function(){
		$(".showLessLink").click(function(){
			var whoClicked = $(this).attr("data-attr");
			$('#morePara'+whoClicked).hide();
			$('#showMore'+whoClicked).show();	
			$('#showLess'+whoClicked).hide();		
			console.log(whoClicked)	
		});		
    
});

