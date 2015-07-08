<?php
class User 
{ 
    //Attributs
    private $id;		
    private $login;		
    private $password;		
    private $date_inscription;		
    private $date_last_visit;		
    private $mj;		
    private $localisation;		
    private $description;
    private $mail;
    private $admin;
    private $superadmin;
    
    private $aventuriers;


    //constructeur
    public function __construct($id_envoye = '', $login_envoye = '', $password_envoye = '', $date_inscription_envoye = '', $date_last_visit_envoye = '', 
    $mj_envoye = '', $localisation_envoye = '', $description_envoye = '', $mail_envoye = '', $admin_envoye = 0, $superadmin_envoye = 0)
    {
        //si ID
        if(!empty($id_envoye) && empty($login_envoye))
        {
            $this->get_data_from_db($id_envoye);
        }
        else
        {
            $this->id = $id_envoye;
            $this->login = $login_envoye;
            $this->password = $password_envoye;
            $this->date_inscription = $date_inscription_envoye;
            $this->date_last_visit = $date_last_visit_envoye;
            $this->mj = $mj_envoye;
            $this->localisation = $localisation_envoye;
            $this->description = $description_envoye;
            $this->mail = $mail_envoye;
            $this->admin = $admin_envoye;
            $this->superadmin = $superadmin_envoye;
        }
        $this->aventuriers = null;
    }

    //get
    public function __get($var)
    {
        if($var == "aventuriers")
        {
            if($this->aventuriers === null)
            {
                $this->aventuriers = User::ListerAventuriers($this->id);
            }
        }
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
            if(isset($this->$key))
            {
                if($key == "password")
                {
                    if($value != '')
                    {
                        $value = md5($value);
                        $this->$key = $value;
                    }
                }
                else
                {
                    $this->$key = $value;
                }                
            }
        }
    }

    public function print_form()
    {
        ?>
            <table>
                <input type='hidden' id='id' value='<?php echo $this->id; ?>' name='id' />
                <tr><td><label for='login'>login</label></td><td><input type='text' id='login' value='<?php echo $this->login; ?>' name='login' /></td></tr>
                <tr><td><label for='password'>password</label></td><td><input type='text' id='password' value='<?php echo $this->password; ?>' name='password' /></td></tr>
                <tr><td><label for='date_inscription'>date_inscription</label></td><td><input type='text' id='date_inscription' value='<?php echo $this->date_inscription; ?>' name='date_inscription' /></td></tr>
                <tr><td><label for='date_last_visit'>date_last_visit</label></td><td><input type='text' id='date_last_visit' value='<?php echo $this->date_last_visit; ?>' name='date_last_visit' /></td></tr>
                <tr><td><label for='mj'>mj</label></td><td><input type='text' id='mj' value='<?php echo $this->mj; ?>' name='mj' /></td></tr>
                <tr><td><label for='localisation'>localisation</label></td><td><input type='text' id='localisation' value='<?php echo $this->localisation; ?>' name='localisation' /></td></tr>
            </table>
        <?php
    }
    
    public static function ListerAventuriers($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM aventurier where idjoueur = ".$id." order by NOM" ;

        $tableau = array();
        $stmt = $db->prepare($requete);
        $stmt->execute();        
        while($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new Aventurier($rs['ID'], $rs['NOM'], $rs['SEXE'], $rs['ID_ORIGINE'], $rs['ID_METIER'], $rs['EV'], $rs['EA'], $rs['COU'], $rs['INT'], $rs['CHA'], 
			$rs['AD'], $rs['FO'], $rs['AT'], $rs['PRD'], $rs['XP'], $rs['DESTIN'], $rs['OR'], $rs['ARGENT'], $rs['CUIVRE'], $rs['NIVEAU'], $rs['idjoueur'],
			$rs['type'], $rs['MAGIEPHYS'] , $rs['MAGIEPSY'], $rs['RESISTMAG'], 
			$rs['ID_TYPEMAGIE'], $rs['ID_DIEU'], $rs['COMPETENCESCHOISIES'], $rs['PR_MAX'], $rs['codeacces'], $rs['PR']);
        }
        return $tableau;
    }

    //liste
    public static function Lister($ordre = "LOGIN ASC",$login="")
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM user ";
        
        if($login != "")
        {
            $requete .= " where LOGIN LIKE '".$login."%' ";
        }
        
        $requete .= "ORDER BY ".$ordre;
        
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new user($rs['id'], $rs['login'], $rs['password'], $rs['date_inscription'], $rs['date_last_visit'], $rs['mj'], $rs['localisation'], $rs['description'], $rs['mail'], $rs['admin'], $rs['superadmin']);
        }
        
        return $tableau;
    }
    
    /*
        Retourne 0 en cas d'échec, le user si correct.
    */
    public static function formulaireConnexionValide($login, $password)
    {
        $passwordMd5 = md5($password);
        $db = getConnexionDB();
        $requete = "SELECT * FROM user WHERE login = '".$login."' and password = '".$passwordMd5."'";    
        $stmt = $db->prepare($requete);
        $stmt->execute();    
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rs === false)
        {
            return false;
        }
        else
        {
            $user = new user($rs['id'], $rs['login'], $rs['password'], $rs['date_inscription'], $rs['date_last_visit'], $rs['mj'], $rs['localisation'], $rs['description'], $rs['mail'], $rs['admin'], $rs['superadmin']);
            return $user;
        }  
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        
        $requete = "select count(*) as compte from user where login = '".$this->login."'";
        
        $stmt = $db->prepare($requete);
        if(!$stmt->execute())
        {
            //-1 = erreur de requete
            return -1;
        }
        
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rs["compte"] > 0)
        {
            return -2;
        }
        
        $requete = "INSERT INTO user (login, password, date_inscription, date_last_visit, mj, localisation, mail, admin, superadmin) VALUES ('".$this->login."', '".$this->password."', CURRENT_DATE, '".$this->date_last_visit."', ".$this->mj.", '".$this->localisation."', '".$this->mail."', ".$this->admin.", ".$this->superadmin.")";
        echo $requete; echo"<br>";
        $stmt = $db->prepare($requete);
        if(!$stmt->execute())
        {
            echo $requete;
            //-1 = erreur de requete
            return -1;
        }
        $this->id = $db->lastInsertId(); 
        return true;
    }

    public function modifier()
    {
        $db = getConnexionDB();
        //$requete = "UPDATE user SET login = '".$this->login."', password = '".$this->password."', date_inscription = '".$this->date_inscription."', date_last_visit = '".$this->date_last_visit."', mj = ".$this->mj.", localisation = '".$this->localisation."', description = '".addslashes($this->description)."', mail = '".addslashes($this->mail)."'  WHERE id = ".$this->id;
        $requete = "UPDATE user SET login = '".$this->login."',password = '".$this->password."', mj = ".$this->mj.", localisation = '".$this->localisation."', description = '".addslashes($this->description)."', mail = '".addslashes($this->mail)."', admin = ".$this->admin.", superadmin = ".$this->superadmin."  WHERE id = ".$this->id;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }
    
    public function updateLastVisit()
    {
        $db = getConnexionDB();
        $requete = "UPDATE user SET date_last_visit = CURRENT_DATE  WHERE id = ".$this->id;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM user WHERE id = ".$this->id;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM user WHERE id = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach($ligne as $key=>$value)
        {
            $this->$key = $value;
        }
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
