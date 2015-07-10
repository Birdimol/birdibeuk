<?php
class Mob 
{ 
    //Attributs
    private $id_mob;		
    private $type_mob;		
    private $nom;		
    private $at;		
    private $prd;		
    private $ev;		
    private $pr;		
    private $pi;		
    private $type_arme;		
    private $cou;		
    private $rm;		
    private $xp;		
    private $note;		
    private $niv_min;		
    private $niv_max;		

    private $loot;
    
    //constructeur
    public function __construct($id_mob_envoye = '', $type_mob_envoye = '', $nom_envoye = '', $at_envoye = '', $prd_envoye = '', $ev_envoye = '', $pr_envoye = '', $pi_envoye = '', $type_arme_envoye = '', $cou_envoye = '', $rm_envoye = '', $xp_envoye = '', $note_envoye = '', $niv_min_envoye = '', $niv_max_envoye = '')
    {
        $this->loot = array();
        
        //si ID
        if(!empty($id_mob_envoye) && empty($type_mob_envoye))
        {
            $this->get_data_from_db($id_mob_envoye);
        }
        else
        {
            $this->id_mob = $id_mob_envoye;
            $this->type_mob = $type_mob_envoye;
            $this->nom = $nom_envoye;
            $this->at = $at_envoye;
            $this->prd = $prd_envoye;
            $this->ev = $ev_envoye;
            $this->pr = $pr_envoye;
            $this->pi = $pi_envoye;
            $this->type_arme = $type_arme_envoye;
            $this->cou = $cou_envoye;
            $this->rm = $rm_envoye;
            $this->xp = $xp_envoye;
            $this->note = $note_envoye;
            $this->niv_min = $niv_min_envoye;
            $this->niv_max = $niv_max_envoye;
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
            <input type='hidden' id='id_mob' value='<?php echo $this->id_mob; ?>' name='id_mob' />
            <tr><td><label for='type_mob'>type_mob</label></td><td><input type='text' id='type_mob' value='<?php echo $this->type_mob; ?>' name='type_mob' /></td></tr>
            <tr><td><label for='nom'>nom</label></td><td><input type='text' id='nom' value='<?php echo $this->nom; ?>' name='nom' /></td></tr>
            <tr><td><label for='at'>at</label></td><td><input type='text' id='at' value='<?php echo $this->at; ?>' name='at' /></td></tr>
            <tr><td><label for='prd'>prd</label></td><td><input type='text' id='prd' value='<?php echo $this->prd; ?>' name='prd' /></td></tr>
            <tr><td><label for='ev'>ev</label></td><td><input type='text' id='ev' value='<?php echo $this->ev; ?>' name='ev' /></td></tr>
            <tr><td><label for='pr'>pr</label></td><td><input type='text' id='pr' value='<?php echo $this->pr; ?>' name='pr' /></td></tr>
            <tr><td><label for='pi'>pi</label></td><td><input type='text' id='pi' value='<?php echo $this->pi; ?>' name='pi' /></td></tr>
            <tr><td><label for='type_arme'>type_arme</label></td><td><input type='text' id='type_arme' value='<?php echo $this->type_arme; ?>' name='type_arme' /></td></tr>
            <tr><td><label for='cou'>cou</label></td><td><input type='text' id='cou' value='<?php echo $this->cou; ?>' name='cou' /></td></tr>
            <tr><td><label for='rm'>rm</label></td><td><input type='text' id='rm' value='<?php echo $this->rm; ?>' name='rm' /></td></tr>
            <tr><td><label for='xp'>xp</label></td><td><input type='text' id='xp' value='<?php echo $this->xp; ?>' name='xp' /></td></tr>
            <tr><td><label for='note'>note</label></td><td><input type='text' id='note' value='<?php echo $this->note; ?>' name='note' /></td></tr>
            <tr><td><label for='niv_min'>niv_min</label></td><td><input type='text' id='niv_min' value='<?php echo $this->niv_min; ?>' name='niv_min' /></td></tr>
            <tr><td><label for='niv_max'>niv_max</label></td><td><input type='text' id='niv_max' value='<?php echo $this->niv_max; ?>' name='niv_max' /></td></tr>
        </table>
        <?php
    }
    
    public function printInfo()
    {
        ?>
            <table class='tableMob'> 
                <tr><td colspan='6'><u><?php echo $this->nom; ?></u></td></tr>
                <tr><td>AT</td><td>PRD</td><td>PR</td><td>COU</td><td>RM</td><td>XP</td></tr>
                <tr><td><?php echo $this->at; ?></td><td><?php echo $this->prd; ?></td>
                    <td><?php echo $this->pr; ?></td><td><?php echo $this->cou; ?></td>
                    <td><?php echo $this->rm; ?></td><td><?php echo $this->xp; ?></td>
                </tr>
                <tr><td colspan='6' style='text-align:left;'>EV : <?php echo $this->ev; ?></td></tr>
                <tr><td colspan='6' ><i><?php echo $this->note; ?></i></td></tr>
                <tr><td colspan='6' style='border-top:3px #900000 solid;'>LOOT</td></tr>
                <?php 
                    foreach($this->loot as $arme)
                    {
                        if(is_a($arme, 'Arme'))
                        {
                            ?>
                            <tr><td colspan='6'><u><?php echo $arme->NOM; ?></u></td></tr>
                            <tr>
                                <td><?php echo $arme->NOM; ?></td><td><?php echo $arme->PI; ?></td>
                                <td><?php echo $arme->RUP; ?></td><td><?php echo $arme->PRIX; ?> PO</td>
                                <td colspan='2'><?php echo $arme->modif(); ?></td>
                            </tr>
                            <?php 
                        }
                    }
                    ?>
                <tr>
                    <td colspan='6'>
                    <?php
                    foreach($this->loot as $key=>$truc)
                    {
                        if(is_a($truc, 'Equipement'))
                        {                            
                            if($truc->nombre > 1)
                            {
                                echo $truc->nombre." ";
                            }
                            echo $truc->NOM." (".$truc->PO.",".$truc->PA.$truc->PC.")<br>";
                        }
                    }
                    echo "<br>".$this->loot["po"]."PO";
                    ?>
                    </td>
                </tr>                
            </table>
        <?php
    }

    public function getLoot()
    {
        $types = explode("-",$this->type_arme);        
        $db = getConnexionDB();
        //ARMES
        foreach($types as $type)
        {
            $tableau = array();
            $requete = "SELECT * FROM arme where PI = '".$this->pi."' and debase = 1 and type = '".$type."' ";

            $stmt = $db->prepare($requete);
            $stmt->execute();
            
            while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
            {

                $temp = new arme($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PRIX'], $rs['PI'], $rs['RUP'], $rs['AT'], $rs['PRD'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['JET'], $rs['qualite'], $rs['type'], $rs['deuxmains'],$rs['debase']);
                $tableau[] = $temp;
            }
            if(count($tableau)>0)
            {
                $this->loot[] = $tableau[rand(0,count($tableau)-1)];
            }
            else
            {
                
                $tableau = array();
                $requete = "SELECT * FROM arme where debase = 1 and type = '".$type."' ";

                $stmt = $db->prepare($requete);
                $stmt->execute(array("PI"=>$this->pi));
                
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $temp = new arme($rs['ID'], $rs['NOM'], $rs['NOM_COURT'], $rs['PRIX'], $rs['PI'], $rs['RUP'], $rs['AT'], $rs['PRD'], $rs['COU'], $rs['INT'], $rs['CHA'], $rs['AD'], $rs['FOR'], $rs['SPECIAL'], $rs['JET'], $rs['qualite'], $rs['type'], $rs['deuxmains'],$rs['debase']);
                    $tableau[] = $temp;
                }
                if(count($tableau)>0)
                {
                    $this->loot[] = $tableau[rand(0,count($tableau)-1)];
                }
                else
                {
                    
                }
            }
        }
        
        //EQUIPEMENT
        $nbrTrucTrouve = rand(0,3);
        $lootPotentiel = array();
        $equipements = Equipement::ListerBase();
        $munition = array();
        foreach($equipements as $equipement)
        {            
            if($equipement->PO < $this->niv_max*10)
            {
                if($equipement->type == "munition")
                {
                    if($equipement->PO < $this->niv_max)
                    {
                        $munition[] = $equipement;
                    }
                }
                else
                {
                    $lootPotentiel[] = $equipement;
                }
            }
        }
        
        if(in_array("arc",$types))
        {
            $mun = $munition[rand(0,count($munition)-1)];
            $mun->nombre = rand(2,8);
            $this->loot[] = $mun;
        }
        
        $nbreEssai=0;
        while($nbrTrucTrouve > 0 && $nbreEssai < 10)
        {
            $this->loot[] = $lootPotentiel[rand(0,count($lootPotentiel)-1)];
            $nbrTrucTrouve--;
            $nbreEssai++;
        }
        
        //po
        $this->loot["po"] = rand(0,$this->niv_max*10);
        
    }
    
    //liste
    public static function Lister()
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM mob";
        $tableau = array();
        $stmt = $db->prepare($requete);

        $stmt->execute();
        
        while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tableau[] = new mob($rs['id_mob'], $rs['type_mob'], $rs['nom'], $rs['at'], $rs['prd'], $rs['ev'], $rs['pr'], $rs['pi'], $rs['type_arme'], $rs['cou'], $rs['rm'], $rs['xp'], $rs['note'], $rs['niv_min'], $rs['niv_max']);
        }
        return $tableau;
    }

    public function ajouter()
    {
        $db = getConnexionDB();
        $requete = "INSERT INTO mob (type_mob, nom, at, prd, ev, pr, pi, type_arme, cou, rm, xp, note, niv_min, niv_max) VALUES ('".$this->type_mob."', '".$this->nom."', ".$this->at.", ".$this->prd.", ".$this->ev.", ".$this->pr.", '".$this->pi."', '".$this->type_arme."', ".$this->cou.", ".$this->rm.", ".$this->xp.", '".$this->note."', ".$this->niv_min.", ".$this->niv_max.")";
        
        $stmt = $db->prepare($requete);
        $stmt->execute();
        $this->id_mob = $stmt->lastInsertId(); 
    }

    public function modifier()
    {
        $db = getConnexionDB();
        $requete = "UPDATE mob SET type_mob = '".$this->type_mob."', nom = '".$this->nom."', at = ".$this->at.", prd = ".$this->prd.", ev = ".$this->ev.", pr = ".$this->pr.", pi = '".$this->pi."', type_arme = '".$this->type_arme."', cou = ".$this->cou.", rm = ".$this->rm.", xp = ".$this->xp.", note = '".$this->note."', niv_min = ".$this->niv_min.", niv_max = ".$this->niv_max." WHERE id_mob = ".$this->id_mob;
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    public function supprimer()
    {
        $db = getConnexionDB();
        $requete = "DELETE FROM mob WHERE id_mob = ".$this->id_mob;        
        $stmt = $db->prepare($requete);
        $stmt->execute();
    }

    //get_data_from_db
    public function get_data_from_db($id)
    {
        $db = getConnexionDB();
        $requete = "SELECT * FROM mob WHERE id_mob = ".$id;    
        $stmt = $db->prepare($requete);
        $stmt->execute();
    
        $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
     
        $this->id_mob = $ligne['id_mob']; 
        $this->type_mob = $ligne['type_mob']; 
        $this->nom = $ligne['nom']; 
        $this->at = $ligne['at']; 
        $this->prd = $ligne['prd']; 
        $this->ev = $ligne['ev']; 
        $this->pr = $ligne['pr']; 
        $this->pi = $ligne['pi']; 
        $this->type_arme = $ligne['type_arme']; 
        $this->cou = $ligne['cou']; 
        $this->rm = $ligne['rm']; 
        $this->xp = $ligne['xp']; 
        $this->note = $ligne['note']; 
        $this->niv_min = $ligne['niv_min']; 
        $this->niv_max = $ligne['niv_max'];    
    }

    public function debug()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }

}
