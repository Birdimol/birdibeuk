<?php
    class Visiteur
    {
        public static function Manage()
        {
            $ip = $_SERVER["REMOTE_ADDR"];
            
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
                $requete = "INSERT INTO visiteur (IP, DATE) VALUES(:IP, CURRENT_TIMESTAMP)";                               
                $stmt = $db->prepare($requete);
                $stmt->bindParam(':IP', $ip, PDO::PARAM_STR, 16);  
                $res = executePDOSQPWithDebug($stmt);                
                return true;
            }
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