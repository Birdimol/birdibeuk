<?php 
    include("view/pubs.php");
    
	$ordre = "NOM ASC";
    if(isset($_GET["ordre"]))
    {
        $ordre = $_GET["ordre"];
    }
    
    $nom = "";
    if(isset($_GET["nom"]))
    {
        $nom = $_GET["nom"];
    }
	
	$listeAventurier = Aventurier::ListerMesAventuriers($ordre, $nom); 
	
    include("view/gestionAventuriers.php");
?>