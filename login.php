<?php
    include "fonction.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../IMG/logo_copie.ico" />
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/login.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <title>connexion</title>
</head>
    <body>
        <?php
            include "menu.php";
        ?>

        <div class="form">
            <div class="title">Bienvenue</div>

            <div class="input-container ic1">
                <input id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
                <label for="login" class="placeholder">Login</label>
            </div>

            <div class="input-container ic2">
                <input id="inputPassword_Connexion" class="input" type="password" placeholder=" " />
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
            </div>

            <button id="inputSend" type="text" class="submit">Se connecter</button>
        
        </div>

        <script type="text/javascript" src="JS/socket.js"></script>
    </body>
</html>