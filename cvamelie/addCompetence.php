<?php
require('includes.php');


$errors= [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $formulaireValide = validateFormCompetence();   
    $errors = $formulaireValide['errors'];

   if( count($errors) === 0) {  
    addBddCompetence($pdo,$formulaireValide['competence']); 
   header('Location: homepage.php'); 
   }
  }
?>

<html>

<head>
</head>

<body>

    <div style="text-align: center">

        <h1 style="text-align:center">Ajouter votre compétence</h1><br>

        <form method="post" action="addCompetence.php" enctype="multipart/form-data">

            <label>Titre de votre compétence: </label>
            <input name="titre" required class="form-control"><br><br>

            <label>Votre note: </label>
            <input name="note" required class="form-control"><br><br>

            </br></br>
            <input type="submit">

        </form>

      
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