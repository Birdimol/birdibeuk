<div class='principal_avec_pub'>
    Sélectionnez les combattants :<br>
   <form action='index.php?ctrl=outilsMJ&action=simulation_combat_mobs_selection' method='post'>
        <?php 
            if(count($mesAventuriers) > 0)
            {
                ?>
                <table style='margin:auto;'>
                    <tr>
                        <th colspan='5'><b><u>Vos aventuriers</u></b><br></th>                
                    </tr>
                    <tr>
                        <th style='width:10px;text-align:left;'></th>
                        <th style='width:200px;text-align:left;'><u>Nom</u></th>           
                        <th style='width:100px;text-align:left;'><u>Origine</u></th>
                        <th style='width:100px;text-align:left;'><u>Métier</u></th>
                        <th style='width:50px;text-align:left;'><u>Niveau</u></th>                
                    </tr>
                    <?php 
                        $maxID = 0;
                        foreach($mesAventuriers as $aventurier)
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
                <?php
            }
        ?>
        
        <br><br>
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
        <div style='text-align:center;'><input type='submit' value='Continuer et selectionner les ennemis' style='width:200px;'/></div>
    </form>
</div>
