<!-- Connexion à la BDD -->


<?php


 try {
 $host = 'localhost';
 $dbName = 'cvamelie';
 $user = 'root';
 $password = '';
 $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $user, $password);

 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
}
catch (PDOException $e) {
    var_dump($e);
 throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage()); 
 exit;
}
//echo('<br>Hello base de données! <br><br><br>'); 

