


<?php
session_start(); //démarre ma session
if($_SESSION['variableCession']){ //vérifie que la variable de session existe
 header('Location: connect.php'); // la variable existe, donc il sera redirigé vers la page des utilisateurs connectés
} else {
 header('Location: login.php');//si non, il renverra vers le formulaire de login
}
?>

<!-- header('Location': page ou l'on veut rediriger) -> permet de faire une redirection en PHP -->