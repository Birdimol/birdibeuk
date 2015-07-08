<div class='principal_avec_pub'>
    <form action='index.php?ctrl=outilsMJ&action=fiche_MJ_aventuriers_creation' method='post'>
        <table style='margin:auto;'>
            <tr>
                <th style='width:10px;text-align:left;'></th>
                <th style='width:200px;text-align:left;'><u>Nom</u></th>           
                <th style='width:100px;text-align:left;'><u>Origine</u></th>
                <th style='width:100px;text-align:left;'><u>Métier</u></th>
                <th style='width:50px;text-align:left;'><u>Niveau</u></th>                
            </tr>
            <?php 
                $maxID = 0;
                foreach($aventuriers as $aventurier)
                {
                    echo "<tr>";
                    echo "  <td><input type='checkbox' name='aventurier".$aventurier->ID."' /></td>
                            <td>".$aventurier->NOM."</td>
                            <td>".$aventurier->ORIGINE."</td>
                            <td>".$aventurier->METIER."</td>
                            <td>".$aventurier->NIVEAU."</td>  ";                          
                    echo "</tr>";
                    if($aventurier->ID > $maxID)
                    {
                        $maxID = $aventurier->ID;
                    }
                }
            ?>
        </table>
        <input type='hidden' value='<?php echo $maxID; ?>' name='maxID' />
        <input type='submit' value='Générer' />
    </form>
</div>
