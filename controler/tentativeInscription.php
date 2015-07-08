<?php 
    $user = new User();
    $user->set_all_from_form($_POST);
    $resultat = $user->ajouter();
    if($resultat == 1)
    {
        //mettre à jour le champs inscription_date
        $user->get_data_from_db($user->id);
        $_SESSION["birdibeuk_user"] = serialize($user); 
        //succes
        header('Location: index.php?ctrl=profil');
    }
    else
    {
        //echec
        if($resultat == -1)
        {
            $messageInscription = "Une erreur s'est produite.";
        }
        else if($resultat === -2)
        {
            $messageInscription = "Ce login existe déjà !";
        }
        include(__DIR__."/inscriptionConnexion.php");
    }
?>