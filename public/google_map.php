<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "Xerxes641602");
define("DB_DATABASE", "cdcol");




$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); //until now I just connect to my DB


/*$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];*/

$result = @mysql_query('SELECT * FROM locations ');

$row        = @mysql_fetch_array($result);

$latitude   =   $row['latitude'];

/*$lat_array = explode('.',$latitude);

$lat_deg = $lat_array[0];

$lat_array_new = explode(' ',$lat_array[0]);
$lat_deg = $lat_array_new[0];*/
$longitude  =   $row['longitude'];

/*$long_1 = explode(" ",$longitude[0]);
$lat_min = $lat_array[0];
$lat_sec = $lat_array[0];
$long_deg = $long_1[0];
$long_min = $long_1[0];
$long_sec = $longitude[0];

$lat_new  = $lat_deg.'.'.$lat_min.$lat_sec;
$long_new = $long_deg.'.'.$long_min.$long_sec;



$nombre_format_lat = number_format($latitude, 6, '.', ' ');
$nombre_format_long = number_format($longitude, 6, '.', ' ');*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Kiwi</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
        function LoadGmaps() {
            var myLatlng = new google.maps.LatLng('-<?php echo $latitude[0]; ?>', '-<?php echo $longitude[0]; ?>');
            var myOptions = {
                zoom: 6,
                center: myLatlng,
                disableDefaultUI: true,
                panControl: true,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.DEFAULT
                },

                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
                streetViewControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var image = {
                url: 'img/kiwi.png',
                scaledSize: new google.maps.Size(30,30)
            }

            var map = new google.maps.Map(document.getElementById("MyGmaps"), myOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: '-<?php echo $row['latitude']; ?> -<?php echo $row['longitude']; ?>',
                icon: image,
                draggable: true
            });

            var myLatlng2 = new google.maps.LatLng('latitude','longitude');
            var marker = new google.maps.Marker({
                position: myLatlng2,
                map: map,
                title:"Pappo",
                icon: image
            });
        }
    </script>
</head>
<body onload="LoadGmaps()" onunload="GUnload()">
<!-- Maps DIV : you can move the code below to where you want the maps to be displayed -->
<div id="MyGmaps" style="width:100%;height:550px;border:1px solid #CECECE;"></div>
<!-- End of Maps DIV -->
</body>
</html>