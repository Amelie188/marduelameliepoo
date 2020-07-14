<?php
require_once 'connexion.php';
require_once 'fonctions.php';

$id = $_GET['id'];
deletePlanet($pdo, $id);
header('Location: planets.php');
?>
