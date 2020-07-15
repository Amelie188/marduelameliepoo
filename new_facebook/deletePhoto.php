<?php
require_once 'includes.php';


$id = $_GET['id'];
deletePhoto($pdo, $id);
header('Location: homepage.php');
?>
