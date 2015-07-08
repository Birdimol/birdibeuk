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
                    $users = User::Lister();
                    include("view/userListe.php");
                break;
                
                case "modifier" :
                    $user_ = new User($_GET["id"]);
                    include("view/userModifier.php");
                break;
                
                case "modifier_action" :
                    $user_ = new User($_POST["id"]);
                    
                    if(!isset($_POST["mj"])){$_POST["mj"] = 0;}else{$_POST["mj"] = 1;}
                    if($user->superadmin)
                    {
                        if(!isset($_POST["admin"])){$_POST["admin"] = 0;}else{$_POST["admin"] = 1;}                
                        if(!isset($_POST["superadmin"])){$_POST["superadmin"] = 0;}else{$_POST["superadmin"] = 1;}
                    }
                    
                    $user_->set_all_from_form($_POST);
                    $user_->modifier();
                    include("view/userModifier.php");
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