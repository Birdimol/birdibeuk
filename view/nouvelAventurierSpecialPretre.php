<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Spécialisation du Prêtre.</h1>
    <?php 
        $aventurier->printAsTable();
    ?>
    <div>
        Un prêtre se doit de choisir un Dieu.
    </div><br>
    <style>
        select
        {
            font-size: 20px;
        }
    </style>
    
    <div style='text-align:center;'>
        <form action='index.php' method='get'>
            <input type='hidden' name='etape' value='6' />
            <input type='hidden' name='ctrl' value='nouvelAventurier' />  
            <?php 
            foreach($dieux as $dieu)
            {
                if($dieu->PRETRE)
                {
                    echo "<div class='cadreRouge' style=\"background-image:url('image/bg4.png');font-size:16px;\" ><u>".$dieu->NOM."</u><br><br>".$dieu->DESCRIPTION."</div><br>";
                }
            }
            ?>
            Vous choisissez le dieu : 
            <select name='dieu' id='dieu'>
               <?php 
                    foreach($dieux as $dieu)
                    {
                        if($dieu->PRETRE)
                        {
                            echo "<option value='".$dieu->ID_DIEU."' >".$dieu->NOM."</option>";
                        }
                    }
               ?>
            </select> <input class='bouton' type='submit' value='confirmer' style='width:150px;'/><br>
            <i>*Toutes les disciplines ne sont pas encore disponible car tous les grimoires ne sont pas encore rédigés.</i>
        </form>
    </div>
</div>