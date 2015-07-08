<?php
class Metier 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $EV;
    private $EA;
    private $AT;		
    private $PRD;		
    private $FOMIN;		
    private $FOMAX;		
    private $ADMIN;		
    private $ADMAX;		
    private $INTMIN;		
    private $INTMAX;		
    private $CHAMIN;		
    private $CHAMAX;		
    private $COUMIN;		
    private $COUMAX;		
    private $RESTRICTION;		
    private $BONUS;		
    private $PRMAX;		
    private $COMPETENCESLIEES;
    private $COMPETENCESACHOISIR;


    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $EV_envoye = '', $EA_envoye = '', $AT_envoye = '', $PRD_envoye = '', $FOMIN_envoye = '', $FOMAX_envoye = '', $ADMIN_envoye = '', $ADMAX_envoye = '', $INTMIN_envoye = '', $INTMAX_envoye = '', $CHAMIN_envoye = '', $CHAMAX_envoye = '', $COUMIN_envoye = '', $COUMAX_envoye = '', $RESTRICTION_envoye = '', $BONUS_envoye = '', $PRMAX_envoye = '')
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
            $this->EV = $EV_envoye;
            $this->EA = $EA_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
            $this->FOMIN = $FOMIN_envoye;
            $this->FOMAX = $FOMAX_envoye;
            $this->ADMIN = $ADMIN_envoye;
            $this->ADMAX = $ADMAX_envoye;
            $this->INTMIN = $INTMIN_envoye;
            $this->INTMAX = $INTMAX_envoye;
            $this->CHAMIN = $CHAMIN_envoye;
            $this->CHAMAX = $CHAMAX_envoye;
            $this->COUMIN = $COUMIN_envoye;
            $this->COUMAX = $COUMAX_envoye;
            $this->RESTRICTION = $RESTRICTION_envoye;
            $this->BONUS = $BONUS_envoye;
            $this->PRMAX = $PRMAX_envoye;
            
            $this->COMPETENCESLIEES = array();
            $this->COMPETENCESACHOISIR = array();
            
            if(!empty($this->ID))
            {
                $db = getConnexionDB();
                $requete = "SELECT ID_COMPETENCE FROM lien_metier_competence_native WHERE id_metier = :id";    
                $stmt = $db->prepare($requete);
                $stmt->bindParam(":id", $this->ID, PDO::PARAM_INT);
                $stmt->execute();
            
                while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $competence = new Competence($ligne["ID_COMPETENCE"]);
                    $this->COMPETENCESLIEES[] = $competence;
                }
                
                $requete = "SELECT ID_COMPETENCE FROM lien_metier_competence_choix WHERE id_metier = :id";    
                $stmt = $db->prepare($requete);
                $stmt->bindParam(":id", $this->ID, PDO::PARAM_INT);
                $stmt->execute();
            
                while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $competence = new Competence($ligne["ID_COMPETENCE"]);
                    $this->COMPETENCESACHOISIR[] = $competence;
                }
            }            
        }
    }

    //get
    public function __get($var)
    {
        if(!isset($this->$var))
        {
            $var = strtoupper($var);
            if(isset($this->$var))
            {
                return $this->$var;	
            }
            else
            {
                $var = strtolower($var);
                if(isset($this->$var))
                {
                    return $this->$var;	
                }
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
            <tr><td><label for='EV'>EV</label></td><td><input type='text' id='EV' value='<?php echo $this->EV; ?>' name='EV' /></td></tr>
            <tr><td><label for='EV'>EA</label></td><td><input type='text' id='EA' value='<?php echo $this->EA; ?>' name='EA' /></td></tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $this->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $this->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='FOMIN'>FOMIN</label></td><td><input type='text' id='FOMIN' value='<?php echo $this->FOMIN; ?>' name='FOMIN' /></td></tr>
            <tr><td><label for='FOMAX'>FOMAX</label></td><td><input type='text' id='FOMAX' value='<?php echo $this->FOMAX; ?>' name='FOMAX' /></td></tr>
            <tr><td><label for='ADMIN'>ADMIN</label></td><td><input type='text' id='ADMIN' value='<?php echo $this->ADMIN; ?>' name='ADMIN' /></td></tr>
            <tr><td><label for='ADMAX'>ADMAX</label></td><td><input type='text' id='ADMAX' value='<?php echo $this->ADMAX; ?>' name='ADMAX' /></td></tr>
            <tr><td><label for='INTMIN'>INTMIN</label></td><td><input type='text' id='INTMIN' value='<?php echo $this->INTMIN; ?>' name='INTMIN' /></td></tr>
            <tr><td><label for='INTMAX'>INTMAX</label></td><td><input type='text' id='INTMAX' value='<?php echo $this->INTMAX; ?>' name='INTMAX' /></td></tr>
            <tr><td><label for='CHAMIN'>CHAMIN</label></td><td><input type='text' id='CHAMIN' value='<?php echo $this->CHAMIN; ?>' name='CHAMIN' /></td></tr>
            <tr><td><label for='CHAMAX'>CHAMAX</label></td><td><input type='text' id='CHAMAX' value='<?php echo $this->CHAMAX; ?>' name='CHAMAX' /></td></tr>
            <tr><td><label for='COUMIN'>COUMIN</label></td><td><input type='text' id='COUMIN' value='<?php echo $this->COUMIN; ?>' name='COUMIN' /></td></tr>
            <tr><td><label for='COUMAX'>COUMAX</label></td><td><input type='text' id='COUMAX' value='<?php echo $this->COUMAX; ?>' name='COUMAX' /></td></tr>
            <tr><td><label for='RESTRICTION'>RESTRICTION</label></td><td><input type='text' id='RESTRICTION' value='<?php echo $this->RESTRICTION; ?>' name='RESTRICTION' /></td></tr>
            <tr><td><label for='BONUS'>BONUS</label></td><td><input type='text' id='BONUS' value='<?php echo $this->BONUS; ?>' name='BONUS' /></td></tr>
            <tr><td><label for='PRMAX'>PRMAX</label></td><td><input type='text' id='PRMAX' value='<?php echo $this->PRMAX; ?>' name='PRMAX' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM metier order by nom";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new metier($rs['ID'], $rs['NOM'], $rs['EV'], $rs['EA'], $rs['AT'], $rs['PRD'], $rs['FOMIN'], $rs['FOMAX'], $rs['ADMIN'], $rs['ADMAX'], $rs['INTMIN'], $rs['INTMAX'], $rs['CHAMIN'], $rs['CHAMAX'], $rs['COUMIN'], $rs['COUMAX'], $rs['RESTRICTION'], $rs['BONUS'], $rs['PRMAX']);
        }
        
        return $tableau;
    }
    
    public static function getMetiersPossibles($cou,$cha,$int,$ad,$fo)
    {
        $db = getConnexionDB();
        $requete = "SELECT * 
        FROM metier 
        where coumin <= ".$cou." and coumax >= ".$cou."
        and chamin <= ".$cha." and chamax >= ".$cha."
        and intmin <= ".$int." and intmax >= ".$int."
        and admin <= ".$ad." and admax >= ".$ad."
        and fomin <= ".$fo." and fomax >= ".$fo;
        
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new metier($rs['ID'], $rs['NOM'], $rs['EV'], $rs['EA'], $rs['AT'], $rs['PRD'], $rs['FOMIN'], $rs['FOMAX'], $rs['ADMIN'], $rs['ADMAX'], $rs['INTMIN'], $rs['INTMAX'], $rs['CHAMIN'], $rs['CHAMAX'], $rs['COUMIN'], $rs['COUMAX'], $rs['RESTRICTION'], $rs['BONUS'], $rs['PRMAX']);
        }
        
        return $tableau;
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO metier (NOM, EV, EA, AT, PRD, FOMIN, FOMAX, ADMIN, ADMAX, INTMIN, INTMAX, CHAMIN, CHAMAX, COUMIN, COUMAX, RESTRICTION, BONUS, PRMAX) VALUES ('".$this->NOM."', ".$this->EV.", ".$this->EA.", ".$this->AT.", ".$this->PRD.", ".$this->FOMIN.", ".$this->FOMAX.", ".$this->ADMIN.", ".$this->ADMAX.", ".$this->INTMIN.", ".$this->INTMAX.", ".$this->CHAMIN.", ".$this->CHAMAX.", ".$this->COUMIN.", ".$this->COUMAX.", '".$this->RESTRICTION."', '".$this->BONUS."', ".$this->PRMAX.")";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE metier SET NOM = '".$this->NOM."', EV = ".$this->EV.", EA = ".$this->EA.", AT = ".$this->AT.", PRD = ".$this->PRD.", FOMIN = ".$this->FOMIN.", FOMAX = ".$this->FOMAX.", ADMIN = ".$this->ADMIN.", ADMAX = ".$this->ADMAX.", INTMIN = ".$this->INTMIN.", INTMAX = ".$this->INTMAX.", CHAMIN = ".$this->CHAMIN.", CHAMAX = ".$this->CHAMAX.", COUMIN = ".$this->COUMIN.", COUMAX = ".$this->COUMAX.", RESTRICTION = '".$this->RESTRICTION."', BONUS = '".$this->BONUS."', PRMAX = ".$this->PRMAX." WHERE ID = ".$this->ID;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM metier WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM metier WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->EV = $ligne['EV']; 
        $this->EA = $ligne['EA']; 
        $this->AT = $ligne['AT']; 
        $this->PRD = $ligne['PRD']; 
        $this->FOMIN = $ligne['FOMIN']; 
        $this->FOMAX = $ligne['FOMAX']; 
        $this->ADMIN = $ligne['ADMIN']; 
        $this->ADMAX = $ligne['ADMAX']; 
        $this->INTMIN = $ligne['INTMIN']; 
        $this->INTMAX = $ligne['INTMAX']; 
        $this->CHAMIN = $ligne['CHAMIN']; 
        $this->CHAMAX = $ligne['CHAMAX']; 
        $this->COUMIN = $ligne['COUMIN']; 
        $this->COUMAX = $ligne['COUMAX']; 
        $this->RESTRICTION = $ligne['RESTRICTION']; 
        $this->BONUS = $ligne['BONUS']; 
        $this->PRMAX = $ligne['PRMAX'];
        
        $db = getConnexionDB();
        $requete = "SELECT ID_COMPETENCE FROM lien_metier_competence_native WHERE ID_METIER = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $competence = new Competence($ligne["ID_COMPETENCE"]);
            $this->COMPETENCESLIEES[] = $competence;
        }
        
        $requete = "SELECT ID_COMPETENCE FROM lien_metier_competence_choix WHERE ID_METIER = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        while($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $competence = new Competence($ligne["ID_COMPETENCE"]);
            $this->COMPETENCESACHOISIR[] = $competence;
        }
    }
    
    public function __toString()
    {
        return $this->NOM;
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
