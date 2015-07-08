<div class='principal_avec_pub'>
    <h3>Fiche d'archive officielle de la CDD sur le joueur <?php 
    
    echo $user->login; 
    if($modificationAutorisee)
    {
        ?>
        <a href='index.php?ctrl=editProfil'>&nbsp;&nbsp;&nbsp;&nbsp;<img src='image/modify.png' style='width:20px;height:20px;' /></a>
        <?php
    }
    ?>
</h3>
<p>Date d'inscription : <?php echo $user->date_inscription; ?></p>
<p>Dernière visite : <?php echo $user->date_last_visit; ?></p>
<?php
    if($user->mail != "")
    {
        echo "<p>Adresse email : ".str_replace("@","(at)",$user->mail)."</p>";
    }
    
    echo "<p>Est un MJ : ";
    if($user->mj)
    {
        echo "Oui";
    }
    else
    {
        echo "Non";
    }
    echo "</p>";
    
    if(!empty($user->description))
    {
        echo "<p>Description : <br>".$user->description."</p>";
     }
    
    $compte = 0;
    foreach($user->aventuriers as $aventurier)
    {
        if($compte==0)
        {
            echo "<p style='text-align:center;' >Les aventuriers de ce joueur</p>";
            ?>
            <style>
                td
                {
                    text-align:center;
                }
                
            </style>
            <table style='margin:auto;background-image:url("image/bg3.png");border: 3px #900000 solid;-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;'>
            <tr>
                <th style='width:200px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("NOM");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>' >Nom</a></u></th>
                <th style='width:100px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("SEXE");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>Sexe</a></u></th>
                <th style='width:100px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("ID_METIER");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>Métier</a></u></th>
                <th style='width:100px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("ID_ORIGINE");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>Origine</a></u></th>
                <th style='width:50px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("NIVEAU");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>Niveau</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("EV");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>EV</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("EA");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>EA</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("COU");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>COU</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("INT");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>INT</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("CHA");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>CHA</a></u></th>
                <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                    trouveBonFiltre("AD");
                    if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
                ?>'>AD</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                trouveBonFiltre("FO");
                if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
            ?>'>FO</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                trouveBonFiltre("AT");
                if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
            ?>'>AT</a></u></th>
            <th style='width:30px'><u><a href='index.php?ctrl=archiveAventurier&ordre=<?php 
                trouveBonFiltre("PRD");
                if(isset($_GET["nom"])){echo "&nom=".$_GET["nom"];}
            ?>'>PRD</a></u></th>
            <th style='width:180px'></th>
        </tr>
        <?php
        }
        include("view/aventurierLigne.php");
        $compte++;
    }
    
    if($compte > 0)
    {
        echo "</table>";
    }
    
    if($user->localisation != "")
    {
        ?>
        <style>
        #map_canvas 
        {
            height: 700px;
            width: 900px;
            margin:50px auto;
        }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script>               
            var geocoder =  new google.maps.Geocoder();

            function initialize(id) 
            {
                var mapOptions = {
                    zoom: 6,
                    center: new google.maps.LatLng(47,2),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById(id),mapOptions);
                var infoWindow = new google.maps.InfoWindow();
         
                geocoder.geocode( { 'address': "<?php echo $user->localisation; ?>"}, 
                    function(results, status) 
                    {
                        if (status == google.maps.GeocoderStatus.OK) 
                        {
                            
                            var myLatLng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                            var marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map,
                                animation: google.maps.Animation.DROP,
                                title: "<?php echo $user->login; ?>\n<?php echo $user->localisation; ?>"
                            });  
                            google.maps.event.addListener(marker, "click", function(){
                                
                                infoWindow.close();
                                infoWindow.setContent(
                                    "<div id='boxcontent' style='font-family:Calibri'><strong style='color:green'>"
                                    + "<a href='index.php?ctrl=profil&idJoueur=<?php echo $user->id; ?>'><?php echo $user->login; ?></a>" +
                                    "</strong><br /><span style='font-size:12px;color:#333'> " + "<?php echo $user->localisation; ?>" + "</span></div>"
                                );
                                infoWindow.open(map, this);
                            });
                        }
                    }                        
                );                  
            }
        </script>
        <div id="map_canvas" style='border: 3px #900000 solid;-webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;'></div>
        <script>
            initialize('map_canvas');	 
        </script>
    <?php
    }
    
?>
</div>