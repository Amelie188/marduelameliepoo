<?php

require('includes.php');


$idExperience = $_GET['id'];
$experience = getOneExperience($pdo, $idExperience);

$errors = [];


if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
 $formulaireModifValide = validateEditForm();
 $errors = $formulaireModifValide['errors'];

 if( count($errors) === 0) {
 editBddExperience($pdo, $experience['id']);    
 header('Location: homepage.php');
 }
}

?>

<html>

<head>
</head>

<body>

<div style="text-align: center">

    <h1 style="text-align:center">Modifie ton experience</h1><br>

    <form method="post" action="editExperience.php?id=<?php echo($experience['id']);?>" enctype="multipart/form-data">

        <label for="titre">Titre</label>
        <input name="titre" required value="<?php echo($experience['titre']) ?>" class="form-control"><br><br>

        <label for="description">Description</label>
        <input name="description" required value="<?php echo($experience['description']) ?>" class="form-control"><br><br>

        <label for="date_debut">Date de début</label>
        <input name="date_debut" required type ="date"  value="<?php echo($experience['date_debut']) ?>" class="form-control"><br><br>

        <label for="date_fin">Date de fin</label>
        <input name="date_fin" required type ="date"  value="<?php echo($experience['date_fin']) ?>" class="form-control"><br><br>


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