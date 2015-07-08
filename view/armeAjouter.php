<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Ajouter une arme</h1>
    <form method='post' action='index.php?ctrl=adminArmes&action=ajouter_action'>
        <table class='formulaire' style='width:600px;text-align:left;'>
            <tr><td style='width:120px;'><label for='NOM'>NOM :</label></td><td style='width:520px;'><input style='width:420px;' type='text' id='NOM'  name='NOM' /></td></tr>
            <tr><td><label for='NOM_COURT'>NOM_COURT :</label></td><td><input type='text' id='NOM_COURT' name='NOM_COURT' /></td></tr>
            <tr><td><label for='PRIX'>PRIX :</label></td><td><input type='text' id='PRIX'  name='PRIX' value='0' /></td></tr>
            <tr><td><label for='PI'>PI :</label></td><td><input type='text' id='PI' value='1D+1' name='PI' /></td></tr>
            <tr><td><label for='RUP'>RUP :</label></td><td><input type='text' id='RUP' value='1-4' name='RUP' /></td></tr>
            <tr><td><label for='AT'>AT :</label></td><td><input type='text' id='AT' value='0' name='AT' /></td></tr>
            <tr><td><label for='PRD'>PRD :</label></td><td><input type='text' id='PRD' value='0' name='PRD' /></td></tr>
            <tr><td><label for='COU'>COU :</label></td><td><input type='text' id='COU' value='0' name='COU' /></td></tr>
            <tr><td><label for='INT'>INT :</label></td><td><input type='text' id='INT' value='0' name='INT' /></td></tr>
            <tr><td><label for='CHA'>CHA :</label></td><td><input type='text' id='CHA' value='0' name='CHA' /></td></tr>
            <tr><td><label for='AD'>AD :</label></td><td><input type='text' id='AD' value='0' name='AD' /></td></tr>
            <tr><td><label for='FOR'>FOR :</label></td><td><input type='text' id='FOR' value='0' name='FOR' /></td></tr>
            <tr><td><label for='SPECIAL'>SPECIAL :</label></td><td><input type='text' id='SPECIAL' value='0' name='SPECIAL' /></td></tr>
            <tr><td><label for='JET'>JET :</label></td><td><input type='checkbox' id='JET'  name='JET' /></td></tr>
            <tr><td><label for='qualite'>qualite :</label></td><td><input type='text' id='qualite' value='1' name='qualite' /></td></tr>
            <tr>
                <td><label for='type'>type :</label></td>
                <td>
                    <select name='type'>
                        <?php 
                            foreach($types_arme as $type_arme)
                            {
                                echo "<option value='".$type_arme."' >".$type_arme."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for='deuxmains'>deuxmains :</label></td>
                <td><input type='checkbox' id='deuxmains' name='deuxmains' /></td>
            </tr>
            <tr>
                <td><label for='debase'>debase :</label></td>
                <td><input type='checkbox' id='debase' name='debase' /></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center' ><input type='submit' value='Ajouter' /></td>
            </tr>
        </table>
    </form>
</div>