<!-- Connexion à notre BDD -->


<?php

//permet de se connecter à notre base de données, si on a pas de message d'erreur, on passe directement dans notre 'catch'

 try {
 $host = 'localhost';
 $dbName = 'new_facebook';
 $user = 'root';
 $password = '';
 $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $user, $password);

 // Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
}
catch (PDOException $e) {
    var_dump($e);
 throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage()); //si erreur, nous renseigne 'erreur....' avec derrière le message d'erreur 
 exit;
}
echo('<br>Hello base de données! <br><br><br>'); //message qui apparaitre si et seulement si, on est connecté

