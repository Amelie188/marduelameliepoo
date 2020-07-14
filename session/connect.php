

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="session/session.css" />

</head>
<body>
    
<h1>Connexion</h1>


<!-- traite le formulaire -->
<?php
session_start();
if(!$_SESSION['variableCession']) { // si la variable de cession n'existe pas
 header('Location: login.php');  //redirige au login
}
 
// if(!empty($POST['password'] && !empty($POST['variableCession']))) {    //si j'ai bien une variable password et une variable username 

// vérifie si informations sont corrects, si oui, est redirigé vers la page des utilisateurs connectés
//ici, prenom et nom, correspondent à mes input "name" de mon fichier connect.php
if($_POST['prenom'] == 'test' && $_POST['nom'] == 'test' && $_POST['password'] == 'test') { 

 $_SESSION['variableCession'] = $_POST['prenom'];   //alors je remplie ma cession
 header('Location: index.php');  //et redirige l'utilsateur au fichier index.php, qui va voir qu"il y a bien une session 'variableCession', et donc nous redirigera vers 'welcome.php'
}
if(isset($_POST['rappelleToi'])){ //si la variable existe
    (setcookie("rappelleToi", $_POST['rappelleToi'], time()+3600)); //créer un cookie
}
?>
Bienvenue <?php echo($_SESSION['variableCession']);?> je me rapellerais de toi ! <br>   
<a href="disconect.php">Même si je me déconnecte ?</a>    

<!-- //TO DO =>>>>> reprendre checkbox, indique meme si pas coché!!! -->
<!-- //TO DO =>>>>> reprendre disconect, ne marche pas!!! -->



</body>
</html>