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
  <script src="../data/JKT-Cgr.js"></script>
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

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    var geojson

    var geojsonMarkerOptions = {
      radius: 8,
      fillColor: "#ff7800",
      color: "#000",
      weight: 1,
      opacity: 1,
      fillOpacity: 0.8
    };

    function pointerCircle(feature, latlng) {
      return L.circleMarker(latlng, geojsonMarkerOptions)
    }

    function getDesc(feature, layer) {
      if (feature.properties) {
        var popupContent = "";
        if (feature.properties.NAMOBJ) {
          popupContent += feature.properties.NAMOBJ
        }
        layer.bindPopup(popupContent);
      }
    }

    geojson = L.geoJSON(JSONCgr, {
      pointToLayer: pointerCircle,
      onEachFeature: getDesc
    }).addTo(map);
  </script>
</body>

</html>