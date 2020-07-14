<?php

function addPhotoBdd($pdo, $filename){
    $req = $pdo->prepare(
    'INSERT INTO photo (file_name, lieu_publi, date_publication, nom_prenom_utilisateur)
    VALUES(:file_name, :lieu_publi, :date_publication, :nom_prenom_utilisateur)');

    $req->execute([
    'photo' => $filename,
    'lieu_publi' => $_POST['lieu_publi'],
    'date_publication' => $_POST['date_publication'],
    'nom_prenom_utilisateur' => $_POST['nom_prenom_utilisateur'],   
    ]);
   }

 //*****************************    FORMULAIRE CREATION         ************************************************ */

   function validateForm() {

    $errors=[];
    $filename = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0){
        $errors[] = 'Merci de rajouter une photo';
       }

       if($_FILES['photo']['type'] === 'photo/png'){
            if($_FILES['photo']['size'] <80000){
                $extension = explode('/', $_FILES['photo']['type']);                       
                $filename = uniqid().'.'.$extension;                                         
                move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$filename);  
      
            } else {
                $errors[] = 'Votre fichier est trop lourd';
            }
            } else {
                $errors[] = 'Votre fichier n\'est pas .png';
            }

            if(empty($_POST['lieu_publi'])) {
                $errors[]= 'Merci de renseigner le lieu';
            }


      return ['errors'=> $errors, 'photo' => $filename];  

    }    