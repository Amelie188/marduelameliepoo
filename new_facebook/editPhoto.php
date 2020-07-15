<?php

require('includes.php');


$idPhoto = $_GET['id'];
$photo = getOnePhoto($pdo,$idPhoto);

$errors = [];
$filename = null;


if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
 $formulaireModifValide = validateEditForm();
 $errors = $formulaireModifValide['errors'];
 $filename = $formulaireModifValide['photo'];

 if( count($errors) === 0) {
 editBdd($pdo, $filename, $photo['id']);
 header('Location: homepage.php');
 }
}

?>

<html>

<head>
</head>

<body>

<div style="text-align: center">

    <h1 style="text-align:center">Edite ta photo</h1><br>

    <form method="post" action="editPhoto.php?id=<?php echo($photo['id']);?>" enctype="multipart/form-data">

        <label for="lieu_publi">Lieu</label>
        <input name="lieu_publi" value="<?php echo($photo['lieu_publi']) ?>" class="form-control"><br><br>

        <label for="date_publi">Date</label>
        <input name="date_publi"  value="<?php echo($photo['date_publication']) ?>" class="form-control"><br><br>

        <label for="nom_prenom_utilisateur">Nom</label>
        <input name="nom_prenom_utilisateur" value="<?php echo($photo['nom_prenom_utilisateur']) ?>" class="form-control"><br><br>

        <label>Photo: </label>
        <img src="<?php echo('uploads/'.$photo['file_name']);?>"><br><br>
        <input type="file" name="file_name" value="<?php echo($photo['file_name']) ?>"><br><br>

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

</div>
</body>

</html>