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
</head>


<body>

<div style="text-align: center">
    <h1>Connexion</h1><br>

    <form method="post" action="login.php" enctype="multipart/form-data">

        <label>Pseudo</label><br>
        <input name="pseudo" type="text" > <br><br>
        <label>Password</label><br>
        <input name="password" type="password" > <br><br>

        <input type="submit"><br><br>

    </form>

    <?php

        if(count($errors) != 0){
            echo('<h2>Erreurs de login</h2>');
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
