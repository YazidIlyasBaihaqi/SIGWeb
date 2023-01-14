<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="../style/index.css" />
    <link rel="stylesheet" href="../style/navbar.css">
    <script src="../data/JKT-Admin.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include('../database/controller.php');
    include('./index.php')
    ?>
    <script>
        var covid = <?= $json ?>;
        var popup = L.popup();

        function onMapClick(e) {
            console.log(e);
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        geojson = L.geoJson(JSONJKT, {
            onEachFeature: function(feature, layer) {
                layer.on('click', function(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent("Data Covid " + e.target.feature.properties.NAMOBJ + "</br>sembuh " + covid[e.target.feature.properties.OBJECTID].sembuh +
                            "</br>dirawat " + covid[e.target.feature.properties.OBJECTID].dirawat +
                            "</br>meninggal " + covid[e.target.feature.properties.OBJECTID].meninggal +
                            "</br>total " + covid[e.target.feature.properties.OBJECTID].total)
                        .openOn(map);
                });
            }
        }).addTo(map);

        function mapInfo() {

        }
    </script>
</body>

</html>