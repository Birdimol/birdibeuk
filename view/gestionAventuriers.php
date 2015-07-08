<div class='principal_avec_pub'>
	<h1 style='text-align:center;'>Gérer ses aventuriers</h1>
	<p style='text-align:center'>
		<form action='index.php' method='get' style='text-align:center'>
			Je cherche un aventurier dont le nom s'écrit ou commence par &nbsp;&nbsp;
			<input type='text' name='nom' value='<?php if(isset($_GET["nom"])){echo $_GET["nom"];}?>' />
			<input type='hidden' name='ctrl' value='gestionAventuriers' />
			<input type='submit' value='Chercher' />
		</form>
	</p>
	<table style='margin:auto;'>
		<tr>
			<th style='width:200px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("NOM");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>' >Nom</a></u></th>
			<th style='width:100px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("SEXE");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>Sexe</a></u></th>
			<th style='width:100px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("ID_METIER");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>Métier</a></u></th>
			<th style='width:100px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("ID_ORIGINE");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>Origine</a></u></th>
			<th style='width:50px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("NIVEAU");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>Niveau</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("EV");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>EV</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("EA");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>EA</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("COU");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>COU</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("INT");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>INT</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("CHA");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>CHA</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("AD");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>AD</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("FO");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>FO</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("AT");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>AT</a></u></th>
			<th style='width:30px'><u><a href='index.php?ctrl=gestionAventuriers&ordre=<?php 
				trouveBonFiltre("PRD");
				if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
			?>'>PRD</a></u></th>
			<th style='width:200px'><u>Actions</u></th>
		</tr>
		<?php 
			foreach($listeAventurier as $aventurier)
			{
				include("view/aventurierLigne.php");
			}
		?>
	</table>
</div>