<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Choisir une origine et un métier</h1>
    <div>
    <u>Voici vos résultats : </u><br><br>
    <?php des($aventurier->COU - 7); ?>
    <?php des($aventurier->INT - 7); ?>
    <?php des($aventurier->CHA - 7); ?>
    <?php des($aventurier->AD - 7); ?>
    <?php des($aventurier->FO - 7); ?>
    </div>
    
    <div style='margin-top:70px;'>
    <u>Ce qui vous donne comme caractéristiques :</u><br />
    
    <table>
    <tr><td>Courage <?php getValeurCaracM($aventurier->COU); ?> : </td><td> <?php echo $aventurier->COU; ?> </td></tr>
    <tr><td>Intelligence <?php getValeurCaracF($aventurier->INT); ?> : </td><td> <?php echo $aventurier->INT; ?> </td></tr>
    <tr><td>Charisme <?php getValeurCaracM($aventurier->CHA); ?> : </td><td> <?php echo $aventurier->CHA; ?> </td></tr>
    <tr><td>Adresse <?php getValeurCaracF($aventurier->AD); ?> : </td><td> <?php echo $aventurier->AD; ?>	</td></tr>
    <tr><td>Force <?php getValeurCaracF($aventurier->FO); ?> : </td><td> <?php echo $aventurier->FO; ?> </td></tr>
    <tr><td>Protection maximum : </td><td> <?php if($aventurier->PR_MAX == 0){echo "pas de limite";}else{echo $aventurier->PR_MAX;} ?> </td></tr>
    </table>
    </div>
    
    <div style='text-align:justify;'>
    <br>
    De quelle contrée serez-vous originaire ? Vos caractéristiques vous donneront accès aux origines suivantes :<br>
    <?php 
        foreach($listeOrigines as $origine)
        {
            ?>
            <div class='cadreRougebg'><?php echo $origine; ?><span class='QMright' onclick='showPDF("<?php echo $origine; ?>")'>?</span></div>
            <?php
        }
    ?>
    <div style='clear:both;'> </div>
    <br>
        Avant de partir à l'aventure, vous devrez également vous choisir un métier (si vous avez la chance de pouvoir en choisir un). Vos caractéristiques peuvent correspondre à tous ces métiers :<br>
    </div>
    <?php 
        foreach($listeMetiers as $metier)
        {
            if($metier->NOM == "Aucun")
            {
                ?>
                    <div class='cadreRougebg' style='text-align:center;'><?php echo $metier; ?></div>
                <?php
            }
            else
            {
                ?>
                    <div class='cadreRougebg'><?php echo $metier; ?><span class='QMright' onclick='showPDF("<?php echo $metier; ?>")'>?</span></div>
                <?php
            }            
        }
    ?>
    <div style='clear:both;font-size:12px;'>*Si vous êtes humain et que vous ne choisissez pas de métier, vous pourrez choisir deux compétences à la place.</div>
    <br>
    <br>
    <div style='text-align:center;'>
        Merci de remplir la première page du formulaire en vous choisissant un nom, un sexe, une origine et éventuellement un métier : <br/>
        <form action='index.php' method='get'>
            <input type='hidden' name='etape' value='3' />
            <input type='hidden' name='ctrl' value='nouvelAventurier' />
            <div class='formulaireParchemin'>
                <br>
                Je me nomme <input class='bouton' type='text' name='nom' id='nom'/><br><br> Je suis un(e) 
                <select name='origine'>
                    <?php
                        foreach($listeOrigines as $origine)
                        {
                            ?>
                            <option value='<?php echo $origine->ID; ?>'><?php echo $origine; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <select name='metier'>
                    <?php 
                    foreach($listeMetiers as $metier)
                    {
                        ?>
                        <option value='<?php echo $metier->ID; ?>'>
                        <?php 
                        if($metier == "Aucun")
                        {
                            $metier = "Sans profession";
                        }
                        echo $metier; 
                        ?>
                        </option>
                        <?php
                    }
                ?>
                </select>
                <br><br>De sexe 
                <select name='sexe'>
                    <option value='Masculin' >Masculin</option>
                    <option value='Féminin' >Féminin</option>
                </select><br><br>
                <input class='bouton' type='submit' value='sélectionner cette combinaison' />
            </div>
        </form>
    </div><br><br>
    <div>
        Quoi ? vous n'êtes pas satisfait par ce que vous a offert le destin ? Bon... <br>
        Vous pouvez éventuellement payer une pizza à votre Maitre de Jeu pour qu'il vous autorise à échanger deux caractéristiques, cela vous donnerait les possibilités suivantes :<br><br>
        <?php 
            $tableau_base = array($aventurier->COU,$aventurier->INT,$aventurier->CHA,$aventurier->AD,$aventurier->FO);
            
            $nbr = 0;
            $temp_tab[] = array($aventurier->COU,$aventurier->INT,$aventurier->CHA,$aventurier->AD,$aventurier->FO);
            
            $temp_tab[] = array($aventurier->INT,$aventurier->COU,$aventurier->CHA,$aventurier->AD,$aventurier->FO);
            $temp_tab[] = array($aventurier->CHA,$aventurier->INT,$aventurier->COU,$aventurier->AD,$aventurier->FO);
            $temp_tab[] = array($aventurier->AD,$aventurier->INT,$aventurier->CHA,$aventurier->COU,$aventurier->FO);
            $temp_tab[] = array($aventurier->FO,$aventurier->INT,$aventurier->CHA,$aventurier->AD,$aventurier->COU);
            
            $temp_tab[] = array($aventurier->COU,$aventurier->CHA,$aventurier->INT,$aventurier->AD,$aventurier->FO);
            $temp_tab[] = array($aventurier->COU,$aventurier->AD,$aventurier->CHA,$aventurier->INT,$aventurier->FO);
            $temp_tab[] = array($aventurier->COU,$aventurier->FO,$aventurier->CHA,$aventurier->AD,$aventurier->INT);
            
            $temp_tab[] = array($aventurier->COU,$aventurier->INT,$aventurier->AD,$aventurier->CHA,$aventurier->FO);
            $temp_tab[] = array($aventurier->COU,$aventurier->INT,$aventurier->FO,$aventurier->AD,$aventurier->CHA);
            
            $temp_tab[] = array($aventurier->COU,$aventurier->INT,$aventurier->CHA,$aventurier->FO,$aventurier->AD);
            
            $tableau_final = array();
            foreach($temp_tab as $tab)
            {
                if($tab != $tableau_base && !in_array($tab, $tableau_final))
                {
                    $tableau_final[] = $tab;
                }
            }
            
            $compte =0;
            foreach($tableau_final as $tab)
            {
                echo "<div style='float:left;border:1px black solid;padding:10px;width:480px;margin:20px;' class='formulaireParchemin' ><span style='font-size:24px;' >Echange ";
                $listeOrigines = Origine::getOriginesPossibles($tab[0],$tab[2],$tab[1],$tab[3],$tab[4]);
                $listeMetiers = Metier::getMetiersPossibles($tab[0],$tab[2],$tab[1],$tab[3],$tab[4]);
                
                $a=0;
                if($tab[0] != $aventurier->COU)
                {
                    if($a >0)
                    {
                        echo " et ";
                    }
                    $a++;                    
                    echo "de COURAGE";
                }
                if($tab[1] != $aventurier->INT)
                {
                    if($a >0)
                    {
                        echo " et ";
                    }
                    $a++;                    
                    echo "d'INTELLIGENCE";
                }
                if($tab[2] != $aventurier->CHA)
                {
                    if($a >0)
                    {
                        echo " et ";
                    }
                    $a++;                    
                    echo "de CHARISME";
                }
                if($tab[3] != $aventurier->AD)
                {
                    if($a >0)
                    {
                        echo " et ";
                    }
                    $a++;                    
                    echo "d'ADRESSE";
                }
                if($tab[4] != $aventurier->FO)
                {
                    if($a >0)
                    {
                        echo " et ";
                    }
                    $a++;                    
                    echo "de FORCE";
                }
                ?>
                </span>
                <br><br>
                <table>
                    <tr><th colspan='2' style='border-bottom:1px #900000 solid;padding:5px;'>Caractéristiques</th>
                    <th style='border-bottom:1px #900000 solid;padding:5px;'>Origines possibles</th>
                    <th style='border-bottom:1px #900000 solid;padding:5px;'>Métiers possibles</th></tr>
                    <tr>                       
                        <td>Courage <?php getValeurCaracM($tab[0]); ?> : </td><td> <?php echo $tab[0]; ?> </td>
                        <td rowspan='5' style="vertical-align:top;">
                            <?php 
                                foreach($listeOrigines as $origine)
                                {
                                    echo $origine->NOM."<br/>";
                                }
                            ?>
                        </td>
                        <td rowspan='5' style="vertical-align:top;">
                            <?php 
                                foreach($listeMetiers as $metier)
                                {
                                    echo $metier->NOM."<br/>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr><td>Intelligence <?php getValeurCaracF($tab[1]); ?> : </td><td> <?php echo $tab[1]; ?> </td></tr>
                    <tr><td>Charisme <?php getValeurCaracM($tab[2]); ?> : </td><td> <?php echo $tab[2]; ?> </td></tr>
                    <tr><td>Adresse <?php getValeurCaracF($tab[3]); ?> : </td><td> <?php echo $tab[3]; ?>	</td></tr>
                    <tr><td>Force <?php getValeurCaracF($tab[4]); ?> : </td><td> <?php echo $tab[4]; ?> </td></tr>
                    <tr>
                        <td colspan='4'>
                            <br>
                            <form method='get' action='index.php'>
                                <input type='hidden' name='etape' value='2' />
                                <input type='hidden' name='ctrl' value='nouvelAventurier' />
                                <input type='hidden' name='COU' value='<?php echo $tab[0]; ?>' />
                                <input type='hidden' name='INT' value='<?php echo $tab[1]; ?>' />
                                <input type='hidden' name='CHA' value='<?php echo $tab[2]; ?>' />
                                <input type='hidden' name='AD' value='<?php echo $tab[3]; ?>' />
                                <input type='hidden' name='FO' value='<?php echo $tab[4]; ?>' />
                                <input class='bouton' type='submit' value='sélectionner cette combinaison' />
                            </form>
                        </td>
                    </tr>
                </table>
                <?php 
                echo "</div>";
                $compte++;
                if($compte%2 == 0)
                {
                    echo "<div style='clear:both;' ></div>";
                }
            }
            
        echo "<div style='clear:both;' ></div>";
            
        ?>
        <br>
        Si rien de tout cela ne vous convient et que vous voulez carrément refaire un essai, cliquez ici (même si c'est mal) :<br><br>
        <form method='get' action='index.php'>
            <input type='hidden' name='etape' value='2' />
            <input type='hidden' name='ctrl' value='nouvelAventurier' />
            <?php 
            if(isset($_GET["metier"]))
            {
                ?>
                    <input type='hidden' name='metier' value='<?php echo $_GET["metier"]; ?>' />
                <?php
            }
            if(isset($_GET["origine"]))
            {
                ?>
                    <input type='hidden' name='origine' value='<?php echo $_GET["origine"]; ?>' />
                <?php 
            }
            ?>
            <input class='bouton' type='submit' value='Relancer les dés discrètement telle une fouine furtive du chaos' />
        </form>
    </div>
</div>