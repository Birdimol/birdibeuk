<div class='principal_avec_pub'>
    <form action='index.php?ctrl=outilsMJ&action=creation_fiche_mob' method='post'>
        <div class='cadreRouge' style="background-image:url('image/bg4.png');font-size:16px;width:900px;margin:auto;">
            <div style='text-align:center;'>Bandits</div>
            <br>
            <table style='border-collapse:collapse;padding:5px;margin:auto;'>
                <tr>
                    <th style='border:none;'></th><th style='padding:5px;border:1px #900000 solid;'>AT</th>
                    <th style='padding:5px;border:1px #900000 solid;'>PRD</th>
                    <th style='padding:5px;border:1px #900000 solid;'>EV</th>
                    <th style='padding:5px;border:1px #900000 solid;'>PR</th>
                    <th style='padding:5px;border:1px #900000 solid;'>Dégâts</th>
                    <th style='padding:5px;border:1px #900000 solid;'>COU</th>
                    <th style='padding:5px;border:1px #900000 solid;'>RM</th>
                    <th style='padding:5px;border:1px #900000 solid;'>XP</th>
                    <th style='padding:5px;border:1px #900000 solid;'>NIVEAU</th>
                    <th style='padding:5px;border:1px #900000 solid;'>SPECIAL</th>
                </tr>
                <?php 
                    foreach($mobs as $mob)
                    {
                        echo "<tr>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'><input type='number' name='mob".$mob->id_mob."' style='width:40px;'/> ".$mob->nom."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->at."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->prd."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->ev."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->pr."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->pi."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->cou."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->rm."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->xp."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->niv_min."-".$mob->niv_max."</td>";
                            echo "<td style='padding:5px;border:1px #900000 solid;'>".$mob->note."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        <br>
        <div style='text-align:center;'><input type='submit' value='Générer' style='width:200px;'/></div>
    </form>
</div>
