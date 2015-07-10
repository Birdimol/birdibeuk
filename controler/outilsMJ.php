<?php 
    include("view/pubs.php");
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "fiche_MJ_aventuriers_selection")
        {
            $aventuriers = Aventurier::Lister();
            $mesAventuriers = Aventurier::ListerMesAventuriers("NOM", "");
            include("view/fiche_MJ_aventuriers_selection.php");
        }
        else if($_GET["action"] == "fiche_MJ_aventuriers_creation")
        {            
            include("view/fiche_MJ_aventuriers_creation.php");
        }    
        else if($_GET["action"] == "fiche_mob")
        {
            $mobs = Mob::Lister();
            include("view/fiche_mob.php");
        }
        else if($_GET["action"] == "creation_fiche_mob")
        {
            $armes = Arme::Lister();
            $equipements = Equipement::Lister();
            $protections = Protection::Lister();
            
            include("view/creation_fiche_mob.php");
        }
    }
    else
    {
        include("view/outilsMJ.php");
    }
    
    
	
?>