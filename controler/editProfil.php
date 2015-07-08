<?php 
    include(__DIR__."/../view/pubs.php");
    if(isset($_SESSION["birdibeuk_user"]))
    {
        $user = unserialize($_SESSION["birdibeuk_user"]);
        include(__DIR__."/../view/editProfil.php");
    }
    else
    {
        include(__DIR__."/../view/404.php");
    }
?>