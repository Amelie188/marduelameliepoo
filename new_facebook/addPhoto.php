<?php
require('includes.php');


$errors= [];


if ( $_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $formulaireValide = validateForm();   
    $errors = $formulaireValide['errors'];

   if( count($errors) === 0) {  
   addPhotoBdd($pdo, $formulaireValide['photo']);  
   header('Location: homepage.php'); 
   }
  }
?>


<html>

<head>
</head>

<body>

<div class="col-md-6">
    <div class="card text-light border-light p-5">

    <h1 style="text-align:center">Ajouter votre photo</h1><br>

        <form method="post" action="addPhoto.php" enctype="multipart/form-data">

            <label for="lieu_publi">Lieu</label>
            <input type="text" class="form-control" id="lieu_publi" name="lieu_publi"/><br><br>

            <label>Image: </label>
            <input type="file" class="form-control-file" id="image" name="image"><br><br>

            <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="isPublic" name="isPublic">
                <label class="form-check-label" for="isPublic">Est publique</label>
            </div> -->

            <input type="submit" placeholder="Publier">

        </form>

    </div>
</body>

</html>