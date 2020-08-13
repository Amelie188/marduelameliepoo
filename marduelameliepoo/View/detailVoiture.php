<html>
<head>
    <?php
    include 'parts/stylesheets.html'
    ?>
</head>

<body>

<div class="card border-warning container-fluid mt-5" style="max-width: 30rem;">

<h1 class="text-center mt-3 mb-3">La voiture en détail</h1>
  
  <div class="card-body">
    <h5 class="card-title text-center"><b>ID: </b><?php echo $voiture->getId()?></h5>
    <p class="card-title text-center"><b>Marque: </b><?php echo $voiture->getMarque()?></p>
    <p class="card-title text-center"><b>Modèle: </b><?php echo $voiture->getModele()?></p>
    <p class="card-title text-center"><b>Energie: </b><?php echo $voiture->getEnergie()?></p>
    <p class="card-title text-center"><b>BoiteAuto: </b><?php echo $voiture->getBoiteAuto()?></p>
    <img src="uploads/<?php echo $voiture->getFile()?>" width="400" height="341">
    <br><br>
   
    <a href="index.php?controller=default&action=home" class="btn btn-danger container-fluid mt-5" >c'est tout bon</a>
  </div>
</div>

<?php
    include 'parts/scripts.html'
?>

</body>
</html>
