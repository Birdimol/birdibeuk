<?php 
session_start();
header ("Content-type: image/png");
$image = imagecreatefromjpeg(__DIR__."/../image/perso.jpg");


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
$fontSize = 20;
$fontSizeEquipement = 16;

//imagestring($image, 6, 3$fontSize, 125, $aventurier->NOM , $noir);
imagettftext($image, $fontSize, 0, 310, 135, $noir, $font, $aventurier->NOM);
imagettftext($image, $fontSize, 0, 760, 135, $noir, $font, $aventurier->SEXE);
imagettftext($image, $fontSize, 0, 325, 188, $noir, $font, $aventurier->ORIGINE);
imagettftext($image, $fontSize, 0, 605, 188, $noir, $font, $aventurier->METIER);
imagettftext($image, $fontSize, 0, 562, 244, $noir, $font, $aventurier->EV);
if($aventurier->EA != 0)
{
    imagettftext($image, $fontSize, 0, 562, 322, $noir, $font, $aventurier->EA);
}

imagettftext($image, $fontSize, 0, 498, 427, $noir, $font, $aventurier->COU);
imagettftext($image, $fontSize, 0, 498, 467, $noir, $font, $aventurier->INT);
imagettftext($image, $fontSize, 0, 498, 507, $noir, $font, $aventurier->CHA);
imagettftext($image, $fontSize, 0, 498, 546, $noir, $font, $aventurier->AD);
imagettftext($image, $fontSize, 0, 498, 586, $noir, $font, $aventurier->FO);

imagettftext($image, $fontSize, 0, 498, 704, $noir, $font, $aventurier->AT);
imagettftext($image, $fontSize, 0, 498, 745, $noir, $font, $aventurier->PRD);

imagettftext($image, $fontSize, 0, 155, 395, $noir, $font, $aventurier->NIVEAU);
imagettftext($image, $fontSize, 0, 75, 525, $noir, $font, $aventurier->XP);

imagettftext($image, $fontSize, 0, 30, 843, $noir, $font, $aventurier->DESTIN);

imagettftext($image, $fontSize, 0, 85, 946, $noir, $font, $aventurier->OR);
imagettftext($image, $fontSize, 0, 85, 1066, $noir, $font, $aventurier->ARGENT);
imagettftext($image, $fontSize, 0, 85, 1185, $noir, $font, $aventurier->CUIVRE);

imagettftext($image, $fontSize, 0, 975, 362, $noir, $font, $aventurier->RESISTMAG);


if($aventurier->PR_MAX == 0)
{
    //echo "0 = ".$aventurier->PR_MAX;
    imagettftext($image, 15, 0, 895, 922, $noir, $font, "pas de limite");
}
else
{
    //echo "0 != ".$aventurier->PR_MAX;
    imagettftext($image, 15, 0, 914, 922, $noir, $font, "max : ".$aventurier->PR_MAX);
}

if($aventurier->PR != 0)
{
    imagettftext($image, $fontSize, 0, 945, 892, $noir, $font, $aventurier->PR);
}


//MAGIEPHYS
if($aventurier->MAGIEPHYS != 0)
{
    imagettftext($image, $fontSize, 0, 490, 362, $noir, $font, $aventurier->MAGIEPHYS);
}

//MAGIEPSY
if($aventurier->MAGIEPSY != 0)
{
    imagettftext($image, $fontSize, 0, 695, 362, $noir, $font, $aventurier->MAGIEPSY);
}


$string = "";
$string_temp = "";
$compte = 0;
$numeroLigne = 0;
$deja_ecrit = array();
$limite_largeur_cadre = 710;
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
                        
                        //on rcalcule l'espace restant
                        $dimensions2 = imagettfbbox($fontSizeEquipement, 0, $font, $string);
                        $lineWidth2 = ($dimensions2[2] - $dimensions2[0]);
                        $restant = $limite_largeur_cadre - $lineWidth2;
                    }
                }
            }
            
            //on ecrit
            imagettftext($image, $fontSizeEquipement, 0, 295, intval(1293 + $numeroLigne*28), $noir, $font, $string);
            
            //on saute une ligne
            $numeroLigne++;
            
            //on recommence une ligne avec les mots        
            $string = $equipement->NOM; 
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
imagettftext($image, $fontSizeEquipement, 0, 295, intval(1293 + $numeroLigne*28), $noir, $font, $string);

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
        
        imagettftext($image, $font_size_temp, 0, 10, intval(1294 + $nbrPrecieux*27), $noir, $font, $nom);
        $nbrPrecieux++;
    }
}

$compte_arme = 0;
foreach($aventurier->armes as $arme)
{    
    $nom = $arme->NOM;
    if(!empty($arme->modif()))
    {
        $nom .= "(".str_replace("<br>","",$arme->modif()).")";
    }
    $font_size_temp = $fontSize;
    $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
    $lineWidth = $dimensions[2] - $dimensions[0];
    while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 390)
    {
        $font_size_temp = $font_size_temp - 1;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
        $lineWidth = $dimensions[2] - $dimensions[0];
    }
    
    imagettftext($image, $font_size_temp, 0, 295, intval(1133 + $compte_arme*27), $noir, $font, $nom);
    imagettftext($image, $fontSize, 0, 700, intval(1133 + $compte_arme*27), $noir, $font, $arme->PI);
    imagettftext($image, $fontSize, 0, 800, intval(1133 + $compte_arme*27), $noir, $font, $arme->RUP);
    $compte_arme++;
}

$compte_protection = 0;
foreach($aventurier->protections as $protection)
{
    $nom = $protection->NOM;
    if(!empty($protection->modif()))
    {
        $nom .= "(".str_replace("<br>","",$protection->modif()).")";
    }
    $font_size_temp = $fontSize;
    $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
    $lineWidth = $dimensions[2] - $dimensions[0];
    while(($lineWidth = ($dimensions[2] - $dimensions[0])) > 400)
    {
        $font_size_temp = $font_size_temp - 1;
        $dimensions = imagettfbbox($font_size_temp, 0, $font, $nom);
        $lineWidth = $dimensions[2] - $dimensions[0];
    }
    
    imagettftext($image, $font_size_temp, 0, 295, intval(906 + $compte_protection*27), $noir, $font, $nom);
    imagettftext($image, $fontSize, 0, 740, intval(906 + $compte_protection*27), $noir, $font, $protection->PR);
    imagettftext($image, $fontSize, 0, 800, intval(906 + $compte_protection*27), $noir, $font, $protection->RUP);
    $compte_protection++;
}

imagepng($image); 
?>