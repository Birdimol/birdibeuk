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
                    $equipements = Equipement::Lister();
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementListe.php");
                break;
                
                case "modifier" :
                    $equipement = new Equipement($_GET["id"]);
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementModifier.php");
                break;
                
                case "ajouter_action" :
                    $equipement = new Equipement();                    
                    $equipement->set_all_from_form($_POST);
                    $equipement->ajouter();
                    $equipements = Equipement::Lister();
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementListe.php");
                break;
                
                case "supprimer" :
                    $equipement = new Equipement($_GET["id"]);
                    $equipement->supprimer();
                    $equipements = Equipement::Lister();
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementListe.php");
                break;
                
                case "ajouter" :                    
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementAjouter.php");                    
                break;
                
                case "modifier_action" :
                    $equipement = new Equipement($_POST["ID"]);                   
                    $equipement->set_all_from_form($_POST);   
                    $equipement->modifier();
                    $types_equipement = Equipement::ListerTypesEquipement();
                    include("view/equipementModifier.php");
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