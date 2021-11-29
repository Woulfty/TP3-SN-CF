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

        public function loginUser() {//ajouter des users en BDD
            
        }

        public function discoUser() {//supprimer des users en BDD
            
        }
    }
?>