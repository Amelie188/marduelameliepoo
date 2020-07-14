<?php
require('fonctions.php');
require('connexion.php');

$errors= [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $formulaireValide = validateForm();   
    $errors = $formulaireValide['errors'];

   if( count($errors) === 0) {  //si mon nombre d'erreurs est égale à 0
   addBdd($pdo,$formulaireValide['image']);  //alors je fais du traitement, en rajoutant à la BDD
   header('Location: planets.php'); //et je redirige l'utilisateur à ma liste de planète
   }
  }
?>

<html>

<head>
</head>

<body>

    <div style="text-align: center">

    <h1 style="text-align:center">Ajouter votre planète</h1><br>

        <form method="post" action="addPlanet.php" enctype="multipart/form-data">

            <label>Nom de la planète: </label>
            <input name="name" class="form-control" placeholder="Nom de la planète"><br><br>

            <label>Status de la planète: </label>
            <input name="status" class="form-control" placeholder="Status"><br><br>

            <label>Terrain: </label>
            <input name="terrain" class="form-control" placeholder="Terrain"><br><br>

            <label>Allegiance: </label>
            <select name="allegiance" class="form-control" placeholder="Allegiance">
                <?php
        foreach (getAllegiances() as $allegiance) {    //le foreach appelle la fonction getAllegiances
        echo('<option value="'.$allegiance.'">'.$allegiance.'</option>');
        }
        ?>
            </select><br><br>

            <label>Key facts: </label>
            <textarea name="key_fact" class="form-control" placeholder="Key facts"></textarea><br><br>

            <label>Image: </label>
            <input type="file" name="image"><br><br>

            <input type="submit">

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