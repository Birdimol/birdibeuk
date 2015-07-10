<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Bonus d'adresse</h1>
    <?php 
        $aventurier->printAsTable();
    ?>
    <div>
        Votre adresse est impressionnante ! Une telle adresse vous donne le droit d'augmenter au choix l'attaque ou la parade !
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
            <input type='hidden' name='BonusADFait' value='1' />  
            Vous désirez augmenter <select name='augmenter'><option value='AT'>l'attaque</option><option value='PRD'>la parade</option></select>.
            <input type='submit'  value='Continuer' />  
        </form>
    </div>
</div>