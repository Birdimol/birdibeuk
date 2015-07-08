<div class='principal_avec_pub'>
    <h1 style='text-align:center;'>Spécificité du Guerrier.</h1>
    <div>
        En raison de sa spécialisation technique, au niveau un, l'ingénieur doit retirer un point à l'attaque ou à la parade, qu'il pourra
                        ajouter au choix à l'intelligence ou à l'adresse.
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
            <option value='INT'>INTELLIGENCE</option>
            <option value='AD'>ADRESSE</option>
        </select> <input class='bouton' type='submit' value='confirmer' style='width:150px;'/>
    </form><br><br>
</div>