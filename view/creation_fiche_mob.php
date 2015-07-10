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
    <?php 
        $mobs = array();
        foreach($_POST as $key=>$value)
        {
            if(substr($key,0,3) == "mob")
            {
                for($a=0; $a<$value; $a++)
                {
                    $id = substr($key,3);
                    $mob = new Mob($id);
                    $mob->getLoot();
                    $mobs[] = $mob;
                }
            }
        }
        
        foreach($mobs as $mob)
        {
            $mob->printInfo();
        }
    ?>
</div>
