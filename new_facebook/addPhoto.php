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
            <input type="text" class="form-control" id="lieu_publi" required name="lieu_publi"/><br><br>

            <label for="date_publi">Date</label>
            <input type="date" class="form-control" id="date_publi" required name="date_publi"/><br><br>

            <label for="nom_prenom_utilisateur">Nom</label>
            <input type="text" class="form-control" id="nom_prenom_utilisateur" required name="nom_prenom_utilisateur"/><br><br>

            <label>Photo: </label>
            <input type="file" class="form-control-file" id="photo" required name="photo"><br><br>

            <input type="submit" placeholder="Publier">


            <?php
                if(count($errors) != 0){ //affiche ici, la liste des erreurs, 
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