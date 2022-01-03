<?php
    require "PDO.php";
    $LoginError = "";


    if(isset($_POST['nom']))
    {
        $CheckUsers = $bdd->query("SELECT COUNT(*) FROM user WHERE name = '".$_POST['name']."' AND MDP = '".$_POST['MDP']."'");
        $CountExistUser = $CheckUsers->fetch();
        
        if($CountExistUser['COUNT(*)'] > 0)
        {
            $_SESSION["Logged"] = true;
            $_SESSION["idUser"] = $tab['id'];
            $_SESSION["admin"] = $tab['admin'];
            //réponse a la connection
                header("Location : admin.php ");
        }
        else
        {
            $LoginError = "Le Pseudo ou le mot de passe est incorrect...";
        }
    }
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



        <form class="form" action="" method="post">
            <div class="title">Bienvenue</div>

            <p><?php echo $LoginError?></p>

            <div class="input-container ic1">
                <input name="nom" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
                <label for="login" class="placeholder">Login</label>
            </div>

            <div class="input-container ic2">
                <input name="MDP" id="inputPassword_Connexion" class="input" type="password" placeholder=" " />
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
            </div>

            <input type="submit" class="submit" name="login_submit" value="Se connecter">
        
        </form>


        <script type="text/javascript" src="JS/socket.js"></script>
    </body>
</html>