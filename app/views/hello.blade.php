
<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>



		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:left;
			color: #999;
            background: #DADADA;
		}
        #map-canvas {

            width: 700px;
            height: 550px;
        }



		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false">

    </script>

    <script type="text/javascript">


         //<![CDATA[

               var map;
               // Ban Jelačić Square - Center of Zagreb, Croatia
               var center = new google.maps.LatLng(45.812897, 15.97706);
               var geocoder = new google.maps.Geocoder();
               var infowindow = new google.maps.InfoWindow();


               function init() {

                   var mapOptions = {
                       zoom: 13,
                       center: center,
                       mapTypeId: google.maps.MapTypeId.ROADMAP
                   };

                   map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);


                    makeRequest('get_locations.php', function(data) {

                      var data = JSON.parse(data.responseText);

                      for (var i = 0; i < data.length; i++) {
                      displayLocation(data[i]);
          }
      });
                   var marker = new google.maps.Marker({
                       map: map,
                       position: center
                   });
               }
               function makeRequest(url, callback) {
                   var request;
                   if (window.XMLHttpRequest) {
                       request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
                   } else {
                       request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
                   }
                   request.onreadystatechange = function() {
                       if (request.readyState == 4 && request.status == 200) {
                           callback(request);
                       }
                   };
                   request.open("GET", url, true);
                   request.send();
               }

               function displayLocation(location) {


                   var content =   '<div class="infoWindow"><strong>'  + location.latitude + '</strong>'
                                   + '<br/>'     + location.longitude
                                   + '<br/>';

                       var position = new google.maps.LatLng(parseFloat(location.latitude), parseFloat(location.longitude));
                       var marker = new google.maps.Marker({
                           map: map,
                           position: position

                       });

                       google.maps.event.addListener(marker, 'click', function() {
                           infowindow.setContent(content);
                           infowindow.open(map,marker);
                       });

               }
               //]]>


    </script>

</head>
<body onload="init();">
<h1>SimuTrack</h1>
<div>


</div>
<section id="main">
            <div id="map_canvas" style="width: 70%; height: 500px;"></div>
        </section>

<div
        align="left: 50dp, top: 70dp;" >




    {{ link_to_action('UsersController@logout', 'Logout') }}

</div>
<?php $link_name = "My files";?>
<a href="first_page.php"><?php echo $link_name?></a>


</body>
</html>
