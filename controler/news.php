<?php 
	$news = NewsManager::LastNews();
    include(__DIR__."/../view/pubs.php");
	include(__DIR__."/../view/news.php");
	
?>