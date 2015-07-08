<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Modification du user <?php echo $user_->login; ?></h1>
    <form method='post' action='index.php?ctrl=adminUsers&action=modifier_action'>
        <table class='formulaire' style='width:600px;text-align:left;'>
            <tr><td>Id : </td><td><input disabled type='text' value='<?php echo $user_->id;?>'/></td></tr>
            <input type='hidden' name='id' value='<?php echo $user_->id;?>'/></td></tr>
            <tr><td>Login : </td><td><input type='text' name='login' value='<?php echo $user_->login;?>'/></td></tr>
            <tr><td>Nouveau MDP : </td><td><input type='text' name='password' value=''/></td></tr>
            <tr><td>Date d'inscription : </td><td><input type='text' name='date_inscription' value='<?php echo $user_->date_inscription;?>'/></td></tr>
            <tr><td>Date de la dernière visite : </td><td><input type='text' name='date_last_visit' value='<?php echo $user_->date_last_visit;?>'/></td></tr>
            <tr><td>MJ : </td><td><input type='checkbox' name='mj' <?php if($user_->mj == 1){echo " checked='checked' ";}?> /></td></tr>
            <tr><td>Localisation : </td><td><input type='text' name='localisation' value='<?php echo $user_->localisation;?>'/></td></tr>
            <tr><td>Description : </td><td><textarea name='description' rows='10' cols='40'><?php echo $user_->description;?></textarea></td></tr>
            <tr><td>Mail : </td><td><input type='text' size='50' name='mail' value='<?php echo $user_->mail;?>'/></td></tr>
            <?php 
            if($user->superadmin)
            {
               ?>
               <tr><td>Admin : </td><td><input type='checkbox' name='admin' <?php if($user_->admin == 1){echo " checked='checked' ";}?> /></td></tr>
               <tr><td>SuperAdmin : </td><td><input type='checkbox' name='superadmin' <?php if($user_->superadmin == 1){echo " checked='checked' ";}?> /></td></tr>
               <?php
            }
            ?>
             <tr><td colspan='2' style="text-align:center;"><input type='submit' value='modifier' /></td></tr>
        </table>
    </form>
</div>