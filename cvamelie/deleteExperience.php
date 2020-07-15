<?php
require_once 'includes.php';


$id = $_GET['id'];
deleteExperience($pdo, $id);
header('Location: homepage.php');
?>
