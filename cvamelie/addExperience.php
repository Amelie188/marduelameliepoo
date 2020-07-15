<?php
require('includes.php');


$errors= [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $formulaireValide = validateForm();   
    $errors = $formulaireValide['errors'];

   if( count($errors) === 0) {  
    addBddExperience($pdo,$formulaireValide['experience']); 
   header('Location: homepage.php'); 
   }
  }
?>

<html>

<head>
</head>

<body>

    <div style="text-align: center" >

    <h1 style="text-align:center">Ajouter votre experience</h1><br>

        <form method="post" action="addExperience.php" enctype="multipart/form-data" >

            <label>Titre: </label>
            <input name="titre" required class="form-control" ><br><br>

            <label>Description: </label>
            <input name="description" required class="form-control"><br><br>

            <label>Date de début: </label>
            <input name="date_debut" required class="form-control" type='date' placeholder="Date de début"><br><br>

            <label>Date de fin: </label>
            <input name="date_fin" required class="form-control" type='date' placeholder="Date de fin"></input><br><br>

            <input type="submit">

            <?php

            if(count($errors) != 0){ 
             echo(' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
            foreach ($errors as $error){
            echo('<div class="error">'.$error.'</div>');
             }
            }
    ?>


        </form>

    </div>
</body>

</html>