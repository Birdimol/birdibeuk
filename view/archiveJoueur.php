<div class='principal_avec_pub'>
    <p>
        Bienvenue à la JBOUM, voici le registre que vous avez demandé.
    </p>
    <p>
        <form action='index.php'>
            Je cherche un joueur dont le pseudo s'écrit ou commence par &nbsp;&nbsp;
            <input type='text' name='login' value='<?php if(isset($_GET["login"])){echo $_GET["login"];}?>' />
            <input type='hidden' name='ctrl' value='archiveJoueur' />
            <input type='submit' value='Chercher' />
        </form>
    </p>
    <table>
        <tr>
            <th style='width:200px'><u><a href='index.php?ctrl=archiveJoueur&ordre=<?php 
                trouveBonFiltre("LOGIN");
                if(isset($_GET["login"])){echo "&login=".$_GET["login"];}
            ?>' >Login</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveJoueur&ordre=<?php 
                trouveBonFiltre("date_last_visit");
                if(isset($_GET["date_last_visit"])){echo "&date_last_visit=".$_GET["date_last_visit"];}
            ?>'>Dernière visite</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveJoueur&ordre=<?php 
                trouveBonFiltre("mj");
                if(isset($_GET["mj"])){echo "&mj=".$_GET["mj"];}
            ?>'>MJ</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveJoueur&ordre=<?php 
                trouveBonFiltre("localisation");
                if(isset($_GET["localisation"])){echo "&localisation=".$_GET["localisation"];}
            ?>'>Localisation</a></u></th>
            <th style='width:30px'></th>
        </tr>
        <?php 
            foreach($listeJoueur as $joueur)
            {
                include("view/joueurLigne.php");
            }
        ?>
    </table>
</div>