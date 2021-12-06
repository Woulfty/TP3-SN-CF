<?php
//$trame = new Trame($_PDO);

// - check if var exist, if not, set value as NULL
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : NULL;
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : NULL;

try {
    $host = "192.168.65.201";
    $dbname = "SNCF";
    $login = "admin";
    $mdp = "admin";

    $bdd = new PDO('mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8', $login, $mdp);
} catch (Exception $e)
{
print_r('Erreur : ' . $e->getMessage());
}

include "fonction.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="IMG/logo_copie.ico" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/menu.css">
    
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <title>SN-CF</title>
</head>
<body>

    <?php
        include "menu.php";
    ?>
    
    <div id='map' class='esp' style='width: 1900px; height: 900px; margin-top: 60px;'>

    <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoicmxpZW5hcmQiLCJhIjoiY2t3YWoxeWFpMTJoMDJucW11bXcwZXowbiJ9.zWBqg_Hbr6zEQTiI-nViaQ';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [2.9273937, 47.4115613], // - Default position
                zoom: 6 // - Default zoom
            });
            
            let markers = [];
            var i = 0; 
            let markerstab = [];

            <?php
                $tramesQuery = $bdd->query("SELECT * FROM trames");
                while ($markers = $tramesQuery->fetch()) {
            ?>

                // - set php coord into js var
                var longitude = <?php echo $markers['longitude']?>;
                var latitude = <?php echo $markers['lattitude']?>;


                markerstab.push('[' +longitude+ ',' +latitude+ ']');

                // - Create a Marker and add it to the map
                markers[i] = new mapboxgl.Marker()
                    .setLngLat([longitude, latitude])
                    .addTo(map);

                i++;

            <?php
                }
            ?>
    </script>

    <!-- Trace line script -->
    <script>

            // - On load map, trace line between markers added before
            map.on('load', function () {
            map.addSource('multiple-lines-source', {
                'type': 'geojson',
                'data': {
                'type': 'FeatureCollection',
                'features': [
                    {
                    'type': 'Feature',
                    'properties': {},
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': [
                            [2.30824,49.8907],
                            [2.32499,49.8884],
                            [2.33868,49.88],
                            [2.34267,49.8742],
                            [2.34357,49.8687],
                            [2.35232,49.8638],
                            [2.36543,49.8619],
                            [2.37718,49.8595],
                            [2.39843,49.8459],
                            [2.40648,49.8325],
                            [2.40364,49.8237],
                            [2.39951,49.8172],
                            [2.39556,49.8075],
                            [2.39261,49.7995],
                            [2.38748,49.7874],
                            [2.37099,49.7665],
                            [2.36415,49.7545],
                            [2.35662,49.7416],
                            [2.35329,49.7252],
                            [2.35933,49.7082],
                            [2.35545,49.7015],
                            [2.34849,49.6964],
                            [2.34476,49.6921],
                            [2.3373,49.6807],
                            [2.33725,49.6741],
                            [2.3414,49.6704],
                            [2.35117,49.6666],
                            [2.35608,49.6627],
                            [2.3628,49.6556],
                            [2.36924,49.652],
                            [2.37688,49.6475],
                            [2.38012,49.6334],
                            [2.38433,49.6263],
                            [2.38888,49.6196],
                            [2.38862,49.6131],
                            [2.39117,49.6072],
                            [2.40194,49.6002],
                            [2.4073,49.5904],
                            [2.4165,49.5846],
                            [2.43691,49.5723],
                            [2.43952,49.5656],
                            [2.43087,49.5393],
                            [2.43591,49.514],
                            [2.42913,49.5035]
                        ]
                    }
                    }
                ]
                },
            });

            map.addLayer({
                'id': 'multiple-lines-layer',
                'type': 'line',
                'source': 'multiple-lines-source',
                'layout': {},
                'paint': {
                    
                    'line-width': 8,
                    'line-color': '#0C6DDA',
                },
            });
            });


            // - Add zoom and rotation controls to the map
            map.addControl(new mapboxgl.NavigationControl());

        </script>

    </div>
</body>
</html>