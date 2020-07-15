<?php

session_start();
require('includes.php');

var_dump($_SESSION);

if ($_SESSION['user']) { 
    header('Location: homepage.php'); 
} else {
    header('Location: login.php'); 
} 
