<?php
require_once 'includes.php';


$id = $_GET['id'];
deleteCompetence($pdo, $id);
header('Location: homepage.php');
?>
