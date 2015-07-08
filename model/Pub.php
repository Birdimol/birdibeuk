<?php 
    class Pub
    {
        public static function Lister()
        {
            $list = array();
            $dirname = "image/pubs/";
            $dir = opendir($dirname); 
	
            $files = array();
            
            while($file = readdir($dir)) 
            {
                if($file != '.' && $file != '..' && !is_dir($dirname.$file))
                {  
                    $list[] = $file;
                }
            }
            
            return $list;
        }        
    }