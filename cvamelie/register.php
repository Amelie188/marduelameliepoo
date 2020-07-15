<?php

require('includes.php');


$errors = [];
?>



<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body id="register">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    var_dump($_POST);
    
    $errors = validateFormUser($pdo)['errors']; 

    if( count($errors) === 0) {  
        addRegister($pdo);  
        header('Location: homepage.php'); 
        }
}
?>

    <!-- *****************************    FORMULAIRE        ************************************************  -->

    <div  style="text-align: center">


        <h1> Bonjour, tu peux t'enregistrer ici</h1>

        <form method="post" action="register.php" enctype="multipart/form-data">

            <label>Nom </label><br>
            <input name="nom" type="text"> <br><br>

            <label>Prénom</label><br>
            <input name="prenom" type="text"> <br><br>

            <label>Mon email</label><br>
            <input name="email" type="mail"> <br><br>

            <label>Mot de passe</label><br>
            <input name="mot_de_passe" type="password"> <br><br>

            <input type="submit">

        </form>




    <?php

        if(count($errors) != 0){
            echo('<h2>Aïe Aïe Aïe, attention aux erreurs :</h2>');
            echo('<ul>');
            foreach ($errors as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');

        }
    ?>


      
        <br><br>

        <a href="login.php">Oups, mais si j'ai un compte!</a>


    </div>


</body>


</html>