<?php
session_start();
require('includes.php');

var_dump($_SESSION);

if ($_SESSION['utilisateur']) { //vérifie que la variable de session existe
    header('Location: homepage.php'); // la variable existe, donc il sera redirigé vers la page des utilisateurs connectés
} else {
    header('Location: login.php'); //si non, il renverra vers le formulaire de login
} 

?>

