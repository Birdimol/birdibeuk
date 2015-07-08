$.ajax
	(
		{
		  url: "controler/central.php?name=liste_article_recent"
		  /*,
		  data: { template: temp},
		  type:'POST'*/
		}				
	).done(function(data) 
		{
			$("#main").html(data);			
		}
	);
	
$.ajax
	(
		{
		  url: "controler/central.php?name=menu"
		  /*,
		  data: { template: temp},
		  type:'POST'*/
		}				
	).done(function(data) 
		{
			$("#menu").html(data);			
		}
	);