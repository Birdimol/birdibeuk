<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Ajouter un equipement</h1>
    <form method='post' action='index.php?ctrl=adminEquipements&action=ajouter_action'>
        <table class='formulaire' style='width:600px;text-align:left;'>
            <tr><td style='width:120px;'><label for='NOM'>NOM :</label></td><td style='width:520px;'><input style='width:420px;' type='text' id='NOM' value='' name='NOM' /></td></tr>
            <tr><td><label for='PO'>PO :</label></td><td><input type='text' id='PO' value='0' name='PO' /></td></tr>
            <tr><td><label for='PA'>PA :</label></td><td><input type='text' id='PA' value='0' name='PA' /></td></tr>
            <tr><td><label for='PC'>PC :</label></td><td><input type='text' id='PC' value='0' name='PC' /></td></tr>
            <tr><td><label for='AT'>AT :</label></td><td><input type='text' id='AT' value='0' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD :</label></td><td><input type='text' id='PRD' value='0' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU :</label></td><td><input type='text' id='COU' value='0' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT :</label></td><td><input type='text' id='INT' value='0' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA :</label></td><td><input type='text' id='CHA' value='0' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD :</label></td><td><input type='text' id='AD' value='0' name='AD' /></td></tr>
            <tr><td><label for='FO'>FOR :</label></td><td><input type='text' id='FO' value='0' name='FO' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL :</label></td><td><input type='text' id='SPECIAL' value='' name='SPECIAL' /></td></tr>
            <tr>
                <td><label for='type'>type :</label></td>
                <td>
                    <select name='type'>
                        <?php 
                            foreach($types_equipement as $type_equipement)
                            {
                                echo "<option value='".$type_equipement."'>".$type_equipement."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for='debase'>debase :</label></td>
                <td><input type='checkbox' id='debase' name='debase' /></td>
            </tr>
            <tr>
                <td><label for='munition'>munition :</label></td>
                <td><input type='checkbox' id='munition' name='munition' /></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center' ><input type='submit' value='Ajouter' /></td>
            </tr>
        </table>
    </form>
</div>