@extends('users.layouts.default')
<!doctype html>

<?php
/**
 * Created by PhpStorm.
 * User: Frank Lekule
 * Date: 5/6/2015
 * Time: 11:10 AM
 */

$dbname            ='cdcol'; //Name of the database
$dbuser            ='root'; //Username for the db
$dbpass            ='Xerxes641602'; //Password for the db
$dbserver        ='localhost'; //Name of the mysql server

$dbcnx = mysql_connect ("$dbserver", "$dbuser", "$dbpass");
mysql_select_db("$dbname") or die(mysql_error());
?>
<html lang="en">

<head>
<link href="{{'_css/main.css'}}" rel="stylesheet" media="screen, projection">
<meta name="viewport" content="initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>SimuTrack Homepage</title>




    	<!-- js -->
    	<script src= "https://code.jquery.com/jquery.js" ></script>
    	<script src= "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<style type="text/css">



		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
		    margin:0;
			font-family:'Lato', sans-serif;
			text-align:left;
			color: #999;
            background: #DADADA;
		}
        #map {

            width: 700px;
            height: 550px;
        }



		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 20px 0 0 0;
		}
	</style>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3&sensor=false" >

    </script>

     <script type="text/javascript">
     //Sample code written by August Li
     var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/red.png",
     new google.maps.Size(35, 35), new google.maps.Point(0, 0),
     new google.maps.Point(16, 32));
     var center = null;
     var map = null;
     var currentPopup;
     var bounds = new google.maps.LatLngBounds();
     function addMarker(latitude, longitude) {
     var pt = new google.maps.LatLng(latitude, longitude);
     bounds.extend(pt);
     var marker = new google.maps.Marker({
     position: pt,
     icon: icon,
     map: map
     });
     var popup = new google.maps.InfoWindow({
     content: "Your phone is here",
     maxWidth: 300
     });
     google.maps.event.addListener(marker, "click", function() {
     if (currentPopup != null) {
     currentPopup.close();
     currentPopup = null;
     }
     popup.open(map, marker);
     currentPopup = popup;
     });
     google.maps.event.addListener(popup, "closeclick", function() {
     map.panTo(center);
     currentPopup = null;
     });
     }
     map = new google.maps.Map(document.getElementById("map"), {
          center:new google.maps.LatLng(0, 0),
          zoom: 8,

          mapTypeControl: true,
          mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.DEFAULT,
                mapTypeIds: [
                  google.maps.MapTypeId.ROADMAP,
                  google.maps.MapTypeId.SATELLITE,
                  google.maps.MapTypeId.TERRAIN

                ]
              },

          navigationControl: true,
          navigationControlOptions: {
          style: google.maps.NavigationControlStyle.SMALL
          }
          });

     function initMap() {
     map = new google.maps.Map(document.getElementById("map"), {
     center:new google.maps.LatLng(0, 0),
     zoom: 8,

     mapTypeControl: true,
     mapTypeControlOptions: {
     style: google.maps.MapTypeControlStyle.DEFAULT,
           mapTypeIds: [
             google.maps.MapTypeId.ROADMAP,
             google.maps.MapTypeId.SATELLITE,
             google.maps.MapTypeId.TERRAIN

           ]
         },

     navigationControl: true,
     navigationControlOptions: {
     style: google.maps.NavigationControlStyle.SMALL
     }
     });
     <?php
     $query = mysql_query("SELECT * FROM locations");

    while( $row = mysql_fetch_array($query)){
     $user_id=$row['user_id'];
     $latitude=$row['latitude'];
     $longitude=$row['longitude'];


}
echo ("addMarker($latitude, $longitude,'<b>$user_id</b>');\n");
     ?>
     center = bounds.getCenter();

     map.fitBounds(bounds);

     }
     </script>


</head>

<body  >
@section('content')


<ul class="nav navbar-nav">
</ul>



<div>
<button onload="" onclick="initMap()">Find my device</button>

</div>
<section id="main">
            <div id="map" style="width: 100%; height: 700px;"></div>
        </section>


@stop


</body>

</html>
