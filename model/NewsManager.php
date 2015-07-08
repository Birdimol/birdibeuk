<?php 
class NewsManager
{
	public static function LastNews()
	{
		$db = DatabaseManager::getDb();
		$requete = "SELECT * FROM news order by date_news DESC";
		
		$tableau=array();

		foreach($db->query($requete) as $row) 
		{
			$tableau[] = new News($row['ID_NEWS'],$row['DATE_NEWS'],$row['TITRE'],$row['TEXTE']);
		}
		return $tableau;
	}
}