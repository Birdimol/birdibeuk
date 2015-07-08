<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Modifier une arme</h1>
    <form method='post' action='index.php?ctrl=adminArmes&action=modifier_action'>
        <table class='formulaire' style='width:600px;text-align:left;'>
            <input type='hidden' id='ID' value='<?php echo $arme->ID; ?>' name='ID' />
            <tr><td style='width:120px;'><label for='NOM'>NOM :</label></td><td style='width:520px;'><input style='width:420px;' type='text' id='NOM' value='<?php echo $arme->NOM; ?>' name='NOM' /></td></tr>
            <tr><td><label for='NOM_COURT'>NOM_COURT :</label></td><td><input type='text' id='NOM_COURT' value='<?php echo $arme->NOM_COURT; ?>' name='NOM_COURT' /></td></tr>
            <tr><td><label for='PRIX'>PRIX :</label></td><td><input type='text' id='PRIX' value='<?php echo $arme->PRIX; ?>' name='PRIX' /></td></tr>
            <tr><td><label for='PI'>PI :</label></td><td><input type='text' id='PI' value='<?php echo $arme->PI; ?>' name='PI' /></td></tr>
            <tr><td><label for='RUP'>RUP :</label></td><td><input type='text' id='RUP' value='<?php echo $arme->RUP; ?>' name='RUP' /></td></tr>
            <tr><td><label for='AT'>AT :</label></td><td><input type='text' id='AT' value='<?php echo $arme->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD :</label></td><td><input type='text' id='PRD' value='<?php echo $arme->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU :</label></td><td><input type='text' id='COU' value='<?php echo $arme->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT :</label></td><td><input type='text' id='INT' value='<?php echo $arme->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA :</label></td><td><input type='text' id='CHA' value='<?php echo $arme->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD :</label></td><td><input type='text' id='AD' value='<?php echo $arme->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FOR'>FOR :</label></td><td><input type='text' id='FOR' value='<?php echo $arme->FOR; ?>' name='FOR' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL :</label></td><td><input type='text' id='SPECIAL' value='<?php echo $arme->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr><td><label for='JET'>JET :</label></td><td><input type='checkbox' id='JET' <?php if($arme->JET){echo "checked"; } ?> name='JET' /></td></tr>
            <tr><td><label for='qualite'>qualite :</label></td><td><input type='text' id='qualite' value='<?php echo $arme->qualite; ?>' name='qualite' /></td></tr>
            <tr>
                <td><label for='type'>type :</label></td>
                <td>
                    <select name='type'>
                        <?php 
                            foreach($types_arme as $type_arme)
                            {
                                echo "<option value='".$type_arme."' "; 
                                if($arme->type == $type_arme){echo " selected='selected' ";}
                                echo " >".$type_arme."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for='deuxmains'>deuxmains :</label></td>
                <td><input type='checkbox' id='deuxmains' <?php if($arme->deuxmains){echo "checked"; } ?> name='deuxmains' /></td>
            </tr>
            <tr>
                <td><label for='debase'>debase :</label></td>
                <td><input type='checkbox' id='debase' <?php if($arme->debase){echo "checked"; } ?> name='debase' /></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center' ><input type='submit' value='Modifier' /></td>
            </tr>
        </table>
    </form>
</div>