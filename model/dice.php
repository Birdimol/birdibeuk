<?php 

	function get_valeur($val)
	{
		echo "&nbsp;";
		switch($val)
		{
			case 8:
				echo "<span style='color:#FF0000;'>(Faible)</span>";
			break;
			case 9:
				echo "<span style='color:#FF8000;'>(Pas terrible)</span>";
			break;
			case 10:
				echo "<span style='color:#FFFF00;'>(Correct)</span>";
			break;
			case 11:
				echo "<span style='color:#688A08;'>(Bon)</span>";
			break;
			case 12:
				echo "<span style='color:#04B404;'>(Très Bon)</span>";
			break;
			case 13:
				echo "<span style='color:#2ba09c;'>(Exceptionnel)</span>";
			break;
			default:
				if($val > 13)
				{
					echo "<span style='color:#2ba09c;'>(Exceptionnel)</span>";
				}				
			break;
		}
	}
	
	function get_valeur_discrete($val)
	{
		switch($val)
		{
			case 8:
				return "<span style='color:#FF0000;'>(Faible)</span>";
			break;
			case 9:
				return "<span style='color:#FF8000;'>(Pas terrible)</span>";
			break;
			case 10:
				return "<span style='color:#FFFF00;'>(Correct)</span>";
			break;
			case 11:
				return "<span style='color:#688A08;'>(Bon)</span>";
			break;
			case 12:
				return "<span style='color:#04B404;'>(Très Bon)</span>";
			break;
			case 13:
				return "<span style='color:#2ba09c;'>(Exceptionnel)</span>";
			break;
			default:
				if($val > 13)
				{
					return "<span style='color:#2ba09c;'>(Exceptionnel)</span>";
				}				
			break;
		}
	}

	function des($numero)
	{
		switch($numero)
		{
			case 1 :
				?>
					<div class="dice-container">  
						<div class="dice dice-1">
							<div class="dice-indicator indicator-1"></div>  
						</div>  
					</div> 
				<?php
			break;
			
			case 2 :
				?>
					<div class="dice-container">  
						<div class="dice dice-2">  
							<div class="dice-indicator indicator-1"></div>  
							<div class="dice-indicator indicator-2"></div>  
						</div>  
					</div> 
				<?php
			break;
			
			case 3 :
				?>
					<div class="dice-container">  
						<div class="dice dice-3">  
							<div class="dice-indicator indicator-1"></div>  
							<div class="dice-indicator indicator-2"></div>  
							<div class="dice-indicator indicator-3"></div>  
						</div>  
					</div> 
				<?php
			break;
			
			case 4 :
				?>
					<div class="dice-container">  
						<div class="dice dice-4">  
							<div class="dice-indicator indicator-1"></div>  
							<div class="dice-indicator indicator-2"></div>  
							<div class="dice-indicator indicator-3"></div>  
							<div class="dice-indicator indicator-4"></div>  
						</div>  
					</div> 
				<?php
			break;
			
			case 5 :
				?>
					<div class="dice-container">  
						<div class="dice dice-5">  
							<div class="dice-indicator indicator-1"></div>  
							<div class="dice-indicator indicator-2"></div>  
							<div class="dice-indicator indicator-3"></div>  
							<div class="dice-indicator indicator-4"></div>  
							<div class="dice-indicator indicator-5"></div>  
						</div>  
					</div> 
				<?php
			break;
			
			case 6 :
				?>
					<div class="dice-container">  
						<div class="dice dice-6">  
							<div class="dice-indicator indicator-1"></div>  
							<div class="dice-indicator indicator-2"></div>  
							<div class="dice-indicator indicator-3"></div>  
							<div class="dice-indicator indicator-4"></div>  
							<div class="dice-indicator indicator-5"></div>  
							<div class="dice-indicator indicator-6"></div>  
						</div>  
					</div> 
				<?php
			break;
		}		
	}	
?>