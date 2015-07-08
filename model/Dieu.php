<?php
class Dieu 
{ 
    //Attributs
    private $ID_DIEU;		
    private $NOM;		
    private $DESCRIPTION;		
    private $PALADIN;		
    private $PRETRE;		


    //constructeur
    public function __construct($ID_DIEU_envoye = '', $NOM_envoye = '', $DESCRIPTION_envoye = '', $PALADIN_envoye = '', $PRETRE_envoye = '')
    {
        //si ID
        if(!empty($ID_DIEU_envoye) && empty($NOM_envoye))
        {
            $this->get_data_from_db($ID_DIEU_envoye);
        }
        else
        {
            $this->ID_DIEU = $ID_DIEU_envoye;
            $this->NOM = $NOM_envoye;
            $this->DESCRIPTION = $DESCRIPTION_envoye;
            $this->PALADIN = $PALADIN_envoye;
            $this->PRETRE = $PRETRE_envoye;
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
            <input type='hidden' id='ID_DIEU' value='<?php echo $this->ID_DIEU; ?>' name='ID_DIEU' />
            <tr><td><label for='NOM'>NOM</label></td><td><input type='text' id='NOM' value='<?php echo $this->NOM; ?>' name='NOM' /></td></tr>
            <tr><td><label for='DESCRIPTION'>DESCRIPTION</label></td><td><input type='text' id='DESCRIPTION' value='<?php echo $this->DESCRIPTION; ?>' name='DESCRIPTION' /></td></tr>
            <tr><td><label for='PALADIN'>PALADIN</label></td><td><input type='text' id='PALADIN' value='<?php echo $this->PALADIN; ?>' name='PALADIN' /></td></tr>
            <tr><td><label for='PRETRE'>PRETRE</label></td><td><input type='text' id='PRETRE' value='<?php echo $this->PRETRE; ?>' name='PRETRE' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM dieu";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new dieu($rs['ID_DIEU'], $rs['NOM'], $rs['DESCRIPTION'], $rs['PALADIN'], $rs['PRETRE']);
        }
        return $tableau;
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO dieu (NOM, DESCRIPTION, PALADIN, PRETRE) VALUES ('".$this->NOM."', '".$this->DESCRIPTION."', ".$this->PALADIN.", ".$this->PRETRE.")";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID_DIEU = $stmt->lastInsertId(); 
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE dieu SET NOM = '".$this->NOM."', DESCRIPTION = '".$this->DESCRIPTION."', PALADIN = ".$this->PALADIN.", PRETRE = ".$this->PRETRE." WHERE ID_DIEU = ".$this->ID_DIEU;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM dieu WHERE ID_DIEU = ".$this->ID_DIEU;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM dieu WHERE ID_DIEU = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID_DIEU = $ligne['ID_DIEU']; 
        $this->NOM = $ligne['NOM']; 
        $this->DESCRIPTION = $ligne['DESCRIPTION']; 
        $this->PALADIN = $ligne['PALADIN']; 
        $this->PRETRE = $ligne['PRETRE'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
