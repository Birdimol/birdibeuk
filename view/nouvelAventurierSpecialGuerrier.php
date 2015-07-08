<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Spécificité du Guerrier.</h1>
    <div>
        Le guerrier, au niveau un, peut choisir de soustraire un point d'attaque pour augmenter sa parade ou inversément.<br>
        Augmenter votre attaque vous donnera plus de chance de toucher votre ennemi, par contre, augmenter votre parade vous permettra de mieux esquiver les coups et donc de mieux vous protéger.
    </div><br>
    <style>
        select
        {
            font-size: 20px;
        }
    </style>
    <?php 
        $aventurier->printAsTable();
    ?>
    <form action='index.php' method='get'>
        <input type='hidden' name='etape' value='6' />
        <input type='hidden' name='ctrl' value='nouvelAventurier' />  
        Convertir un point de 
        <select name='competenceRetiree' id='competenceRetiree'>
            <option value='AT'>ATTAQUE</option>
            <option value='PRD'>PARADE</option>
        </select> en un point de 
        <select name='competenceAjoutee' id='competenceAjoutee'>
            <option value='AT'>ATTAQUE</option>
            <option value='PRD'>PARADE</option>
        </select> <input class='bouton' type='submit' value='confirmer' style='width:150px;'/>
    </form><br><br>
    <div style='text-align:center;'>
        <form action='index.php' method='get'>
            <input type='hidden' name='etape' value='6' />
            <input type='hidden' name='ctrl' value='nouvelAventurier' />  
            <input class='bouton' type='submit' value='Non merci' style='width:150px;margin:auto;'/>
        </form>
    </div>   
</div>