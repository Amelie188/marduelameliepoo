<?php

function addPhotoBdd($pdo, $filename){
    $req = $pdo->prepare(
    'INSERT INTO photo (file_name, lieu_publi, date_publication, nom_prenom_utilisateur)
    VALUES(:file_name, :lieu_publi, :date_publication, :nom_prenom_utilisateur)');

    $req->execute([
    'photo' => $filename,
    'lieu_publi' => $_POST['lieu_publi'],
    'date_publi' => $_POST['date_publi'],
    'nom_prenom_utilisateur' => $_POST['nom_prenom_utilisateur'],   
    ]);
   }

 //*****************************    FORMULAIRE CREATION         ************************************************ */


   function validateForm() {
    $errors=[];
    $filename = '';

    var_dump($_FILES);

       if($_FILES['photo']['size'] == 0){
        $errors[] = 'Merci de rajouter une photo';
       }

       if($_FILES['photo']['type'] === 'image/png'){
        
            if($_FILES['photo']['size'] <80000){
                $extension = $_FILES['photo']['type']; 
                $filename = uniqid().'.'.$extension[1];   
                move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$filename);  
      
            } else {
                $errors[] = 'Votre fichier est trop lourd';
            }
        } else {
           $errors[] = 'Votre fichier n\'est pas .png';
           var_dump('png');
       }

       if(empty($_POST['lieu_publi'])) {
           $errors[]= 'Merci de renseigner le lieu';
        
       }

       if(empty($_POST['date_publi'])) {
        $errors[]= 'Merci de renseigner la date de publication';
        }

        if(empty($_POST['nom_prenom_utilisateur'])) {
        $errors[]= 'Merci de renseigner l\'auteur';
        }

      return ['errors'=> $errors, 'photo' => $filename];  

    }  
