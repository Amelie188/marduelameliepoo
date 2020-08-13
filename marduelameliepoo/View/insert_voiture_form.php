<html>
<head>
    <?php
    include 'parts/stylesheets.html';

    ?>
</head>

<body>


<div class="container card border-warning container-fluid mt-5">
<br>

<h1 class="text-center mt-3">Ajout d'une nouvelle voiture</h1>
<br>

    <a href="index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Oups! Go back!</button>
    </a>
<br>

<form method="post" action="index.php?controller=voiture&action=addVoiture" enctype="multipart/form-data">

<label>Marque</label>
<input name="marque" class="form-control"><br>

<label>Modèle</label>
<input name="modele" class="form-control"><br>

<!-- <label>Energie</label>
<input name="energie" class="form-control"><br> -->

<label>Energie</label>
<div class="input-group mb-3">
  
  <select class="custom-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="energie">
    <option selected>Choisir...</option>
    <option value="Essence">Essence</option>
    <option value="Diesel">Diesel</option>
    <option value="Electrique">Electrique</option>
    <option value="Hybride">Hybride</option>
  </select>
</div>

<label>Boite automatique?</label>
<br>
<input name="boiteAuto" id="boiteAuto1" type="radio" value="1" />
<label for="boiteAuto1">Oui</label>
<br>
<input name="boiteAuto" id="boiteAuto2" type="radio" value="2" />
<label for="boiteAuto2">Non</label>

<br>
<br>
<label>Image</label><br>
<input name="file" type="file"><br>

<br>

<input class="btn btn-success" type="submit" value="Ok, c'est tout bon!!!">



</form>
<br>


      <!-- Affichage des erreurs -->

      <?php
        if (isset($errors)) {
            echo ('<h2 class="text-danger mt-5">Liste des erreurs :</h2>
        <ol>');
            foreach ($errors as $error) {
                echo ('<li>' . $error . '</li>');
            }
            echo ('</ol>');
        }
        ?>


</div>
<?php
 include 'parts/scripts.html'
?>
</body>
