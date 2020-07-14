
<!-- contient le formulaire de login -->

<h1> Bonjour, veuillez vous identifier</h1>

<!-- dans "action => indique le fichier vers lequel on redirige?? -->
<!-- le formulaire va envoyer une requete "post" à connect.php, avec le prenom et le nom -->
<form method="post" action="connect.php" enctype="multipart/form-data">

 <label>Prénom: </label>
 <input name="prenom" type="text" placeholder="Prénom"> <br><br>
 
 <label>Nom : </label>
 <input name="nom" type="text" placeholder="Nom"> <br><br>

 <label>Mot de passe : </label>
 <input name="password" type="text" placeholder="password"> <br><br>

<div>
  <input type="checkbox" id="rappelleToi" name="rappelleToi">
  <label for="rappelleToi">Se souvenir de moi!</label><br><br>
</div>
 
 <input type="submit">
</form>