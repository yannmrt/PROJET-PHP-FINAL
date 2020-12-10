<?php 

require_once("function.php");

// Configuration du site web 
$_INFO = array(

    "name" => "Essai"
);

// Configuration de la base de donnée
$_DB = array(

    "host" => "localhost",
    "name" => "phpfinal",
    "user" => "pi",
    "pass" => "raspberry"
);

// Fonction déconnexion
if(isset($_GET["logout"])) { 
    logoutUser();
}