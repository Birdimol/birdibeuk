<div class='principal_avec_pub'>
	<h1 style='text-align:center;'>Supprimer un aventurier</h1>
    <form method='post' action='index.php?ctrl=ficheRapide&action=action_suppression&codeacces=<?php echo $aventurier->codeacces;?>&id_aventurier=<?php echo $aventurier->ID;?>'>    
        <style>
            td
            {
                vertical-align:top;
            }
        </style>  
        <p>Etes-vous certain de vouloir supprimer <?php echo $aventurier->NOM ?> (<?php echo $aventurier->ORIGINE->NOM; ?>/<?php echo $aventurier->METIER->NOM; ?>) ?</p>
        <div style='text-align:center;'><input type='submit' value='Supprimer cet aventurier'></div>
        <br>
    </form>
</div>



