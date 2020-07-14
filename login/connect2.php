
<!-- on créer tout d'abord un fichier "uploads", ou on stock les fichiers "uploadés". -->

<?php

var_dump($_FILES); //me renvoi les infos à propos de mon fichier.


echo ('<h4> Je m\'appelle ' . $_POST['username'] ." ". $_POST['lastname']. ". Je suis une " . $_POST['sexe'] . ". Je suis née le "  .$_POST['date'] . '<br>' . '</h4>');

var_dump($_POST);

//Isset permet de vérifier que la variable superglobale est bien définie et quelle n'a pas d'erreur
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['myAvatar']) AND $_FILES['myAvatar']['error'] == 0) {

 // Verificatio de la taille du fichier, voir s'il n'est pas trop gros =>  
 if ($_FILES['myAvatar']['size'] <= 1000000){
     
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['myAvatar']['name']);
    $extension_upload = $_FILES['myAvatar']['type'];
    $extensions_autorisees = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');

    //s'il est dans ces extensions autorisées, alors on upload le fichier
   if (in_array($extension_upload, $extensions_autorisees)) {

     $extension=explode('/', $extension_upload)[1];
     $fileName = uniqid().'.'.$extension; //permet de donner un nom UNIQUE au fichier, pour ne pas écraser le fichier qui a le meme nom. fonction qui génère de manière aléatoire et uniqué une chaine de caractère

     // On peut valider le fichier et le stocker définitivement
     //permet de récuperer, là, ou il est stocké temporairement, ici, "MyAvatar/tmp_name, et le déplacer dans un dossier de mon serveur, ici, on dit qu'on le deplacera dans le dossier 'uploads/' et derrière son nom.
    move_uploaded_file($_FILES['myAvatar']['tmp_name'], 'uploads/'.$fileName); 

      echo "La photo est ok !";
      echo ("<img src = " . "uploads/" . $fileName.'>'); //affiche la photo

   } else {
   echo('J\'accepte que les images ...'); //répond au IF, qui demande les bonnes extensions
   }

   } else {
   echo('le fichier est trop lourd pour un petit serveur ... '); // répond au IF qui demande la taille
 }

}
?>
