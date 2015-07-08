<tr>
    <td><?php echo $joueur->login; ?></td>
    <td><?php echo turnDateToFR($joueur->date_last_visit); ?></td>
    <td style='width:50px;text-align:center;' ><?php echo $joueur->mj; ?></td>
    <td style='width:250px;' ><?php echo $joueur->localisation; ?></td>
    <td style='text-align:center;'><a href='index.php?ctrl=profil&idJoueur=<?php echo $joueur->id; ?>' ><img src='image/icon/scroll.png' style='width:25px;height:25px;' /></a></td>
</tr>