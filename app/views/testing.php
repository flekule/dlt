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
        function initialize()
        {
            var latloncenter = new google.maps.LatLng(51,-1.4469157);
            var myOptions =
            {
                zoom: 4,
                center: latloncenter,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        }

        <? while($row = mysql_fetch_assoc($result= mysql_connect($server, $username, $password))){?>

        var lon = "<?php echo($row['longitude']); ?>";
        var lat = "<?php echo($row['latitude']); ?>";


        //alert_test(lat,lon);
        setmarker(lat,lon);

        <? } ?>



        function setmarker(lat,lon)
        {

            var latlongMarker = new google.maps.LatLng(lat,lon);

            var marker = new google.maps.Marker
            (
                {
                    position: latlongMarker,
                    map: map,
                    title:"Hello World!"
                }
            );

        }
        function alert_test(lat,lon)
        {
            alert(lat +" "+ lon);
        }
    </script>

</head>
<body onload="initialize();">
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
