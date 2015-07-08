<div class='principal_avec_pub'>
     <?php 
        if(isset($messageConnexion))
        {
            if(!empty($messageConnexion))
            {
                ?>
                    <p style='text-align:center;color:red;'><?php echo $messageConnexion; ?></p>
                <?php
            }
        }
    ?>
    <form action='index.php?ctrl=tentativeConnexion' method='post'>
        <table style='background-image:url("image/bg3.png");-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;width:300px;margin:auto;border:3px #900000 solid;margin-top:20px;padding:10px;'>
            <tr><td>Login : </td><td><input style='width:97%' type='text' name='login' /></td></tr>
            <tr><td>Password : </td><td><input style='width:97%' type='password' name='password' /></td></tr>
            <tr><td colspan='2' style='text-align:center;'><input type='submit' value='Se connecter' /></td></tr>
        </table>
    </form>
    
    <p style='text-align:center;margin-top:80px;'>Pas encore inscrit ?</p>
    <p style='text-align:center;'>Remplissez ce formulaire ! L'inscription vous permettra de sauvegarder vos aventuriers, de poster vos compte-rendus de missions et de vous signaler sur la carte.<BR>Sinon vous n'aurez pas accès à toutes les fonctionnalités de ce site et vous risquez d'être traité comme un gobelin dans les bureaux que vous visiterez...<BR>(Si vous êtes vraiment un gobelin alors la on ne peut rien pour vous mais vous pouvez tout de même vous inscrire !)</p>
    <?php 
        if(isset($messageInscription))
        {
            if(!empty($messageInscription))
            {
                ?>
                    <p style='text-align:center;color:red;'><b><?php echo $messageInscription; ?></b></p>
                <?php
            }
        }
    ?>
    <form id='formInscription' action='index.php?ctrl=tentativeInscription' method='post' >
        <table style='background-image:url("image/bg3.png");-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;width:400px;margin:auto;border:3px #900000 solid;margin-top:20px;padding:10px;'>
            <tr><td>Login* : </td><td><input style='width:97%' type='text' name='login' id='login' value='<?php if(!empty($_POST["login"])){echo $_POST["login"];} ?>'/></td></tr>
            <tr><td>Mot de passe* : </td><td><input style='width:97%' type='password' name='password' id='password' value='<?php if(!empty($_POST["password"])){echo $_POST["password"];} ?>'/></td></tr>
            <tr><td>Confirmer mot de passe* : </td><td><input style='width:97%' type='password' name='confirmPassword' id='confirmPassword' value='<?php if(!empty($_POST["confirmPassword"])){echo $_POST["confirmPassword"];} ?>'/></td></tr>
            <tr><td>Mail* : </td><td><input style='width:97%' type='email' name='mail' id='mail' value='<?php if(!empty($_POST["mail"])){echo $_POST["mail"];} ?>'/></td></tr>
            <tr><td>Localisation : </td><td><input style='width:97%' type='text' name='localisation' value='<?php if(!empty($_POST["localisation"])){echo $_POST["localisation"];} ?>'/><br>Exemple : "Lyon France"</td></tr>
            <tr><td>Êtes-vous MJ : </td><td><select name='mj'>
                <option <?php if(!empty($_POST["mj"])){if($_POST["mj"] == 0){ echo " selected='selected' ";}} ?> value='0' >Non</option>
                <option <?php if(!empty($_POST["mj"])){if($_POST["mj"] == 1){ echo " selected='selected' ";}} ?> value='1' >Oui</option></select></tr>
            <tr><td colspan='2' style='text-align:center;'><input type='button' onclick='valideInscription()' value='S&apos;inscrire' /></td></tr>
        </table>
    </form>
</div>
<script>
    function valideInscription()
    {
        if($("#login").val() != "" && $("#password").val() != "" && $("#confirmPassword").val() != "" && $("#mail").val())
        {
            if($("#confirmPassword").val() == $("#password").val())
            {
                if(isValidEmailAddress($("#mail").val()))
                {
                    $("#formInscription").submit();
                }
                else
                {
                    alert("L'adresse email est invalide.");
                }                
            }
            else
            {
                alert("Les mots de passes ne correspondent pas.");
            }
        }
        else
        {
            alert("Remplissez les champs obligatoires.");
        }
    }
</script>