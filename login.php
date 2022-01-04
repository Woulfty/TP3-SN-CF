<?php
    require "PDO.php";
    session_start();
    if(check()){
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

            <p class="LoginError"><?php echo $LoginError?></p>

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

            <input type="submit" class="submit" name="submit" value="Se connecter">
        
            <?php   
                
                if(isset($_POST['submit']))
                {
                    $login = $BDD->query("SELECT * FROM `user` WHERE `name` = '".$_POST['nom']."' AND `MDP` = '".$_POST['MDP']."'");
                    //si l'utilisateur existe on le connecte
                    if($login->rowCount()>0){
                        $tab = $login->fetch();

                        $_SESSION["Logged"] = true;
                        $_SESSION["idUser"] = $tab['id'];
                        //réponse a la connection
                        header("location: admin.php ");

                    }else{
                        ?>
                            <h4 class="colorwhite">Le mot de passe ou l'identifiant n'est pas le bon</h4>
                        <?php
                    }
                }
            ?>  
        </form>
    <?php
        }else{
            header("location: admin.php");
        }
    ?>


        <script type="text/javascript" src="JS/socket.js"></script>
    </body>
</html>