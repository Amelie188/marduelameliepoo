<?php

require('includes.php');


$idCompetence = $_GET['id'];
$competence = getOneCompetence($pdo, $idCompetence);

$errors = [];


if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
 $formulaireModifValide = validateEditFormCompetence();
 $errors = $formulaireModifValide['errors'];

 if( count($errors) === 0) {
 editBddCompetence($pdo, $competence['id']);   
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

    <form method="post" action="editCompetence.php?id=<?php echo($competence['id']);?>" enctype="multipart/form-data">

        <label for="titre">Titre de votre compétence: </label>
        <input name="titre" required value="<?php echo($competence['titre']) ?>" class="form-control"><br><br>

        <label for="note">Votre note: </label>
        <input name="note" required value="<?php echo($competence['note']) ?>" class="form-control"><br><br>

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