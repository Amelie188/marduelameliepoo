
<!DOCTYPE html>
<html>

    
<head>
    <meta charset="utf-8" />
</head>

<body>

<form method="post" action="connect2.php" enctype="multipart/form-data" >
    
 <label>Username : </label>
 <input name="username" type="text" placeholder="Utilisateur"> <br><br>

 <label>Lastname : </label>
 <input name="lastname" type="text" placeholder="Utilisateur"> <br><br>

 <label for="start">Date:</label>
<input type="date" id="start" name="date"
       value="2020-07-07"
       min="1940-01-01" max="2030-12-31"> <br><br>

 <label>Sexe</label>
 <div>
  <input type="radio" id="femme" name="sexe" value="femme"
         checked>
  <label for="femme">Femme</label>
</div>

<div>
  <input type="radio" id="homme" name="sexe" value="homme">
  <label for="homme">Homme</label>
</div>
  <br><br>
  
 <label>Mon fichier : </label>
 <input name="myAvatar" type="file"><br><br>

 <input type="submit"><br><br>

</form>



</body>
</html>