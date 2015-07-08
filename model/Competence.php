<?php
class Competence 
{ 
    //Attributs
    private $ID;		
    private $NOM;		
    private $PR;		
    private $AT;		
    private $PRD;		
    private $COU;		
    private $CHA;		
    private $INT;		
    private $FO;		
    private $AD;		
    private $SPECIAL;		
    private $REQUIS;		

    //constructeur
    public function __construct($ID_envoye = '', $NOM_envoye = '', $PR_envoye = '', $AT_envoye = '', $PRD_envoye = '', $COU_envoye = '', $CHA_envoye = '', $INT_envoye = '', $FO_envoye = '', $AD_envoye = '', $SPECIAL_envoye = '', $REQUIS_envoye = '')
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
            $this->PR = $PR_envoye;
            $this->AT = $AT_envoye;
            $this->PRD = $PRD_envoye;
            $this->COU = $COU_envoye;
            $this->CHA = $CHA_envoye;
            $this->INT = $INT_envoye;
            $this->FO = $FO_envoye;
            $this->AD = $AD_envoye;
            $this->SPECIAL = $SPECIAL_envoye;
            $this->REQUIS = $REQUIS_envoye;
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
            <tr><td><label for='PR'>PR</label></td><td><input type='text' id='PR' value='<?php echo $this->PR; ?>' name='PR' /></td></tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $this->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $this->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $this->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $this->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $this->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='FO'>FO</label></td><td><input type='text' id='FO' value='<?php echo $this->FO; ?>' name='FO' /></td></tr>
            <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $this->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL</label></td><td><input type='text' id='SPECIAL' value='<?php echo $this->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr><td><label for='REQUIS'>REQUIS</label></td><td><input type='text' id='REQUIS' value='<?php echo $this->REQUIS; ?>' name='REQUIS' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM competence";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new competence($rs['ID'], $rs['NOM'], $rs['PR'], $rs['AT'], $rs['PRD'], $rs['COU'], $rs['CHA'], $rs['INT'], $rs['FO'], $rs['AD'], $rs['SPECIAL'], $rs['REQUIS']);
        }
        return $tableau;
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO competence (NOM, PR, AT, PRD, COU, CHA, INT, FO, AD, SPECIAL, REQUIS) VALUES ('".$this->NOM."', ".$this->PR.", ".$this->AT.", ".$this->PRD.", ".$this->COU.", ".$this->CHA.", ".$this->INT.", ".$this->FO.", ".$this->AD.", '".$this->SPECIAL."', '".$this->REQUIS."')";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID = $stmt->lastInsertId(); 
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE competence SET NOM = '".$this->NOM."', PR = ".$this->PR.", AT = ".$this->AT.", PRD = ".$this->PRD.", COU = ".$this->COU.", CHA = ".$this->CHA.", INT = ".$this->INT.", FO = ".$this->FO.", AD = ".$this->AD.", SPECIAL = '".$this->SPECIAL."', REQUIS = '".$this->REQUIS."' WHERE ID = ".$this->ID;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM competence WHERE ID = ".$this->ID;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM competence WHERE ID = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID = $ligne['ID']; 
        $this->NOM = $ligne['NOM']; 
        $this->PR = $ligne['PR']; 
        $this->AT = $ligne['AT']; 
        $this->PRD = $ligne['PRD']; 
        $this->COU = $ligne['COU']; 
        $this->CHA = $ligne['CHA']; 
        $this->INT = $ligne['INT']; 
        $this->FO = $ligne['FO']; 
        $this->AD = $ligne['AD']; 
        $this->SPECIAL = $ligne['SPECIAL']; 
        $this->REQUIS = $ligne['REQUIS'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
