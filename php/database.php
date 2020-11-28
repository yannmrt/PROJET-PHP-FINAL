<?php 

require_once('config.php');

try {
    $sql = new pdo("mysql:" . $_DB['host'] . ";dbname=" . $_DB['name'] ";charset=utf8;", $_DB['user'], $_DB['password']);

} catch(Exception $e) {
    echo "Erreur lors de la connexion à la base de donnée";
}