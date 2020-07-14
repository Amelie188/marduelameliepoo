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
 $query = $pdo->prepare('SELECT * FROM planets WHERE id = :id'); 
 $query->execute(['id'=> $_GET['id']]); 
 ?>

<?php
$res = $pdo->prepare('SELECT * FROM planets WHERE id = :id');
$res->execute(['id'=> $_GET['id']]);
$fetchRes = $res->fetch();
?>

<div class="card">

 <h1><?php echo($fetchRes['name']) ?></h1><br>

 <img src="<?php echo('uploads/'.$fetchRes['image']); ?>"
 alt="Image de la planète <?php echo($fetchRes['name']); ?>" > <br><br>
 <h2><u>Allegiance : </u> <?php echo($fetchRes['allegiance']) ?></h2><br>
 <div><u>Key facts : </u> <?php echo($fetchRes['key_fact']) ?></div><br>
 <div><u>Terrain : </u> <?php echo($fetchRes['terrain']) ?></div><br>
 <?php $res->closeCursor(); ?>
 </div>

</div>


</body>


</html>