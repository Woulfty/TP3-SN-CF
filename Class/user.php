<?php

    class users
    {
        private $_id;
        private $_MDP;
        private $_name;
        private $_bdd;
    
        public function __construct($bdd, $id) {
            $query = $bdd->query("SELECT * FROM trames WHERE id = $id")->fetch();
    
            $this->_id = $query["id"];
            $this->_name = $name;
            $this->_BDD = $bdd;
        }
    
        public function addUser($_id, $_MDP, $_name) {//ajouter un nouvel utilisateur
            
            if(isset($_POST["addUser"])){
                $exist = $this->$bdd->query("SELECT COUNT(*) FROM User WHERE name ='".$_POST['name']."'");
                $exist = $exist->fetch();

            if ($exist["COUNT(*)"] > 0) {

                echo '<h3 class="desct">Cet utilisateur existe déjà...</h3>';
                return;
            
            }else{

                if($_POST['MDP'] == $_POST['password']) {
                    $insert = $this->$bdd->query("INSERT INTO User(name, MDP) VALUES('".$_POST['name']."','".$_POST['MDP']."')");
    
                }else{
                    echo '<h3 class="desct">Les mots de passe ne corespondes pas...</h3>';
                }
            }
            
        }

        public function connectuser() {//connecte les utilisateurs
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
        }

        public function loginUser() {//ajouter des users en BDD
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

                    <input type="submit" class="submit" name="login_submit" value="Se connecter"
                <?php
                    if(isset($_POST['nom']))
                    {
                        $insert = $MaBase->query("INSERT INTO user(name, MDP) VALUES('".$_POST['nom']."','".$_POST['MDP']."')");
                        $CountExistUser = $insert->fetch();
                        
                        if($CountExistUser['COUNT(*)'] > 0)
                        {
                           echo "utilisateur ajouté";
                        }else{
                            echo "une erreur est survenue"; 
                        }
                    }
                ?>
                </form>
            <?php
        }

        public function discoUser() {//supprimer des users en BDD
            ?>
                <form class="form" action="" method="post">
                    <input name="id" id="inputLogin_Connexion" class="input" type="text" placeholder=" " />
                    <input type="submit" class="submit" name="login_submit" value="Supprimé"
                </form>
            <?php
            $MaBase->query("DELETE FROM User WHERE id = '".$_POST['id']."'");
        }
    }
?>