<div class='principal_avec_pub'>
    <style>
        .tableMob
        {
            border-collapse:collapse;
            background-image:url('image/bg4.png');
            margin:10px;
            width:400px;
            border: 3px #900000 solid;
        }
        
        .tableMob td
        {
            border: 1px #900000 solid;
            padding:5px;
            text-align:center;
        }
    </style>
    <div style='text-align:center;'>
        <a target='blank_' href='view/creation_fiche_mob_imprimable.php'>
            <input type='button' value='version imprimable' style='width:200px;'/>
        </a>
    </div>
    <table>
        <tr>
        <?php        
        foreach($mobs as $mob)
        {
            echo "<td>";
            $mob->printInfo();
            echo "</td>";
            $compte++;
            if($compte == 2)
            {
                echo "</tr><tr>";
                $compte = 0;             
            }
        }
    ?>
        </tr>
    </table>
</div>
