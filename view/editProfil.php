<div class='principal_avec_pub'>
    <h3>Formulaire PPA2Q de la CDD pour la modification des données relatives aux joueurs Fanghiens</h3>
    Demandeur des modifications : <?php echo $user->login; ?><br>
    <form id='formModificationProfil' action='index.php?ctrl=modificationProfil' method='post' >
        <input type='hidden' value='<?php echo $user->id; ?>' name='id'/> 
        <table style='background-image:url("image/bg3.png");-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;width:400px;margin:auto;border:3px #900000 solid;margin-top:20px;padding:10px;'>
            <tr><td>Mail : </td><td><input style='width:97%' type='email' name='mail' id='mail' value='<?php echo $user->mail; ?>'/></td></tr>
            <tr><td>Localisation : </td><td><input style='width:97%' type='text' name='localisation' value='<?php echo $user->localisation; ?>'/><br>Exemple : "Lyon France"</td></tr>
            <tr><td>Êtes-vous MJ : </td><td><select name='mj'>
                <option <?php if($user->mj == 0){ echo " selected='selected' ";} ?> value='0' >Non</option>
                <option <?php if($user->mj == 1){ echo " selected='selected' ";} ?> value='1' >Oui</option></select></tr>
            <tr><td colspan='2' style='text-align:center;'><br><br><input type='button' onclick='valideInscription()' value='Modifier' /></td></tr>
        </table>
    </form>
</div>
<script>
    function valideInscription()
    {       
        if(isValidEmailAddress($("#mail").val()))
        {
            $("#formModificationProfil").submit();
        }
        else
        {
            alert("L'adresse email est invalide.");
        }
    }
</script>