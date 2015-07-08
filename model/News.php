<?php
class News
{
    private $ID_NEWS;
    private $DATE_NEWS;
    private $TITRE;
    private $TEXTE;

    public function __construct($ID_NEWS_envoye = '', $DATE_NEWS_envoye = '', $TITRE_envoye = '', $TEXTE_envoye = '')
    {
        if(!empty($ID_NEWS_envoye) && empty($DATE_NEWS_envoye))
        {
            $this->get_data_from_db($ID_NEWS_envoye);
        }
        else
        {
            $this->ID_NEWS = $ID_NEWS_envoye;
            $this->DATE_NEWS = $DATE_NEWS_envoye;
            $this->TITRE = $TITRE_envoye;
            $this->TEXTE = $TEXTE_envoye;
        }
    }

    public function __destruct()
    {

    }

    public function get_ID_NEWS()
    {
        return $this->ID_NEWS;
    }

    public function get_DATE_NEWS()
    {
        return $this->DATE_NEWS;
    }

    public function get_TITRE()
    {
        return $this->TITRE;
    }

    public function get_TEXTE()
    {
        return $this->TEXTE;
    }

    public function set_ID_NEWS($ID_NEWS_envoye)
    {
        $this->ID_NEWS = $ID_NEWS_envoye;
    }

    public function set_DATE_NEWS($DATE_NEWS_envoye)
    {
        $this->DATE_NEWS = $DATE_NEWS_envoye;
    }

    public function set_TITRE($TITRE_envoye)
    {
        $this->TITRE = $TITRE_envoye;
    }

    public function set_TEXTE($TEXTE_envoye)
    {
        $this->TEXTE = $TEXTE_envoye;
    }

    public function set_all_from_form($post)
    {
        foreach($post as $key=>$value)
        {
            $this->$key = $value;
        }
    }

     public function __get($var)
    {
        if($var == "DATE_NEWS")
        {
            $dateFR = substr($this->DATE_NEWS,8,2);
            $dateFR .= "/";
            $dateFR .= substr($this->DATE_NEWS,5,2);
            $dateFR .= "/";
            $dateFR .= substr($this->DATE_NEWS,0,4);
            $dateFR .= " à ";
            $dateFR .= substr($this->DATE_NEWS,11,5);
            return $dateFR;
        }
        else
        {
            return $this->$var;
        }
    }

    public function print_form()
    {
        ?>
        <table>
        <input type='hidden' id='ID_NEWS' value='<?php echo $this->ID_NEWS; ?>' name='ID_NEWS' />
        <tr><td><label for='DATE_NEWS'>DATE_NEWS</label></td><td><input type='text' id='DATE_NEWS' value='<?php echo $this->DATE_NEWS; ?>' name='DATE_NEWS' /></td></tr>
        <tr><td><label for='TITRE'>TITRE</label></td><td><input type='text' id='TITRE' value='<?php echo $this->TITRE; ?>' name='TITRE' /></td></tr>
        <tr><td><label for='TEXTE'>TEXTE</label></td><td><input type='text' id='TEXTE' value='<?php echo $this->TEXTE; ?>' name='TEXTE' /></td></tr>
        </table>
        <?php
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO news(DATE_NEWS, TITRE, TEXTE) VALUES (".$this->DATE_NEWS.", '".$this->TITRE."', '".$this->TEXTE."')";
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function modifier()
    {
        $db = getConnexionDB();
        
        $requete = "UPDATE news SET DATE_NEWS = ".$this->DATE_NEWS.", TITRE = '".$this->TITRE."', TEXTE = '".$this->TEXTE."' WHERE ID_NEWS = ".$this->ID_NEWS;
       $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM news WHERE ID_NEWS = ".$this->ID_NEWS;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }


    public function get_data_from_db($id)
    {
        $db = getConnexionDB();

        $requete = "SELECT * FROM news WHERE ID_NEWS = ".$id;

        foreach($db->query($requete, PDO::FETCH_ASSOC) as $ligne)
        {
        	$this->ID_NEWS = DatabaseManager::CastForOut($ligne['ID_NEWS']);
	        $this->DATE_NEWS = DatabaseManager::CastForOut($ligne['DATE_NEWS']);
	        $this->TITRE = DatabaseManager::CastForOut($ligne['TITRE']);
	        $this->TEXTE = DatabaseManager::CastForOut($ligne['TEXTE']);
        }        
    }

    public function __toString()
    {
        $chaine = "";
        $chaine .= "ID_NEWS->".$this->ID_NEWS;
        $chaine .= ", DATE_NEWS->".$this->DATE_NEWS;
        $chaine .= ", TITRE->".$this->TITRE;
        $chaine .= ", TEXTE->".$this->TEXTE;
        $chaine .= ";";
        return $chaine;
    }
}