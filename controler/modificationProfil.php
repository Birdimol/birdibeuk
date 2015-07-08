<?php 
    include(__DIR__."/../view/pubs.php");
    if(isset($_POST["id"]))
    {
        $user = new User();
        $user->set_all_from_form($_POST);
        $userConnected = unserialize($_SESSION["birdibeuk_user"]);
        if($user->id == $userConnected->id)
        {
            $user->modifier();
            $user->get_data_from_db($user->id);
            $_SESSION["birdibeuk_user"] = serialize($user);
            include(__DIR__."/../view/editProfil.php");
        }
        else
        {
            include(__DIR__."/../view/404.php");  
        }
    }
    else
    {
        include(__DIR__."/../view/404.php");  
    }
    
?>