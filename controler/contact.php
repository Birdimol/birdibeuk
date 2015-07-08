<?php 
	include(__DIR__."/../view/pubs.php");
    if(!isset($_POST["message"]))
	{
		include(__DIR__."/../view/contact.php");
	}
	else
	{
		$resultat = MailManager::EnvoiMail($_POST["message"],'favay.thomas@gmail.com');

		if($resultat)
		{
			$message = "<p class='bon'>Le message a bien été envoyé !</p>";
		}
		else
		{
			$message = "<p class='mauvais'>Le message n'a été envoyé ! Une erreur est survenue.</p>";
		}
		include(__DIR__."/../view/message.php");
	}	
	
?>