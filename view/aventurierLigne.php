<tr>
    <td><?php echo $aventurier->NOM; ?></td>
    <td><?php echo $aventurier->SEXE; ?></td>
    <td><?php echo $aventurier->METIER; ?></td>
    <td><?php echo $aventurier->ORIGINE; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->NIVEAU; ?></td>    
    <td style='text-align:center;'><?php echo $aventurier->EV; ?></td>    
    <td style='text-align:center;'><?php echo $aventurier->EA; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->COU; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->INT; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->CHA; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->AD; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->FO; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->AT; ?></td>
    <td style='text-align:center;'><?php echo $aventurier->PRD; ?></td>
    <td style='text-align:center;'>
        <a href='index.php?ctrl=voirFicheAventurier&aventurier=<?php echo $aventurier->ID; ?>' ><img src='image/icon/scroll.png' style='width:25px;height:25px;' /></a>
        <a href='index.php?ctrl=voirFicheAventurier2&aventurier=<?php echo $aventurier->ID; ?>' ><img src='image/icon/scroll2.png' style='width:25px;height:25px;' /></a>
    <?php 
		if(isset($_SESSION["birdibeuk_user"]))
		{
			if(!isset($user))
			{
				$user = unserialize($_SESSION["birdibeuk_user"]);
			}
			
			if($user->id == $aventurier->idjoueur || $user->admin)
			{
				echo "&nbsp;&nbsp;<a href='index.php?ctrl=ficheRapide&action=modification&id_aventurier=".$aventurier->ID."&codeacces=".$aventurier->codeacces."' >Modifier</a>";
				echo "&nbsp;&nbsp;<a href='index.php?ctrl=ficheRapide&action=supprimer&id_aventurier=".$aventurier->ID."&codeacces=".$aventurier->codeacces."' >Supprimer</a>";
			}
		}
	?>
	</td>
</tr>