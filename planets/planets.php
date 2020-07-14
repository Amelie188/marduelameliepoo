  

<?php require_once ('connexion.php');



// $reponse = $pdo->query('SELECT * FROM planets');?> 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">


 </head>
 <body>

<h1>Planètes</h1>

<button class="btn btn-outline-info"><a title="Voir le détail" href="addPlanet.php">Ajouter une planète</a></button><br><br>


            

 <table class="table table-striped table-responsive">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Statut</th>
            <th>Terrain</th>
            <th>Allegeance</th>
            <th>Faits</th>
            <th>Détail</th>
            <th></th>
            <th></th>

        </thead>
        <tbody>

        <!-- pour faire un select, je créer un objet '$reponse', j'appelle la méthode 'query' de mon objet PDO -->
            <?php
        $reponse = $pdo->query('SELECT * FROM planets');

        //retourne le tableau avec les données. Prend l'id, le nom,....le met dans data...??
        while ($data = $reponse->fetch()) {
        ?>
            <tr>
                <td><?php echo($data['id']); ?></td>
                <td><?php echo($data['name']); ?></td>
                <td><?php echo($data['status']); ?></td>
                <td><?php echo($data['terrain']); ?></td>
                <td><?php echo($data['allegiance']); ?></td>
                <td><?php echo($data['key_fact']); ?></td>
                <td>
                    <a title="Voir le détail" href="planetDetail.php?id=<?php echo($data['id']); ?>">
                    <img src="uploads/<?php echo($data['image']);?>" style="height: 40px;">
                    </a>
                </td>
                <td>
                    <button class="btn btn-outline-secondary" ><a title="Editer" href="editPlanet.php?id=<?php echo($data['id']); ?>">Modifier une planète</a></button>
                </td>
                <td>
                <i class="far fa-trash-alt"><a title="Delete" href="deletePlanet.php?id=<?php echo($data['id']); ?>">supprimer</a> </i>
                </td>
               

            </tr>
   
    <?php
        }
    $reponse->closeCursor();
?>
 </table>

    </body>

 </html>
 
 
 
 
 

