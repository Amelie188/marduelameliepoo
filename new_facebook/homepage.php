<?php
require('includes.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">


</head>

<body>

    <h1>Images</h1>

    <button class="btn btn-outline-info"><a title="Voir le détail" href="addPhoto.php">Ajouter une photo</a></button><br><br> 
         
            <?php
        $reponse = $pdo->query('SELECT * FROM photo');

        while ($info = $reponse->fetch()) {
        ?>

            <div class="card" style="width: 18rem;">
                <img src="uploads/<?php echo($info['file_name']);?>" class="card-img-top" alt="...">
               
                <div class="card-body">
                    <h5 class="card-title"><?php echo($info['id']); ?></h5><br>
                    <p class="card-text"><em><strong>Lieu: </strong></em><?php echo($info['lieu_publi']); ?></p>
                    <p class="card-text"><em><strong>Posté le: </strong></em> <?php echo($info['date_publication']); ?></p>
                    <p class="card-text"><em><strong>Posté par: </strong></em><?php echo($info['nom_prenom_utilisateur']); ?></p>

                    <a href="editPhoto.php?id=<?php echo($info['id']); ?>" class="btn btn-primary">Modifier une photo</a> <br><br>

                    <a href="photoDetail.php?id=<?php echo($info['id']); ?>" class="btn btn-primary">En savoir plus</a><br><br>

                    <a href="deletePhoto.php?id=<?php echo($info['id']); ?>" class="btn btn-primary">Supprimer ma photo</a>
                </div>
            </div><br>

            <?php
        }
    $reponse->closeCursor();
?>

<a href='disconect'>Adios! Je me déconnecte</a>


</body>

</html>