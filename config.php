<?php
namespace app;
    // constantes d'environnement pour la connexion a BDD
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "sdbm_v2");

    define("DBCONNECTION", "mysql:dbname=".DBNAME.";host=".DBHOST.";charset=utf8");
?>