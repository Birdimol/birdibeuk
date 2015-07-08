<div class='principal_avec_pub'>
	<h1 style='text-align:center;'>Créer rapidement une fiche</h1>
    <p>
        Votre aventurier a été créé !
    </p>
    <h2>1: Données de l'aventurier</h2>
    <style>
        td
        {
            vertical-align:top;
        }
    </style>
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
        <tr><td><label for='COU'>COU</label></td><td><input type='text' id='COU' value='<?php echo $aventurier->COU;?>' name='COU' /></td></tr>
        <tr><td><label for='INT'>INT</label></td><td><input type='text' id='INT' value='<?php echo $aventurier->INT;?>' name='INT' /></td></tr>
        <tr><td><label for='CHA'>CHA</label></td><td><input type='text' id='CHA' value='<?php echo $aventurier->CHA;?>' name='CHA' /></td></tr>
        <tr><td><label for='AD'>AD</label></td><td><input type='text' id='AD' value='<?php echo $aventurier->AD;?>' name='AD' /></td></tr>
        <tr><td><label for='FO'>FO</label></td><td><input type='text' id='FO' value='<?php echo $aventurier->FO;?>' name='FO' /></td></tr>
        <tr><td><label for='AT'>AT</label></td><td><input type='text' id='AT' value='<?php echo $aventurier->AT;?>' name='AT' /></td></tr>
        <tr><td><label for='PRD'>PRD</label></td><td><input type='text' id='PRD' value='<?php echo $aventurier->PRD;?>' name='PRD' /></td></tr>
        <tr><td><label for='RESISTMAG'>RESISTANCE MAGIQUE</label></td><td><input type='text' id='RESISTMAG' value='<?php echo $aventurier->RESISTMAG;?>' name='RESISTMAG' /></td></tr>
        <tr><td><label for='MAGIEPHYS'>MAGIE PHYSIQUE</label></td><td><input type='text' id='MAGIEPHYS' value='<?php echo $aventurier->MAGIEPHYS;?>' name='MAGIEPHYS' /></td></tr>
        <tr><td><label for='MAGIEPSY'>MAGIE PSYCHIQUE</label></td><td><input type='text' id='MAGIEPSY' value='<?php echo $aventurier->MAGIEPSY;?>' name='MAGIEPSY' /></td></tr>
        <tr><td><label for='XP'>XP</label></td><td><input type='text' id='XP' value='<?php echo $aventurier->XP;?>' name='XP' /></td></tr>
        <tr><td><label for='DESTIN'>DESTIN</label></td><td><input type='text' id='DESTIN' value='<?php echo $aventurier->DESTIN;?>' name='DESTIN' /></td></tr>
        <tr><td><label for='OR'>PIECES D'OR</label></td><td><input type='text' id='OR' value='<?php echo $aventurier->OR;?>' name='OR' /></td></tr>
        <tr><td><label for='ARGENT'>PIECES D'ARGENT</label></td><td><input type='text' id='ARGENT' value='' name='ARGENT' /></td></tr>
        <tr><td><label for='CUIVRE'>PIECES DE CUIVRE</label></td><td><input type='text' id='CUIVRE' value='' name='CUIVRE' /></td></tr>
        <tr><td><label for='PR'>PR</label></td><td><input type='text' id='PR' value='<?php echo $aventurier->PR;?>' name='PR' /></td></tr>
        <tr>
            <td><label for='codeacces'>CODE D'ACCÈS À LA FICHE</label></td>
            <td>
                <input type='text' id='codeacces' value='<?php echo $aventurier->codeacces;?>' name='codeacces' />
                <p class='petit' >Ce code vous permettra de modifier<br /> la fiche lors de vos prochaines visites.</p>
            </td>
        </tr>
    </table>
    <br >
</div>
