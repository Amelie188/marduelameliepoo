<?php
session_start();
require('includes.php');


$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
     var_dump($_POST);

     $errors = validateFormLogin($pdo)['errors']; 
     
     if(count($errors) === 0) {
        $errors= connectUser($pdo);
        if (count($errors) === 0) {
            header('Location: homepage.php');
        }
     }
}
?>


<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>


<body id="bodylogin">

<div id="login" style="text-align: center" style="width:2rem">
    <h1>Se connecter</h1><br>

    <form method="post" action="login.php" enctype="multipart/form-data">

        <label>Email</label><br>
        <input name="email" type="text" > <br><br>
        <label>Password</label><br>
        <input name="mot_de_passe" type="password" > <br><br>

        <input type="submit"><br><br>

    </form>

    <?php

        if(count($errors) != 0){
            echo('<h5>Hé! Attention! Erreurs d\'email et/ou Mot de passe</h5>');
            echo('<ul>');
            foreach ($errors as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');

        }
    ?>

    
    <a href="register.php">Pas encore de compte ?</a>

    </div>
</body>

</html>
