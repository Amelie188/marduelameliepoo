<?php

// // *****************************  CHECK SI user CONNU?  ************************************************


 function getCheckEmail($pdo){

     $res = $pdo -> prepare ('SELECT * FROM user where email = :email');
     $res -> execute (['email' => $_POST['email']]);
     return $res -> fetch();         
    
}


// *****************************  ADD REGISTER  ************************************************

function addRegister($pdo){
    $req = $pdo->prepare(
        'INSERT INTO user (nom, prenom , mot_de_passe, email)
        VALUES(:nom, :prenom, : mot_de_passe, :email)');
        $req->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'mot_de_passe' => md5($_POST['mot_de_passe']),
        'email' => $_POST['email']
      ]);
}


?>


 <!-- *****************************  CHECK FORMULAIRE ADD REGISTER  ************************************************ -->

<?php

function validateFormUser($pdo) {
    $errors = [];

        if(getCheckEmail($pdo)){
           $errors[] = 'email déjà connu';
        }
       
       if(empty($_POST['nom'])) {
            $errors[]= 'Merci de renseigner votre nom';
        }

        if(empty($_POST['prenom'])) {
            $errors[]= 'Merci de renseigner votre prenom';
            }

        if(empty($_POST['email'])) {
            $errors[]= 'Merci de renseigner un mot de passe';
        }

        if(empty($_POST['mot_de_passe'])) {
            $errors[]= 'Merci de renseigner votre email';
            }

        return ['errors' => $errors];
    }  


    //  *****************************  CHECK FORMULAIRE LOGIN   ************************************************

    function validateFormLogin($pdo) {
        $errors = [];
    
            if(empty($_POST['email'])) {
               $errors[]= 'Merci de renseigner un email';
           }
    
           if(empty($_POST['mot_de_passe'])) {
                $errors[]= 'Merci de renseigner votre mot de passe';
            }

            return ['errors' => $errors];

        }

        

    function connectUser($pdo){
        $errors =[];

        $res = $pdo -> prepare (
            'SELECT * FROM user where email = :email AND mot_de_passe = :mot_de_passe');
        $res -> execute ([

            'email' => $_POST['email'],
            'mot_de_passe' => md5($_POST['mot_de_passe'])
        ]);

        $result = $res -> fetch();   
        //var_dump($result);
        //var_dump($_SESSION['utilisateur']);
        //die();
    if ($result == false) {
            $errors[] = 'Utilisateur inconnu';
        } else {
            session_start();
            $_SESSION['utilisateur'] = $result;
        }  
        return $errors;

    }