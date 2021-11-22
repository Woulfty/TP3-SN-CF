<?php

    class trames
    {
        private $_longitude;
        private $_latitude;
        private $_id;
        private $_name;
    
        public function __construct($bdd, $id) {
            $query = $bdd->query("SELECT * FROM trames WHERE id = $id")->fetch();
    
            $this->_id = $query["id"];
            $this->_longitude = $longitude;
            $this->_lattitude = $lattitude;
            $this->_BDD = $bdd;
        }
    
        public function addTrames(){//ajouté des Trames en BDD
        
        }

        public function delTrames(){//supprimé des Tames en BDD
        
        }

        public function editTrames(){//modifié les Trames en BDD
        
        }

        public function showTrames(){//afficher les Trames présentes en BD
        
        }
    }
?>