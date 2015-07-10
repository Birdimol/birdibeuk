<?php 
    include("view/pubs.php");
    if(isset($_GET["etape"]))
    {
        switch($_GET["etape"])
        {
            case 7:
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                
                //remise à 0 des objets
                $aventurier->armes = array();
                $aventurier->equipements = array();
                $aventurier->protections = array();
                
                foreach($_POST as $key=>$value)
                {
                    if(strpos(substr($key,0,4),"Equi") !== false)
                    {
                        $id = substr($key,4);
                        $nbr = $_POST["HidNbrEqui".$value];
                        for($a=0;$a<$nbr;$a++)
                        {
                            $aventurier->ajouterEquipement($value);      
                        }            
                    }
                    else if(strpos(substr($key,0,4),"Arme") !== false)
                    {              
                        $aventurier->ajouterArme($value);
                    }
                    else if(strpos(substr($key,0,4),"Prot") !== false)
                    {              
                        $aventurier->ajouterProtection($value);
                    }
                }          
                
                //on ajoute les compétences héritées
                foreach($aventurier->METIER->COMPETENCESLIEES as $competence)
                {
                    $aventurier->ajouterCompetence($competence->ID);
                }
                
                foreach($aventurier->ORIGINE->COMPETENCESLIEES as $competence)
                {
                    $aventurier->ajouterCompetence($competence->ID);
                }
                
                $aventurier->ajouter();
                $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                
                include("view/finCreationNouvelAventurier.php");            
            break;
            
            case 6:                
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                $armes = Arme::ListerBase();
                $equipements = Equipement::ListerBase();
                $protections = Protection::ListerBase();
                
                $types_arme = Arme::ListerTypesArme();
                $types_protection = Protection::ListerTypesProtection();
                $types_equipement = Equipement::ListerTypesEquipementDeBase();
                
                //Ici on va traiter tous les cas particuliers 
                //si c'est un ranger
                if($aventurier->METIER->NOM == "Ranger")
                {
                    if(isset($_GET["competenceRetiree"]))
                    {
                        $aventurier->$_GET["competenceRetiree"]--;
                        $aventurier->$_GET["competenceAjoutee"]++;
                    }
                }
                //si c'est un guerrier
                else if($aventurier->METIER->NOM == "Guerrier")
                {
                    if(isset($_GET["competenceRetiree"]))
                    {
                        $aventurier->$_GET["competenceRetiree"]--;
                        $aventurier->$_GET["competenceAjoutee"]++;
                    }
                }
                //si c'est un marchand
                else if($aventurier->METIER->NOM == "Marchand")
                {
                    $aventurier->$_GET["competenceRetiree"]--;
                    $aventurier->$_GET["competenceAjoutee"]++;
                }
                // si c'est un ingénieur
                else if($aventurier->METIER->NOM == "Ingenieur")
                {
                    $aventurier->$_GET["competenceRetiree"]--;
                    $aventurier->$_GET["competenceAjoutee"]++;
                }                
                //si c'est un mage
                else if($aventurier->METIER->NOM == "Mage")
                {
                    $aventurier->ID_TYPEMAGIE = $_GET["magie"];
                }
                //si c'est un pretre //si c'est un paladin 
                else if($aventurier->METIER->NOM == "Pretre" || $aventurier->METIER->NOM == "Paladin")
                {
                    $aventurier->ID_DIEU = $_GET["dieu"];
                }                      
                    
                //si c'est un ogre
                
                
                $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                
                //si il a 13 ou plus en adresse
                    /*
                        On peut augmenter au choix la PRD ou l'AT
                    */
                if($aventurier->AD > 12)
                {
                    include("view/nouvelAventurierSpecialAD.php");
                }
                else
                {
                    include("view/nouvelAventurierEquipement.php");
                }
            break;
            
            case 5:
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                
                if(isset($_GET["OR"]))
                {
                    $aventurier->OR = $_GET["OR"];
                }
                
                if(isset($_GET["DESTIN"]))
                {
                    $aventurier->DESTIN = $_GET["DESTIN"];
                }
                
                //Ici on va traiter tous les cas particuliers 
                //si c'est un ranger
                if($aventurier->METIER->NOM == "Ranger")
                {
                    include("view/nouvelAventurierSpecialRanger.php");
                }
                //si c'est un guerrier                    
                else if($aventurier->METIER->NOM == "Guerrier")
                {
                    /*
                        Peut choisir au niveau 1 d'échanger 1 point d'ATTAQUE avec 1 point de PARADE, ou inversement
                    */ 
                    include("view/nouvelAventurierSpecialGuerrier.php");
                }
                //si c'est un marchand
                else if($aventurier->METIER->NOM == "Marchand")
                {
                    /*
                        En raison de son érudition, au niveau 1 le marchand doit retirer 1 point à l'attaque ou à la parade, qu'il pourra ajouter au
                        choix à l'intelligence ou au charisme
                    */
                    include("view/nouvelAventurierSpecialMarchand.php");
                }
                // si c'est un ingénieur
                else if($aventurier->METIER->NOM == "Ingenieur")
                {
                    /*
                        En raison de sa spécialisation technique, au niveau 1 l'ingénieur doit retirer 1 point à l'attaque ou à la parade, qu'il pourra
                        ajouter au choix à l'intelligence ou à l'adresse
                    */
                    include("view/nouvelAventurierSpecialIngenieur.php");
                }
                else if($aventurier->METIER->NOM == "Mage")
                {
                    /*
                        Choisir spécialité
                    */
                    $magies = Magie::Lister();
                    include("view/nouvelAventurierSpecialMage.php");
                }
                else if($aventurier->METIER->NOM == "Pretre")
                {
                    //si c'est un pretre 
                    /*
                        Choisir dieu
                    */
                    $dieux = Dieu::Lister();
                    include("view/nouvelAventurierSpecialPretre.php");
                }
                else if($aventurier->METIER->NOM == "Paladin")
                {
                    //si c'est un paladin 
                    /*
                        Choisir dieu
                    */   
                    $dieux = Dieu::Lister();
                    include("view/nouvelAventurierSpecialPaladin.php");
                }
                else
                {
                    $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                    $armes = Arme::ListerBase();
                    $equipements = Equipement::ListerBase();
                    $protections = Protection::ListerBase();
                    
                    $types_arme = Arme::ListerTypesArme();
                    $types_protection = Protection::ListerTypesProtection();
                    $types_equipement = Equipement::ListerTypesEquipementDeBase();
                    include("view/nouvelAventurierEquipement.php");
                }
                                              
                    
                //si c'est un ogre
                    /*
                        L'Ogre a le droit de retrancher jusqu'à 3 points à son score de base en ATTAQUE et/ou en PARADE
                        pour en faire un bonus de dégâts (au corps à corps, toutes armes confondues). Ainsi il peut avoir +3 en dégâts en plus de ses
                        autres bonus de FORCE, mais son côté bourrin le rend maladroit. Le bonus est à choisir en début de carrière et ne pourra
                        être modifié par la suite.
                    */     

            break;
            
            case 4:
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                
                if($_GET["competence1"] != 0)
                {
                    $aventurier->ajouterCompetence($_GET["competence1"]);
                }
                
                if($_GET["competence2"] != 0)
                {
                    $aventurier->ajouterCompetence($_GET["competence2"]);
                }
                
                $aventurier->OR = rand(2,12)*10;
                
                if($aventurier->METIER->NOM == "Bourgeois")
                {
                    $aventurier->OR += rand(2,12)*10;
                }
				$bourgeois = true;
                
                $aventurier->DESTIN = rand(0,3);
                
                $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                
                include("view/nouvelAventurierOrEtDestin.php");
            break;
            
            case 3:
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                $aventurier->NOM = $_GET["nom"];
                $aventurier->SEXE = $_GET["sexe"];
                $aventurier->NIVEAU = 1;
                $aventurier->XP = 0;
                
                $aventurier->ID_ORIGINE = $_GET["origine"];
                $aventurier->ID_METIER = $_GET["metier"];
                
                //Calcul des EV, EA, etc...
                $aventurier->determineCaracs();
                $aventurier->determineCompetences();
                
                $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                
                $competencesLiees = fusionneCompetencesSansDoublons($aventurier->METIER->COMPETENCESLIEES,$aventurier->ORIGINE->COMPETENCESLIEES);
                
                if($aventurier->ORIGINE->NOM == "Humain" && $aventurier->METIER->NOM == "Aucun")
                {
                    $competencesAChoisir = getCompetencesAChoisirPourHumainSansProfession();
                }
                else
                {
                    $competencesAChoisir = fusionneCompetencesSansDoublons($aventurier->METIER->COMPETENCESACHOISIR,$aventurier->ORIGINE->COMPETENCESACHOISIR);
                }
                
                $competencesAChoisir = TableauExclusionCompetence($competencesAChoisir,$competencesLiees);
                
                include("view/nouvelAventurierCompetences.php");
            break;
            
            case 2 :
                $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
                if(isset($_GET["COU"]) && isset($_GET["INT"]) && isset($_GET["CHA"]) && isset($_GET["AD"]) && isset($_GET["FO"]))
                {
                    $aventurier->COU = $_GET["COU"];
                    $aventurier->INT = $_GET["INT"];
                    $aventurier->FO  = $_GET["FO"];
                    $aventurier->CHA = $_GET["CHA"];
                    $aventurier->AD  = $_GET["AD"];
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    
                    $listeOrigines = Origine::getOriginesPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    $listeMetiers = Metier::getMetiersPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    
                    include("view/nouvelAventurierOrigineEtMetier.php");
                    include("view/cadrePDF.php");
                }
                else if(isset($_GET["metier"]) && isset($_GET["origine"]))
                {
                    //On a choisi un metier et une origine specifique
                    $origine = new Origine($_GET["origine"]);
                    $metier = new Metier($_GET["metier"]);
                    
                    $limites = getBornesCaracsParOrigineEtMetier($origine, $metier);
                    
                    $aventurier->COU = rand($limites["COUMIN"],$limites["COUMAX"]);
                    $aventurier->INT = rand($limites["INTMIN"],$limites["INTMAX"]);
                    $aventurier->FO = rand($limites["FOMIN"],$limites["FOMAX"]);
                    $aventurier->CHA = rand($limites["CHAMIN"],$limites["CHAMAX"]);
                    $aventurier->AD = rand($limites["ADMIN"],$limites["ADMAX"]);
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    
                    $listeOrigines = array($origine);
                    $listeMetiers = array($metier);
                    
                    include("view/nouvelAventurierOrigineEtMetier.php");
                    include("view/cadrePDF.php");
                }
                else if(isset($_GET["metier"]))
                {
                    //On a choisi un metier specifique
                    $metier = new Metier($_GET["metier"]);
                    
                    $limites = getBornesCaracsParMetier($metier);
                    
                    $aventurier->COU = rand($limites["COUMIN"],$limites["COUMAX"]);
                    $aventurier->INT = rand($limites["INTMIN"],$limites["INTMAX"]);
                    $aventurier->FO = rand($limites["FOMIN"],$limites["FOMAX"]);
                    $aventurier->CHA = rand($limites["CHAMIN"],$limites["CHAMAX"]);
                    $aventurier->AD = rand($limites["ADMIN"],$limites["ADMAX"]);
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    
                    $listeOrigines = Origine::getOriginesPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    $listeMetiers = array($metier);
                    
                    include("view/nouvelAventurierOrigineEtMetier.php");
                    include("view/cadrePDF.php");
                }
                else if(isset($_GET["origine"]))
                {
                    //On a choisi un origine specifique
                    $origine = new Origine($_GET["origine"]);
                    
                    $limites = getBornesCaracsParOrigine($origine);
                    
                    $aventurier->COU = rand($limites["COUMIN"],$limites["COUMAX"]);
                    $aventurier->INT = rand($limites["INTMIN"],$limites["INTMAX"]);
                    $aventurier->FO = rand($limites["FOMIN"],$limites["FOMAX"]);
                    $aventurier->CHA = rand($limites["CHAMIN"],$limites["CHAMAX"]);
                    $aventurier->AD = rand($limites["ADMIN"],$limites["ADMAX"]);
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    
                    $listeOrigines = array($origine);
                    $listeMetiers = Metier::getMetiersPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    
                    include("view/nouvelAventurierOrigineEtMetier.php");
                    include("view/cadrePDF.php");
                }
                else
                {
                    //total random
                    $aventurier->COU = rand(8,13);
                    $aventurier->INT = rand(8,13);
                    $aventurier->FO = rand(8,13);
                    $aventurier->CHA = rand(8,13);
                    $aventurier->AD = rand(8,13);
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    
                    $listeOrigines = Origine::getOriginesPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    $listeMetiers = Metier::getMetiersPossibles($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
                    
                    include("view/nouvelAventurierOrigineEtMetier.php");
                    include("view/cadrePDF.php");
                }
            break;
            
            case 1 :
                if(isset($_GET["type"]))
                {
                    //On commence un nouvel aventurier
                    $aventurier = new Aventurier();
                    $listeOrigines = Origine::Lister();
                    $listeMetiers = Metier::Lister();
                    $aventurier->type = $_GET["type"];
                    $_SESSION["birdibeuk_aventurier"] = serialize($aventurier);
                    include("view/nouvelAventurierDesCaracs.php");
                    include("view/cadrePDF.php");
                }
                else
                {
                    include("view/nouvelAventurier.php");
                }
            break;
            
            case 0 :
            default :
                include("view/nouvelAventurier.php");
            break;
        }
    }    
    else
    {
    	include("view/nouvelAventurier.php");
    }
	
?>