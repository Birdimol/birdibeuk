<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Modifier un equipement</h1>
    <form method='post' action='index.php?ctrl=adminEquipements&action=modifier_action'>
        <table class='formulaire' style='width:600px;text-align:left;'>
            <input type='hidden' id='ID' value='<?php echo $equipement->ID; ?>' name='ID' />
            <tr><td style='width:120px;'><label for='NOM'>NOM :</label></td><td style='width:520px;'><input style='width:420px;' type='text' id='NOM' value="<?php echo str_replace("\"","&equot;",$equipement->NOM); ?>" name='NOM' /></td></tr>
            <tr><td><label for='PO'>PO :</label></td><td><input type='text' id='PO' value='<?php echo $equipement->PO; ?>' name='PO' /></td></tr>
            <tr><td><label for='PA'>PA :</label></td><td><input type='text' id='PA' value='<?php echo $equipement->PA; ?>' name='PA' /></td></tr>
            <tr><td><label for='PC'>PC :</label></td><td><input type='text' id='PC' value='<?php echo $equipement->PC; ?>' name='PC' /></td></tr>
            <tr><td><label for='AT'>AT :</label></td><td><input type='text' id='AT' value='<?php echo $equipement->AT; ?>' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD :</label></td><td><input type='text' id='PRD' value='<?php echo $equipement->PRD; ?>' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU :</label></td><td><input type='text' id='COU' value='<?php echo $equipement->COU; ?>' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT :</label></td><td><input type='text' id='INT' value='<?php echo $equipement->INT; ?>' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA :</label></td><td><input type='text' id='CHA' value='<?php echo $equipement->CHA; ?>' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD :</label></td><td><input type='text' id='AD' value='<?php echo $equipement->AD; ?>' name='AD' /></td></tr>
            <tr><td><label for='FO'>FOR :</label></td><td><input type='text' id='FO' value='<?php echo $equipement->FO; ?>' name='FO' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL :</label></td><td><input type='text' id='SPECIAL' value='<?php echo $equipement->SPECIAL; ?>' name='SPECIAL' /></td></tr>
            <tr>
                <td><label for='type'>type :</label></td>
                <td>
                    <select name='type'>
                        <?php 
                            foreach($types_equipement as $type_equipement)
                            {
                                echo "<option value='".$type_equipement."' "; 
                                if($equipement->type == $type_equipement){echo " selected='selected' ";}
                                echo " >".$type_equipement."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for='debase'>debase :</label></td>
                <td><input type='checkbox' id='debase' <?php if($equipement->debase){echo "checked"; } ?> name='debase' /></td>
            </tr>
            <tr>
                <td><label for='munition'>munition :</label></td>
                <td><input type='checkbox' id='munition' <?php if($equipement->munition){echo "checked"; } ?> name='munition' /></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center' ><input type='submit' value='Modifier' /></td>
            </tr>
        </table>
    </form>
</div>