<?php
class Equipement 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $SPECIAL;		
    private $PO;		
    private $PA;		
    private $PC;		
    private $COU;		
    private $INT;		
    private $CHA;		
    private $AD;		
    private $FO;
    
    private $AT;
    private $PRD;
    
    private $munition;
    private $debase;
    private $type;
    
    private $nombre;
    private $precieux;
    
    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $SPECIAL_envoye = '', $PO_envoye = 0, $PA_envoye = 0, $PC_envoye = 0, $COU_envoye = 0, $INT_envoye = 0, $CHA_envoye = 0, $AD_envoye = 0, $FO_envoye = 0, $munition_envoye = 0, $debase_envoye = 0, $type_envoye = '', $AT_envoye = 0, $PRD_envoye = 0)
    {
        $this->nombre = 1;
        $this->precieux = 0;
        //si ID
        if(!empty($ID_envoye) && empty($NOM_envoye))
        {
            $this->get_data_from_db($ID_envoye);
        }
        else
        {
            $this->ID = $ID_envoye;
            $this->NOM = $NOM_envoye;
            $this->SPECIAL = $SPECIAL_envoye;
            $this->PO = $PO_envoye;
            $this->PA = $PA_envoye;
            $this->PC = $PC_envoye;
            $this->COU = $COU_envoye;
            $this->INT = $INT_envoye;
            $this->CHA = $CHA_envoye;
            $this->AD = $AD_envoye;
            $this->FO = $FO_envoye;
            $this->munition = $munition_envoye;
            $this->type = $type_envoye;
            $this->debase = $debase_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
        }
    }

    //get
    public function __get($var)
    {
        if($var == "libelle")
        {
            if($this->nombre == 1)
            {
                return $this->NOM; 
            }
            else
            {
                return "(".$this->nombre.")".$this->NOM; 
            }
        }
        else
        {
            return $this->$var;
        }	
    }
    
    //set
    public function __set($var, $value)
    {
        $this->$var = $value;
    }
    
    //liste
    public static function ListerTypesEquipement()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM equipement order by type asc";
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
    public static function ListerTypesEquipementDeBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT distinct type FROM equipement where debase=1 order by type asc";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = $rs['type'];
        }
        return $tableau;
    }

    //set all from form
    public function set_all_from_form($post)
    {	        
        if(!isset($post["debase"]))
        {
            $post["debase"] = 0;
        }
        else
        {
            $post["debase"] = 1;
        }
        
        if(!isset($post["munition"]))
        {
            $post["munition"] = 0;
        }
        else
        {
            $post["munition"] = 1;
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
            <tr><td><label for='SPECIAL'>SPECIAL</label></td><td><input type='text' id='SPECIAL' value='<?php echo $this->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr><td><label for='PO'>PO</label></td><td><input type='text' id='PO' value='<?php echo $this->PO; ?>' name='PO' /></td></tr>
            <tr><td><label for='PA'>PA</label></td><td><input type='text' id='PA' value='<?php echo $this->PA; ?>' name='PA' /></td></tr>
            <tr><td><label for='PC'>PC</label></td><td><input type='text' id='PC' value='<?php echo $this->PC; ?>' name='PC' /></td></tr>
            <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $this->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $this->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $this->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $this->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FO'>FO</label></td><td><input type='text' id='FO' value='<?php echo $this->FO; ?>' name='FO' /></td></tr>
            <tr><td><label for='munition'>type</label></td><td><input type='text' id='type' value='<?php echo $this->type; ?>' name='type' /></td></tr>
            <tr><td><label for='munition'>munition</label></td><td><input type='text' id='munition' value='<?php echo $this->munition; ?>' name='munition' /></td></tr>
            <tr><td><label for='munition'>debase</label></td><td><input type='text' id='debase' value='<?php echo $this->debase; ?>' name='debase' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM equipement order by nom";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new equipement($rs['ID'], $rs['NOM'], $rs['SPECIAL'], $rs['PO'], $rs['PA'], $rs['PC'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FO'], $rs['munition'], $rs['debase'], $rs['type'], $rs['AT'], $rs['PRD']);
        }
        return $tableau;
    }
    
    public static function ListerBase()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM equipement where debase = 1 order by nom ";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new equipement($rs['ID'], $rs['NOM'], $rs['SPECIAL'], $rs['PO'], $rs['PA'], $rs['PC'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FO'], $rs['munition'], $rs['debase'], $rs['type'], $rs['AT'], $rs['PRD']);
        }
        return $tableau;
    }

    public function ajouter()
    {
        /**Inutile ?**/
        if(substr($this->PO,0,1) == ",")
        {
            $this->PA = substr($this->PO,1,1);
            
            if(strlen($this->PO) > 2)
            {
                $this->PC = substr($this->PO,2,1);
            }
            else
            {
                $this->PC = 0;
            }            
            $this->PO = 0;
        }
        else
        {
            $temp = explode(",",$this->PO);
            if(count($temp) > 1)
            {
                $this->PO = $temp[0];
                $this->PA = substr($temp[1],0,1);
                if(strlen($temp[1]) > 2)
                {
                    $this->PC = substr($temp[1],1,1);
                }
                else
                {
                    $this->PC = 0;
                }  
            }
        }
        
        if(!$this->PC)
        {
            $this->PC = 0;
        }
        if(!$this->PO)
        {
            $this->PO = 0;
        }
        if(!$this->PA)
        {
            $this->PA = 0;
        }
        /***/
        
        $db = getConnexionDB();
        $requete = "INSERT INTO equipement (NOM, SPECIAL, PO, PA, PC, COU, `INT`, CHA, AD, FO, munition, debase, type, AT, PRD) 
        VALUES ('".str_replace("'","''",$this->NOM)."', '".$this->SPECIAL."', ".$this->PO.", ".$this->PA.", ".$this->PC.", ".$this->COU.", ".$this->INT.", ".$this->CHA.", ".$this->AD.", ".$this->FO.", ".$this->munition.", ".$this->debase.", '".$this->type."', ".$this->AT.", ".$this->PRD.")";

        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID = $db->lastInsertId(); 
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE equipement SET NOM = :NOM, SPECIAL = '".$this->SPECIAL."', PO = ".$this->PO.", PA = ".$this->PA.", PC = ".$this->PC.", COU = ".$this->COU.", `INT` = ".$this->INT.", CHA = ".$this->CHA.", AD = ".$this->AD.", FO = ".$this->FO.", munition=".$this->munition.", debase=".$this->debase.", type='".$this->type."', AT=".$this->AT.", PRD=".$this->PRD." WHERE ID = ".$this->ID;
        $stmt = $db->prepare($requete);
        $stmt->execute( array("NOM"=>$this->NOM));
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM equipement WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM equipement WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->SPECIAL = $ligne['SPECIAL']; 
        $this->PO = $ligne['PO']; 
        $this->PA = $ligne['PA']; 
        $this->PC = $ligne['PC']; 
        $this->COU = $ligne['COU']; 
        $this->INT = $ligne['INT']; 
        $this->CHA = $ligne['CHA']; 
        $this->AD = $ligne['AD']; 
        $this->FO = $ligne['FO'];    
        $this->munition = $ligne['munition'];    
        $this->debase = $ligne['debase'];    
        $this->type = $ligne['type'];
        $this->AT = $ligne['AT'];
        $this->PRD = $ligne['PRD'];
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
