<div class='principal_avec_pub'>    
    <?php 
        $ids = array();
        $listeAventuriers = array();

        for($a=1;$a<=$_POST["maxID"];$a++)
        {
            if(isset($_POST["aventurier".$a]))
            {
                $aventurier = new Aventurier($a);
                $listeAventuriers[] = $aventurier;
                $ids[] = $a;
            }
        }
        $tds = array();
        $tds[0] = array();
        $tds[1] = array();
        $tds[2] = array();
        $tds[3] = array();
        $indextd = 0;
        foreach($listeAventuriers as $aventurier)
        {
            $tds[$indextd][] = $aventurier;
            $indextd++;
            if($indextd == 4)
            {
                $indextd = 0;
            }
        }
    ?>
    <div style='text-align:center;'>
        <a target='blank_' href='view/fiche_MJ_aventuriers_imprimable.php?ids=<?php foreach($ids as $id){echo $id."-";}?>'>
            <input type='button' value='version imprimable' style='width:200px;'/>
        </a>
    </div>
    <table>
        <tr>
            <td>
                <div style='float-left;border:1px #900000 solid;padding:10px;width:200px;background-image:url("image/bg3.png");'>
                    <div style='text-align:center;'><u>Initiative au combat</u></div>
                    <?php 
                        $chercher_des_noises = new Competence(14);

                        $prioritaires = array();
                        
                        $ordre = array();
                        $indexOrdre = 0;
                        
                        foreach($listeAventuriers as $aventurier)
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
                            foreach($prioritaires as $aventurier)
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
                            foreach($nonPrioritaires as $aventurier)
                            {
                                if($aventurier->COU == $cou)
                                {
                                    $ordre[$indexOrdre][] = $aventurier;
                                }
                            }
                        }  
                        
                        foreach($ordre as $key=>$value)
                        {
                            $compte = 0;
                            echo ($key+1)." : ";
                            foreach($value as $aventurier)
                            {
                                if($compte)
                                {
                                    echo " / ";
                                }
                                echo $aventurier->NOM;
                                $compte++;
                            }
                            echo "<br>";
                        }
                        
                    ?>
                </div>
            </td>
            <td>
                <div style='text-align:center;background-image:url("image/bg3.png");border:1px #900000 solid;padding:5px;'><u>Face au danger</u>
                    <table style='border-collapse:collapse;'>
                        <tr><td></td><td style='border:1px #900000 solid;' >Nyctalopie</td><td style='border:1px #900000 solid;' >flaire le danger</td><td style='border:1px #900000 solid;' >Attire les mobs</td><td style='border:1px #900000 solid;' >Tombe piège</td></tr>
                        <?php 
                            $attire_mobs = new Competence(9);
                            $piege = new Competence(48);
                            foreach($listeAventuriers as $aventurier)
                            {
                                echo "<tr>";
                                    echo "<td style='border:1px #900000 solid;' >".$aventurier->NOM."</td>";
                                    echo "<td style='border:1px #900000 solid;' >";
                                    if($aventurier->ORIGINE == "Haut-elfe" || $aventurier->ORIGINE == "Demi-elfe" || $aventurier->ORIGINE == "Demi-orque")
                                    {
                                        echo "Moyenne";
                                    }
                                    else if($aventurier->ORIGINE == "Elfe-sylvain" || $aventurier->ORIGINE == "Elfe-noir" || $aventurier->ORIGINE == "Orque" || $aventurier->ORIGINE == "Gobelin")
                                    {
                                        echo "Totale";
                                    }
                                    echo "</td>";
                                    echo "<td style='border:1px #900000 solid;' >";
                                    if($aventurier->ORIGINE == "Ogre" || $aventurier->ORIGINE == "Gobelin" || $aventurier->ORIGINE == "Orque")
                                    {
                                        echo "Oui, à 50m";
                                    }
                                    else if($aventurier->ORIGINE == "Elfe-sylvain" || $aventurier->ORIGINE == "Elfe-noir")
                                    {
                                        echo "Un peu";
                                    }
                                    else if($aventurier->ORIGINE == "Demi-orque")
                                    {
                                        echo "Oui, à 25m";
                                    }
                                    echo "</td>";
                                    echo "<td style='border:1px #900000 solid;text-align:center;' >";
                                    if($aventurier->possedeCompetence($attire_mobs))
                                    {
                                        echo "X";
                                    }
                                    echo "</td>"; 
                                    echo "<td style='border:1px #900000 solid;text-align:center;' >";
                                    if($aventurier->possedeCompetence($piege))
                                    {
                                        echo "X";
                                    }
                                    echo "</td>";                        
                                echo "</tr>";
                            }
                        ?>
                    </table>      
                </div>
            </td>
            <td>
                 <div style='float-left;border:1px #900000 solid;padding:10px;width:200px;background-image:url("image/bg3.png");'>
                    <div style='text-align:center;'><u>Initiative au butin</u></div>
                    <?php 
                        $fouiller_poubelle = new Competence(27);
                        $nonPrioritaires = array();
                        foreach($listeAventuriers as $aventurier)
                        {
                            if($aventurier->possedeCompetence($fouiller_poubelle))
                            {
                                echo "1 : ".$aventurier->NOM."<br>";
                            }
                            else
                            {
                                $nonPrioritaires[] = $aventurier;
                            }
                        }
                        
                        foreach($nonPrioritaires as $aventurier)
                        {
                            echo "2 : ".$aventurier->NOM."<br>";
                        }
                        
                    ?>
                </div>
            </td>
        </tr>
    </table>
    
    <div>
        <table>
            <tr>
                <td style='vertical-align:top;'>
                <?php 
                    foreach($tds[0] as $aventurier)
                    {
                        $aventurier->ficheMJ();
                    }
                ?>
                </td>
                <td style='vertical-align:top;'>
                <?php 
                    foreach($tds[1] as $aventurier)
                    {
                        $aventurier->ficheMJ();
                    }
                ?>
                </td >
                <td style='vertical-align:top;'>
                <?php 
                    foreach($tds[2] as $aventurier)
                    {
                        $aventurier->ficheMJ();
                    }
                ?>
                </td>
                <td style='vertical-align:top;'>
                <?php 
                    foreach($tds[3] as $aventurier)
                    {
                        $aventurier->ficheMJ();
                    }
                ?>
                </td>
            </tr>
        </table>
    </div>
    <div style='clear:both;'></div>
</div>
