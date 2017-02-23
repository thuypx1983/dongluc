<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 100% }
</style>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQiqmXVY4Rob-132JPV7ogova1fMq3FEo">
</script>
<script type="text/javascript">

function initialize() {
  var myLatlng = new google.maps.LatLng({$preview.lat},{$preview.lon});
  var mapOptions = {
    zoom: 16,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>
<body>
<div id="map-canvas"/>

</body>
</html>