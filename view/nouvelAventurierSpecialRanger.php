<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Spécificité du Ranger.</h1>
    <div>
        En raison de sa polyvalence, au niveau un le Ranger peut choisir de soustraire un point d'une caractéristique pour l'ajouter à une autre.
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
            <option value='INT'>INTELLIGENCE</option>
            <option value='CHA'>CHARISME</option>
            <option value='COU'>COURAGE</option>
            <option value='FO'>FORCE</option>
            <option value='AD'>ADRESSE</option>
        </select> en un point de 
        <select name='competenceAjoutee' id='competenceAjoutee'>
            <option value='INT'>INTELLIGENCE</option>
            <option value='CHA'>CHARISME</option>
            <option value='COU'>COURAGE</option>
            <option value='FO'>FORCE</option>
            <option value='AD'>ADRESSE</option>
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