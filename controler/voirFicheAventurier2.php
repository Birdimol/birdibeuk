<?php 
	$aventurier = new Aventurier($_GET["aventurier"]);
    include(__DIR__."/../view/pubs.php");
	include(__DIR__."/../view/voirFicheAventurier2.php");
	
?>