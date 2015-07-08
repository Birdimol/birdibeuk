<?php 
    if(isset($user))
    {
        if($user->admin || $user->superadmin)
        {
            $action = "liste";
            if(isset($_GET["action"]))
            {
                $action = $_GET["action"];
            }
            
            switch($action)
            {
                case "liste" :
                    $armes = Arme::Lister();
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeListe.php");
                break;
                
                case "modifier" :
                    $arme = new Arme($_GET["id"]);
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeModifier.php");
                break;
                
                case "ajouter_action" :
                    $arme = new Arme();                    
                    $arme->set_all_from_form($_POST);
                    $arme->ajouter();
                    $armes = Arme::Lister();
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeListe.php");
                break;
                
                case "supprimer" :
                    $arme = new Arme($_GET["id"]);
                    $arme->supprimer();
                    $armes = Arme::Lister();
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeListe.php");
                break;
                
                case "ajouter" :
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeAjouter.php");
                break;
                
                case "modifier_action" :
                    $arme = new Arme($_POST["ID"]);
                    
                    $arme->set_all_from_form($_POST);
                    $arme->modifier();
                    $types_arme = Arme::ListerTypesArme();
                    include("view/armeModifier.php");
                break;
            }
        }
        else
        {
            $message = "<span style='color:red;'>Accès refusé.</span>";
            include("view/message.php");
        }
    }
    else
    {        
        $message = "<span style='color:red;'>Accès refusé.</span>";
        include("view/message.php");
    }
    
?>