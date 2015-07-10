<?php
class Magie 
{ 
    //Attributs
    private $ID_MAGIE;		
    private $NOM;		
    private $disponible;		

    //constructeur
    public function __construct($ID_MAGIE_envoye = '', $NOM_envoye = '', $disponible_envoye = '')
    {
        //si ID
        if(!empty($ID_MAGIE_envoye) && empty($NOM_envoye))
        {
            $this->get_data_from_db($ID_MAGIE_envoye);
        }
        else
        {
            $this->ID_MAGIE = $ID_MAGIE_envoye;
            $this->NOM = $NOM_envoye;
            $this->disponible = $disponible_envoye;
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
            <input type='hidden' id='ID_MAGIE' value='<?php echo $this->ID_MAGIE; ?>' name='ID_MAGIE' />
            <tr><td><label for='NOM'>NOM</label></td><td><input type='text' id='NOM' value='<?php echo $this->NOM; ?>' name='NOM' /></td></tr>
            <tr><td><label for='disponible'>disponible</label></td><td><input type='text' id='disponible' value='<?php echo $this->disponible; ?>' name='disponible' /></td></tr>
        </table>
        <?php
    }

    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM magie";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new magie($rs['ID_MAGIE'], $rs['NOM'], $rs['disponible']);
        }
        return $tableau;
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO magie (NOM, disponible) VALUES ('".$this->NOM."', ".$this->disponible.")";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->ID_MAGIE = $stmt->lastInsertId(); 
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE magie SET NOM = '".$this->NOM."', disponible = ".$this->disponible." WHERE ID_MAGIE = ".$this->ID_MAGIE;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM magie WHERE ID_MAGIE = ".$this->ID_MAGIE;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM magie WHERE ID_MAGIE = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->ID_MAGIE = $ligne['ID_MAGIE']; 
        $this->NOM = $ligne['NOM']; 
        $this->disponible = $ligne['disponible'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
