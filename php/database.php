<?php 

// On importe la configuration du site
require_once('config.php');

try {
    $sql = new pdo("mysql:host=" . $_DB['host'] . ";dbname=" . $_DB['name'] . ";charset=utf8;", $_DB['user'], $_DB['pass']);

} catch(Exception $e) {
    echo "Erreur lors de la connexion à la base de donnée";
}