<?php
class Aventurier 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $SEXE;		
    private $ID_ORIGINE;
    private $ID_METIER;		
    private $EV;		
    private $EA;		
    private $COU;		
    private $INT;		
    private $CHA;		
    private $AD;		
    private $FO;		
    private $AT;		
    private $PRD;		
    private $XP;		
    private $DESTIN;		
    private $OR;		
    private $ARGENT;		
    private $CUIVRE;		
    private $NIVEAU;
    
    private $METIER;
    private $ORIGINE;
    
    private $idjoueur;
    private $type;
    
    private $MAGIEPHYS;
    private $MAGIEPSY;
    private $RESISTMAG;    
    private $ID_TYPEMAGIE;
    private $ID_DIEU;
    
    private $DIEU;
    
    private $COMPETENCESCHOISIES;
    private $COMPETENCESLIEES;
    private $competences;
    
    private $PR_MAX;
    private $PR;
    
    private $codeacces;
    
    private $armes;
    private $protections;
    private $equipements;

    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $SEXE_envoye = '', $ID_ORIGINE_envoye = '', $ID_METIER_envoye = '', 
    $EV_envoye = '', $EA_envoye = '', $COU_envoye = '', $INT_envoye = '', $CHA_envoye = '', $AD_envoye = '', $FO_envoye = '', $AT_envoye = '', 
    $PRD_envoye = '', $XP_envoye = '', $DESTIN_envoye = '', $OR_envoye = '', $ARGENT_envoye = '', $CUIVRE_envoye = '', $NIVEAU_envoye = '', 
    $idjoueur_envoye = 0, $type_envoye = 0, $MAGIEPHYS_envoye = '' , $MAGIEPSY_envoye = '', $RESISTMAG_envoye = '', 
    $ID_TYPEMAGIE_envoye = 0, $ID_DIEU_envoye = 0, $COMPETENCESCHOISIES_envoye = array(), $PR_MAX_envoye = 0, $codeacces_envoye = "", $PR_envoye = 0)
    {
        $this->armes = array();
        $this->protections = array();
        $this->equipements = array();
        
        //si ID
        if(!empty($ID_envoye) && empty($NOM_envoye))
        {
            $this->get_data_from_db($ID_envoye);
        }
        else
        {
            $this->ID = $ID_envoye;
            $this->NOM = $NOM_envoye;
            $this->SEXE = $SEXE_envoye;
            $this->ID_ORIGINE = $ID_ORIGINE_envoye;
            $this->ID_METIER = $ID_METIER_envoye;
            $this->EV = $EV_envoye;
            $this->EA = $EA_envoye;
            $this->COU = $COU_envoye;
            $this->INT = $INT_envoye;
            $this->CHA = $CHA_envoye;
            $this->AD = $AD_envoye;
            $this->FO = $FO_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
            $this->XP = $XP_envoye;
            $this->DESTIN = $DESTIN_envoye;
            $this->OR = $OR_envoye;
            $this->ARGENT = $ARGENT_envoye;
            $this->CUIVRE = $CUIVRE_envoye;
            $this->NIVEAU = $NIVEAU_envoye;
            
            $this->METIER = new METIER($this->ID_METIER);
            $this->ORIGINE = new ORIGINE($this->ID_ORIGINE);
            
            $this->idjoueur = $idjoueur_envoye;
            $this->type = $type_envoye;
            $this->MAGIEPHYS = $MAGIEPHYS_envoye;
            $this->MAGIEPSY = $MAGIEPSY_envoye;
            $this->RESISTMAG = $RESISTMAG_envoye;    
            $this->ID_TYPEMAGIE = $ID_TYPEMAGIE_envoye;
            $this->ID_DIEU = $ID_DIEU_envoye;
            
            $this->COMPETENCESCHOISIES = $COMPETENCESCHOISIES_envoye;
            
            if($this->METIER != "" && $this->ORIGINE != "")
            {
                $this->competences = fusionneCompetencesSansDoublons($this->METIER->COMPETENCESLIEES,$this->ORIGINE->COMPETENCESLIEES);
            }
            else 
            {
                $this->competences = $this->ORIGINE->COMPETENCESLIEES;
            }
            
            $this->competences = fusionneCompetencesSansDoublons($this->COMPETENCESCHOISIES,$this->COMPETENCESLIEES);
            
            $this->PR_MAX = $PR_MAX_envoye;
            $this->PR = $PR_envoye;
            $this->codeacces = $codeacces_envoye;
        }
    }

    //get
    public function __get($var)
    {
        return $this->$var;	
    }
    
    //set
    public function __set($var, $value)
    {
        if($var == "ID_ORIGINE")
        {
            $this->ID_ORIGINE = $value;
            $origine = new Origine();
            $origine->get_data_from_db($value);
            $this->ORIGINE = $origine;
        }
        else if($var == "ID_METIER")
        {
            $this->ID_METIER = $value;
            $metier = new Metier();
            $metier->get_data_from_db($value);
            $this->METIER = $metier;
        }
        else if($var == "ID_DIEU")
        {
            $this->ID_DIEU = $value;
            $dieu = new Dieu();
            $dieu->get_data_from_db($value);
            $this->DIEU = $dieu;
        }
        else
        {
            $this->$var = $value;            
        }
    }	

    //set all from form
    public function set_all_from_form($post)
    {							
        foreach($post as $key=>$value)
        {
            if(isset($this->$key))
            {
                $this->$key = $value;
                if($key == "ID_ORIGINE")
                {                    
                    $this->ORIGINE = new ORIGINE($this->ID_ORIGINE);
                }
                else if($key == "ID_METIER")
                {
                    $this->METIER = new METIER($this->ID_METIER);
                }
            }
        }
    }

    public function print_form()
    {
        ?>
        <table>
            <input type='hidden' id='ID' value='<?php echo $this->ID; ?>' name='ID' />
            <tr><td><label for='NOM'>NOM</label></td><td><input type='text' id='NOM' value='<?php echo $this->NOM; ?>' name='NOM' /></td></tr>
            <tr><td><label for='SEXE'>SEXE</label></td><td><input type='text' id='SEXE' value='<?php echo $this->SEXE; ?>' name='SEXE' /></td></tr>
            <tr><td><label for='ID_ORIGINE'>ID_ORIGINE</label></td><td><input type='text' id='ID_ORIGINE' value='<?php echo $this->ID_ORIGINE; ?>' name='ID_ORIGINE' /></td></tr>
            <tr><td><label for='ID_METIER'>ID_METIER</label></td><td><input type='text' id='ID_METIER' value='<?php echo $this->ID_METIER; ?>' name='ID_METIER' /></td></tr>
            <tr><td><label for='EV'>EV</label></td><td><input type='text' id='EV' value='<?php echo $this->EV; ?>' name='EV' /></td></tr>
            <tr><td><label for='EA'>EA</label></td><td><input type='text' id='EA' value='<?php echo $this->EA; ?>' name='EA' /></td></tr>
            <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $this->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $this->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $this->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $this->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FO'>FO</label></td><td><input type='text' id='FO' value='<?php echo $this->FO; ?>' name='FO' /></td></tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $this->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $this->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='XP'>XP</label></td><td><input type='text' id='XP' value='<?php echo $this->XP; ?>' name='XP' /></td></tr>
            <tr><td><label for='DESTIN'>DESTIN</label></td><td><input type='text' id='DESTIN' value='<?php echo $this->DESTIN; ?>' name='DESTIN' /></td></tr>
            <tr><td><label for='OR'>OR</label></td><td><input type='text' id='OR' value='<?php echo $this->OR; ?>' name='OR' /></td></tr>
            <tr><td><label for='ARGENT'>ARGENT</label></td><td><input type='text' id='ARGENT' value='<?php echo $this->ARGENT; ?>' name='ARGENT' /></td></tr>
            <tr><td><label for='CUIVRE'>CUIVRE</label></td><td><input type='text' id='CUIVRE' value='<?php echo $this->CUIVRE; ?>' name='CUIVRE' /></td></tr>
            <tr><td><label for='NIVEAU'>NIVEAU</label></td><td><input type='text' id='NIVEAU' value='<?php echo $this->NIVEAU; ?>' name='NIVEAU' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister($ordre = "NOM ASC",$nom="")
    {
        $ordre = str_replace("ID_METIER","METIER.NOM",$ordre);
        $ordre = str_replace("ID_ORIGINE","ORIGINE.NOM",$ordre);
        
        $ordre = strtolower($ordre);
        
        $db = getConnexionDB();
        $requete = "SELECT aventurier.* FROM aventurier join origine on origine.ID = ID_ORIGINE join metier on metier.ID = ID_METIER ";

        if(!empty($nom))
        {
            $requete .= " WHERE aventurier.NOM LIKE '".$nom."%'";
        }

        $requete .= " ORDER BY ".$ordre;

        $tableau = array();
        $stmt = $db->prepare($requete);

        if(!$stmt->execute())
        {
            if(DEBUG)
            {
                $debug .= "<br>ERROR : ".$requete;
            }
        }

        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new aventurier($rs['ID'], $rs['NOM'], $rs['SEXE'], $rs['ID_ORIGINE'], $rs['ID_METIER'], $rs['EV'], $rs['EA'], $rs['COU'], 
            $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FO'], $rs['AT'], $rs['PRD'], $rs['XP'], $rs['DESTIN'], $rs['OR'], $rs['ARGENT'], $rs['CUIVRE'], 
            $rs['NIVEAU'], $rs['idjoueur'], $rs['type'],
            $rs['MAGIEPHYS'],
            $rs['MAGIEPSY'],
            $rs['RESISTMAG'],
            $rs['ID_TYPEMAGIE'],
            $rs['ID_DIEU'],
			array(),
            $rs['PR_MAX'],
            $rs['codeacces'],
            $rs['PR']);
        }
        return $tableau;
    }
	
	public static function ListerMesAventuriers($ordre = "NOM ASC",$nom="")
	{
		$ordre = str_replace("ID_METIER","METIER.NOM",$ordre);
        $ordre = str_replace("ID_ORIGINE","ORIGINE.NOM",$ordre);
        
        $ordre = strtolower($ordre);
		
		if(!isset($_SESSION["birdibeuk_user"]))
		{
			return array();
		}
		
		$db = getConnexionDB();		
		
		$user = unserialize($_SESSION["birdibeuk_user"]);
		
        $requete = "SELECT aventurier.* FROM aventurier join origine on origine.ID = ID_ORIGINE join metier on metier.ID = ID_METIER ";

        $requete .= " WHERE aventurier.idjoueur = ".$user->id;      

		if(!empty($nom))
        {
            $requete .= " AND aventurier.NOM LIKE '".$nom."%'";
        }		
	
		$requete .= " ORDER BY ".$ordre;

        $tableau = array();
        $stmt = $db->prepare($requete);

        if(!$stmt->execute())
        {
            if(DEBUG)
            {
                $debug .= "<br>ERROR : ".$requete;
            }
        }

        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new aventurier($rs['ID'], $rs['NOM'], $rs['SEXE'], $rs['ID_ORIGINE'], $rs['ID_METIER'], $rs['EV'], $rs['EA'], $rs['COU'], 
            $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FO'], $rs['AT'], $rs['PRD'], $rs['XP'], $rs['DESTIN'], $rs['OR'], $rs['ARGENT'], $rs['CUIVRE'], 
            $rs['NIVEAU'], $rs['idjoueur'], $rs['type'],
            $rs['MAGIEPHYS'],
            $rs['MAGIEPSY'],
            $rs['RESISTMAG'],
            $rs['ID_TYPEMAGIE'],
            $rs['ID_DIEU'],
			array(),
            $rs['PR_MAX'],
            $rs['codeacces'],
            $rs['PR']);
        }
        return $tableau;
	}
    
    public function verifieValeurs()
    {       
        if(empty($this->ID_ORIGINE)){$this->ID_ORIGINE = 0;}
        if(empty($this->ID_METIER)){$this->ID_METIER = 0;}
        if(empty($this->EV)){$this->EV = 0;}
        if(empty($this->EA)){$this->EA = 0;}
        
        if(empty($this->COU)){$this->COU = 0;}
        if(empty($this->FOR)){$this->FOR = 0;}
        if(empty($this->AT)){$this->AT = 0;}
        if(empty($this->PRD)){$this->PRD = 0;}
        if(empty($this->AD)){$this->AD = 0;}
        if(empty($this->CHA)){$this->CHA = 0;}
        if(empty($this->INT)){$this->INT = 0;}        
        
        if(empty($this->XP)){$this->XP = 0;}
        if(empty($this->DESTIN)){$this->DESTIN = 0;}
        
        if(empty($this->OR)){$this->OR = 0;}
        if(empty($this->ARGENT)){$this->ARGENT = 0;}
        if(empty($this->CUIVRE)){$this->CUIVRE = 0;}
        
        if(empty($this->NIVEAU)){$this->NIVEAU = 0;}
        if(empty($this->idjoueur)){$this->idjoueur = 0;}
        if(empty($this->type) || $this->type=="aventurier"){$this->type = 0;}
        if(empty($this->MAGIEPHYS)){$this->MAGIEPHYS = 0;}
        if(empty($this->MAGIEPSY)){$this->MAGIEPSY = 0;}
        if(empty($this->RESISTMAG)){$this->RESISTMAG = 0;}
        if(empty($this->ID_TYPEMAGIE)){$this->ID_TYPEMAGIE = 0;}
        if(empty($this->ID_DIEU)){$this->ID_DIEU = 0;}
        if(empty($this->PR_MAX)){$this->PR_MAX = 0;}
        if(empty($this->PR)){$this->PR = 0;}        
    }
    
    public function calculProtection()
    {
        $this->PR = 0;
        
        foreach($this->protections as $protection)
        {
            $this->PR += $protection->PR;
        }
    }

    public function ajouter()
    {
        $this->verifieValeurs();
        $this->calculProtection();
        
        $db = getConnexionDB();
        
        if(empty($this->codeacces))
        {
            $temp = md5(rand(0,9999999999999999999));
            $this->codeacces = substr($temp,0,10);
        }
		
		if(isset($_SESSION["birdibeuk_user"]))
		{
			$user = unserialize($_SESSION["birdibeuk_user"]);
			$this->idjoueur = $user->id;
		}
        
        $requete = "INSERT INTO aventurier (NOM, SEXE, ID_ORIGINE, ID_METIER, EV, EA, COU, `INT`, CHA, AD, FO, AT, PRD, XP, DESTIN, `OR`, ARGENT, CUIVRE, 
        NIVEAU, idjoueur, `type` ,MAGIEPHYS, MAGIEPSY, RESISTMAG, ID_TYPEMAGIE, ID_DIEU, PR_MAX,codeacces,PR) 
        VALUES ('".$this->NOM."', '".$this->SEXE."', ".$this->ID_ORIGINE.", ".$this->ID_METIER.", ".$this->EV.", ".$this->EA.", ".$this->COU.", ".$this->INT.", ".
        $this->CHA.", ".$this->AD.", ".$this->FO.", ".$this->AT.", ".$this->PRD.", ".$this->XP.", ".$this->DESTIN.", ".$this->OR.", ".$this->ARGENT.", ".
        $this->CUIVRE.", ".$this->NIVEAU.", ".$this->idjoueur.", ".$this->type.", ".$this->MAGIEPHYS.", ".$this->MAGIEPSY.", ".$this->RESISTMAG.", ".
        $this->ID_TYPEMAGIE.", ".$this->ID_DIEU.", ".$this->PR_MAX.", '".$this->codeacces."', ".$this->PR.")";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID = $db->lastInsertId(); 
        
        foreach($this->COMPETENCESCHOISIES as $competence)
        {
            $requete = "INSERT INTO lien_aventurier_competence (ID_AVENTURIER, ID_COMPETENCE) VALUES (".$this->ID.",".$competence->ID.")";    
            $stmt = $db->prepare($requete);
            $stmt->execute();
        }
        
        foreach($this->equipements as $equipement)
        {
            for($a=0;$a<$equipement->nombre;$a++)
            {
                $requete = "INSERT INTO lien_aventurier_equipement (id_aventurier, id_equipement, precieux) VALUES (".$this->ID.",".$equipement->ID.",".$equipement->precieux.")";    
                $stmt = $db->prepare($requete);
                $stmt->execute();
            }
        }
        
        foreach($this->armes as $arme)
        {
            $requete = "INSERT INTO lien_aventurier_arme (id_aventurier, id_arme) VALUES (".$this->ID.",".$arme->ID.")";    
            $stmt = $db->prepare($requete);
            $stmt->execute();
        }
        
        foreach($this->protections as $protection)
        {
            $requete = "INSERT INTO lien_aventurier_protection (id_aventurier, id_protection) VALUES (".$this->ID.",".$protection->ID.")";  
  
            $stmt = $db->prepare($requete);
            $stmt->execute();
        }
    }

    public function modifier()
    {
        $this->verifieValeurs();
        
        //si cet aventurier n'appartient à personne, alors la personne qui le modifie en premier en prend possession
        if($this->idjoueur == 0)
        {
            if(isset($_SESSION["birdibeuk_user"]))
            {
                if($_SESSION["birdibeuk_user"] != false)
                {
                    $user = unserialize($_SESSION["birdibeuk_user"]);
                    $this->idjoueur = $user->id;
                }
            }
        }
        
        $db = getConnexionDB();
        $requete = "UPDATE aventurier SET NOM = '".$this->NOM."',idjoueur = ".$this->idjoueur.", SEXE = '".$this->SEXE."', ID_ORIGINE = ".$this->ID_ORIGINE.", 
        ID_METIER = ".$this->ID_METIER.", EV = ".$this->EV.", EA = ".$this->EA.", COU = ".$this->COU.", `INT` = ".$this->INT.", CHA = ".$this->CHA.", 
        AD = ".$this->AD.", FO = ".$this->FO.", AT = ".$this->AT.", PRD = ".$this->PRD.", XP = ".$this->XP.", DESTIN = ".$this->DESTIN.", 
        `OR` = ".$this->OR.", ARGENT = ".$this->ARGENT.", CUIVRE = ".$this->CUIVRE.", NIVEAU = ".$this->NIVEAU.", `TYPE` = ".$this->type." ,
        MAGIEPHYS = ".$this->MAGIEPHYS.", MAGIEPSY = ".$this->MAGIEPSY.", RESISTMAG = ".$this->RESISTMAG.", ID_TYPEMAGIE = ".
        $this->ID_TYPEMAGIE.", ID_DIEU = ".$this->ID_DIEU.", PR_MAX = ".$this->PR_MAX.",PR = ".$this->PR.", codeacces = '".$this->codeacces."'
        WHERE ID = ".$this->ID;
        
        
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM lien_aventurier_competence where ID_AVENTURIER = :ID_AVENTURIER";    
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':ID_AVENTURIER', $this->ID);
        $stmt->execute();
                    
        foreach($this->COMPETENCESCHOISIES as $competence)
        {
            if($competence->ID != "" && $competence->ID != 0)
            {
                $requete = "INSERT INTO lien_aventurier_competence (ID_AVENTURIER, ID_COMPETENCE) VALUES (".$this->ID.",".$competence->ID.")";   

                $stmt = $db->prepare($requete);
                $stmt->execute();
            }
        }
        
        $requete = "DELETE FROM lien_aventurier_equipement where ID_AVENTURIER = :ID_AVENTURIER";    
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':ID_AVENTURIER', $this->ID);
        $stmt->execute();
        
        foreach($this->equipements as $equipement)
        {
            for($a=0;$a<$equipement->nombre;$a++)
            {
                $requete = "INSERT INTO lien_aventurier_equipement (id_aventurier, id_equipement, precieux) VALUES (".$this->ID.",".$equipement->ID.",".$equipement->precieux.")";    

                $stmt = $db->prepare($requete);
                $stmt->execute();
            }
        }
        
        $requete = "DELETE FROM lien_aventurier_arme where ID_AVENTURIER = :ID_AVENTURIER";    
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':ID_AVENTURIER', $this->ID);
        $stmt->execute();
        
        foreach($this->armes as $arme)
        {
            $requete = "INSERT INTO lien_aventurier_arme (id_aventurier, id_arme) VALUES (".$this->ID.",".$arme->ID.")";  
  
            $stmt = $db->prepare($requete);
            $stmt->execute();
        }
        
        $requete = "DELETE FROM lien_aventurier_protection where ID_AVENTURIER = :ID_AVENTURIER";    
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':ID_AVENTURIER', $this->ID);
        $stmt->execute();
        
        foreach($this->protections as $protection)
        {
            $requete = "INSERT INTO lien_aventurier_protection (id_aventurier, id_protection) VALUES (".$this->ID.",".$protection->ID.")";  
  
            $stmt = $db->prepare($requete);
            $stmt->execute();
        }
        
        
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        
        $requete = "DELETE FROM lien_aventurier_arme WHERE ID_AVENTURIER = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM lien_aventurier_competence WHERE ID_AVENTURIER = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM lien_aventurier_equipement WHERE ID_AVENTURIER = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM lien_aventurier_protection WHERE ID_AVENTURIER = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM lien_aventurier_precieux WHERE ID_AVENTURIER = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $requete = "DELETE FROM aventurier WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM aventurier WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->COMPETENCESCHOISIES = array();
        $this->COMPETENCESLIEES = array();
     
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->SEXE = $ligne['SEXE']; 
        $this->ID_ORIGINE = $ligne['ID_ORIGINE']; 
        $this->ID_METIER = $ligne['ID_METIER']; 
        $this->EV = $ligne['EV']; 
        $this->EA = $ligne['EA']; 
        $this->COU = $ligne['COU']; 
        $this->INT = $ligne['INT']; 
        $this->CHA = $ligne['CHA']; 
        $this->AD = $ligne['AD']; 
        $this->FO = $ligne['FO']; 
        $this->AT = $ligne['AT']; 
        $this->PRD = $ligne['PRD']; 
        $this->XP = $ligne['XP']; 
        $this->DESTIN = $ligne['DESTIN']; 
        $this->OR = $ligne['OR']; 
        $this->ARGENT = $ligne['ARGENT']; 
        $this->CUIVRE = $ligne['CUIVRE']; 
        $this->NIVEAU = $ligne['NIVEAU'];
        $this->idjoueur = $ligne['idjoueur'];
        $this->type = $ligne['type'];
        
        $this->METIER = new METIER($this->ID_METIER);
        $this->ORIGINE = new ORIGINE($this->ID_ORIGINE);
        
        $this->MAGIEPHYS = $ligne['MAGIEPHYS'];
        $this->MAGIEPSY = $ligne['MAGIEPSY'];
        $this->RESISTMAG = $ligne['RESISTMAG'];
        $this->ID_TYPEMAGIE = $ligne['ID_TYPEMAGIE'];
        $this->ID_DIEU = $ligne['ID_DIEU'];
        $this->PR_MAX = $ligne['PR_MAX'];
        $this->PR = $ligne['PR'];
        
        $this->codeacces = $ligne['codeacces'];
        
        $this->DIEU = new Dieu($this->ID_DIEU);
        
        $this->majCompetenceDB();
        $this->majEquipementDB();
        $this->majArmeDB();
        $this->majProtectionDB();
    }
    
    public function ajouterCompetence($ID_COMPETENCE)
    {
        $temp = new Competence($ID_COMPETENCE);
        if(!in_array($temp,$this->COMPETENCESCHOISIES))
        {
            if($temp->ID != 0 && $temp->ID != "")
            {
                $this->COMPETENCESCHOISIES[] = $temp;
            }
        }
        $this->competences = fusionneCompetencesSansDoublons($this->COMPETENCESCHOISIES,$this->COMPETENCESLIEES);
    }
    
    public function possedeCompetence($competence)
    {
        if(!in_array($competence,$this->competences))
        {
            return false;
        }
        return true;
    }
    
    public function ajouterArme($ID_ARME)
    {
        $temp = new Arme($ID_ARME);
        /*if(!in_array($temp,$this->armes))
        {*/
            $this->armes[] = $temp;
        //}        
    }
    
    public function ajouterEquipement($ID_Equipement, $precieux = 0)
    {
        $temp;       
        if(is_object($ID_Equipement))
        {
            $temp = $ID_Equipement;
        }
        else
        {
            $temp = new Equipement($ID_Equipement);            
        }
        
        if($precieux)
        {
            $temp->precieux = 1;
        }
        
        $arrayId = array();
        foreach($this->equipements as $key=>$equi)
        {
            $arrayId[$key] = $equi->ID;
        }
        
        if(!in_array($temp->ID,$arrayId))
        {
            $this->equipements[] = $temp;
        }
        else
        {
            $index = array_search($temp->ID,$arrayId);
            $this->equipements[$index]->nombre++;
        }
    }
    
    public function supprimerArme($ID_ARME)
    {
        $temp = new Arme($ID_ARME);
        if(($index = array_search($temp,$this->armes)) !== false)
        {
            unset($this->armes[$index]);
            $temp2 = $this->armes;
            $this->armes = array_values($temp2);
        }        
    }
    
    public function ajouterProtection($ID_protection)
    {
        $temp = new Protection($ID_protection);
        /*if(!in_array($temp,$this->protections))
        {*/
            $this->protections[] = $temp;
        /*}   */     
    }
    
    public function supprimerProtection($ID_protection)
    {
        $temp = new Protection($ID_protection);
        if(($index = array_search($temp,$this->protections)) !== false)
        {
            unset($this->protections[$index]);
            $temp2 = $this->protections;
            $this->protections = array_values($temp2);
        }        
    }
    
    public function majCompetenceDB()
    {
        $db = getConnexionDB();
        
        $requete = "SELECT * FROM lien_aventurier_competence WHERE ID_AVENTURIER = ".$this->ID;  

        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $this->competences = array();
        
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
           $comp = new Competence($ligne["ID_COMPETENCE"]);
           $this->competences[] = $comp;
        }        
    }  
    
    public function majEquipementDB()
    {
        $db = getConnexionDB();
        
        $requete = "SELECT * FROM lien_aventurier_equipement WHERE ID_AVENTURIER = ".$this->ID;  
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $this->equipements = array();
        
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $comp = new Equipement($ligne["ID_EQUIPEMENT"]);
            if($ligne["precieux"])
            {
                $this->ajouterEquipement($comp, 1);
            }
            else
            {
                $this->ajouterEquipement($comp, 0);
            }            
        }        
    }  
    
    public function majArmeDB()
    {
        $db = getConnexionDB();
        
        $requete = "SELECT * FROM lien_aventurier_arme WHERE ID_AVENTURIER = ".$this->ID;  
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $this->armes = array();
        
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
           $comp = new Arme($ligne["ID_ARME"]);
           $this->armes[] = $comp;
        }        
    }  
    
    public function majProtectionDB()
    {
        $db = getConnexionDB();
        
        $requete = "SELECT * FROM lien_aventurier_protection WHERE ID_AVENTURIER = ".$this->ID;  
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $this->protections = array();
        
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
			$comp = new Protection($ligne["ID_PROTECTION"]);

			$this->protections[] = $comp;
        }        
    }  
    
    public function determineCompetences()
    {
        if($this->METIER != "" && $this->ORIGINE != "")
        {
            $this->COMPETENCESLIEES = fusionneCompetencesSansDoublons($this->METIER->COMPETENCESLIEES,$this->ORIGINE->COMPETENCESLIEES);
        }
        
        if(empty($this->ID))
        {
            return;
        }
        
        $db = getConnexionDB();
        
        $requete = "SELECT * FROM lien_aventurier_competence WHERE ID_AVENTURIER = ".$this->ID;  
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        
        $this->COMPETENCESCHOISIES = array();
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
           $comp = new Competence();
           $this->COMPETENCESCHOISIES[] = $comp;
        }
        
        $this->competences = fusionneCompetencesSansDoublons($this->COMPETENCESCHOISIES,$this->COMPETENCESLIEES);
    }
    
    public function determineCaracs()
    {
        $this->EV = $this->ORIGINE->EV;
        $this->PR_MAX = $this->ORIGINE->PRMAX;
        
        if($this->METIER->PRMAX != 0 && (($this->METIER->PRMAX < $this->ORIGINE->PRMAX) || ($this->ORIGINE->PRMAX == 0)))
        {
            $this->PR_MAX = $this->METIER->PRMAX;
        }
        
        if($this->METIER->NOM == "Guerrier")
        {
            if($this->ORIGINE->NOM != "Barbare")
            {
                $this->EV += 5; 
            }
        }
        else if($this->METIER->NOM == "Paladin")
        {
            $this->MAGIEPHYS = ceil(($this->INT + $this->AD) /2);
            $this->MAGIEPSY = ceil(($this->INT + $this->CHA) /2);
            
            $this->EV += 2;
        }
        else if($this->METIER->EV != 0)
        {
            $this->MAGIEPHYS = ceil(($this->INT + $this->AD) /2);
            $this->MAGIEPSY = ceil(($this->INT + $this->CHA) /2);
            
            if($this->ORIGINE->NOM == "Humain" && $this->METIER->NOM == "Mage")
            {
                $this->EV = 20;
            }
            else
            {
                $this->EV = ceil($this->EV  - ($this->EV * $this->METIER->EV) / 100);
            }            
        }
        
        $this->RESISTMAG = ceil(($this->INT + $this->COU + $this->FO) /3);
        
        $this->EA = $this->METIER->EA;
        
        $this->AT = 8;
        $this->PRD = 10;
        if($this->ORIGINE->NOM == "Barbare" || $this->ORIGINE->NOM == "Ogre" || $this->ORIGINE->NOM == "Orque")
        {
            $this->AT = $this->AT+1;
            $this->PRD = $this->PRD-1;
        }
        if($this->ORIGINE->NOM == "Gnome")
        {
            $this->AT = $this->AT+2;
            $this->PRD = $this->PRD-2;
        }
        
        if($this->METIER->NOM == "Assassin")
        {
            $this->AT = 11;
             $this->PRD = 8;
        }
        
        if($this->METIER->NOM == "Bourgeois")
        {
            $this->AT = 7;
            $this->PRD = 9;
        }
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
    
    public function printAsTable()
    {
        $aventurier = $this;
       ?>
        <style>
        td
        {
            padding:5px;
        }
    </style>
    <table style='margin:auto;border-collapse:collapse;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
    <tr><td colspan='2'  style='border-bottom:1px #900000 solid;text-align:center;'><?php echo $aventurier->NOM; ?></td></tr>
        <tr>
            <td colspan='2'  style='border-bottom:1px #900000 solid;text-align:center;'>
                <?php echo $aventurier->ORIGINE->NOM." "; 
                if( $aventurier->METIER->NOM == "Aucun")
                {
                    echo "sans profession";
                }
                else
                {
                    echo $aventurier->METIER->NOM;
                }
                ?>
            </td>
        </tr>
    <tr><td style='vertical-align:top;'>
        <table style='background-image:url("image/bg3.png");margin:auto;border-collapse:collapse;'>
        
        <tr><td>Courage <?php getValeurCaracM($aventurier->COU); ?> : </td><td> <?php echo $aventurier->COU; ?> </td></tr>
        <tr><td>Intelligence <?php getValeurCaracF($aventurier->INT); ?> : </td><td> <?php echo $aventurier->INT; ?> </td></tr>
        <tr><td>Charisme <?php getValeurCaracM($aventurier->CHA); ?> : </td><td> <?php echo $aventurier->CHA; ?> </td></tr>
        <tr><td>Adresse <?php getValeurCaracF($aventurier->AD); ?> : </td><td> <?php echo $aventurier->AD; ?>	</td></tr>
        <tr><td style='border-bottom:1px #900000 solid;'>Force <?php getValeurCaracF($aventurier->FO); ?> : </td><td style='border-bottom:1px #900000 solid;'> <?php echo $aventurier->FO; ?> </td></tr>
        <tr><td>Energie Vitale (EV) :</td><td> <?php echo $aventurier->EV; ?> </td></tr>
        <?php 
            if($aventurier->EA != 0)
            {
                ?>
                    <tr><td>Energie Astrale (EA)</td><td> <?php echo $aventurier->EA; ?> </td></tr>
                <?php
            }

            if($aventurier->MAGIEPSY != 0)
            {
                ?>
                    <tr><td>Score de Magie Psychique : </td><td> <?php echo $aventurier->MAGIEPSY; ?> </td></tr>
                <?php
            }

            if($aventurier->MAGIEPHYS != 0)
            {
                ?>
                    <tr><td>Score de Magie Physique : </td><td> <?php echo $aventurier->MAGIEPHYS; ?> </td></tr>
                <?php
            }
        ?>
        <tr><td style='border-top:1px #900000 solid;'>Attaque :</td><td style='border-top:1px #900000 solid;'> <?php echo $aventurier->AT; ?> </td></tr>
        <tr><td>Parade :</td><td> <?php echo $aventurier->PRD; ?> </td></tr>
        <tr><td>Protection maximum : </td><td> <?php if($aventurier->PR_MAX == 0){echo "pas de limite";}else{echo $aventurier->PR_MAX;} ?> </td></tr>
        <tr><td style='border-top:1px #900000 solid;'>Résistance Magique :</td><td style='border-top:1px #900000 solid;'> <?php echo $aventurier->RESISTMAG; ?> </td></tr>
        </table>
        </td>
        <td style='vertical-align:top;border-left:1px #900000 solid;'>
        <table style='background-image:url("image/bg3.png");margin:auto;border-collapse:collapse;'>    
        <?php 
        
            if(count($aventurier->COMPETENCESLIEES) > 0)
            {
                echo "<tr><td colspan='2' style='border-bottom:1px #900000 dotted;text-align:center;'>Competences héritées</td></tr>";
            }
        
            foreach($aventurier->COMPETENCESLIEES as $competence)
            {
                echo "<tr><td colspan='2'>".$competence->NOM."</td></tr>";
            }

            if(count($aventurier->COMPETENCESCHOISIES) > 0)
            {
                echo "<tr><td colspan='2' style='border-top:1px #900000 solid;border-bottom:1px #900000 dotted;text-align:center;'>Competences choisies</td></tr>";
            }
            
            foreach($aventurier->COMPETENCESCHOISIES as $competence)
            {
                echo "<tr><td colspan='2'>".$competence->NOM."</td></tr>";
            }
            
            if(!empty($this->OR != 0))
            {
                echo "<tr><td style='border-top:1px #900000 solid;'>Or possédé : </td><td style='border-top:1px #900000 solid;'>".$this->OR."</td></tr>";
            }
            
             if(!empty($this->DESTIN != null))
            {
                echo "<tr><td >Point(s) de destin : </td><td>".$this->DESTIN."</td></tr>";
            }
        ?>        
        </table>
    </td>
    </tr>
    </table><br>
        <?php
    }
}
