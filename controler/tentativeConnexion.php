<?php     
    include(__DIR__."/../view/pubs.php");
    $user = User::formulaireConnexionValide($_POST["login"], $_POST["password"]);
    
    if($user === false)
    {
        //erreur
        $messageConnexion = "Erreur, mauvais login ou mot de passe.";
        include(__DIR__."/../view/inscriptionConnexion.php");
    }
    else
    {
        //connecté
        $_SESSION["birdibeuk_user"] = serialize($user); 
        $user->updateLastVisit();
        header('Location: index.php?ctrl=profil');
    }
    
    
?>