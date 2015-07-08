<div class='principal_sans_pub'>
	<h1 style='text-align:center;'>Gestion des Users</h1>
    <table class='default'>
        <tr>
            <th>Login</th><th>date_inscription</th><th>date_last_visit</th>
            <th>mj</th><th>localisation</th><th>description</th>
            <th>mail</th><th>admin</th><th>superadmin</th>
            <th>action</th>
        </tr>
        <?php 
            foreach($users as $user_)
            {                
                echo "<tr>";
                    echo "<td>".$user_->login."</td>";
                    echo "<td>".$user_->date_inscription."</td>";
                    echo "<td>".$user_->date_last_visit."</td>";                    
                    echo "<td>".$user_->mj."</td>";
                    echo "<td>".$user_->localisation."</td>";
                    echo "<td>".$user_->description."</td>";                    
                    echo "<td>".$user_->mail."</td>";
                    echo "<td>".$user_->admin."</td>";
                    echo "<td>".$user_->superadmin."</td>";
                    echo "<td> <a href='index.php?ctrl=adminUsers&action=modifier&id=".$user_->id."'>M</a> <a href='index.php?ctrl=adminUsers&action=supprimer&id=".$user_->id."'>S</a></td>";
                echo "<tr>";
            }        
        ?>
    </table>	
</div>