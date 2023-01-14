<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <link rel="stylesheet" href="../style/index.css" />
  <link rel="stylesheet" href="../style/navbar.css">
  <script src="../data/JKT-Admin.js"></script>
</head>

<body>
  <?php
  include('./navbar.php')
  ?>

  <div class="main">
    <div id="map"></div>
  </div>

  <script>
    var map = L.map("map").setView([-6.2856, 106.8007], 13);

    var geojson

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    // var popup = L.popup();

    // function onMapClick(e) {
    //   console.log(e);
    //   popup
    //     .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(map);
    // }

    // map.on("click", onMapClick);

    var geojson = L.geoJSON(JSONJKT, {}).addTo(map);
  </script>
</body>

</html>