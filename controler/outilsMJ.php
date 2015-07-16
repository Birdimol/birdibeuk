<?php 
    include("view/pubs.php");
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "fiche_MJ_aventuriers_selection")
        {
            $aventuriers = Aventurier::Lister();
            $mesAventuriers = Aventurier::ListerMesAventuriers("NOM","");
            include("view/fiche_MJ_aventuriers_selection.php");
        }
        else if($_GET["action"] == "fiche_MJ_aventuriers_creation")
        {            
            include("view/fiche_MJ_aventuriers_creation.php");
        }    
        else if($_GET["action"] == "fiche_mob")
        {
            $mobs = Mob::Lister();
            include("view/fiche_mob.php");
        }
        else if($_GET["action"] == "creation_fiche_mob")
        {
            $armes = Arme::Lister();
            $equipements = Equipement::Lister();
            $protections = Protection::Lister();
            
            $compte = 0;
            $mobs = array();
            foreach($_POST as $key=>$value)
            {
                if(substr($key,0,3) == "mob")
                {
                    for($a=0; $a<$value; $a++)
                    {
                        $id = substr($key,3);
                        $mob = new Mob($id);
                        $mob->getLoot();
                        $mobs[] = $mob;
                    }
                }
            }
            $_SESSION["mobs"] = serialize($mobs);
            
            include("view/creation_fiche_mob.php");
        }
        else if($_GET["action"] == "simulation_combat")
        {
            $aventuriers = Aventurier::Lister();
            $mesAventuriers = Aventurier::ListerMesAventuriers("NOM", "");
            include("view/simulation_combat_aventuriers_selection.php");
        }
        else if($_GET["action"] == "simulation_combat_mobs_selection")
        {
            $ids = array();
            $aventuriers = array();
            for($a=1;$a<=$_POST["maxID"];$a++)
            {
                if(isset($_POST["aventurier".$a]))
                {
                    $aventurier = new Aventurier($a);
                    $aventuriers[] = $aventurier;
                }
            }
            $mobs = Mob::Lister();
            $_SESSION["sim_combat_aventuriers"] = serialize($aventuriers);
            include("view/simulation_combat_mobs_selection.php");
        }
        else if($_GET["action"] == "creation_simulation_combat")
        {
            $armes = Arme::Lister();
            $equipements = Equipement::Lister();
            $protections = Protection::Lister();
            
            $compte = 0;
            $mobs = array();
            foreach($_POST as $key=>$value)
            {
                if(substr($key,0,3) == "mob")
                {
                    for($a=0; $a<$value; $a++)
                    {
                        $id = substr($key,3);
                        $mob = new Mob($id);
                        $mob->getLoot();
                        $mobs[] = $mob;
                    }
                }
            }
            $_SESSION["sim_combat_mobs"] = serialize($mobs);
            $aventuriers = unserialize($_SESSION["sim_combat_aventuriers"]);
            include("view/simulation_combat.php");
        }
    }
    else
    {
        include("view/outilsMJ.php");
    }
    
    
	
?>