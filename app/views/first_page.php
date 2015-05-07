<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <!DOCTYPE html>

        <style>
            #map-canvas {
                width: 500px;
                height: 400px;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(44.5403, -78.5463),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>
<body>
<div id="map-canvas"></div>
<?php $link_name = "Second page";?>
<a href="second_page.php"><?php echo $link_name?></a>
</body>
</html>