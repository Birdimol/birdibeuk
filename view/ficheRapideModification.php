<div class='principal_avec_pub'>
	<h1 style='text-align:center;'>Modifier une fiche</h1>
    <form method='post' action='index.php?ctrl=ficheRapide&action=action_modification&codeacces=<?php echo $aventurier->codeacces;?>&id_aventurier=<?php echo $aventurier->ID;?>'>    
        <style>
            td
            {
                vertical-align:top;
            }
        </style>        
        <div style='border-bottom:1px #900000 solid;text-align:center;cursor:pointer;' onclick='showDiv("divDonnees");'><h2 style='margin-bottom:0px;'>1: Données de l'aventurier</h2></div>
        <div id='divDonnees'>
        <table class='default'>
            <tr><td><label for='NOM'>NOM</label></td><td><input type='text' id='NOM' value='<?php echo $aventurier->NOM;?>' name='NOM' /></td></tr>
            <tr><td><label for='SEXE'>SEXE</label></td><td><input type='text' id='SEXE' value='<?php echo $aventurier->SEXE;?>' name='SEXE' /></td></tr>
            <tr><td><label for='NIVEAU'>NIVEAU</label></td><td><input type='text' id='NIVEAU' value='<?php echo $aventurier->NIVEAU;?>' name='NIVEAU' /></td></tr>
            <tr>
                <td><label for='ID_ORIGINE'>ORIGINE</label></td>
                <td>
                    <select id='ID_ORIGINE' value='' name='ID_ORIGINE' class='normal'>
                    <?php 
                        foreach($origines as $origine)
                        {
                            echo "<option value='".$origine->ID."' ";
                            if($origine->ID == $aventurier->ID_ORIGINE)
                            {
                                echo " selected ";
                            }
                            echo ">".$origine->nom."</option>";
                        }
                    ?>
                    </select>
                </td>                
            </tr>
            <tr>
                <td><label for='ID_METIER'>METIER</label></td>
                <td>
                    <select id='ID_METIER' value='' name='ID_METIER'  class='normal'>
                    <?php 
                        foreach($metiers as $metier)
                        {
                            echo "<option value='".$metier->ID."' ";
                            if($metier->ID == $aventurier->ID_METIER)
                            {
                                echo " selected ";
                            }
                            echo ">".$metier->nom."</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr><td><label for='EV'>EV</label></td><td><input type='text' id='EV' value='<?php echo $aventurier->EV;?>' name='EV' /></td></tr>
            <tr><td><label for='EA'>EA</label></td><td><input type='text' id='EA' value='<?php echo $aventurier->EA;?>' name='EA' /></td></tr>
            <tr>
                <td colspan='2'>
                    <table style='width:100%;'>
                        <tr>
                            <td style='width:20%;'><label for='COU'>COU</label></td>
                            <td style='width:20%;'><label for='INT'>INT</label></td>
                            <td style='width:20%;'><label for='CHA'>CHA</label></td>
                            <td style='width:20%;'><label for='AD'>AD</label></td>
                            <td style='width:20%;'><label for='FO'>FO</label></td>
                        </tr>
                        <tr>
                            <td style='border-bottom:0px;' ><input type='text' id='COU' style='width:20px;' value='<?php echo $aventurier->COU;?>' name='COU' /></td>
                            <td style='border-bottom:0px;' ><input type='text' id='INT' style='width:20px;' value='<?php echo $aventurier->INT;?>' name='INT' /></td>
                            <td style='border-bottom:0px;' ><input type='text' id='CHA' style='width:20px;' value='<?php echo $aventurier->CHA;?>' name='CHA' /></td>
                            <td style='border-bottom:0px;' ><input type='text' id='AD' style='width:20px;' value='<?php echo $aventurier->AD;?>' name='AD' /></td>
                            <td style='border-bottom:0px;' ><input type='text' id='FO' style='width:20px;' value='<?php echo $aventurier->FO;?>' name='FO' /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $aventurier->AT;?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $aventurier->PRD;?>' name='PRD' /></td></tr>
            <tr><td><label for='RESISTMAG'>RESISTANCE MAGIQUE</label></td><td><input type='text' id='RESISTMAG' value='<?php echo $aventurier->RESISTMAG;?>' name='RESISTMAG' /></td></tr>
            <tr><td><label for='MAGIEPHYS'>MAGIE PHYSIQUE</label></td><td><input type='text' id='MAGIEPHYS' value='<?php echo $aventurier->MAGIEPHYS;?>' name='MAGIEPHYS' /></td></tr>
            <tr><td><label for='MAGIEPSY'>MAGIE PSYCHIQUE</label></td><td><input type='text' id='MAGIEPSY' value='<?php echo $aventurier->MAGIEPSY;?>' name='MAGIEPSY' /></td></tr>
            
            <tr>
                <td><label for='ID_TYPEMAGIE'>TYPE DE MAGIE</label></td>
                <td>
                    <select id='ID_TYPEMAGIE' value='' name='ID_TYPEMAGIE'  class='normal'>
                        <option value='0'>Aucune</option>
                    <?php 
                        foreach($magies as $magie)
                        {
                            echo "<option value='".$magie->ID_MAGIE."' ";
                            if($magie->ID_MAGIE == $aventurier->ID_TYPEMAGIE)
                            {
                                echo " selected ";
                            }
                            echo ">".$magie->NOM."</option>";
                        }
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td><label for='ID_DIEU'>DIEU</label></td>
                <td>
                    <select id='ID_DIEU' value='' name='ID_DIEU'  class='normal'>
                         <option value='0'>Aucun</option>
                    <?php 
                        foreach($dieux as $dieu)
                        {
                            echo "<option value='".$dieu->ID_DIEU."' ";
                            if($dieu->ID_DIEU == $aventurier->ID_DIEU)
                            {
                                echo " selected ";
                            }
                            echo ">".$dieu->NOM."</option>";
                        }
                    ?>
                    </select></td></td>
            </tr>
            
            <tr><td><label for='XP'>XP</label></td><td><input type='text' id='XP' value='<?php echo $aventurier->XP;?>' name='XP' /></td></tr>
            <tr><td><label for='DESTIN'>DESTIN</label></td><td><input type='text' id='DESTIN' value='<?php echo $aventurier->DESTIN;?>' name='DESTIN' /></td></tr>
            <tr><td><label for='OR'>PIECES D'OR</label></td><td><input type='text' id='OR' value='<?php echo $aventurier->OR;?>' name='OR' /></td></tr>
            <tr><td><label for='ARGENT'>PIECES D'ARGENT</label></td><td><input type='text' id='ARGENT' value='<?php echo $aventurier->ARGENT;?>' name='ARGENT' /></td></tr>
            <tr><td><label for='CUIVRE'>PIECES DE CUIVRE</label></td><td><input type='text' id='CUIVRE' value='<?php echo $aventurier->CUIVRE;?>' name='CUIVRE' /></td></tr>
            <tr><td><label for='PR'>PR</label></td><td><input type='text' id='PR' value='<?php echo $aventurier->PR;?>' name='PR' /></td></tr>
            <tr><td><label for='PR'>PR MAX</label></td><td><input type='text' id='PR_MAX' value='<?php echo $aventurier->PR_MAX;?>' name='PR_MAX' /></td></tr>
            <tr>
                <td><label for='codeacces'>CODE D'ACCÈS À LA FICHE</label></td>
                <td>
                    <input type='text' id='codeacces' value='<?php echo $aventurier->codeacces;?>' name='codeacces' />
                    <p class='petit' >Ce code vous permettra de modifier<br /> la fiche lors de vos prochaines visites.</p>
                </td>
            </tr>
        </table>
        </div>
        <div style='border-bottom:1px #900000 solid;text-align:center;cursor:pointer;' onclick='showDiv("divCompetences");'><h2 style='margin-bottom:0px;cursor:pointer;'>2: Compétences</h2></div>
        <div id='divCompetences'>
        <input type='button' value='selectionner les compétences de l&apos;origine' onclick='majCompetenceOrigine()' /> &nbsp;
        <input type='button' value='selectionner les compétences du m&eacute;tier' onclick='majCompetenceMetier()' />
        <table>
            <tr>
                <td>
                    <?php 
                        
                        $compte = 0;                    
                        foreach($competences as $competence)
                        {
                            echo "<div><input type='checkbox' name='competence".$competence->ID."' id='competence".$competence->ID."'";
                            if($aventurier->possedeCompetence($competence))
                            {
                                echo " checked ";
                            }
                            echo "/>".$competence->NOM."</div>";
                            $compte++;
                            if($compte > 9)
                            {
                                echo "</td><td>";
                                $compte = 0;
                            }
                        }
                    ?>
                </td>
            </tr>
        </table>
        </div>
        <div style='border-bottom:1px #900000 solid;text-align:center;cursor:pointer;' onclick='showDiv("divEquipements");'><h2 style='margin-bottom:0px;'>3: Equipement</h2></div>
        <div id='divEquipements'>
        <table style='margin:auto;margin-top:20px;'>
            <tr>
                <td style='vertical-align:top;'>
                    <div style='text-align:center;'>Votre équipement :</div>
                    <table id='equipements' style='width:600px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr><th>Nombre</th><th>Nom</th><th>Précieux</th><th>Prix</th><th></th></tr>
                        <?php 
                            $id_objet = 0;
                            foreach($aventurier->equipements as $equipement)
                            {
                                echo "<tr id='ligne".$id_objet."'>
                                    <td style='text-align:center' id='NbrEqui".$equipement->ID."' >
                                        ".$equipement->nombre."
                                    </td>
                                    <td style='text-align:center'>
                                        <input type='hidden' id='HidNbrEqui".$equipement->ID."' name='HidNbrEqui".$equipement->ID."' value='".$equipement->nombre."'/>
                                        <input type='hidden' id='Equi".$equipement->ID."' name='Equi".$id_objet."' value='".$equipement->ID."'/>".$equipement->NOM."</td>
                                    <td style='text-align:center'><input type='checkbox' ";
                                if($equipement->precieux)
                                {
                                    echo " checked ";
                                }
                                echo " name='EquiPrecieux".$equipement->ID."' /></td>
                                    <td style='text-align:center'>".$equipement->PO;
                                if($equipement->PA || $equipement->PC)
                                {
                                    echo ".".$equipement->PA.$equipement->PC;
                                }
                                echo "</td>
                                    <td><input type='button' value='Retirer' onclick=\"retirer_equipement('ligne".$id_objet."','".$equipement->ID."','".$equipement->PO."');\" /></td>
                                </tr>";
                                $id_objet++;
                            }
                        ?>
                    </table><br>
                    <table style='width:600px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>                        
                        <tr>
                            <td colspan='3' style='text-align:center;' >
                                Créer une pièce d'équipement
                            </td>
                        </tr>
                        <tr>
                            <th>Nombre</th><th>Nom</th><th>PRIX</th><th></th>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' id='nombreNouvelEquipement'/>
                            </td>
                            <td>
                                <input type='text' id='nomNouvelEquipement'/>
                            </td>
                            <td>
                                <input type='text' size='2' id='PONouvelEquipement'/> PO 
                                <input type='text' size='2' id='PANouvelEquipement'/> PA 
                                <input type='text' size='2' id='PCNouvelEquipement'/> PC 
                            </td>
                             <td>
                                <input type='button' value='Ajouter' onclick='ajout_nouvel_equi()' />
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div style='text-align:center;'> S'équiper d'un équipement existant de type : <select class='normal' id='type_equipement' onchange='maj_type_equipement();'> 
                    <?php 
                        foreach($types_equipement as $type_equipement)
                        {
                            echo "<option value='".$type_equipement."' >".$type_equipement."</option>";
                        }                    
                    ?>
                    </select>
                    </div>
                    <div style='margin-top:5px;overflow:auto; height:200px;width:500px;border: 1px #900000 solid;background-image:url("image/bg3.png");'>
                        <table style='width:100%;'>
                            <tr><th>Nom</th><th>Prix</th><th></th></tr>
                            <?php 
                                $max_id = 0;                                
                                foreach($equipements as $equipement)
                                {
                                    if($equipement->ID > $max_id)
                                    {
                                        $max_id = $equipement->ID;
                                    }
                                    echo "<tr id='TR_EQUI_".$equipement->ID."'><td>".$equipement->NOM."</td><td>".$equipement->PO.".".$equipement->PA."</td><!--".$equipement->type."--><td>
                                    <input type='button' value='choisir' onclick='ajout_equi(".$equipement->ID.",\"".str_replace("'","&apos;",str_replace('"',"\\\"",$equipement->NOM))."\",\"".$equipement->PO.".".$equipement->PA."\");'/></td></tr>";
                                }
                            ?>
                            <script>var max_equipement = <?php echo $max_id;?>;</script>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        </div>
        <div style='border-bottom:1px #900000 solid;text-align:center;cursor:pointer;' onclick='showDiv("divArmes");'><h2 style='margin-bottom:0px;'>4: Armes</h2></div>
        <div id='divArmes'>
        <table style='margin:auto;margin-top:20px;'>
            <tr>
                <td style='vertical-align:top;'>
                    <div style='text-align:center;'>Vos armes :</div>
                    <table id='armes' style='width:800px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PI</th><th>RUP</th><th>AT</th><th>PRD</th><th>COU</th><th>INT</th><th>CHA</th><th>AD</th><th>FO</th><th></th></tr>
                        <?php 
                            foreach($aventurier->armes as $arme)
                            {
                                echo "<tr id='ligne".$id_objet."'>
                                <td><input type='hidden' name='Arme".$id_objet."' value='".$arme->ID."'/>".$arme->NOM."</td>
                                <td>".$arme->type."</td>
                                <td>".$arme->PRIX."</td>
                                <td>".$arme->PI."</td>
                                <td>".$arme->RUP."</td>
                                <td>".$arme->AT."</td>
                                <td>".$arme->PRD."</td>
                                <td>".$arme->COU."</td>
                                <td>".$arme->INT."</td>
                                <td>".$arme->CHA."</td>
                                <td>".$arme->AD."</td>
                                <td>".$arme->FOR."</td>
                                <td><input type='button' value='Retirer' onclick=\"retirer_arme('ligne".$id_objet."');\" /></td></tr>";
                                $id_objet++;
                            }
                        ?>
                    </table><br>
                    <table style='width:800px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr>
                            <td colspan='3' style='text-align:center;' >
                                Créer une arme
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nom
                            </td>
                            <td>
                                Type
                            </td>
                            <td>
                                Prix
                            </td>
                            <td>
                                PI
                            </td>
                            <td>
                                RUP
                            </td>
                            <td>
                                AT
                            </td>
                            <td>
                                PRD
                            </td>
                            <td>
                                COU
                            </td>
                            <td>
                                INT
                            </td>
                            <td>
                                CHA
                            </td>
                            <td>
                                AD
                            </td>
                            <td>
                                FO
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' id='nomNouvelArme'/>
                            </td>
                            <td>
                                <select id='TYPENouvelArme' class='normal'>
                                    <?php 
                                        foreach($types_arme as $type_arme)
                                        {
                                            echo "<option value='".$type_arme."' >".$type_arme."</option>";
                                        }                    
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type='text' size='2' id='PONouvelArme'/> 
                            </td>
                            <td>                                
                                <input type='text' size='2' value='1D+1' id='PINouvelArme'/>      
                            </td>
                            <td>
                                <select id='RUPNouvelArme' class='normal'>
                                    <option value='1-5' selected>1-5</option> 
                                    <option value='1-4' >1-4</option> 
                                    <option value='1-3' >1-3</option> 
                                    <option value='1-2' >1-2</option> 
                                    <option value='1-1' >1-1</option> 
                                    <option value='Non' >Non</option> 
                                </select>
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='ATNouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='PRDNouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='COUNouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='INTNouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='CHANouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='ADNouvelArme'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='FONouvelArme'/> 
                            </td>
                            <td>
                                <input type='button' value='Ajouter' onclick='ajout_nouvel_arme()' />
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div style='text-align:center;'> S'équiper d'une arme existante de type : <select class='normal' id='type_arme' onchange='maj_type_arme();'> 
                    <?php 
                        foreach($types_arme as $type_arme)
                        {
                            echo "<option value='".$type_arme."' >".$type_arme."</option>";
                        }                    
                    ?>
                    </select>
                    </div>
                    <div style='margin-top:5px;overflow:auto; height:200px;width:800px;border: 1px #900000 solid;background-image:url("image/bg3.png");'>
                        <table style='width:100%;'>
                            <tr><th>Nom</th><th>Type</th><th>PO</th><th>PI</th><th>RUP</th><th>AT</th><th>PRD</th><th>COU</th><th>INT</th><th>CHA</th><th>AD</th><th>FO</th><th></th></tr>
                            <?php 
                                $max_id = 0;                                
                                foreach($armes as $arme)
                                {
                                    if($arme->ID > $max_id)
                                    {
                                        $max_id = $arme->ID;
                                    }
                                    echo "<tr id='TR_ARME_".$arme->ID."'><td>".$arme->NOM."</td><td>".$arme->type."</td><td>".$arme->PRIX."</td><td>".$arme->PI."</td><td>".$arme->RUP."</td><td>".$arme->AT."</td><td>".$arme->PRD."</td><td>".$arme->COU."</td><td>".$arme->INT."</td><td>".$arme->CHA."</td><td>".$arme->AD."</td><td>".$arme->FOR."</td><!--".$arme->type."--><td>
                                    <input type='button' value='choisir' onclick='ajout_arme(".$arme->ID.",\"".str_replace("'","&apos;",str_replace('"',"\\\"",$arme->NOM))."\",\"".$arme->type."\",\"".$arme->PRIX."\",\"".$arme->PI."\",\"".$arme->RUP."\",\"".$arme->AT."\",\"".$arme->PRD."\",\"".$arme->COU."\",\"".$arme->INT."\",\"".$arme->CHA."\",\"".$arme->AD."\",\"".$arme->FOR."\");'/></td></tr>";
                                }
                            ?>
                            <script>var max_arme = <?php echo $max_id;?>;</script>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        </div>
        <div style='border-bottom:1px #900000 solid;text-align:center;cursor:pointer;' onclick='showDiv("divProtections");'><h2 style='margin-bottom:0px;'>5: Protections</h2></div>
        <div id='divProtections'>
        <table style='margin:auto;margin-top:20px;'>
            <tr>
                <td >
                    <div style='text-align:center;'>Vos protections :</div>
                    <table id='protections' style='width:700px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PR</th><th>RUP</th><th>MODIF</th><th></th></tr>
                        <?php 
                            foreach($aventurier->protections as $protection)
                            {
                                echo "<tr id='ligne".$id_objet."'>
                                <td><input type='hidden' name='Prot".$id_objet."' value='".$protection->ID."'/>".$protection->NOM."</td>
                                <td>".$protection->TYPE."</td>
                                <td>".$protection->PRIX."</td>
                                <td>".$protection->PR."</td>
                                <td>".$protection->RUP."</td>
                                <td>".$protection->modif()."</td>
                                <td><input type='button' value='Retirer' onclick=\"retirer_protection('ligne".$id_objet."');\" /></td></tr>";
                                $id_objet++;
                            }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table style='margin:auto;margin-top:20px;'>
            <tr>
                <td style='vertical-align:top;'>
                    <div style='text-align:center;'>Créer et équiper une protection :</div>
                    <table style='width:800px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr>
                            <td>
                                Nom
                            </td>
                            <td>
                                Type
                            </td>
                            <td>
                                Prix
                            </td>
                            <td>
                                PR
                            </td>
                            <td>
                                RUP
                            </td>
                            <td>COU</td><td>INT</td><td>CHA</td><td>AD</td><td>FOR</td><td>AT</td><td>PRD</td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' id='nomNouvelProt'/>
                            </td>
                            <td>
                                <select id='TYPENouvelProt' class='normal'>
                                    <?php 
                                        foreach($types_protection as $type_protection)
                                        {
                                            echo "<option value='".$type_protection."' >".$type_protection."</option>";
                                        }                    
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='PONouvelProt'/> 
                            </td>
                            <td>                                
                                <input type='text' size='2' value='0' id='PRNouvelProt'/>      
                            </td>
                            <td>
                                <select id='RUPNouvelProt' class='normal'>
                                    <option value='1-5' selected>1-5</option> 
                                    <option value='1-4' >1-4</option> 
                                    <option value='1-3' >1-3</option> 
                                    <option value='1-2' >1-2</option> 
                                    <option value='1-1' >1-1</option> 
                                    <option value='Non' >Non</option> 
                                </select>
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='COUNouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='INTNouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='CHANouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='ADNouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='FORNouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='ATNouvelProt'/> 
                            </td>
                            <td>
                                <input type='text' size='2' value='0' id='PRDNouvelProt'/> 
                            </td>
                            <td>
                                <input type='button' value='Ajouter' onclick='ajout_nouvel_protection()' />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table id='table_protection' style='margin:auto;'>
            <tr>
                <td style='vertical-align:top;'>
                    <div style='text-align:center;'>
                        Equiper une protection de type : <select id='type_protection' onchange='maj_type_protection();'> 
                        <?php 
                            foreach($types_protection as $type_protection)
                            {
                                echo "<option value='".$type_protection."' >".$type_protection."</option>";
                            }                    
                        ?>
                        </select>
                    </div>
                    <br>
                    <table style='width:700px;background-image:url("image/bg3.png");border: 1px #900000 solid;'>
                        <tr><th>Nom</th><th>Type</th><th>Prix</th><th>PR</th><th>RUP</th><th>MODIF</th><th></th></tr>
                    <?php 
                        foreach($protections as $protection)
                        {
                            if($protection->ID > $max_id)
                            {
                                $max_id = $protection->ID;
                            }
                            echo "<tr id='TR_PROT_".$protection->ID."'>
                                <td>".$protection->NOM."</td>
                                <td>".$protection->TYPE."</td>
                                <td>".$protection->PRIX."</td>
                                <td>".$protection->PR."</td>
                                <td>".$protection->RUP."</td>
                                <td style='font-size:12px;'>".$protection->modif()."</td>
                                <!--".$protection->TYPE."-->
                                <td><input type='button' value='choisir' onclick='ajout_protection(".$protection->ID.", \"".str_replace("'","&apos;",str_replace('"',"\\\"",$protection->NOM))."\",\"".$protection->TYPE."\",\"".$protection->PRIX."\",\"".$protection->PR."\",\"".$protection->RUP."\",\"".$protection->modif()."\");'/></td></tr>";
                        }                        
                    ?>
                    <script>var max_protection = <?php echo $max_id;?>;</script>
                    </table>   
                </td>                
            </tr>
        </table>
        </div>
        <br>
        <div style='text-align:center;'><input type='submit' value='Modifier cet aventurier'></div>
        <br>
    </form>
    <br>
    <div style='text-align:center;cursor:pointer;' onclick='showDiv("fiche");'><h2>Fiche de personnage classique actuelle</h2></div>
    <div style='text-align:center;' id='fiche'><img style='width:600px;' src='view/ficheDePerso.php?id=<?php echo $aventurier->ID; ?>' /></div>
    <div style='text-align:center;cursor:pointer;' onclick='showDiv("fiche2");'><h2>Fiche de personnage "version 2" actuelle</h2></div>
    <div style='text-align:center;' id='fiche2'><img style='width:600px;' src='view/ficheDePerso2.php?id=<?php echo $aventurier->ID; ?>' /></div>
</div>
<script>
    var id = <?php echo $id_objet; ?>; 
    
    function showDiv(idDiv)
    {
        $("#divDonnees").hide();
        $("#divEquipements").hide();
        $("#divArmes").hide();
        $("#divProtections").hide();
        $("#divCompetences").hide();
        $("#fiche").hide();
        $("#fiche2").hide();
        
        $("#"+idDiv).show();        
    }
    
    showDiv("");
    
    function ajout_nouvel_equi()
    {
        nombre= $("#nombreNouvelEquipement").val();        
        nom= $("#nomNouvelEquipement").val();        
        po = $("#PONouvelEquipement").val();
        pa = $("#PANouvelEquipement").val();
        pc = $("#PCNouvelEquipement").val();
        
        if(po == "" || po == null)
        {
            po = "0";
        }
        
        if(pa == "" || pa == null)
        {
            pa = "0";
        }
        
        if(pc == "" || pc == null)
        {
            pc = "0";
        }
        
        prix = $("#PONouvelEquipement").val();
        if(pa != 0 || pc != 0)
        {
            prix += "."+pa+pc;
        }
        id++;
        $('#equipements').append('<tr id=\'ligneEqui'+id+'\'><td style=\'text-align:center\'  name=\'nombreNouvelEqui'+id+'\' id=\'nombreNouvelEqui'+id+'\'>'+nombre+'</td><td style=\'text-align:center\' ><input type=\'hidden\' id=\'hidNombreNouvelEqui'+id+'\' name=\'hidNombreNouvelEqui'+id+'\' value=\''+nombre+'\'/><input type=\'hidden\' id=\'nomNouvelEqui'+id+'\' name=\'nomNouvelEqui'+id+'\' value=\''+nom+'\'/><input type=\'hidden\' name=\'prixNouvelEqui'+id+'\' value=\''+prix+'\'/>'+nom+'</td><td style=\'text-align:center\' ><input type=\'checkbox\' name=\'NouvelEqui'+id+'precieux\' /></td><td style=\'text-align:center\' >'+prix+'</td><td><input type=\'button\' value=\'Retirer\' onclick="retirer_equipement(\'ligneEqui'+id+'\',0,'+prix+');" /></td></tr>');            
    }
    
    function retirer_equipement(id_ligne,id_equi,prix)
    {        
        if(id_equi == 0)
        {
            numero_ligne = id_ligne.substr(9);
            //nouvel equipement
            if( parseInt($('#nombreNouvelEqui'+numero_ligne).html()) > 1)
            {
                //on diminue le nombre
                $('#nombreNouvelEqui'+numero_ligne).html( parseInt( $('#nombreNouvelEqui'+numero_ligne).html()) - 1.0 );
                $('#hidNombreNouvelEqui'+numero_ligne).val( parseInt( $('#nombreNouvelEqui'+numero_ligne).html()) );
            }
            else
            {
                //on supprime la ligne
                $("#"+id_ligne).remove();
            }
        }
        else
        {
            if(parseInt( $('#NbrEqui'+id_equi).html()) > 1)
            {
                //on diminue le nombre
                $('#NbrEqui'+id_equi).html( parseInt( $('#NbrEqui'+id_equi).html()) - 1.0 );
                $('#HidNbrEqui'+id_equi).val( parseInt( $('#NbrEqui'+id_equi).html()) );
            }
            else
            {
                //on supprime la ligne
                $("#"+id_ligne).remove();
            }
        }
        
    }
    
    function ajout_equi(id_equi,nom,prix)
    {
        id++;
        if($('#NbrEqui'+id_equi).length > 0)
        {
            //la ligne existe déjà
            $('#NbrEqui'+id_equi).html(parseInt(parseInt($('#NbrEqui'+id_equi).html()) + 1.0));
            $('#HidNbrEqui'+id_equi).val(parseInt( $('#NbrEqui'+id_equi).html()));
        }
        else
        {
            //on ajoute la ligne
            $('#equipements').append('<tr id=\'ligne'+id+'\'><td style=\'text-align:center\' id=\'NbrEqui'+id_equi+'\' name=\'NbrEqui'+id_equi+'\'>1</td><td style=\'text-align:center\' ><input type=\'hidden\' name=\'HidNbrEqui'+id_equi+'\' id=\'HidNbrEqui'+id_equi+'\' value=\'1\'/><input type=\'hidden\' name=\'Equi'+id+'\' id=\'Equi'+id_equi+'\' value=\''+id_equi+'\'/>'+nom+'</td><td style=\'text-align:center\'><input type=\'checkbox\' name=\'EquiPrecieux'+id_equi+'\' /></td><td style=\'text-align:center\'  >'+prix+'</td><td><input type=\'button\' value=\'Retirer\' onclick="retirer_equipement(\'ligne'+id+'\','+id_equi+','+prix+');" /></td></tr>');            
        }
    }
    
    function maj_type_equipement()
    {        
        nbre_equipement=0;

        for(a=0;a<= max_equipement;a++)
        {
            if($('#TR_EQUI_'+a).length)
            {                
                if($("#type_equipement").val() == "toutes")
                {
                    //raf du type
                    if($('#debase').is(':checked'))
                    {
                        if(-1 != $("#TR_EQUI_"+a).html().indexOf("debase") )
                        {
                            $("#TR_EQUI_"+a).show();
                            nbre_equipement++;
                        }
                        else
                        {
                            $("#TR_EQUI_"+a).hide();
                        }
                    }
                    else
                    {
                        $("#TR_EQUI_"+a).show(); 
                        nbre_equipement++;
                    }
                }
                else
                {
                    if(-1 != $("#TR_EQUI_"+a).html().indexOf($("#type_equipement").val()) )
                    {
                        if($('#debase').is(':checked'))
                        {
                            if(-1 != $("#TR_EQUI_"+a).html().indexOf("debase") )
                            {
                                $("#TR_EQUI_"+a).show();
                                nbre_equipement++;
                            }
                            else
                            {
                                $("#TR_EQUI_"+a).hide();
                            }
                        }
                        else
                        {
                            $("#TR_EQUI_"+a).show(); 
                            nbre_equipement++;
                        }
                    }
                    else
                    {
                        $("#TR_EQUI_"+a).hide();
                    }
                }  
            }            
        }
        if(parseInt(nbre_equipement) > 1)
        {
            $("#nbre_equipement").html((nbre_equipement)+" objets");
        }
        else
        {
            $("#nbre_equipement").html((nbre_equipement)+" objet");
        }        
    }
    
    function ajout_nouvel_arme()
    {
        id++;
        nom = $("#nomNouvelArme").val(); 
        po = $("#PONouvelArme").val(); 
        pi = $("#PINouvelArme").val(); 
        rup = $("#RUPNouvelArme").val(); 
        at = $("#ATNouvelArme").val(); 
        prd = $("#PRDNouvelArme").val(); 
        cou = $("#COUNouvelArme").val(); 
        int = $("#INTNouvelArme").val(); 
        cha = $("#CHANouvelArme").val(); 
        ad = $("#ADNouvelArme").val(); 
        fo = $("#FONouvelArme").val(); 
        type = $("#TYPENouvelArme").val(); 

        libelle_type = $("#TYPENouvelArme option:selected").text();
        $('#armes').append('<tr id=\'ligneArme'+id+'\'><input type=\'hidden\' name=\'nomNouvelArme'+id+'\' value=\''+nom+'\'/><input type=\'hidden\' name=\'poNouvelArme'+id+'\' value=\''+po+'\'/><input type=\'hidden\' name=\'piNouvelArme'+id+'\' value=\''+pi+'\'/><input type=\'hidden\' name=\'rupNouvelArme'+id+'\' value=\''+rup+'\'/><input type=\'hidden\' name=\'atNouvelArme'+id+'\' value=\''+at+'\'/><input type=\'hidden\' name=\'prdNouvelArme'+id+'\' value=\''+prd+'\'/><input type=\'hidden\' name=\'couNouvelArme'+id+'\' value=\''+cou+'\'/><input type=\'hidden\' name=\'intNouvelArme'+id+'\' value=\''+int+'\'/><input type=\'hidden\' name=\'chaNouvelArme'+id+'\' value=\''+cha+'\'/><input type=\'hidden\' name=\'adNouvelArme'+id+'\' value=\''+ad+'\'/><input type=\'hidden\' name=\'foNouvelArme'+id+'\' value=\''+fo+'\'/><input type=\'hidden\' name=\'typeNouvelArme'+id+'\' value=\''+type+'\'/><td>'+nom+'</td><td>'+libelle_type+'</td><td>'+po+'</td><td>'+pi+'</td><td>'+rup+'</td><td>'+at+'</td><td>'+prd+'</td><td>'+cou+'</td><td>'+int+'</td><td>'+cha+'</td><td>'+ad+'</td><td>'+fo+'</td><td><input type=\'button\' value=\'Retirer\' onclick="retirer_arme(\'ligneArme'+id+'\');" /></td></tr>');            
    }
    
    function ajout_arme(id_arme,nom,type_,po,pi,rup,at,prd,cou,int,cha,ad,fo)
    {
        id++;
        $('#armes').append('<tr id=\'ligne'+id+'\'></tr>');
        $('#ligne'+id).append('<td><input type=\'hidden\' name=\'Arme'+id+'\' value=\''+id_arme+'\'/>'+nom+'</td>');
        $('#ligne'+id).append('<td>'+type_+'</td>');
        $('#ligne'+id).append('<td>'+po+'</td>');
        $('#ligne'+id).append('<td>'+pi+'</td>');
        $('#ligne'+id).append('<td>'+rup+'</td>');
        $('#ligne'+id).append('<td>'+at+'</td>');
        $('#ligne'+id).append('<td>'+prd+'</td>');
        $('#ligne'+id).append('<td>'+cou+'</td>');
        $('#ligne'+id).append('<td>'+int+'</td>');
        $('#ligne'+id).append('<td>'+cha+'</td>');
        $('#ligne'+id).append('<td>'+ad+'</td>');
        $('#ligne'+id).append('<td>'+fo+'</td>');
        $('#ligne'+id).append('<td><input type=\'button\' value=\'Retirer\' onclick="retirer_arme(\'ligne'+id+'\');" /></td>');            
    }
    
    function retirer_arme(id)
    {        
        $("#"+id).remove();
    }
    
    function retirer_protection(id)
    {        
        $("#"+id).remove();
    }
    
    function maj_type_arme()
    {
        for(a=0;a<= max_arme;a++)
        {
            if($('#TR_ARME_'+a).length)
            {                
                if(-1 != $("#TR_ARME_"+a).html().indexOf($("#type_arme").val()) )
                {
                    $("#TR_ARME_"+a).show();
                }
                else
                {
                    $("#TR_ARME_"+a).hide();
                }
            }            
        }        
    }
        
    function debase()
    {
        maj_type_equipement();
    }
    
    function maj_type_protection()
    {
        for(a=0;a<= max_protection;a++)
        {
            if($('#TR_PROT_'+a).length)
            {                
                if(-1 != $("#TR_PROT_"+a).html().indexOf($("#type_protection").val()) )
                {
                    $("#TR_PROT_"+a).show();
                }
                else
                {
                    $("#TR_PROT_"+a).hide();
                }
            }            
        }        
    }
    
    
    function ajout_protection(id_equipement,nom,type_,prix,pr,rup,modif)
    {        
        id++;
        $('#protections').append('<tr id=\'ligne'+id+'\'></tr>');
        $('#ligne'+id).append('<td><input type=\'hidden\' name=\'Prot'+id+'\' value=\''+id_equipement+'\'/>'+nom+'</td>');
        $('#ligne'+id).append('<td>'+type_+'</td>');
        $('#ligne'+id).append('<td>'+prix+'</td>');
        $('#ligne'+id).append('<td>'+pr+'</td>');
        $('#ligne'+id).append('<td>'+rup+'</td>');
        $('#ligne'+id).append('<td>'+modif+'</td>');
        $('#ligne'+id).append('<td><input type=\'button\' value=\'Retirer\' onclick="retirer_protection(\'ligne'+id+'\');" /></td>');  
    }
    
    function ajout_nouvel_protection()
    {
        id++;
        nom = $("#nomNouvelProt").val(); 
        po = $("#PONouvelProt").val(); 
        pr = $("#PRNouvelProt").val(); 
        rup = $("#RUPNouvelProt").val(); 
        
        type = $("#TYPENouvelProt").val(); 
        
        cou = $("#COUNouvelProt").val(); 
        int_ = $("#INTNouvelProt").val(); 
        cha = $("#CHANouvelProt").val(); 
        ad = $("#ADNouvelProt").val(); 
        for_ = $("#FORNouvelProt").val(); 
        at = $("#ATNouvelProt").val(); 
        prd = $("#PRDNouvelProt").val(); 
        
        
        modif = ""; 
        dejamodif = false;
        if(cou != 0){if(cou>0){modif = "COU+"+cou;}else{modif = "COU-"+cou;}dejamodif = true;}        
        if(int_ != 0){if(dejamodif){modif = modif + "/";}if(int_>0){modif = modif+"INT+"+int_;}else{modif = modif+"INT-"+int_;}dejamodif = true;}
        if(cha != 0){if(dejamodif){modif = modif + "/";}if(cha>0){modif = modif+"CHA+"+cha;}else{modif = modif+"CHA-"+cha;}dejamodif = true;}
        if(ad != 0){if(dejamodif){modif = modif + "/";}if(ad>0){modif = modif+"AD+"+ad;}else{modif = modif+"AD-"+ad;}dejamodif = true;}
        if(for_ != 0){if(dejamodif){modif = modif + "/";}if(for_>0){modif = modif+"FOR+"+for_;}else{modif = modif+"FOR-"+for_;}dejamodif = true;}
        if(at != 0){if(dejamodif){modif = modif + "/";}if(at>0){modif = modif+"AT+"+at;}else{modif = modif+"AT-"+at;}dejamodif = true;}
        if(prd != 0){if(dejamodif){modif = modif + "/";}if(prd>0){modif = modif+"PRD+"+prd;}else{modif = modif+"PRD-"+prd;}dejamodif = true;}

        libelle_type = $("#TYPENouvelProt option:selected").text();
        $('#protections').append('<tr id=\'ligneProt'+id+'\'></tr>');
            $('#ligneProt'+id).append('<td><input type=\'hidden\' name=\'nomNouvelProt'+id+'\' value=\''+nom+'\'/>'+nom+'</td>');            
            $('#ligneProt'+id).append('<td><input type=\'hidden\' name=\'TYPENouvelProt'+id+'\' value=\''+type+'\'/>'+type+'</td>');
            $('#ligneProt'+id).append('<td><input type=\'hidden\' name=\'PONouvelProt'+id+'\' value=\''+po+'\'/>'+po+'</td>');
            $('#ligneProt'+id).append('<td><input type=\'hidden\' name=\'PRNouvelProt'+id+'\' value=\''+pr+'\'/>'+pr+'</td>');
            $('#ligneProt'+id).append('<td><input type=\'hidden\' name=\'RUPNouvelProt'+id+'\' value=\''+rup+'\'/>'+rup+'</td>');
            
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'COUNouvelProt'+id+'\' value=\''+cou+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'INTNouvelProt'+id+'\' value=\''+int_+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'CHANouvelProt'+id+'\' value=\''+cha+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'ADNouvelProt'+id+'\' value=\''+ad+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'FORNouvelProt'+id+'\' value=\''+for_+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'ATNouvelProt'+id+'\' value=\''+at+'\'/>');
            $('#ligneProt'+id).append('<input type=\'hidden\' name=\'PRDNouvelProt'+id+'\' value=\''+prd+'\'/>');
            
            $('#ligneProt'+id).append('<td>'+modif+'</td>');
            $('#ligneProt'+id).append('<td><input type=\'button\' value=\'Retirer\' onclick="retirer_protection(\'ligneProt'+id+'\');" /></td>');           
    }

    maj_type_arme();
    maj_type_equipement();
    maj_type_protection();
    
    function majCompetenceOrigine()
    {
        id_origine = $('#ID_ORIGINE').val();
        <?php 
            foreach($origines as $origine)
            {
                echo "if(id_origine == ".$origine->ID.")
                {";
                foreach($origine->COMPETENCESLIEES as $comp)
                {
                    echo "$('#competence".$comp->ID."').attr('checked', true);";
                }                    
                echo "}";
            }
        ?>
    }
    
    function majCompetenceMetier()
    {
        id_metier = $('#ID_METIER').val();

        <?php 
            foreach($metiers as $metier)
            {
                echo "if(id_metier == ".$metier->ID.")
                {
                    ";
                foreach($metier->COMPETENCESLIEES as $comp)
                {
                    echo "$('#competence".$comp->ID."').attr('checked', true);
                    ";
                }                    
                echo "
                }
                ";
            }
        ?>
    }
</script>


