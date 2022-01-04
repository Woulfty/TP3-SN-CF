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

    <h3 class="colorwhite">~ Menu Admin ~</h3>

    <!--deconnexion-->
    <form class="form" action="" method="post" class="colorwhite">
        <input type="submit" class="submit"  name="deco" value="déconnexion">
        <?php
            if (isset($_POST["deco"])) {
                session_destroy();
                $_SESSION["Logged"] = false;
                header("location: index.php");
            }
        ?>
    </form>

    <div class="esp"></div>

    <!--ajouté un admin-->
    <form class="form" action="" method="post">
            <div class="title colorwhite">Ajouter un admin</div>

            <div class="input-container ic1 colorwhite">
                <label for="login" class="placeholder">New Login</label>
                <input name="nom" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
            </div>

            <div class="input-container ic2 colorwhite">
                <label for="password" class="placeholder">New Password</label>
                <input name="MDP" id="inputPassword_Connexion" class="input" type="password" placeholder=" " />
                <div class="cut"></div>
            </div>

            <input type="submit" class="submit" name="submit" value="Ajouter">
        
            <?php   
                
                if (isset($_POST["submit"])) {

                    $exist = $BDD->query("SELECT COUNT(*) FROM user WHERE name ='".$_POST['nom']."'");
                    $exist = $exist->fetch(); //selection le nom d'utilisateur

                    if ($exist["COUNT(*)"] > 0) { // on verifier que l'utilisateur n'existe pas

                        echo '<h3 class="desct">Cet utilisateur existe déjà...</h3>';
                        return;
                    
                    }else{
                        $BDD->query("INSERT INTO user(name, MDP) VALUES('".$_POST['nom']."','".$_POST['MDP']."')");
                        //insertion dans la base des utilisateur du pseudo et du mot de passe
                        echo "<h3 class='desct'>L'utilisateur a été ajouté...</h3>";
                    }
                }
            ?>  
    </form>
    
    <div class="esp"></div>

    <!--ajouté le train-->
    <form class="form" action="" method="post">

        <div class="title colorwhite">Ajouter le train</div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">Nom</label>
            <input name="nom" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Latitude</label>
            <input name="latitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Longitude</label>
            <input name="longitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <input type="submit" class="submit" name="addtrain" value="Ajouter">
    
        <?php   
            
            if (isset($_POST["addtrain"])) {

                $exist = $BDD->query("SELECT COUNT(*) FROM train WHERE nom ='".$_POST['nom']."'");
                $exist = $exist->fetch(); //selection le nom d'utilisateur

                if ($exist["COUNT(*)"] > 0) { // on verifier que l'utilisateur n'existe pas

                    echo '<h3 class="desct colorwhite">Cet utilisateur existe déjà...</h3>';
                    return;
                
                }else{
                    $BDD->query("INSERT INTO train(nom,latitude,longitude ) VALUES('".$_POST['nom']."','".$_POST['latitude']."','".$_POST['longitude']."')");
                    //insertion dans la base des utilisateur du pseudo et du mot de passe
                    echo "<h3 class='desct colorwhite'>Le train a été ajouté...</h3>";
                }
            }
        ?>  
    </form>
        
    <div class="esp"></div>

     <!--Modifier le train-->
     <form class="form" action="" method="post">

        <div class="title colorwhite">Modifier le train</div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">ID</label>
            <input name="id" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Latitude</label>
            <input name="latitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Longitude</label>
            <input name="longitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <input type="submit" class="submit" name="editTrain" value="Ajouter">

        <?php   
            
            if (isset($_POST["editTrain"])) {
                $BDD->query("UPDATE `train` SET `latitude`='".$_POST['latitude']."',`longitude`='".$_POST['longitude']."' WHERE `id`='".$_POST['id']."'");
                //insertion dans la base des utilisateur du pseudo et du mot de passe
                echo "<h3 class='desct colorwhite'>Le train a été modifié...</h3>";
            }
        ?>  
    </form>

    <div class="esp"></div>

    <!--ajouté une trame-->
    <form class="form" action="" method="post">

        <div class="title colorwhite">Ajouter une trame</div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">ID du train</label>
            <input name="idTrain" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Latitude</label>
            <input name="latitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Longitude</label>
            <input name="longitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <input type="submit" class="submit" name="addTrame" value="Ajouter">
    
        <?php   
            
            if (isset($_POST["addTrame"])) {
                $BDD->query("INSERT INTO trames(idTrain,latitude,longitude ) VALUES('".$_POST['idTrain']."','".$_POST['latitude']."','".$_POST['longitude']."')");
                //insertion dans la base des utilisateur du pseudo et du mot de passe
                echo "<h3 class='desct colorwhite'>La trame a été ajouté...</h3>";
            }
        ?>  
    </form>

    <div class="esp"></div>

    <!--Modifier la trame-->
    <form class="form" action="" method="post">

        <div class="title colorwhite">Modifier la trame</div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">ID de la trame</label>
            <input name="idTrames" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">ID du train</label>
            <input name="idTrain" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Latitude</label>
            <input name="latitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <div class="input-container ic2">
            <label for="password" class="placeholder colorwhite">Longitude</label>
            <input name="longitude" id="inputPassword_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <input type="submit" class="submit" name="editTrames" value="Modifier">

        <?php   
            
            if (isset($_POST["editTrames"])) {
                $BDD->query("UPDATE `trames` SET `idTrain`='".$_POST['idTrain']."',`latitude`='".$_POST['latitude']."',`longitude`='".$_POST['longitude']."' WHERE `id`='".$_POST['idTrames']."'");
                //insertion dans la base des utilisateur du pseudo et du mot de passe
                echo "<h3 class='desct colorwhite'>La trame a été modifié...</h3>";
            }
        ?>  
    </form>

    <div class="esp"></div>

    <!--Supprimer la trame-->
    <form class="form" action="" method="post">

        <div class="title colorwhite">Supprimer la trame</div>

        <div class="input-container ic1">
            <label for="login" class="placeholder colorwhite">ID de la trame</label>
            <input name="idTrames" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
            <div class="cut"></div>
        </div>

        <input type="submit" class="submit" name="deleteTrames" value="Supprimer">

        <?php   
            
            if (isset($_POST["deleteTrames"])) {
                $BDD->query("DELETE FROM `trames` WHERE `id`='".$_POST['idTrames']."'");
                //insertion dans la base des utilisateur du pseudo et du mot de passe
                echo "<h3 class='desct colorwhite'>La trame a été supprimée...</h3>";
            }
        ?>  
    </form>

    <div class="esp"></div>

    <script type="text/javascript" src="../JS/socket.js"></script>
   
    <?php
    }
    ?>
</body>
</html>