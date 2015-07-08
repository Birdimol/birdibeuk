<?php 
    $listeUser = User::Lister();
    include(__DIR__."/../view/pubs.php");
    include(__DIR__."/../view/carteRoliste.php");
?>