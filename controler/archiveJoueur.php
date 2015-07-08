<?php 
    $ordre = "LOGIN ASC";
    if(isset($_GET["ordre"]))
    {
        $ordre = $_GET["ordre"];
    }
    
    $login = "";
    if(isset($_GET["login"]))
    {
        $login = $_GET["login"];
    }
    
    $listeJoueur = User::Lister($ordre,$login);
    include("view/pubs.php");
    include("view/archiveJoueur.php");
?>