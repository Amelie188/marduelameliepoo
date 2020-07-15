<?php
require('includes.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">

</head>

<body id="bodyhomepage">

<!-- <img src="images/cahier.jpg" class="img-fluid" alt="Responsive image"> -->
<!-- <h1>Développeur web</h1> -->

    <h1 class="partie">Experiences</h1><br>

    <button class="btn btn-outline-secondary"><a title="Ajout" href="addExperience.php">Ajouter une experience</a></button><br><br>
         

    <div id="experiences">

            <?php
        $reponse = $pdo->query('SELECT * FROM experience');

        while ($info = $reponse->fetch()) {
        ?>

            <div class="card" style="width: 18rem;">
               
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center"><?php echo($info['id']); ?></h5><br>
                    <p class="card-text"><em><strong>Nom: </strong></em><?php echo($info['titre']); ?></p>
                    <p class="card-text"><em><strong>Description: </strong></em> <?php echo($info['description']); ?></p>
                    <p class="card-text"><em><strong>Date de début: </strong></em><?php echo($info['date_debut']); ?></p>
                    <p class="card-text"><em><strong>Date de début: </strong></em><?php echo($info['date_fin']); ?></p>

                    <a href="editExperience.php?id=<?php echo($info['id']); ?>" class="btn btn-secondary">Modifier mon experience</a> <br><br>

                    <!-- <a href="detailExperience.php?id=<?php echo($info['id']); ?>" class="btn btn-secondary">En savoir beaucoup plus</a><br><br> -->

                    <a href="deleteExperience.php?id=<?php echo($info['id']); ?>" class="btn btn-secondary">Supprimer mon experience</a>
                </div>
            </div><br>

            <?php
        }
             $reponse->closeCursor();
            ?>

    </div>


    <!-- ****************************************************************** -->


    <h1 class="partie">Compétences</h1><br>

    <button class="btn btn-outline-secondary"><a title="Ajout" href="addCompetence.php">Ajouter une compétence</a></button><br><br>
         

    <div id="competences">

        <?php
        $reponse = $pdo->query('SELECT * FROM competence');

      //la fonction affiche les étoiles mais fout en l'air la présentation, elle ne doit pas etre utilisé correctement  

    // foreach($reponse as $competence) {     
               
        while ($data = $reponse->fetch()) {
        
?>
            <div class="card" style="width: 18rem;">
               
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center"><?php echo($data['id']); ?></h5><br>
                    <p class="card-text"><em><strong>Titre: </strong></em><?php echo($data['titre']); ?></p>
                
                
                <?php
                //           ('<h4>'. $competence['titre'] . '</h4>');
                        
                           //afficherNote($competence['note']);
                                          
               // }
                ?>  
                 

                    <p class="card-text"><em><strong>Note: </strong></em> <?php echo($data['note']); ?></p>
                   

                    <a href="editCompetence.php?id=<?php echo($data['id']); ?>" class="btn btn-secondary">Modifier mes compétences</a> <br><br>


                    <a href="deleteCompetence.php?id=<?php echo($data['id']); ?>" class="btn btn-secondary">Supprimer mes compétences</a>
                </div>
            </div><br>

            <?php
        }
        $reponse->closeCursor();
            ?>

    </div>




    <div>
    <button class="disconect btn btn-outline-secondary"><a title="disconect" href="disconect.php">Adios! Je me déconnecte</a></button><br><br>

    </div>




</body>

</html>