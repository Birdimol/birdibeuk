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
                                    
                                    var myLatLng = new google.maps.LatLng(parseFloat(results[0].geometry.location.lat()+(Math.random()/100.0)), parseFloat(results[0].geometry.location.lng()+(Math.random()/100.0)));
                                    var marker = new google.maps.Marker({
                                        position: myLatLng,
                                        map: map,
                                        animation: google.maps.Animation.DROP,
                                        title: "<?php echo $user->login; ?><br/> <?php echo $user->localisation; ?>"
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