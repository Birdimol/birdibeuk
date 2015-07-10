<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Spécialisation du Mage.</h1>
    <?php 
        $aventurier->printAsTable();
    ?>
    <div>
        Un mage se doit de choisir une spécialisation dans ces études.
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
            <div class='cadreRougebg' style='float:none;width:350px;margin:auto;'>Documentation sur les disciplines<span class='QMright' onclick='showPDF("magie")'>?</span></div>
            Vous choisissez la discipline : 
            <select name='magie' id='magie'>
               <?php 
                    foreach($magies as $magie)
                    {
                        if($magie->disponible)
                        {
                            echo "<option value='".$magie->ID_MAGIE."' >".$magie->NOM."</option>";
                        }
                    }
               ?>
            </select> <input class='bouton' type='submit' value='confirmer' style='width:150px;'/><br>
            <i>*Toutes les disciplines ne sont pas encore disponible car tous les grimoires ne sont pas encore rédigés.</i>
        </form>
    </div>
</div>