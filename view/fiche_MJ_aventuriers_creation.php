<div class='principal_avec_pub'>
    <?php 
        for($a=1;$a<$_POST["maxID"];$a++)
        {
            if(isset($_POST["aventurier".$a]))
            {
                $aventurier = new Aventurier($a);
                $aventurier->ficheMJ();
            }
        }
    ?>
</div>
