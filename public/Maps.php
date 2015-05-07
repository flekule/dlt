<?php



$apikey = "AIzaSyCHaB50TsxYU1rp4xFkoxbOi1da4MSSh_k";
//$id = $_GET['id'];

$lat = 0;
$long = 0;
$zoom = 8;
$dbname            ='cdcol'; //Name of the database
$dbuser            ='root'; //Username for the db
$dbpass            ='Xerxes641602'; //Password for the db
$dbserver          ='localhost'; //Name of the mysql server

$dbcnx = mysql_connect ("$dbserver", "$dbuser", "$dbpass");
mysql_select_db("$dbname") or die(mysql_error());
$findmap = "SELECT latitude, longitude FROM locations ";

if(!$result = $dbcnx->query($findmap)){
    die('There was an error running the query [' . $dbcnx->error . ']');
} else {
    $row = $result->fetch_assoc();
    $lat = $row['latitude'];
    $long = $row['longitude'];

}

?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport"
          content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html { height: 100% }
        body { height: 100%; margin: 0; padding: 0 }
        #map-canvas { height: 100% }
    </style>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=
          <?php echo $apikey; ?>&sensor=false">
    </script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(<?php echo $lat.', '.$long; ?>),
                zoom: <?php echo $zoom; ?>
            };
            <?php
  $getpoints = "SELECT pointLat, pointLong, pointText
      FROM mappoints WHERE mapID = $id";

  if(!$result = $con->query($getpoints)){
    die('There was an error running the query
        [' . $con->error . ']');
  } else {
    while ($row = $result->fetch_assoc()) {
      echo '  var myLatlng1 = new google.maps.LatLng('.
          $row[pointLat].', '.$row[pointLong].');
  var marker1 = new google.maps.Marker({
    position: myLatlng1,
    map: map,
    title:"'.$row[pointText].'"
  });';
    }
  }
?>
            var map = new google.maps.Map(document.getElementById("map-canvas"),
                mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="map-canvas"/>
</body>
</html>