<?php
class Protection 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $NOM_COURT;		
    private $PR;		
    private $RUP;		
    private $COU;		
    private $INT;		
    private $CHA;		
    private $AD;		
    private $FOR;		
    private $SPECIAL;		
    private $AT;		
    private $PRD;		
    private $PRIX;		
    private $QUALITE;		
    private $TYPE;		
    private $debase;		


    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $NOM_COURT_envoye = '', $PR_envoye = 0, $RUP_envoye = '', $COU_envoye = 0, $INT_envoye = 0, $CHA_envoye = 0, $AD_envoye = 0, $FOR_envoye = 0, $SPECIAL_envoye = '', $AT_envoye = 0, $PRD_envoye = 0, $PRIX_envoye = 0, $QUALITE_envoye = 0, $TYPE_envoye = '', $debase_envoye = 0)
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
            $this->PR = $PR_envoye;
            $this->RUP = $RUP_envoye;
            $this->COU = $COU_envoye;
            $this->INT = $INT_envoye;
            $this->CHA = $CHA_envoye;
            $this->AD = $AD_envoye;
            $this->FOR = $FOR_envoye;
            $this->SPECIAL = $SPECIAL_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
            $this->PRIX = $PRIX_envoye;
            $this->QUALITE = $QUALITE_envoye;
            $this->TYPE = $TYPE_envoye;
            $this->debase = $debase_envoye;
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
        $this->$var = $value;
    }	

    //set all from form
    public function set_all_from_form($post)
    {							
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
            <tr><td><label for='PR'>PR</label></td><td><input type='text' id='PR' value='<?php echo $this->PR; ?>' name='PR' /></td></tr>
            <tr><td><label for='RUP'>RUP</label></td><td><input type='text' id='RUP' value='<?php echo $this->RUP; ?>' name='RUP' /></td></tr>
            <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $this->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $this->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $this->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $this->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FOR'>FOR</label></td><td><input type='text' id='FOR' value='<?php echo $this->FOR; ?>' name='FOR' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL</label></td><td><input type='text' id='SPECIAL' value='<?php echo $this->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $this->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $this->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='PRIX'>PRIX</label></td><td><input type='text' id='PRIX' value='<?php echo $this->PRIX; ?>' name='PRIX' /></td></tr>
            <tr><td><label for='QUALITE'>QUALITE</label></td><td><input type='text' id='QUALITE' value='<?php echo $this->QUALITE; ?>' name='QUALITE' /></td></tr>
            <tr><td><label for='TYPE'>TYPE</label></td><td><input type='text' id='TYPE' value='<?php echo $this->TYPE; ?>' name='TYPE' /></td></tr>
            <tr><td><label for='debase'>debase</label></td><td><input type='text' id='debase' value='<?php echo $this->debase; ?>' name='debase' /></td></tr>
        </table>
        <?php
    }
    
    public function modif()
    {
        $string = "";
        if(!empty($this->AT))
        {
            $string.="AT";
            if($this->AT > 0)
            {
                $string.="+";
            }
            $string.=$this->AT;
        }
        
        if(!empty($this->PRD))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="PRD";
            if($this->PRD > 0)
            {
                $string.="+";
            }
            $string.=$this->PRD;
        }
        if(!empty($string))
        {
           // $string.= "<br>";
        }
        if(!empty($this->COU))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="COU";
            if($this->COU > 0)
            {
                $string.="+";
            }
            $string.=$this->COU;
        }
        if(!empty($this->INT))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="INT";
            if($this->INT > 0)
            {
                $string.="+";
            }
            $string.=$this->INT;
        }
        if(!empty($this->CHA))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="CHA";
            if($this->CHA > 0)
            {
                $string.="+";
            }
            $string.=$this->CHA;
        }
        if(!empty($this->AD))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="AD";
            if($this->AD > 0)
            {
                $string.="+";
            }
            $string.=$this->AD;
        }
        if(!empty($this->FO))
        {
            if(!empty($string))
            {
                $string.= "/";
            }
            $string.="FO";
            if($this->FO > 0)
            {
                $string.="+";
            }
            $string.=$this->FO;
        }
        
        return $string;
    }
    
    public static function ListerBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM protection where debase = 1 order by nom asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new protection($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PR'], $rs['RUP'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['AT'], $rs['PRD'], $rs['PRIX'], $rs['QUALITE'], $rs['TYPE'], $rs['debase']);
        }
        return $tableau;
    }
    
    //liste
    public static function ListerTypesProtection()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM protection order by type asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = $rs['type'];
        }
        return $tableau;
    }
	
	//liste
    public static function ListerTypesProtectionDeBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM protection where debase = 1  order by type asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = $rs['type'];
        }
        return $tableau;
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
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM protection order by nom";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new protection($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PR'], $rs['RUP'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['AT'], $rs['PRD'], $rs['PRIX'], $rs['QUALITE'], $rs['TYPE'], $rs['debase']);
        }
        return $tableau;
    }
	
	

    public function ajouter()
    {
        $this->verifieValeurs();
        $db = getConnexionDB();
        $requete = "INSERT INTO protection (NOM, NOM_COURT, PR, RUP, COU, `INT`, CHA, AD, `FOR`, SPECIAL, AT, PRD, PRIX, QUALITE, TYPE, debase) VALUES ('".$this->NOM."', '".$this->NOM_COURT."', ".$this->PR.", '".$this->RUP."', ".$this->COU.", ".$this->INT.", ".$this->CHA.", ".$this->AD.", ".$this->FOR.", '".$this->SPECIAL."', ".$this->AT.", ".$this->PRD.", ".$this->PRIX.", ".$this->QUALITE.", '".$this->TYPE."', ".$this->debase.")";

        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID = $db->lastInsertId(); 
    }

    public function modifier()
    {
        $this->verifieValeurs();
        $db = getConnexionDB();
        $requete = "UPDATE protection SET NOM = '".$this->NOM."', NOM_COURT = '".$this->NOM_COURT."', PR = ".$this->PR.", RUP = '".$this->RUP."', COU = ".$this->COU.", `INT` = ".$this->INT.", CHA = ".$this->CHA.", AD = ".$this->AD.", `FOR` = ".$this->FOR.", SPECIAL = '".$this->SPECIAL."', AT = ".$this->AT.", PRD = ".$this->PRD.", PRIX = ".$this->PRIX.", QUALITE = ".$this->QUALITE.", TYPE = '".$this->TYPE."', debase = ".$this->debase." WHERE ID = ".$this->ID;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM protection WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM protection WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->NOM_COURT = $ligne['NOM_COURT']; 
        $this->PR = $ligne['PR']; 
        $this->RUP = $ligne['RUP']; 
        $this->COU = $ligne['COU']; 
        $this->INT = $ligne['INT']; 
        $this->CHA = $ligne['CHA']; 
        $this->AD = $ligne['AD']; 
        $this->FOR = $ligne['FOR']; 
        $this->SPECIAL = $ligne['SPECIAL']; 
        $this->AT = $ligne['AT']; 
        $this->PRD = $ligne['PRD']; 
        $this->PRIX = $ligne['PRIX']; 
        $this->QUALITE = $ligne['QUALITE']; 
        $this->TYPE = $ligne['TYPE']; 
        $this->debase = $ligne['debase'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
