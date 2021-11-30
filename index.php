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

<style> 
#map { position: absolute; top: 0; bottom: 0; width: 100%; }     
.marker 
{
  background-image: url('IMG/marker.png');
  background-size: cover;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
}
</style>

    <?php
        include "menu.php";
    ?>
    
    <div id='map' class='esp' style='width: 1900px; height: 900px; margin-top: 60px;'>

    <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoicmxpZW5hcmQiLCJhIjoiY2t3YWoxeWFpMTJoMDJucW11bXcwZXowbiJ9.zWBqg_Hbr6zEQTiI-nViaQ';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [2.5044202727948375, 49.87232835046542], // - Default position
                zoom: 11 // - Default zoom
            });
            
            let markers = [];
            var i = 0; 

            <?php
                $tramesQuery = $bdd->query("SELECT * FROM trames");
                while ($markers = $tramesQuery->fetch()) {
            ?>

                console.log("coucou");

                // - Create a Marker and add it to the map
                markers[i] = new mapboxgl.Marker()
                    .setLngLat([<?php echo $markers['longitude']?>, <?php echo $markers['lattitude']?>])
                    .addTo(map);

                i++;

            <?php
                }
            ?>

            // - Add zoom and rotation controls to the map
            map.addControl(new mapboxgl.NavigationControl());

        </script>

    </div>
</body>
</html>