<?php

require('includes.php');


$errors = [];
?>



<html>

<head>

</head>

<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    var_dump($_POST); //j'affiche toutes mes variables POST
    
    $errors = validateFormUser($pdo)['errors']; 

    if( count($errors) === 0) {  //si mon nombre d'erreurs est égale à 0
        addRegister($pdo);  //alors je fais du traitement, en rajoutant à la BDD
        header('Location: homepage.php'); //et je redirige l'utilisateur à ma liste de planète
        }
}
?>

    <!-- *****************************    FORMULAIRE        ************************************************  -->

    <div style="text-align: center">


        <h1> Bonjour, tu peux t'enregistrer ici</h1>

        <form method="post" action="register.php" enctype="multipart/form-data">

            <label>Pseudo</label><br>
            <input name="pseudo" type="text"> <br><br>

            <label>Nom </label><br>
            <input name="nom" type="text"> <br><br>

            <label>Prénom</label><br>
            <input name="prenom" type="text"> <br><br>

            <label>Mon email</label><br>
            <input name="email" type="text"> <br><br>

            <label>Mot de passe</label><br>
            <input name="password" type="password"> <br><br>

            <!-- <div>
                <input type="checkbox" id="rappelleToi" name="rappelleToi">
                <label for="rappelleToi">Se souvenir de moi!</label><br><br>
            </div> -->

            <input type="submit">

        </form>




    <?php

        if(count($errors) != 0){
            echo('<h2>Erreurs</h2>');
            echo('<ul>');
            foreach ($errors as $error){
                echo('<li>'.$error.'</li>');
            }
            echo('</ul>');

        }
    ?>


      

        <a href="login.php">Oups, mais si j'ai un compte!</a>


    </div>


</body>


</html>