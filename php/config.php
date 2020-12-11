<?php 

require_once("function.php");

// Configuration du site web 
$_INFO = array(

    "nom" => "ECOM"
);

// Configuration de la base de donnée
$_DB = array(

    "host" => "localhost",
    "name" => "kbwyoyxi_projetphp",
    "user" => "kbwyoyxi_projetphp",
    "pass" => "09#6Mgum"
);

// Fonction déconnexion
if(isset($_GET["logout"])) { 
    logoutUser();
}