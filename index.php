<?php 
	session_start();
        
	include(__DIR__."/config/param.php");
	include(__DIR__."/model/autoloader.php");
	include(__DIR__."/model/GeneralFunctions.php");
	include(__DIR__."/model/dice.php");
    
	include(__DIR__."/view/haut_page.php");
    include(__DIR__."/view/menu.php");	
    
    $user = null;
    if(isset($_SESSION["birdibeuk_user"]))
    {        
        if($user = unserialize($_SESSION["birdibeuk_user"]))
        {           
            if($user->admin || $user->superadmin)
            {
                include(__DIR__."/view/menuAdmin.php");	
            }
        }
    }
    
    if(isset($_GET["ctrl"]))
	{
		if(is_file(__DIR__."/controler/".$_GET["ctrl"].".php"))
        {
            include(__DIR__."/controler/".$_GET["ctrl"].".php");
        }
        else
        {
            include(__DIR__."/controler/404.php");
        }        
	}
	else
	{		
		include(__DIR__."/controler/defaut.php");
	}
    
	if(strpos(getenv("DOCUMENT_ROOT"),"wamp") !== false)
	{}
	else
	{
		Statistique::add();
	}
	/*
    if(!Visiteur::Manage())
    {
        if(DEBUG)
        {
            global $global_debug;
            logToDebug("Erreur dans le module Visiteur.");
        }
    }*/

    
	include(__DIR__."/view/bas_page.php");
?>
	
