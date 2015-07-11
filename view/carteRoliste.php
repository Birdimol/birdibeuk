<div class='principal_avec_pub'>
    <style>
        #map_canvas 
        {
            height: 700px;
            width: 900px;
            margin:50px auto;
        }
    </style>
	 <div id="map_canvas" style='border: 3px #900000 solid;-webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;'></div>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
    <script>               
        var geocoder =  new google.maps.Geocoder();
		
		function sleep(milliseconds) {
		  var start = new Date().getTime();
		  for (var i = 0; i < 1e7; i++) {
			if ((new Date().getTime() - start) > milliseconds){
			  break;
			}
		  }
		}
		var delay = 100;
		var infowindow = new google.maps.InfoWindow();
		var latlng = new google.maps.LatLng(46.52359,2.33288);
		var mapOptions = {
                zoom: 6,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			
		var geo = new google.maps.Geocoder(); 
		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		var bounds = new google.maps.LatLngBounds();
		
		function getAddress(search, nom, next) {
			geo.geocode({address:search}, function (results,status)
			  { 
				// If that was successful
				if (status == google.maps.GeocoderStatus.OK) {
				  // Lets assume that the first marker is the one we want
				  var p = results[0].geometry.location;
				  var lat=p.lat();
				  var lng=p.lng();
				  // Output the data
					var msg = 'address="' + search + '" lat=' +lat+ ' lng=' +lng+ '(delay='+delay+'ms)<br>';
				  // Create a marker
				  createMarker("<b>"+nom+"</b><br>"+search,lat,lng,nom+"\n"+search);
				}
				else {
				  if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
					nextAddress--;
					delay++;
				  } else {
					var reason="Code "+status;
					var msg = 'address="' + search + '" error=' +reason+ '(delay='+delay+'ms)<br>';
					
				  }   
				}
				next();
			  }
			);
		}
		
		function createMarker(add,lat,lng,txt) {
		   var contentString = add;
		   var marker = new google.maps.Marker({
			 position: new google.maps.LatLng(lat,lng),
			 map: map,
			 title: txt,
			 zIndex: Math.round(latlng.lat()*-100000)<<5
		   });

		  google.maps.event.addListener(marker, 'click', function() {
			 infowindow.setContent(contentString); 
			 infowindow.open(map,marker);
		   });
		   bounds.extend(marker.position);
		}
		
		<?php			  
			$tableau = array();
			
			foreach($listeUser as $user)
			{
				if(isset($tableau[$user->localisation]))
				{
					$tableau[$user->localisation].= " - ".$user->login;
				}
				else
				{
					$tableau[$user->localisation] = $user->login;
				}
			}
		?>
		
		var addresses = [  
			<?php
				$compte= 0;
				foreach($tableau as $localisation=>$user)
				{
					if($compte > 0)
					{
						echo ",";						
					}
					echo "'".str_replace(",","",$localisation)."'";
					$compte++;
				}
				
			  ?>
		];
		
		var noms = [  
			<?php 
				$compte= 0;
				foreach($tableau as $localisation=>$user)
				{
					if($compte > 0)
					{
						echo ",";						
					}
					echo "'".str_replace(",","",$user)."'";
					$compte++;
				}
				
			  ?>
		];
		
		var nextAddress = 0;


		function theNext() {
			if (nextAddress < addresses.length) {
			  setTimeout('getAddress("'+addresses[nextAddress]+'","'+noms[nextAddress]+'",theNext)', delay);
			  nextAddress++;
			} else {
			  map.fitBounds(bounds);
			}
		}

		theNext();
		
    </script>
</div>