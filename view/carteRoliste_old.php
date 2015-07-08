<div class='principal_avec_pub'>
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

        var previousLatlng = [];
        
        function estDejaDansArray(needle, tab)
        {
            texte = "";
            compte = tab.length;
            //texte += ("2:"+tab+"\n")
            for(a=0; a<compte; a++)
            {
                if(tab[a][0] == needle[0])
                {
                    if(tab[a][1] == needle[1])
                    {
                        texte += (tab[a] + " = " + needle)+"\n";
                        alert(texte);
                        return true;
                    }
                    else
                    {
                       texte += (tab[a][1] + " != " + needle[1]+"\n");
                    }
                }
                else
                {
                   texte += (tab[a][0] + " != " + needle[0]+"\n");
                }
            }
            texte += (tab+" ne contient pas " + needle)+"\n";
            alert(texte);
            return false;
        }
        
        var mc;
        
        function createMarker(latlng,text) 
        {
            var marker = new google.maps.Marker({
            position: latlng,
            map: map
            });

            ///get array of markers currently in cluster
            var allMarkers = mc.getMarkers();

            //check to see if any of the existing markers match the latlng of the new marker
            if (allMarkers.length != 0) {
            for (i=0; i < allMarkers.length; i++) {
            var existingMarker = allMarkers[i];
            var pos = existingMarker.getPosition();

            if (latlng.equals(pos)) {
            text = text + " & " + content[i];
            }                   
            }
            }

            google.maps.event.addListener(marker, 'click', function() {
            infowindow.close();
            infowindow.setContent(text);
            infowindow.open(map,marker);
            });
            mc.addMarker(marker);
            return marker;
        }
        
        function initialize(id) 
		{
			var mapOptions = {
                zoom: 6,
                center: new google.maps.LatLng(47,2),
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById(id),mapOptions);
            
            
			var infoWindow = new google.maps.InfoWindow();
            <?php 
                foreach($listeUser as $user)
                {
                    if($user->localisation != "")
                    {
                        ?>
                        geocoder.geocode( { 'address': "<?php echo $user->localisation; ?>"}, 
                            function(results, status) 
                            {
                                if (status == google.maps.GeocoderStatus.OK) 
                                {
                                    
                                    var myLatLng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                                    
                                    //alert("1:" + myLatLng);
                                    while(estDejaDansArray( myLatLng, previousLatlng ) == true)
                                    {
                                        myLatLng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                                        alert("on le change en "+myLatLng+".");
                                    }
                                    
                                    previousLatlng[previousLatlng.length] = myLatLng;
                                    
                                    var marker = new google.maps.Marker({
                                        position: myLatLng,
                                        map: map,
                                        animation: google.maps.Animation.DROP,
                                        title: "<?php echo $user->login; ?> <?php echo $user->localisation; ?>"
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
                        <?php 
                    }
                }
            ?>                     
		}
    </script>
    <div id="map_canvas" style='border: 3px #900000 solid;-webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;'></div>
    <script>
        initialize('map_canvas');	 
    </script>
</div>