<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Choisir vos competences</h1>
    <p style="text-align:justify;">
        Merci <?php echo $aventurier->NOM; ?>, voici vos caractéristiques : <br>
    </p>
    <style>
        td
        {
            padding:5px;
        }
    </style>
    <table style='background-image:url("image/bg3.png");border: 1px #900000 solid;margin:auto;border-collapse:collapse;'>
    <tr><td colspan='2'  style='border-bottom:1px #900000 solid;text-align:center;'><?php echo $aventurier->NOM; ?></td></tr>
    <tr>
        <td colspan='2'  style='border-bottom:1px #900000 solid;text-align:center;'>
            <?php echo $aventurier->ORIGINE->NOM." "; 
            if( $aventurier->METIER->NOM == "Aucun")
            {
                echo "sans profession";
            }
            else
            {
                echo $aventurier->METIER->NOM;
            }
            ?>
        </td>
    </tr>
    <tr><td>Courage <?php getValeurCaracM($aventurier->COU); ?> : </td><td> <?php echo $aventurier->COU; ?> </td></tr>
    <tr><td>Intelligence <?php getValeurCaracF($aventurier->INT); ?> : </td><td> <?php echo $aventurier->INT; ?> </td></tr>
    <tr><td>Charisme <?php getValeurCaracM($aventurier->CHA); ?> : </td><td> <?php echo $aventurier->CHA; ?> </td></tr>
    <tr><td>Adresse <?php getValeurCaracF($aventurier->AD); ?> : </td><td> <?php echo $aventurier->AD; ?>	</td></tr>
    <tr><td style='border-bottom:1px #900000 solid;'>Force <?php getValeurCaracF($aventurier->FO); ?> : </td><td style='border-bottom:1px #900000 solid;'> <?php echo $aventurier->FO; ?> </td></tr>
    <tr><td>Energie Vitale (EV) :</td><td> <?php echo $aventurier->EV; ?> </td></tr>
    <?php 
        if($aventurier->EA != 0)
        {
            ?>
                <tr><td>Energie Astrale (EA)</td><td> <?php echo $aventurier->EA; ?> </td></tr>
            <?php
        }

        if($aventurier->MAGIEPSY != 0)
        {
            ?>
                <tr><td>Score de Magie Psychique : </td><td> <?php echo $aventurier->MAGIEPSY; ?> </td></tr>
            <?php
        }

        if($aventurier->MAGIEPHYS != 0)
        {
            ?>
                <tr><td>Score de Magie Physique : </td><td> <?php echo $aventurier->MAGIEPHYS; ?> </td></tr>
            <?php
        }
    ?>
    <tr><td style='border-top:1px #900000 solid;'>Attaque :</td><td style='border-top:1px #900000 solid;'> <?php echo $aventurier->AT; ?> </td></tr>
    <tr><td>Parade :</td><td> <?php echo $aventurier->PRD; ?> </td></tr>
    <tr><td>Protection maximum : </td><td> <?php if($aventurier->PR_MAX == 0){echo "pas de limite";}else{echo $aventurier->PR_MAX;} ?> </td></tr>
    <tr><td style='border-top:1px #900000 solid;'>Résistance Magique :</td><td style='border-top:1px #900000 solid;'> <?php echo $aventurier->RESISTMAG; ?> </td></tr>
    
    </table>
    <p>
        Il s'agit maintenant de choisir vos compétences. 
        <?php 
            $metier = $aventurier->METIER->NOM;
            if($metier == "Aucun")
            {
                $metier = "sans profession";
            }
            
            if($aventurier->ORIGINE->NOM == "Humain" && $metier == "sans profession")
            {
                ?>
                    En tant que <?php echo $aventurier->ORIGINE->NOM;?> <?php echo $metier;?>, vous n'avez pas de compétences naturelles. Mais vous pouvez choisir deux compétences supplémentaires parmis celles-ci :<br>
                </p>
                <?php
            }
            else
            {
                ?>
                En tant que <?php echo $aventurier->ORIGINE->NOM;?> <?php echo $metier;?>, vous avez naturellement les compétences suivantes :<br>
                </p>
                <table>
                    <tr>
                        <?php 
                            $compte = 0;
                            foreach($competencesLiees as $competenceLiee)
                            {   
                                if($compte != 0)
                                {
                                    $compte = -1;
                                }
                                else
                                {
                                    echo "</tr><tr>";
                                }        
                                
                                echo "<td style='width:50%;vertical-align:top;'><div style='text-align:center;border:1px #900000 solid;margin:auto;background-image:url(\"image/bg3.png\");'>".$competenceLiee->NOM."<br><i style='font-size:14px;'>".$competenceLiee->SPECIAL."</i></div></td>";
                                
                                $compte++;
                            }
                        ?>
                    </tr>
                </table>
                 <div style='clear:both'> </div><br>
                <p style="text-align:justify;">
                    Mais vous pouvez choisir deux compétences supplémentaires parmis celles-ci :<br>
                </p>
            <?php 
            }
        ?>
   
    <div>
    <table>
        <tr>
    <?php 
        $compte = 0;
        foreach($competencesAChoisir as $competenceAChoisir)
        {
            if($compte != 0)
            {
                $compte = -1;
            }
            else
            {
                echo "</tr><tr>";
            }        
            
            echo "<td style='width:50%;vertical-align:top;'><div style='text-align:center;border:1px #900000 solid;margin:auto;background-image:url(\"image/bg3.png\");'>".$competenceAChoisir->NOM."<br><i style='font-size:14px;'>".$competenceAChoisir->SPECIAL."</i></div></td>";
            
            $compte++;
        }
    ?>
        </tr>
    </table>
    </div>
    <div>
        <form action='index.php' method='get'>
            <input type='hidden' name='etape' value='4' />
            <input type='hidden' name='ctrl' value='nouvelAventurier' />
            <style>
                select
                {
                    font-size:20px;
                }
            </style>
            <div class='formulaireParchemin'>
                <br>
                Je choisis
                <select name='competence1'>
                    <option value='0'>Aucune compétence</option>
                    <?php
                        foreach($competencesAChoisir as $competence)
                        {
                            ?>
                            <option value='<?php echo $competence->ID; ?>'><?php echo $competence->NOM; ?></option>
                            <?php
                        }
                    ?>
                </select>
                 et 
                <select name='competence2'>
                    <option value='0'>Aucune compétence</option>
                    <?php 
                    foreach($competencesAChoisir as $competence)
                    {
                        ?>
                        <option value='<?php echo $competence->ID; ?>'><?php echo $competence->NOM; ?></option>
                        <?php
                    }
                ?>
                </select><br><br>
                <input class='bouton' type='submit' value='sélectionner ces compétences' />
            </div>
        </form>
    </div>
</div>