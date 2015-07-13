<div class='menu'>
	<table class='tableMenu'>
		<tr>
			<td class='tdMenu'><a href='index.php?ctrl=news'>Actualités</a></td>
			<td class='tdMenuVide'>|</td>
			<td class='tdMenu'><a href='index.php?ctrl=archives'>Consulter les archives</a></td>
            <td class='tdMenuVide'>|</td>
			<td class='tdMenu'><a href='index.php?ctrl=ficheRapide'>Fiche rapide</a></td>
			<td class='tdMenuVide'>|</td>
			<td class='tdMenu'><a href='index.php?ctrl=nouvelAventurier'>Créer un nouvel aventurier</a></td>
			<td class='tdMenuVide'>|</td>
            <td class='tdMenu'><a href='index.php?ctrl=outilsMJ'>Outils MJ</a></td>
            <td class='tdMenuVide'>|</td>
 
            <?php 
                if(isset($_SESSION["birdibeuk_user"]))
                {
                    $user = unserialize($_SESSION["birdibeuk_user"]);
                    if(isset($_GET["ctrl"]))
                    {
                        if($_GET["ctrl"] == "deconnexion")
                        {
                            ?>
                                <td class='tdMenu'><a href='index.php?ctrl=inscriptionConnexion'>S'inscrire/Se connecter</a></td>
                            <?php
                        }
                    }
                    
                    if($_SESSION["birdibeuk_user"] != false)
                    {
                        ?>
                            <td class='tdMenu'><a href='index.php?ctrl=profil'>Profil</a></td>   
                            <td class='tdMenuVide'>|</td>
                            <td class='tdMenu'><a href='index.php?ctrl=gestionAventuriers'>Mes aventuriers</a></td>
                            <td class='tdMenuVide'>|</td>
                            <td class='tdMenu'><a href='index.php?ctrl=gestionCompagnies'>Compagnies</a></td>
                        <?php
                        /*
                        if($user->mj)
                        {
                          ?>
                            <td class='tdMenuVide'>|</td>
                            <td class='tdMenu'><a href='index.php?ctrl=outilsMJ'>Outils MJ</a></td>
                            
                            <?php 
                        }*/
                    }
                    else
                    {
                        
                        ?>
                            <td class='tdMenu'><a href='index.php?ctrl=inscriptionConnexion'>S'inscrire/Se connecter</a></td>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <td class='tdMenu'><a href='index.php?ctrl=inscriptionConnexion'>S'inscrire/Se connecter</a></td>
                    <?php
                }
            ?>			
			<td class='tdMenuVide'>|</td>
            <td class='tdMenu'><a href='index.php?ctrl=carteRoliste'>Carte des rôlistes</a></td>
			<td class='tdMenuVide'>|</td>
			<td class='tdMenu'><a href='index.php?ctrl=contact'>Donner votre avis</a></td>
            <?php
                if(isset($_SESSION["birdibeuk_user"]))
                {
                    if($_SESSION["birdibeuk_user"] != false)
                    {
                        if(isset($_GET["ctrl"]))
                        {
                            if($_GET["ctrl"] != "deconnexion")
                            {
                                ?>
                                    <td class='tdMenuVide'>|</td>
                                    <td class='tdMenu'><a href='index.php?ctrl=deconnexion'>Déconnexion</a></td>
                                <?php 
                            }
                        }
                        else
                        {
                            ?>
                                <td class='tdMenuVide'>|</td>
                                <td class='tdMenu'><a href='index.php?ctrl=deconnexion'>Déconnexion</a></td>
                            <?php 
                        }                        
                    }
                }
            ?>
		</tr>
	</table>
</div>