<?php 
     
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
    
    $listeAventurier = Aventurier::Lister($ordre,$nom);
    include("view/pubs.php");
    include("view/archiveAventurier.php");
?>