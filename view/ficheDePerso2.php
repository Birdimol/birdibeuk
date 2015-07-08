<?php 
session_start();
header ("Content-type: image/png");
$image = imagecreatefromjpeg(__DIR__."/../image/perso2.jpg");

include(__DIR__."/../config/param.php");
include(__DIR__."/../model/GeneralFunctions.php");
include(__DIR__."/../model/autoloader.php");

$aventurier;
if(isset($_GET["id"]))
{
    $aventurier = new Aventurier($_GET["id"]);
}
else if(isset($_SESSION["birdibeuk_aventurier"]))
{
    $aventurier = unserialize($_SESSION["birdibeuk_aventurier"]);
}
else 
{
    $aventurier = new Aventurier();
}

$noir = imagecolorallocate($image, 0, 0, 0);
$font = __DIR__."/../fonts/VINERITC.TTF"; 
$fontSize = 12;
$fontSizeEquipement = 10;

imagettftext($image, $fontSize, 0, 240, 105, $noir, $font, $aventurier->NOM);
imagettftext($image, $fontSize, 0, 600, 105, $noir, $font, $aventurier->SEXE);
imagettftext($image, $fontSize, 0, 256, 147, $noir, $font, $aventurier->ORIGINE);
imagettftext($image, $fontSize, 0, 470, 147, $noir, $font, $aventurier->METIER);
imagettftext($image, $fontSize, 0, 441, 190, $noir, $font, $aventurier->EV);

if($aventurier->EA != 0)
{
    imagettftext($image, $fontSize, 0, 441, 230, $noir, $font, $aventurier->EA);
}

imagettftext($image, $fontSize, 0, 392, 332, $noir, $font, $aventurier->COU);
imagettftext($image, $fontSize, 0, 392, 364, $noir, $font, $aventurier->INT);
imagettftext($image, $fontSize, 0, 392, 395, $noir, $font, $aventurier->CHA);
imagettftext($image, $fontSize, 0, 392, 425, $noir, $font, $aventurier->AD);
imagettftext($image, $fontSize, 0, 392, 456, $noir, $font, $aventurier->FO);

imagettftext($image, $fontSize, 0, 392, 549, $noir, $font, $aventurier->AT);
imagettftext($image, $fontSize, 0, 392, 581, $noir, $font, $aventurier->PRD);

imagettftext($image, $fontSize, 0, 126, 307, $noir, $font, $aventurier->NIVEAU);
imagettftext($image, $fontSize, 0, 60, 410, $noir, $font, $aventurier->XP);

imagettftext($image, $fontSize, 0, 30, 476, $noir, $font, $aventurier->DESTIN);

imagettftext($image, $fontSize, 0, 95, 557, $noir, $font, $aventurier->OR);
imagettftext($image, $fontSize, 0, 95, 592, $noir, $font, $aventurier->ARGENT);
imagettftext($image, $fontSize, 0, 95, 624, $noir, $font, $aventurier->CUIVRE);

imagettftext($image, $fontSize, 0, 760, 281, $noir, $font, $aventurier->RESISTMAG);

imagettftext($image, 20, 0, 735, intval(696), $noir, $font, $aventurier->PR);
if($aventurier->PR_MAX == 0)
{
    imagettftext($image, 15, 0, 705, 723, $noir, $font, "pas de limite");
}
else
{
    imagettftext($image, 15, 0, 710, 723, $noir, $font, "max : ".$aventurier->PR_MAX);
}

//MAGIEPHYS
if($aventurier->MAGIEPHYS != 0)
{
    imagettftext($image, $fontSize, 0, 388, 281, $noir, $font, $aventurier->MAGIEPHYS);
}

//MAGIEPSY
if($aventurier->MAGIEPSY != 0)
{
    imagettftext($image, $fontSize, 0, 548, 281, $noir, $font, $aventurier->MAGIEPSY);
}

$nbr = 0;

$competencesLiees = fusionneCompetencesSansDoublons($aventurier->ORIGINE->COMPETENCESLIEES,$aventurier->METIER->COMPETENCESLIEES);

foreach($aventurier->competences as $competence)
{
	$string = $competence->NOM;
    if(!in_array($competence,$competencesLiees))
    {
        $string = "*".$string;
    }
    
    $font_size_temp = $fontSize;
    $dimensions = imagettfbbox($font_size_temp, 0, $font, $string);
    $lineWidth = $dimensions[2] - $dimensions[0];
    while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 160)
    {
        $font_size_temp = $font_size_temp - 0.2;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $string);
        $lineWidth = $dimensions[2] - $dimensions[0];
    }
    
    imagettftext($image, $font_size_temp, 0, 10, 748+($nbr*21.3), $noir, $font, $string);
    
	$nbr++;
}

$string = "";
$string_temp = "";
$compte = 0;
$numeroLigne = 0;
$deja_ecrit = array();
$limite_largeur_cadre = 535;
foreach($aventurier->equipements as $key=>$equipement)
{
     if(!in_array($key,$deja_ecrit) && $equipement->precieux == 0)
    {
        $string_temp = $string;
        if($compte > 0)
        {
            $string_temp .= ", ";
        }
        
        if($equipement->nombre == 1)
        {
            $string_temp .= $equipement->NOM; 
        }
        else
        {
            $string_temp .= "(".$equipement->nombre.")".$equipement->NOM; 
        } 
        
        $dimensions = imagettfbbox($fontSizeEquipement, 0, $font, $string_temp);
        $lineWidth = ($dimensions[2] - $dimensions[0]);
        
        //si la ligne est plus longue que la limite avec le nouvel equipement :
        if(($lineWidth = ($dimensions[2] - $dimensions[0])) > $limite_largeur_cadre)
        {
            //on regarde si un autre mot pourrait se caser dans l'espace restant
            $dimensions2 = imagettfbbox($fontSizeEquipement, 0, $font, $string);
            $lineWidth2 = ($dimensions2[2] - $dimensions2[0]);
            $restant = $limite_largeur_cadre - $lineWidth2;
            
            foreach($aventurier->equipements as $key2=>$equipement2)
            {
                //si cet equipement n'a pas encore été ecrit
                if(!in_array($key2,$deja_ecrit))
                {
                    $string2 = ", ".$equipement2->NOM;
                    $dimensions3 = imagettfbbox($fontSizeEquipement, 0, $font, $string2);
                    $lineWidth3 = ($dimensions3[2] - $dimensions3[0]);
                    if($restant > $lineWidth3)
                    {
                        //alors on écrit cet équipement dans l'espace restant
                        $string .= $string2;
                        $deja_ecrit[] = $key2;
                        
                        //on recalcule l'espace restant
                        $dimensions2 = imagettfbbox($fontSizeEquipement, 0, $font, $string);
                        $lineWidth2 = ($dimensions2[2] - $dimensions2[0]);
                        $restant = $limite_largeur_cadre - $lineWidth2;
                    }
                }
            }
            
            //on ecrit la ligne sans le mot qui dépassait
            imagettftext($image, $fontSizeEquipement, 0, 235, intval(1010 + $numeroLigne*22), $noir, $font, $string);
            
            //on saute une ligne
            $numeroLigne++;
            
            //on recommence une ligne avec le mot que l'on a pas placé   
            if($equipement->nombre == 1)
            {
                $string = $equipement->NOM; 
            }
            else
            {
                $string = "(".$equipement->nombre.")".$equipement->NOM; 
            }             
            $deja_ecrit[] = $key;
        }
        else
        {
            $string = $string_temp; //on continue
            $deja_ecrit[] = $key;
        }
        
        $compte++;
    }
}
imagettftext($image, $fontSizeEquipement, 0, 235, intval(1010 + $numeroLigne*22), $noir, $font, $string);

//trucs précieux
$nbrPrecieux = 0;
foreach($aventurier->equipements as $key=>$equipement)
{
    if($equipement->precieux)
    {
        $nom = "";
        if($equipement->nombre == 1)
        {
            $nom = $equipement->NOM; 
        }
        else
        {
            $nom = "(".$equipement->nombre.")".$equipement->NOM; 
        }
        $font_size_temp = $fontSizeEquipement;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
        $lineWidth = $dimensions[2] - $dimensions[0];
        while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 220)
        {
            $font_size_temp = $font_size_temp - 1;
            $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
            $lineWidth = $dimensions[2] - $dimensions[0];
        }
        
        imagettftext($image, $font_size_temp, 0, 10, intval(1010 + $nbrPrecieux*22), $noir, $font, $nom);
        $nbrPrecieux++;
    }
}

$compte_arme = 0;
foreach($aventurier->armes as $arme)
{    
    $nom = $arme->NOM;
	$modif = $arme->modif();
    if(!empty($modif))
    {
        $nom .= "(".str_replace("<br>","",$arme->modif()).")";
    }
    $font_size_temp = $fontSize;
    $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
    $lineWidth = $dimensions[2] - $dimensions[0];
    while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 300)
    {
        $font_size_temp = $font_size_temp - 1;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
        $lineWidth = $dimensions[2] - $dimensions[0];
    }
    
    imagettftext($image, $font_size_temp, 0, 235, intval(886 + $compte_arme*21.3), $noir, $font, $nom);
    imagettftext($image, $fontSize, 0, 555, intval(886 + $compte_arme*21.3), $noir, $font, $arme->PI);
    imagettftext($image, $fontSize, 0, 630, intval(886 + $compte_arme*21.3), $noir, $font, $arme->RUP);
    $compte_arme++;
}

$compte_protection = 0;
foreach($aventurier->protections as $protection)
{
    $nom = $protection->NOM;
	$modif = $protection->modif();
    if(!empty($modif))
    {
        $nom .= "(".str_replace("<br>","",$protection->modif()).")";
    }
    $font_size_temp = $fontSize;
    $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
    $lineWidth = $dimensions[2] - $dimensions[0];
    while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 320)
    {
        $font_size_temp = $font_size_temp - 1;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
        $lineWidth = $dimensions[2] - $dimensions[0];
    }
    
    imagettftext($image, $font_size_temp, 0, 235, intval(708 + $compte_protection*21.3), $noir, $font, $nom);
    imagettftext($image, $fontSize, 0, 580, intval(708 + $compte_protection*21.3), $noir, $font, $protection->PR);
    imagettftext($image, $fontSize, 0, 630, intval(708 + $compte_protection*21.3), $noir, $font, $protection->RUP);
    $compte_protection++;
}

imagepng($image); 
?>