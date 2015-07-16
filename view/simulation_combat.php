<?php 
    $chercher_des_noises = new Competence(14);

    $prioritaires = array();
    
    $ordre = array();
    $indexOrdre = 0;
    
    foreach((array)$aventuriers as $aventurier)
    {
        if($aventurier->possedeCompetence($chercher_des_noises))
        {
            $prioritaires[] = $aventurier;
        }
        else
        {
            $nonPrioritaires[] = $aventurier;
        }
    }
    
    for($cou = 20; $cou>0; $cou--)
    {
        $indexOrdre = count($ordre);
        foreach((array)$prioritaires as $aventurier)
        {
            if($aventurier->COU == $cou)
            {
                $ordre[$indexOrdre][] = $aventurier;
            }
        }
    }     
    
    for($cou = 20; $cou>0; $cou--)
    {
        $indexOrdre = count($ordre);
        
        foreach((array)$nonPrioritaires as $aventurier)
        {
            if($aventurier->COU == $cou)
            {
                $ordre[$indexOrdre][] = $aventurier;
            }
        }
        foreach((array)$mobs as $mob)
        {
            if($mob->cou == $cou)
            {
                $ordre[$indexOrdre][] = $mob;
            }
        }
    }  
    
    
?>
<div class='principal_avec_pub'>
    <table>
        <tr>
            <td>
                <div style='float:left;width:300px;border:1px #900000 solid;'>
                    <div style='text-align:center'><u>Equipe 1</u></div>
                    <?php 
                        foreach($aventuriers as $aventurier)
                        {
                            echo "<table>";
                                echo "<tr><td colpan='2' >".$aventurier->NOM."</td></tr>";
                                echo "<tr><td>COU:</td><td id='cou_aventurier_".$aventurier->ID."' >".$aventurier->COU."</td></tr>";
                                echo "<tr><td>EV :</td><td id='ev_aventurier_".$aventurier->ID."' >".$aventurier->EV."</td></tr>";
                                echo "<tr><td>AT : </td><td id='at_aventurier_".$aventurier->ID."'>".$aventurier->AT."</td></tr>";
                                echo "<tr><td>PRD: </td><td id='prd_aventurier_".$aventurier->ID."'>".$aventurier->PRD."</td></tr>";
                            echo "</table>";
                        }
                    ?>
                </div>
            </td>
            <td>
                <div style='text-align:center;width:400px;border:1px #900000 solid;padding:10px;'><u>Résumé du combat</u>
                    <p style='text-align:center'> Ordre d'attaque : <br>
                    <?php 
                        $compte = 1;
                        foreach($ordre as $key=>$value)
                        {                            
                            foreach($value as $aventurier)
                            {                                
                                if(get_class($aventurier) == "Aventurier")
                                {
                                    echo $compte." : ".$aventurier->NOM."<br>";
                                    $compte++;
                                }
                                else
                                {
                                    echo $compte." : ".$aventurier->nom."<br>";
                                    $compte++;
                                }
                            }
                        }
                    ?>
                    </p>
                    <p>Le combat commence !</p>
                    <div id='texte_combat'></div>
                    <div style='text-align:center;'><input type='submit' value='Tour suivant' style='width:200px;'/></div>
                </div>
            </td>
            <td>
            <div style='float:right;width:300px;border:1px #900000 solid;'>
                <div style='text-align:center'><u>Equipe 2</u></div>
                <?php 
                    foreach($mobs as $mob)
                    {
                        echo "<table>";
                            echo "<tr><td colpan='2' >".$mob->nom."</td></tr>";
                            echo "<tr><td>EV :</td><td id='cou_mob_".$mob->id_mob."' >".$mob->ev."</td></tr>";
                            echo "<tr><td>EV :</td><td id='ev_mob_".$mob->id_mob."' >".$mob->ev."</td></tr>";
                            echo "<tr><td>AT : </td><td id='at_mob_".$mob->id_mob."'>".$mob->at."</td></tr>";
                            echo "<tr><td>PRD: </td><td id='prd_mob_".$mob->id_mob."'>".$mob->prd."</td></tr>";
                            echo "<tr><td>PI : </td><td id='pi_mob_".$mob->id_mob."'>".$mob->pi."</td></tr>";
                        echo "</table>";
                    }
                ?>
                </div>  
            </td>
        </tr>
    </table>
</div>
<script>
    var combattant_actuel = 99999999;
    var tour_actuel = 0;
    
    var ordre_combattant = [<?php 
        $compte = 0;
        foreach($ordre as $key=>$value)
        {
            foreach($value as $aventurier)
            {                                
                if($compte>0)
                {
                    echo ",";
                }
                if(get_class($aventurier) == "Aventurier")
                {
                    echo '"aventurier_'.$aventurier->ID.'"';
                }
                else
                {
                    echo '"mob_'.$mob->id_mob.'"';
                }
                $compte++;
            }
        }
    ?>];
    var aventurier = [<?php 
        $compte = 0;
        foreach($aventuriers as $aventurier)
        {                                
            if($compte>0)
            {
                echo ",";
            }
            echo '"aventurier_'.$aventurier->ID.'"';           
            $compte++;
        }
    ?>];
    var ennemi = [<?php
        $compte = 0;
        foreach($mobs as $mob)
        {                                
            if($compte>0)
            {
                echo ",";
            }
            echo '"mob_'.$mob->id_mob.'"';           
            $compte++;
        }
    ?>];
    
    function a_qui_le_tour()
    {
        combattant_actuel++;
        if(combattant_actuel > ordre_combattant.length)
        {
            combattant_actuel = 0;
            tour_actuel++;
        }
        $("#texte_combat").append("<p>Tour "+tour_actuel+"</p>");
    }

</script>
