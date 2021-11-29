<?php

    class train
    {
        private $_id;
        private $_nom;
        private $_longitude;
        private $_lattitude;

        public function __construct($bdd, $id) {
            $query = $bdd->query("SELECT * FROM train WHERE id = $id")->fetch();

            $this->_id = $query["id"];
            $this->_nom = $nom;
            $this->_longitude = $longitude;
            $this->_lattitude = $nom;
            $this->_BDD = $bdd;
        }

        public function showTrain(){//voir tout les train présents en BDD
            
        }

        public function editTrain(){//modifier un train en BDD

        }
    }
?>
