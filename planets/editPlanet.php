<?php

require('fonctions.php');
require('connexion.php');

$idPlanet = $_GET['id'];
$planet = getOnePlanet($pdo,$idPlanet);

$errors = [];
$imageUrl = null;


if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
 $formulaireModifValide = validateEditForm();
 $errors = $formulaireModifValide['errors'];
 $imageUrl = $formulaireModifValide['image'];

 if( count($errors) === 0) {
 editBdd($pdo, $imageUrl, $planet['id']);
 header('Location: planets.php');
 }
}

?>

<html>

<head>
</head>

<body>

<div style="text-align: center">

    <h1 style="text-align:center">Editer la planète</h1><br>

    <form method="post" action="editPlanet.php?id=<?php echo($planet['id']);?>" enctype="multipart/form-data">

        <label>Nom de la planète:</label>
        <input name="name" value="<?php echo($planet['name']) ?>" class="form-control" placeholder="Nom de la planète"><br><br>

        <label>Status de la planète: </label>
        <input name="status" value="<?php echo($planet['status']) ?>" class="form-control" placeholder="Status" ><br><br>

        <label>Terrain: </label>
        <input name="terrain" value="<?php echo($planet['terrain']) ?>" class="form-control" placeholder="Terrain" ><br><br>

        <label>Allegiance: </label>
        <select name="allegiance" class="form-control" placeholder="Allegiance" >
            <?php
            foreach (getAllegiances() as $allegiance) {
                $selected = '';
                if($planet['allegiance'] === $allegiance){
                    $selected = 'selected';
                }
                echo('<option '.$selected.' value="'.$allegiance.'">'.$allegiance.'</option>');
            }
            ?>
        </select><br><br>

        <label>Key facts: </label>
        <textarea name="key_fact" class="form-control" placeholder="Key facts" ><?php echo($planet['key_fact']) ?></textarea><br><br>

        <label>Image:</label> <br>
        <img src="<?php echo('uploads/'.$planet['image']);?>"><br><br>
        <input type="file" name="image" value="<?php echo($planet['image']) ?>"><br><br>

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