<?php 
	class Statistique
	{
		static public function add()
		{
			include("geo/geoipcity.inc");
			include("geo/geoipregionvars.php");

			$gi = geoip_open(__DIR__."/geo/GeoLiteCity.dat",GEOIP_STANDARD);

			$record = geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']);
			$ip = $_SERVER['REMOTE_ADDR'];
			
			//est-ce que cette ip est déjà venue aujourd'hui ?
            if(Visiteur::ipVisitedToday($ip))
            {
                //mise à jour de sa dernière visite
                $db = getConnexionDB();
                $requete = "UPDATE visiteur SET DATE = CURRENT_TIMESTAMP WHERE IP = :IP AND DATE(DATE) = CURDATE()";

                $stmt = $db->prepare($requete);
                $stmt->bindParam(':IP', $ip, PDO::PARAM_STR, 16);  
                $res = executePDOSQPWithDebug($stmt);
                return true;
            }
            else
            {
                //création de la ligne pour aujourd'hui                
                $db = getConnexionDB();
                $requete = "INSERT INTO visiteur (IP, DATE, code_postal, pays, region, ville) VALUES('".$ip."', CURRENT_TIMESTAMP, '".$record->postal_code."', '".$record->country_name."', '".$GEOIP_REGION_NAME[$record->country_code][$record->region]."', '".$record->city."')";    
			
                $stmt = $db->prepare($requete); 
                $res = executePDOSQPWithDebug($stmt);                
                return true;
            }

			geoip_close($gi);
		}
		
		public static function ipVisitedToday($ip)
        {           
            $db = getConnexionDB();
            $requete = "SELECT COUNT(*) as COMPTE FROM visiteur WHERE IP = '".$ip."' AND DATE(visiteur.DATE) = CURDATE()";    
            $stmt = $db->prepare($requete);            
            $res = executePDOSQPWithDebug($stmt);
            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

            if($ligne["COMPTE"] > 0)
            {
                return true;
            }
            else
            {
                return false;
            }            
        }
	}
?>