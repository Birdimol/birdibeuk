<?php
class Arme 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $NOM_COURT;		
    private $PRIX;		
    private $PI;		
    private $RUP;		
    private $AT;		
    private $PRD;		
    private $COU;		
    private $INT;		
    private $CHA;		
    private $AD;		
    private $FOR;		
    private $SPECIAL;		
    private $JET;		
    private $qualite;		
    private $type;		
    private $deuxmains;		
    private $debase;		


    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $NOM_COURT_envoye = '', $PRIX_envoye = 0, $PI_envoye = '', $RUP_envoye = '', $AT_envoye = 0, $PRD_envoye = 0, $COU_envoye = 0, $INT_envoye = 0, $CHA_envoye = 0, $AD_envoye = 0, $FOR_envoye = 0, $SPECIAL_envoye = '', $JET_envoye = 0, $qualite_envoye = 1, $type_envoye = '', $deuxmains_envoye = 0,$debase_envoye = 0)
    {
        //si ID
        if(!empty($ID_envoye) && empty($NOM_envoye))
        {
            $this->get_data_from_db($ID_envoye);
        }
        else
        {
            $this->ID = $ID_envoye;
            $this->NOM = $NOM_envoye;
            $this->NOM_COURT = $NOM_COURT_envoye;
            $this->PRIX = $PRIX_envoye;
            $this->PI = $PI_envoye;
            $this->RUP = $RUP_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
            $this->COU = $COU_envoye;
            $this->INT = $INT_envoye;
            $this->CHA = $CHA_envoye;
            $this->AD = $AD_envoye;
            $this->FOR = $FOR_envoye;
            $this->SPECIAL = $SPECIAL_envoye;
            $this->JET = $JET_envoye;
            $this->qualite = $qualite_envoye;
            $this->type = $type_envoye;
            $this->deuxmains = $deuxmains_envoye;
            $this->debase = $debase_envoye;
        }
    }
    
    public function modif()
    {
        $string1 = "";
        $string2 = "";
        
        if(!empty($this->AT))
        {
            $string1.="AT";
            if($this->AT > 0)
            {
                $string1.="+";
            }
            $string1.=$this->AT;
        }
        
        if(!empty($this->PRD))
        {
            if(!empty($string1))
            {
                $string1.= "/";
            }
            $string1.="PRD";
            if($this->PRD > 0)
            {
                $string1.="+";
            }
            $string1.=$this->PRD;
        }
       
        if(!empty($this->COU))
        {
            if(!empty($string2))
            {
                $string2.= "/";
            }
            $string2.="COU";
            if($this->COU > 0)
            {
                $string2.="+";
            }
            $string2.=$this->COU;
        }
        if(!empty($this->INT))
        {
            if(!empty($string2))
            {
                $string2.= "/";
            }
            $string2.="INT";
            if($this->INT > 0)
            {
                $string2.="+";
            }
            $string2.=$this->INT;
        }
        if(!empty($this->CHA))
        {
            if(!empty($string2))
            {
                $string2.= "/";
            }
            $string2.="CHA";
            if($this->CHA > 0)
            {
                $string2.="+";
            }
            $string2.=$this->CHA;
        }
        if(!empty($this->AD))
        {
            if(!empty($string2))
            {
                $string2.= "/";
            }
            $string2.="AD";
            if($this->AD > 0)
            {
                $string2.="+";
            }
            $string2.=$this->AD;
        }
        if(!empty($this->FO))
        {
            if(!empty($string2))
            {
                $string2.= "/";
            }
            $string2.="FO";
            if($this->FO > 0)
            {
                $string2.="+";
            }
            $string2.=$this->FO;
        }
        
        $string = $string1;
        if(!empty($string1) && !empty($string2))
        {
            $string.= "<br>";
        }
        $string.= $string2;
        
        return $string;
    }

    //get
    public function __get($var)
    {
        return $this->$var;	
    }
    
    //set
    public function __set($var, $value)
    {
        $this->$var = $value;
    }	

    //set all from form
    public function set_all_from_form($post)
    {						
        if(!isset($post["deuxmains"]))
        {
            $post["deuxmains"] = 0;
        }
        else
        {
            $post["deuxmains"] = 1;
        }
        
        if(!isset($post["JET"]))
        {
            $post["JET"] = 0;
        }
        else
        {
            $post["JET"] = 1;
        }
        
        if(!isset($post["debase"]))
        {
            $post["debase"] = 0;
        }
        else
        {
            $post["debase"] = 1;
        }
        
        foreach($post as $key=>$value)
        {
            $this->$key = $value;
        }
    }

    public function print_form()
    {
        ?>
        <table>
            <input type='hidden' id='ID' value='<?php echo $this->ID; ?>' name='ID' />
            <tr><td><label for='NOM'>NOM</label></td><td><input type='text' id='NOM' value='<?php echo $this->NOM; ?>' name='NOM' /></td></tr>
            <tr><td><label for='NOM_COURT'>NOM_COURT</label></td><td><input type='text' id='NOM_COURT' value='<?php echo $this->NOM_COURT; ?>' name='NOM_COURT' /></td></tr>
            <tr><td><label for='PRIX'>PRIX</label></td><td><input type='text' id='PRIX' value='<?php echo $this->PRIX; ?>' name='PRIX' /></td></tr>
            <tr><td><label for='PI'>PI</label></td><td><input type='text' id='PI' value='<?php echo $this->PI; ?>' name='PI' /></td></tr>
            <tr><td><label for='RUP'>RUP</label></td><td><input type='text' id='RUP' value='<?php echo $this->RUP; ?>' name='RUP' /></td></tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $this->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $this->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $this->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $this->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $this->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $this->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FOR'>FOR</label></td><td><input type='text' id='FOR' value='<?php echo $this->FOR; ?>' name='FOR' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL</label></td><td><input type='text' id='SPECIAL' value='<?php echo $this->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr><td><label for='JET'>JET</label></td><td><input type='text' id='JET' value='<?php echo $this->JET; ?>' name='JET' /></td></tr>
            <tr><td><label for='qualite'>qualite</label></td><td><input type='text' id='qualite' value='<?php echo $this->qualite; ?>' name='qualite' /></td></tr>
            <tr><td><label for='type'>type</label></td><td><input type='text' id='type' value='<?php echo $this->type; ?>' name='type' /></td></tr>
            <tr><td><label for='deuxmains'>deuxmains</label></td><td><input type='text' id='deuxmains' value='<?php echo $this->deuxmains; ?>' name='deuxmains' /></td></tr>
            <tr><td><label for='debase'>debase</label></td><td><input type='text' id='debase' value='<?php echo $this->debase; ?>' name='debase' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM arme order by nom asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new arme($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PRIX'], $rs['PI'], $rs['RUP'], $rs['AT'], $rs['PRD'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['JET'], $rs['qualite'], $rs['type'], $rs['deuxmains'], $rs['debase']);
        }
        return $tableau;
    }
    
    public static function ListerBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM arme where debase = 1 order by nom asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $temp = new arme($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PRIX'], $rs['PI'], $rs['RUP'], $rs['AT'], $rs['PRD'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['JET'], $rs['qualite'], $rs['type'], $rs['deuxmains'],$rs['debase']);
            $ajouter = true;
            foreach($tableau as $arme)
            {
                if(Arme::ArmesEgales($arme,$temp))
                {
                    $ajouter = false;
                }
            }
            if($ajouter)
            {
                $tableau[] = $temp;
            }            
        }
        return $tableau;
    }
    
    public static function ArmesEgales($arme1,$arme2)
    {
        $attributs = get_object_vars($arme1);
        foreach($attributs as $attribut)
        {
            if(!isset($arme2->$attribut))
            {
                return false;
            }
            else
            {
                if($arme2->$attribut != $arme1->$attribut && $attribut != 'ID')
                {
                    return false;
                }
            }
        }
        return true;
    }
	
	public function verifieValeurs()
    {       
        if(empty($this->PR)){$this->PR = 0;}
        if(empty($this->COU)){$this->COU = 0;}
        if(empty($this->INT)){$this->INT = 0;}
        if(empty($this->CHA)){$this->CHA = 0;}
        if(empty($this->AD)){$this->AD = 0;}
        if(empty($this->FOR)){$this->FOR = 0;}
        if(empty($this->AT)){$this->AT = 0;}
        if(empty($this->PRD)){$this->PRD = 0;}
        if(empty($this->PRIX)){$this->PRIX = 0;}
        if(empty($this->QUALITE)){$this->QUALITE = 0;}
        if(empty($this->debase)){$this->debase = 0;}
    }
    
    //liste
    public static function ListerTypesArme()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM arme order by type asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = $rs['type'];
        }
        return $tableau;
    }
	
	public static function ListerTypesArmeDeBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM arme order by type asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = $rs['type'];
        }
        return $tableau;
    }

    public function ajouter()
    {
		$this->verifieValeurs();
        $db = getConnexionDB();
        $requete = "INSERT INTO arme (NOM, NOM_COURT, PRIX, PI, RUP, AT, PRD, COU, `INT`, CHA, AD, `FOR`, SPECIAL, JET, qualite, `type`, deuxmains, debase) VALUES ('".$this->NOM."', '".$this->NOM_COURT."', ".$this->PRIX.", '".$this->PI."', '".$this->RUP."', ".$this->AT.", ".$this->PRD.", ".$this->COU.", ".$this->INT.", ".$this->CHA.", ".$this->AD.", ".$this->FOR.", '".$this->SPECIAL."', ".$this->JET.", ".$this->qualite.", '".$this->type."', ".$this->deuxmains.", ".$this->debase.")";

        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID = $db->lastInsertId(); 
    }

    public function modifier()
    {
		$this->verifieValeurs();
        $db = getConnexionDB();        
        $requete = "UPDATE arme SET NOM = '".$this->NOM."', NOM_COURT = '".$this->NOM_COURT."', PRIX = ".$this->PRIX.", PI = '".$this->PI."', RUP = '".$this->RUP."', AT = ".$this->AT.", PRD = ".$this->PRD.", COU = ".$this->COU.", `INT` = ".$this->INT.", CHA = ".$this->CHA.", AD = ".$this->AD.", `FOR` = ".$this->FOR.", SPECIAL = '".$this->SPECIAL."', JET = ".$this->JET.", qualite = ".$this->qualite.", type = '".$this->type."', deuxmains = ".$this->deuxmains.", debase = ".$this->debase." WHERE ID = ".$this->ID;
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM arme WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM arme WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->NOM_COURT = $ligne['NOM_COURT']; 
        $this->PRIX = $ligne['PRIX']; 
        $this->PI = $ligne['PI']; 
        $this->RUP = $ligne['RUP']; 
        $this->AT = $ligne['AT']; 
        $this->PRD = $ligne['PRD']; 
        $this->COU = $ligne['COU']; 
        $this->INT = $ligne['INT']; 
        $this->CHA = $ligne['CHA']; 
        $this->AD = $ligne['AD']; 
        $this->FOR = $ligne['FOR']; 
        $this->SPECIAL = $ligne['SPECIAL']; 
        $this->JET = $ligne['JET']; 
        $this->qualite = $ligne['qualite']; 
        $this->type = $ligne['type']; 
        $this->deuxmains = $ligne['deuxmains'];    
        $this->debase = $ligne['debase'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
