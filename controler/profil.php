<?php 
    $modificationAutorisee=false;
    if(isset($_GET["idJoueur"]))
    {
        $user = new User($_GET["idJoueur"]);        
    }
    else
    {
        $modificationAutorisee=true;
        $user = unserialize($_SESSION["birdibeuk_user"]);
        $user = new User($user->id);    
    }
    include(__DIR__."/../view/pubs.php");
    include(__DIR__."/../view/profil.php");
    
?>