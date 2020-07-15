<?php require_once ('includes.php');?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="styles.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

 </head>
 <body>

 <?php 
 $query = $pdo->prepare('SELECT * FROM experience WHERE id = :id'); 
 $query->execute(['id'=> $_GET['id']]); 
 ?>

<?php
$res = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>


<div class="card" style="width: 40rem ">

 <p><?php echo($fetchRes['id']) ?></p><br>

 <h4><u>Titre : </u> <?php echo($fetchRes['titre']) ?></h4><br>
 <p><u>Description : </u> <?php echo($fetchRes['description']) ?></p><br>
 <p><u>Date de début : </u> <?php echo($fetchRes['date_debut']) ?></p><br>
 <div><u>Date de fin  : </u> <?php echo($fetchRes['date_fin']) ?></div><br>
 <?php $res->closeCursor(); ?>


 <button class="btn btn-outline-info"><a title="retour" href="homepage.php">Retour</a></button><br><br> 


 </div>



</div>


</body>


</html>