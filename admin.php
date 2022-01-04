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

    <!--deconnexion-->
    <form class="form" action="" method="post">
        <input type="submit" class="submit" name="submit" value="déconnexion">
        <?php
            if (isset($_POST["submit"])) {
                session_destroy();
                $_SESSION["Logged"] = false;
                header("location: index.php");

            }
        ?>
    </form>

    <div class="esp"></div>

    <!--ajouté un admin-->
    <form class="form" action="" method="post">
            <div class="title">Ajouté un admin</div>

            <div class="input-container ic1">
                <input name="nom" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
                <label for="login" class="placeholder">New Login</label>
            </div>

            <div class="input-container ic2">
                <input name="MDP" id="inputPassword_Connexion" class="input" type="password" placeholder=" " />
                <div class="cut"></div>
                <label for="password" class="placeholder">New Password</label>
            </div>

            <input type="submit" class="submit" name="submit" value="Ajouté">
        
            <?php   
                
                if (isset($_POST["submit"])) {

                    $exist = $BDD->query("SELECT COUNT(*) FROM user WHERE name ='".$_POST['nom']."'");
                    $exist = $exist->fetch(); //selection le nom d'utilisateur

                    if ($exist["COUNT(*)"] > 0) { // on verifier que l'utilisateur n'existe pas

                        echo '<h3 class="desct">Cet utilisateur existe déjà...</h3>';
                        return;
                    
                    }else{

                        if($_POST['MDP'] == $_POST['password']) { //si les mot de passe corespondent 
                            $insert = $MaBase->query("INSERT INTO user(name, MDP) VALUES('".$_POST['nom']."','".$_POST['MDP']."')");
                          //insertion dans la base des utilisateur du pseudo et du mot de passe
                            echo "<h3 class='desct'>L'utilisateur a été ajouté...</h3>";
                        }else{
                            //message d'erreur si les mots de passes ne correspondes pas
                            echo "<h3 class='desct'>L'utilisateur n'a pas été ajouté...</h3>";
                        }
                    }
                }
            ?>  
        </form>

    <script type="text/javascript" src="../JS/socket.js"></script>

    

    <!--ajouté -->
    <?php
    }
    ?>
</body>
</html>