<?php

    function getConnexionDB()
    {
        return DatabaseManager::getDb();
    }
    
    function getValeurCaracF($val)
    {
        if($val == 8)
        {
            echo "nulle";
        }
        else if($val == 9)
        {
            echo "mauvaise";
        }
        else if($val == 10)
        {
            echo "moyenne";
        }
        else if($val == 11)
        {
            echo "correcte";
        }
        else if($val == 12)
        {
            echo "élevée";
        }
        else
        {
            echo "hors-norme";
        }
    }
    
    function getValeurCaracM($val)
    {
        if($val == 8)
        {
            echo "nul";
        }
        else if($val == 9)
        {
            echo "mauvais";
        }
        else if($val == 10)
        {
            echo "moyen";
        }
        else if($val == 11)
        {
            echo "correct";
        }
        else if($val == 12)
        {
            echo "élevé";
        }
        else
        {
            echo "hors-norme";
        }
    }

    function debug($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
    
    function executePDOSQPWithDebug($stmt)
    {
        try
        {
            $stmt->execute();
            return $stmt;
        }
        catch (PDOException $e)
        {
            if(DEBUG)
            {
                logToDebug($e->getMessage());
            }
            return false;
        }
    }
    
    function logToDebug($var)
    {
       global $global_debug;
       $global_debug .= $var.'<br>';
    }
    
    function debugToString($var)
    {
        $string  = "<pre>";
        $string .= print_r($var, true);
        $string .= "</pre>";
        return $string;
    }

    function turnDateToFR($date)
    {
        $newDate="";
        if(strpos($date,"/") == 4 || strpos($date,"-") == 4)
        {
           $newDate = substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4);
        }
        else
        {
            $newDate = substr($date,0,4)."/".substr($date,5,2)."/".substr($date,8,2);
        }
        return $newDate;
    }
    
    function trouveBonFiltre($champs)
    {
        if(isset($_GET["ordre"]))
        {
            if(strpos($_GET["ordre"],$champs)!==false)
            {
                if(strpos($_GET["ordre"],"DESC")!==false)
                {
                    echo $champs.' ASC';
                }
                else
                {
                    echo $champs.' DESC';
                }
            }
            else
            {
                echo $champs.' ASC';
            }
        }
        else
        {
            echo $champs.' ASC';
        }
    }
    
    function printTableOrigineMetier()
    {
        $metiers = Metier::Lister();
        $origines = Origine::Lister();
        
        $tableHTML = "<table style='border-collapse:collapse;margin:auto;'>";
            $tableHTML.= "<tr>";
                $tableHTML.= "<td></td>";   
                    foreach($origines as $origine)
                    {
                        $tableHTML.= "<td style='border:1px #900000 solid;padding:5px'>".$origine->NOM."</td>";   
                    }
            $tableHTML.= "</tr>";
            foreach($metiers as $metier)
            {
                $tableHTML.= "<tr>";
                    $tableHTML.= "<td style='padding:5px;border:1px #900000 solid;'>".$metier->NOM."</td>"; 
                    for($nbrOrigine = 0; $nbrOrigine < count($origines);$nbrOrigine++)
                    {
                        $tableHTML.= "<td style='text-align:center;border:1px #900000 solid;'>";
                        if(!sontCompatibles($metier,$origines[$nbrOrigine]))
                        {
                            $tableHTML.= "X"; 
                        }
                        $tableHTML.= "</td>"; 
                    }
                $tableHTML.= "</tr>";   
            }
        $tableHTML.= "</table>";
        
        echo $tableHTML;
    }
    
    function getBornesCaracsParMetier($metier)
    {
        $caracs = array("FO","AD","INT","CHA","COU");
        $limites = array();
        foreach($caracs as $carac)
        {
            $min = $carac."MIN";
            $max = $carac."MAX";
            if($metier->$min > 8)
            {
                $limites[$min] = $metier->$min;
            }
            else
            {
                $limites[$min] = 8;
            }
            
            if($metier->$max < 13)
            {
                $limites[$max] = $metier->$max;
            }
            else
            {
                $limites[$max] = 13;
            }
        }
        return $limites;
    }
    
    function getBornesCaracsParOrigine($origine)
    {
        $caracs = array("FO","AD","INT","CHA","COU");
        $limites = array();
        foreach($caracs as $carac)
        {
            $min = $carac."MIN";
            $max = $carac."MAX";
            if($origine->$min > 8)
            {
                $limites[$min] = $origine->$min;
            }
            else
            {
                $limites[$min] = 8;
            }
            
            if($origine->$max < 13)
            {
                $limites[$max] = $origine->$max;
            }
            else
            {
                $limites[$max] = 13;
            }
        }
        return $limites;
    }
    
    function getBornesCaracsParOrigineEtMetier($origine, $metier)
    {
        $caracs = array("FO","AD","INT","CHA","COU");
        $limitesOrigine = getBornesCaracsParOrigine($origine);
        $limitesMetier = getBornesCaracsParMetier($metier);
        $limites = array();
        foreach($caracs as $carac)
        {
            $min = $carac."MIN";
            $max = $carac."MAX";
            if($limitesOrigine[$min] > $limitesMetier[$min])
            {
                $limites[$min] = $limitesOrigine[$min];
            }
            else
            {
                $limites[$min] = $limitesMetier[$min];
            }
            
            if($limitesOrigine[$max] < $limitesMetier[$max])
            {
                $limites[$max] = $limitesOrigine[$max];
            }
            else
            {
                $limites[$max] = $limitesMetier[$max];
            }
        }
        
        
        return $limites;
    }
    
    function evalue_fortune($or)
    {
        if($or >= 110)
        {
            return "Voila un beau pécule ! ";
        }
        else if($or >= 80)
        {
            return "Un fortune correcte pour démarrer ! ";
        }
        else if($or >= 40)
        {
            return "Bon, c'est pas la gloire mais y a pire ! ";
        }
        else
        {
            return "Pas de chance, vous êtes officiellement un crevard. ";
        }
    }
    
    function evalue_destin($destin)
    {
        switch($destin)
        {
            case 0:
                return "Oups, pas de chance. Soyez prudent et évitez d'aller chatouiller des trolls géants sous les bras. ";
            break;
            
            case 1:
                return "Ah, vous aurez une seconde chance en cas de faux pas et de vrai troll. ";
            break;
            
            case 2:
                return "C'est un bon score. Mais bon prudence tout de même, mourir ça laisse des séquelles. ";
            break;
            
            case 3:
                return "Quelle chance, vous n'allez pas mourir tout de suite, pas définitivement du moins. ";
            break;
        }
    }
    
    function getCompetencesAChoisirPourHumainSansProfession()
    {
        $competences = Competence::Lister();
        
        $final = array();
        
        foreach($competences as $competence)
        {
            if($competence->NOM != "APPEL DU SAUVAGE (INT)")
            {
                $final[] = $competence;
            }
        }
        
        return $final;
    }
    
    function sontCompatibles($metier,$origine)
    {
        $caracs = array("FO","AD","INT","CHA","COU");
        foreach($caracs as $carac)
        {
            $min = $carac."MIN";
            $max = $carac."MAX";
            if($metier->$min > $origine->$max 
            || $origine->$min > $metier->$max 
            || $origine->$max < $metier->$min  
            || $origine->$max < $metier->$min)
            {
                return false;
            }
        }
        return true;
    }
    
    function fusionneCompetencesSansDoublons($competences1,$competences2)
    {
        $ids = array();  
        if(is_array($competences1) && is_array($competences2))
        {
            foreach($competences1 as $competence)
            {
                if(!in_array($competence->ID, $ids))
                {
                    $ids[] = $competence->ID;
                }
            }
            
            foreach($competences2 as $competence)
            {
                if(!in_array($competence->ID, $ids))
                {
                    $ids[] = $competence->ID;
                }
            }
        }        
        else if(empty($competences2) && !empty($competences1))
        {
            foreach($competences1 as $competence)
            {
                if(!in_array($competence->ID, $ids))
                {
                    $ids[] = $competence->ID;
                }
            }
        }
        else if(empty($competences1) && !empty($competences2))
        {
            foreach($competences2 as $competence)
            {
                if(!in_array($competence->ID, $ids))
                {
                    $ids[] = $competence->ID;
                }
            }
        }
        asort($ids);
        
        $liste = array();
        foreach($ids as $id)
        {
            if($id != 0 && $id != '' && $id != null)
            {
                $liste[] = new Competence($id);
            }            
        }
        
        return $liste;
    }
    
    function TableauExclusionCompetence($competences,$competencesAExclure)
    {
        $tableauResultat = array();  
        
        foreach($competences as $competence)
        {
            if(!in_array($competence, $competencesAExclure))
            {
                $tableauResultat[] = $competence;
            }
        }
        
        return $tableauResultat;
    }
?>