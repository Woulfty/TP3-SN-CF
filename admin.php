<?php
    require "PDO.php";
    session_start();
    if(check()){
        header("location: login.php");
    }else{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../IMG/logo_copie.ico" />
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="admin.css">
    <title>admin</title>
</head>
<body>
    <?php
        include "menu.php";
    ?>
    <div class="esp"></div>

    <h3>~ menu admin ~</h3>


    <script type="text/javascript" src="../JS/socket.js"></script>
    <?php
    }
    ?>
</body>
</html>