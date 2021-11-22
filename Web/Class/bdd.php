<?php

    $bdd_ip = "192.168.65.201";
    $bdd_user = "root";
    $bdd_mdp = "root";
    $bdd_name = "SNCF";

    try
    {
        $bdd_con = new PDO('mysql:host=' .$bdd_ip. '; dbname=' .$bdd_name. ', ' $bdd_user ', ' $bdd_mdp);
        $bdd_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
?>