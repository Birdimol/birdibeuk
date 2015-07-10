<?php 
    include("view/pubs.php");
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "action_creation")
        {
            $armes = Arme::ListerBase();
            $equipements = Equipement::ListerBase();
            $protections = Protection::ListerBase();
            
            $types_arme = Arme::ListerTypesArmeDeBase();
            $types_protection = Protection::ListerTypesProtectionDeBase();                
            $types_equipement = Equipement::ListerTypesEquipementDeBase();
            
            $metiers = Metier::Lister();
            $origines = Origine::Lister();
            $competences = Competence::Lister();
            
            $aventurier = new Aventurier();
            $aventurier->set_all_from_form($_POST);
            
            $magies = Magie::Lister();
            $dieux = Dieu::Lister();
            
            //remise à 0 des objets
            $aventurier->armes = array();
            $aventurier->equipements = array();
            $aventurier->protections = array();
            
            foreach($_POST as $key=>$value)
            {
                if(strpos($key,"nomNouvelEqui") !== false)
                {
                    $id = substr($key,13);
                    $nom = $value;
                    $prix = $_POST["prixNouvelEqui".$id];
                    $pa = 0;
                    $pc = 0;
                    $prix = explode(".",$prix);
                    $po = $prix[0];
                    if(empty($po))
                    {
                        $po = 0;
                    }
                    if(count($prix) > 1)
                    {
                        $pa = substr($prix[1],0,1);
                        $pc = substr($prix[1],1,1);
                    }                
                    
                    $nouvelEquipement = new Equipement();
                    $nouvelEquipement->NOM = $nom;
                    $nouvelEquipement->PO = $po;
                    $nouvelEquipement->PA = $pa;
                    $nouvelEquipement->PC = $pc;
                    
                    $nouvelEquipement->ajouter();
                
                    $nbr = $_POST["hidNombreNouvelEqui".$id];
                    $precieux = 0;
                    if(isset($_POST["NouvelEqui".$id."precieux"]))
                    {
                        $precieux = 1;
                    }
                    for($a=0;$a<$nbr;$a++)
                    {
                        $aventurier->ajouterEquipement($nouvelEquipement->ID,$precieux);
                    }
                }
                else if(strpos(substr($key,0,4),"Equi") !== false)
                {
                    $id = substr($key,4);
                    $nbr = $_POST["HidNbrEqui".$value];
                    $precieux = 0;
                    if(isset($_POST["EquiPrecieux".$value]))
                    {
                        $precieux = 1;
                    }
                    for($a=0;$a<$nbr;$a++)
                    {
                        $aventurier->ajouterEquipement($value,$precieux);      
                    } 
                }
                else if(strpos(substr($key,0,10),"competence") !== false)
                {
                    $id = substr($key,10);               
                    $aventurier->ajouterCompetence($id);
                }
                else if(strpos($key,"nomNouvelArme") !== false)
                {
                    $id = substr($key,13);
                    $nom = $value;
                    $po = $_POST["poNouvelArme".$id];
                    $pi = $_POST["piNouvelArme".$id];
                    $rup = $_POST["rupNouvelArme".$id];
                    $at = $_POST["atNouvelArme".$id];
                    $prd = $_POST["prdNouvelArme".$id];
                    $cou = $_POST["couNouvelArme".$id];
                    $int = $_POST["intNouvelArme".$id];
                    $cha = $_POST["chaNouvelArme".$id];
                    $ad = $_POST["adNouvelArme".$id];
                    $fo = $_POST["foNouvelArme".$id];
                    $type = $_POST["typeNouvelArme".$id];
                    
                    $nouvelArme = new Arme();
                    $nouvelArme->NOM = $nom;
                    $nouvelArme->PRIX = $po;
                    $nouvelArme->PI = $pi;
                    $nouvelArme->RUP = $rup;
                    $nouvelArme->AT = $at;
                    $nouvelArme->PRD = $prd;
                    $nouvelArme->COU = $cou;
                    $nouvelArme->INT = $int;
                    $nouvelArme->CHA = $cha;
                    $nouvelArme->AD = $ad;
                    $nouvelArme->FO = $fo;
                    $nouvelArme->type = $type;
                    $nouvelArme->munition = 0;
                    $nouvelArme->debase = 0;
                    $nouvelArme->FO = $fo;
                    $nouvelArme->ajouter();
                    
                    $aventurier->ajouterArme($nouvelArme->ID);
                }
                else if(strpos(substr($key,0,4),"Arme") !== false)
                {              
                    $aventurier->ajouterArme($value);
                }
                else if(strpos($key,"nomNouvelProt") !== false)
                {
                    $id = substr($key,13);
                    $nom = $value;
                    $po = $_POST["PONouvelProt".$id];
                    $pi = $_POST["PRNouvelProt".$id];
                    $rup = $_POST["RUPNouvelProt".$id];
                    
                    $at = $_POST["ATNouvelProt".$id];
                    $prd = $_POST["PRDNouvelProt".$id];
                    $cou = $_POST["COUNouvelProt".$id];
                    $int = $_POST["INTNouvelProt".$id];
                    $cha = $_POST["CHANouvelProt".$id];
                    $ad = $_POST["ADNouvelProt".$id];
                    $fo = $_POST["FORNouvelProt".$id];
                    
                    $type = $_POST["TYPENouvelProt".$id];
                    
                    $nouvelProtection = new Protection();
                    $nouvelProtection->NOM = $nom;
                    $nouvelProtection->PRIX = $po;
                    $nouvelProtection->PI = $pi;
                    $nouvelProtection->RUP = $rup;
                    
                    $nouvelProtection->AT = $at;
                    $nouvelProtection->PRD = $prd;
                    $nouvelProtection->COU = $cou;
                    $nouvelProtection->INT = $int;
                    $nouvelProtection->CHA = $cha;
                    $nouvelProtection->AD = $ad;
                    $nouvelProtection->FO = $fo;
                    
                    $nouvelProtection->TYPE = $type;
                    
                    $nouvelProtection->debase = 0;
                    $nouvelProtection->ajouter();
                    
                    $aventurier->ajouterProtection($nouvelProtection->ID);
                }
                else if(strpos(substr($key,0,4),"Prot") !== false)
                {              
                    $aventurier->ajouterProtection($value);
                }
            }
            
            $aventurier->ajouter();
        
            include("view/ficheRapideModification.php");
        }
        if($_GET["action"] == "modification")
        {
            $aventurier = new Aventurier($_GET["id_aventurier"]);
     
            if($aventurier->codeacces == $_GET["codeacces"])
            {
                $armes = Arme::ListerBase();
				$equipements = Equipement::ListerBase();
				$protections = Protection::ListerBase();
				
				$types_arme = Arme::ListerTypesArmeDeBase();
				$types_protection = Protection::ListerTypesProtectionDeBase();                
				$types_equipement = Equipement::ListerTypesEquipementDeBase();
                
                $metiers = Metier::Lister();
                $origines = Origine::Lister();
                $competences = Competence::Lister();
                
                $magies = Magie::Lister();
                $dieux = Dieu::Lister();
                
                include("view/ficheRapideModification.php");
            }
            else
            {
                $message = "vous n&apos;avez pas le bon code d&apos;accès.";
                include("view/message.php");
            }
        }
        if($_GET["action"] == "supprimer")
        {
            $aventurier = new Aventurier($_GET["id_aventurier"]);
     
            if($aventurier->codeacces == $_GET["codeacces"])
            {
                $armes = Arme::ListerBase();
				$equipements = Equipement::ListerBase();
				$protections = Protection::ListerBase();
				
				$types_arme = Arme::ListerTypesArmeDeBase();
				$types_protection = Protection::ListerTypesProtectionDeBase();                
				$types_equipement = Equipement::ListerTypesEquipementDeBase();
                
                $metiers = Metier::Lister();
                $origines = Origine::Lister();
                $competences = Competence::Lister();
                include("view/ficheRapideSupression.php");
            }            
            else
            {
                $message = "vous n&apos;avez pas le bon code d&apos;accès.";
                include("view/message.php");
            }
        }
        if($_GET["action"] == "action_suppression")
        {
            $aventurier = new Aventurier($_GET["id_aventurier"]);
     
            if($aventurier->codeacces == $_GET["codeacces"])
            {
                $aventurier->supprimer();
                
                $listeAventurier = Aventurier::Lister("NOM ASC","");
                include("view/pubs.php");
                include("view/archiveAventurier.php");
            }            
            else
            {
                $message = "vous n&apos;avez pas le bon code d&apos;accès.";
                include("view/message.php");
            }
        }
        if($_GET["action"] == "action_modification")
        {
            $aventurier = new Aventurier($_GET["id_aventurier"]);

            if($aventurier->codeacces == $_GET["codeacces"])
            {
                $armes = Arme::ListerBase();
				$equipements = Equipement::ListerBase();
				$protections = Protection::ListerBase();
				$types_arme = Arme::ListerTypesArmeDeBase();
				$types_protection = Protection::ListerTypesProtectionDeBase();                
				$types_equipement = Equipement::ListerTypesEquipementDeBase();
                
                $metiers = Metier::Lister();
                $origines = Origine::Lister();
                $competences = Competence::Lister();
                
                $aventurier->set_all_from_form($_POST);
                
                //remise à 0 des objets
                $aventurier->armes = array();
                $aventurier->equipements = array();
                $aventurier->protections = array();
                
                foreach($_POST as $key=>$value)
                {
                    if(strpos($key,"nomNouvelEqui") !== false)
                    {
                        $id = substr($key,13);
                        $nom = $value;
                        $prix = $_POST["prixNouvelEqui".$id];
                        
                        $prix = explode(".",$prix);
                        
                        $po = $prix[0];
                        $pa = 0;
                        $pc = 0;
                        if(count($prix) > 1)
                        {
                            $pa = substr($prix[1],0,1);
                            $pc = substr($prix[1],1,1);
                        }                
                        
                        $nouvelEquipement = new Equipement();
                        $nouvelEquipement->NOM = $nom;
                        $nouvelEquipement->PO = $po;
                        $nouvelEquipement->PA = $pa;
                        $nouvelEquipement->PC = $pc;
                        
                        $nouvelEquipement->ajouter();
                        $nbr = $_POST["hidNombreNouvelEqui".$id];
                        
                        $precieux = 0;
                        if(isset($_POST["NouvelEqui".$id."precieux"]))
                        {
                            $precieux = 1;
                        }
                        
                        for($a=0;$a<$nbr;$a++)
                        {
                            $aventurier->ajouterEquipement($nouvelEquipement->ID, $precieux);
                        }
                    }
                    else if(strpos(substr($key,0,4),"Equi") !== false)
                    {
                        if($value != "on")
                        {
                            $id = substr($key,4);
                            $nbr = $_POST["HidNbrEqui".$value];
                            $precieux = 0;
                            if(isset($_POST["EquiPrecieux".$value]))
                            {
                                $precieux = 1;
                            }
                            for($a=0;$a<$nbr;$a++)
                            {
                                $aventurier->ajouterEquipement($value, $precieux);      
                            }
                        }                                                       
                    }
                    else if(strpos(substr($key,0,10),"competence") !== false)
                    {
                        $id = substr($key,10);               
                        $aventurier->ajouterCompetence($id);
                    }
                    else if(strpos($key,"nomNouvelArme") !== false)
                    {
                        $id = substr($key,13);
                        $nom = $value;
                        $po = $_POST["poNouvelArme".$id];
                        $pi = $_POST["piNouvelArme".$id];
                        $rup = $_POST["rupNouvelArme".$id];
                        $at = $_POST["atNouvelArme".$id];
                        $prd = $_POST["prdNouvelArme".$id];
                        $cou = $_POST["couNouvelArme".$id];
                        $int = $_POST["intNouvelArme".$id];
                        $cha = $_POST["chaNouvelArme".$id];
                        $ad = $_POST["adNouvelArme".$id];
                        $fo = $_POST["foNouvelArme".$id];
                        $type = $_POST["typeNouvelArme".$id];
                        
                        $nouvelArme = new Arme();
                        $nouvelArme->NOM = $nom;
                        $nouvelArme->PRIX = $po;
                        $nouvelArme->PI = $pi;
                        $nouvelArme->RUP = $rup;
                        $nouvelArme->AT = $at;
                        $nouvelArme->PRD = $prd;
                        $nouvelArme->COU = $cou;
                        $nouvelArme->INT = $int;
                        $nouvelArme->CHA = $cha;
                        $nouvelArme->AD = $ad;
                        $nouvelArme->FO = $fo;
                        $nouvelArme->type = $type;
                        $nouvelArme->munition = 0;
                        $nouvelArme->debase = 0;
                        $nouvelArme->FO = $fo;
                        $nouvelArme->ajouter();
                        
                        $aventurier->ajouterArme($nouvelArme->ID);
                    }
                    else if(strpos(substr($key,0,4),"Arme") !== false)
                    {              
                        $aventurier->ajouterArme($value);
                    }
                    else if(strpos($key,"nomNouvelProt") !== false)
                    {
                        $id = substr($key,13);
                        $nom = $value;
                        $po = $_POST["PONouvelProt".$id];
                        $pi = $_POST["PRNouvelProt".$id];
                        $rup = $_POST["RUPNouvelProt".$id];
                        
                        $at = $_POST["ATNouvelProt".$id];
                        $prd = $_POST["PRDNouvelProt".$id];
                        $cou = $_POST["COUNouvelProt".$id];
                        $int = $_POST["INTNouvelProt".$id];
                        $cha = $_POST["CHANouvelProt".$id];
                        $ad = $_POST["ADNouvelProt".$id];
                        $fo = $_POST["FORNouvelProt".$id];
                        
                        $type = $_POST["TYPENouvelProt".$id];
                        
                        $nouvelProtection = new Protection();
                        $nouvelProtection->NOM = $nom;
                        $nouvelProtection->PRIX = $po;
                        $nouvelProtection->PI = $pi;
                        $nouvelProtection->RUP = $rup;
                        
                        $nouvelProtection->AT = $at;
                        $nouvelProtection->PRD = $prd;
                        $nouvelProtection->COU = $cou;
                        $nouvelProtection->INT = $int;
                        $nouvelProtection->CHA = $cha;
                        $nouvelProtection->AD = $ad;
                        $nouvelProtection->FO = $fo;
                        
                        $nouvelProtection->TYPE = $type;
                        
                        $nouvelProtection->debase = 0;
                        $nouvelProtection->ajouter();
                        
                        $aventurier->ajouterProtection($nouvelProtection->ID);
                    }
                    else if(strpos(substr($key,0,4),"Prot") !== false)
                    {              
                        $aventurier->ajouterProtection($value);
                    }
                }   
                $aventurier->modifier();
                
                $magies = Magie::Lister();
                $dieux = Dieu::Lister();
                
                include("view/ficheRapideModification.php");
                
            }
            else
            {
                $message = "vous n&apos;avez pas le bon code d&apos;accès.";
                include("view/message.php");
            }
        }
    }
    else
    {
        $armes = Arme::ListerBase();
        $equipements = Equipement::ListerBase();
        $protections = Protection::ListerBase();
        
        $types_arme = Arme::ListerTypesArmeDeBase();
        $types_protection = Protection::ListerTypesProtectionDeBase();                
        $types_equipement = Equipement::ListerTypesEquipementDeBase();
        
        $metiers = Metier::Lister();
        $origines = Origine::Lister();
        $competences = Competence::Lister();
        
        $magies = Magie::Lister();
        $dieux = Dieu::Lister();
       
        include("view/ficheRapide.php");
    }
    
    
	
?>