<?php

    class users
    {
        private $_MDP;
        private $_id;
        private $_name;
    
        public function __construct($bdd, $id) {
            $query = $bdd->query("SELECT * FROM trames WHERE id = $id")->fetch();
    
            $this->_id = $query["id"];
            $this->_name = $name;
            $this->_BDD = $bdd;
        }
    
        public function addUser(){//ajouter un nouvelle utilisateur

        }

        public function loginUser(){//ajouter des users en BDD
        
        }

        public function discoUser(){//supprimer des users en BDD
        
        }
    }
?>