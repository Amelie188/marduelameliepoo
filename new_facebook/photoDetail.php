<?php require_once ('pdo_connexion.php');?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

 </head>
 <body>

 <?php 
 $query = $pdo->prepare('SELECT * FROM photo WHERE id = :id'); 
 $query->execute(['id'=> $_GET['id']]); 
 ?>

<?php
$res = $pdo->prepare('SELECT * FROM photo WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>

<div class="card" style="width: 40rem ">

 <p><?php echo($fetchRes['id']) ?></p><br>

 <img src="<?php echo('uploads/'.$fetchRes['file_name']); ?>"
 alt="Image <?php echo($fetchRes['file_name']); ?>" > <br><br>
 <h4><u>Lieu : </u> <?php echo($fetchRes['lieu_publi']) ?></h4><br>
 <div><u>Date : </u> <?php echo($fetchRes['date_publication']) ?></div><br>
 <div><u>Posté par : </u> <?php echo($fetchRes['nom_prenom_utilisateur']) ?></div><br>
 <?php $res->closeCursor(); ?>


 <button class="btn btn-outline-info"><a title="Voir le détail" href="homepage.php">Retour</a></button><br><br> 


 </div>



</div>


</body>


</html>