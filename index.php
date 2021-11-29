<?php
//$trame = new Trame($_PDO);

// On vérifie si la variable existe et sinon elle vaut NULL
$latitude = isset($_POST['latitude']) ? $_POST['latitude'] : NULL;
$longitude = isset($_POST['longitude']) ? $_POST['longitude'] : NULL;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="IMG/logo_copie.ico" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/menu.css">
    
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <title>SN-CF</title>
</head>
<body>

    <?php
        include "Web/menu.php";
    ?>
    
    <div id='map' class='esp' style='width: 1900px; height: 900px; margin-top: 60px;'>

        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoicmxpZW5hcmQiLCJhIjoiY2t3YWoxeWFpMTJoMDJucW11bXcwZXowbiJ9.zWBqg_Hbr6zEQTiI-nViaQ';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [2, 47], // starting position
                zoom: 5.5 // starting zoom
            });

            // Add zoom and rotation controls to the map.
            map.addControl(new mapboxgl.NavigationControl());

        </script>
        
    </div>
</body>
</html>