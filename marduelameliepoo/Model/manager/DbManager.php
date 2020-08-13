
 <?php

class DbManager{

       protected $pdo;
       private $host = 'localhost';
       private $dbName = 'marduelameliepoo';
       private $user = 'root';
       private $password = '';
    
        public function __construct(){

try {

        $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.';charset=utf8',$this->user,$this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    }


catch (PDOException $e) {
 throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage()); 
 exit;
}
//echo('<br>Hello base de données! <br><br><br>'); 

}


}