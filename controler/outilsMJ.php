<?php 
    include("view/pubs.php");
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "fiche_MJ_aventuriers_selection")
        {
            $aventuriers = Aventurier::Lister();
            include("view/fiche_MJ_aventuriers_selection.php");
        }
        else if($_GET["action"] == "fiche_MJ_aventuriers_creation")
        {            
            include("view/fiche_MJ_aventuriers_creation.php");
        }         
    }
    else
    {
        include("view/outilsMJ.php");
    }
    
    
	
?>