<?php 
    session_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="description" content="">
		<meta name="author" content="Favay Thomas">
	</head>
	<body>
    <?php 
        include(__DIR__."/../config/param.php");
        include(__DIR__."/../model/autoloader.php");
        include(__DIR__."/../model/GeneralFunctions.php");
        $mobs = unserialize($_SESSION["mobs"]);
        ?>
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
	</body>
</html>
