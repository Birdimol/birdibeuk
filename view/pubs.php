<?php 
	$liste = Pub::Lister();    
    $nbre_pub = count($liste);
    
	$prevRand = rand(0,$nbre_pub-1);
	$nextRand = $prevRand;     
	while($nextRand == $prevRand)
	{
		$nextRand = rand(0,$nbre_pub-1);
	}
    $nextRand2 = $prevRand;     
	while($nextRand2 == $prevRand || $nextRand2 == $nextRand)
	{
		$nextRand2 = rand(0,$nbre_pub-2);
	}
?>
<div class='cadrePub'>
    <div class='pub_titre'>	
        PUBLICITÉ
    </div>
    <div class='pub'>	
        <img src='image/pubs/<?php echo $liste[$prevRand]; ?>'>
    </div>
    <div class='pub'>	
        <img src='image/pubs/<?php echo $liste[$nextRand]; ?>'>
    </div>
    <div class='pub'>	
        <img src='image/pubs/<?php echo $liste[$nextRand2]; ?>'>
    </div>
</div>