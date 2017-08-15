<!DOCTYPE html>
<html>
  <head>
<!--# Map generator #-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
    html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    #map-canvas name { margin-bottom:6px; display:block; font-weight:bold; }
    </style>
    <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQiqmXVY4Rob-132JPV7ogova1fMq3FEo">
    </script>
    <script type="text/javascript">
	
	var beaches = [
	  ['Bondi Beach', -33.890542, 151.274856, 4],
	  ['Coogee Beach', -33.923036, 151.259052, 5],
	  ['Cronulla Beach', -34.028249, 151.157507, 3],
	  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
	  ['Maroubra Beach', -33.950198, 151.259302, 1]
	];
	
    function initialize(obj, _lat, _lon, _zoom) {
        _lat = _lat != undefined ? _lat : -33.9;
        _lon = _lon != undefined ? _lon : 151.2;
        _zoom = _zoom != undefined ? _zoom : 9;
        var mapOptions = {
            center: new google.maps.LatLng(parseFloat(_lat), parseFloat(_lon)),
            zoom: parseInt(_zoom),
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        
        for (var i = 0; i < beaches.length; i++) {
        var beach = beaches[i];
        var name = beach[0];
        var facilities = 'abc';
        var point = new google.maps.LatLng(beach[1], beach[2]);
        
        createMarker(map, point, name, facilities);
        
        }
    }
    function createMarker(map, point, name, facilities) {
       
        var marker = new google.maps.Marker({
            position: point,
            map: map
        });
        var html = '<div style="text-align:left; width:260px; height:auto;"><p><name>'+name+"</name></p><p>"+facilities+'</p></div>';
        var infoWindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });
        return marker;
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    <!--# Map generator #-->
    </head>
    <body>
    
    <div id="map-canvas"></div>
    
    
    
    </body>
</html>