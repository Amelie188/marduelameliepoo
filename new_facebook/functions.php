<?php

// *****************************  CHECK SI UTILISATEUR CONNU?        ************************************************


function getCheckPseudo($pdo){

    $res = $pdo -> prepare ('SELECT * FROM utilisateur where pseudo = :pseudo');
    $res -> execute (['pseudo' => $_POST['pseudo']]);
    return $res -> fetch();         
    
}


// *****************************         ************************************************

function addRegister($pdo){
    $req = $pdo->prepare(
        'INSERT INTO utilisateur(pseudo, nom, prenom , email, password)
        VALUES(:pseudo, :nom, :prenom, :email, :password)');
        $req->execute([
        'pseudo' => $_POST['pseudo'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'password' => md5($_POST['password'])
        ]);
}


?>


 <!-- *****************************  CHECK FORMULAIRE CREATION COMPTE        ************************************************ -->

<?php

function validateFormUser($pdo) {
    $errors = [];

        if(getCheckPseudo($pdo)){
           $errors[] = 'Utilisateur déjà connu';
    }
       
       if(empty($_POST['pseudo'])) {
           $errors[]= 'Merci de renseigner un pseudo';
       }

       if(empty($_POST['nom'])) {
            $errors[]= 'Merci de renseigner votre nom';
        }

        if(empty($_POST['prenom'])) {
            $errors[]= 'Merci de renseigner votre prenom';
            }

        if(empty($_POST['email'])) {
            $errors[]= 'Merci de renseigner votre email';
        }

        if(empty($_POST['password'])) {
            $errors[]= 'Merci de renseigner votre mot de passe';
            }

        return ['errors' => $errors];
    }  


    //  *****************************  CHECK FORMULAIRE LOGIN       ************************************************

    function validateFormLogin($pdo) {
        $errors = [];
    
            if(empty($_POST['pseudo'])) {
               $errors[]= 'Merci de renseigner un pseudo';
           }
    
           if(empty($_POST['password'])) {
                $errors[]= 'Merci de renseigner votre mot de passe';
            }

            // if(connectUser($pdo)){
            //     $errors[] = 'Erreur';
            // }

           return ['errors' => $errors];

        }

        

function connectUser($pdo){
    $errors =[];

    $res = $pdo -> prepare (
        'SELECT * FROM utilisateur where pseudo = :pseudo AND password = :password');
    $res -> execute ([

        'pseudo' => $_POST['pseudo'],
        'password' => md5($_POST['password'])
    ]);

    $result = $res -> fetch();   
    var_dump($result);
    // var_dump($_SESSION['utilisateur']);
    // die();
 if ($result == false) {
        $errors[] = 'Utilisateur inconnu';
    } else {
        session_start();
        $_SESSION['utilisateur'] = $result;
    }  
    return $errors;

}