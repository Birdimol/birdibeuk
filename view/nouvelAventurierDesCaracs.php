<div class='principal_avec_pub'>
	<p>Bonjour à vous, futur aventurier.</p>
	<p>Nous allons vous aider à vous construire votre personnage pour commencer la magnifique, salissante et parfois (souvent) humiliante vie d'aventurier dans le monde fascinant des Terres de Fangh.</p>
	<p>Il existe plusieurs façons de créer votre aventurier.</p>
	<p>Tout d'abord, la version la plus noble et la plus respectueuse des règles du jeu de rôle, le tirage totalement aléatoire. Vous devez lancer les cinq dés à six faces qui détermineront vos caractéristiques de base. Vous n'avez aucune idée à l'avance de ce que cela donnera. Si vous en avez le cran, faites une petite prière et cliquez sur le bouton ci-dessous :</p>
	<a href='index.php?ctrl=nouvelAventurier&type=aventurier&etape=2&methode=aleatoire'>
	    <div class="bouton_centre" style='cursor:pointer;background-image:url("image/bg3.png");width:300px;' >
	    	Lancer les dés <br> ( tel un honnête joueur )
    	</div>
    </a>
    <br>
    <p>Une deuxième façon de faire est de se garantir l'accès à une origine ou un métier. Le tirage sera aléatoire mais dans les limites autorisées par ce que vous voulez jouer. Si c'est votre choix, sélectionnez ce que vous désirez dans la liste ci-dessous :</p>
    <p>Choix par origine : </p>
    <?php 
        foreach($listeOrigines as $origine)
        {
            ?>
            <div class='cadreRougebg'><a href='index.php?ctrl=nouvelAventurier&etape=2&origine=<?php echo $origine->ID; ?>'><?php echo $origine; ?></a><span class='QMright' onclick='showPDF("<?php echo $origine; ?>")'>?</span></div>
            <?php
        }
    ?>
    <div style='clear:both;'> </div>
    <br>
    <p>Choix par metier : </p>
    <?php 
        foreach($listeMetiers as $metier)
        {
            ?>
            <div class='cadreRougebg'><a href='index.php?ctrl=nouvelAventurier&etape=2&metier=<?php echo $metier->ID; ?>'><?php echo $metier; ?></a><span class='QMright' onclick='showPDF("<?php echo $metier; ?>")'>?</span></div>
            <?php
        }
    ?>
    <div style='clear:both;'> </div>
    <br>
    <p>Enfin, si vous voulez sélectionner une origine ET un métier, vous pouvez le faire ci dessous :</p>
    <form action='index.php' method='get'>
        <input type='hidden' name='etape' value='2' />
        <input type='hidden' name='ctrl' value='nouvelAventurier' />
        <select id='origine' name='origine' onchange='majMetiers();' >
            <?php
                foreach($listeOrigines as $origine)
                {
                    ?>
                        <option value='<?php echo $origine->ID; ?>' ><?php echo $origine; ?></option>
                    <?php
                }
            ?>
        </select>
        <select id='metier' name='metier'>
            <?php 
            foreach($listeMetiers as $metier)
            {
                ?>
                    <option value='<?php echo $metier->ID; ?>' ><?php echo $metier; ?></option>
                <?php
            }
        ?>
        </select>
        <input class='bouton' type='submit' value='sélectionner cette combinaison' />
    </form>
    <div style='text-align:center;padding-top:20px;'>
    <i>*Tableau récapitulatif des métiers accessibles par race. X = indisponible.</i>
    <?php printTableOrigineMetier(); ?><br>
    </div>
    <div style='clear:both;'> </div>
</div>
<script>
    function majMetiers()
    {
        metierPrecedent = $("#metier option:selected").val();
        origine = $("#origine option:selected").text();        
        $("#metier").html("");
        <?php 
            foreach($listeOrigines as $origine)
            {
                echo "if(origine == \"".$origine."\")\n";
                echo "{\n";
                foreach($listeMetiers as $metier)
                {                    
                    if(sontCompatibles($metier,$origine))
                    {
                        echo "$('#metier').append($('<option>', {value: ".$metier->ID.", text: '".$metier."'}));\n";
                    }                        
                }
                echo "}\n";
            }
        ?>
    $("#metier").val(metierPrecedent);
    }
</script>