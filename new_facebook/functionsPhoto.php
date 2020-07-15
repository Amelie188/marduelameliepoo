<?php

function addPhotoBdd($pdo, $filename){
    $req = $pdo->prepare(
    'INSERT INTO photo (file_name, lieu_publi, date_publication, nom_prenom_utilisateur)
    VALUES(:file_name, :lieu_publi, :date_publication, :nom_prenom_utilisateur)');

    $req->execute([
    'file_name' => $filename,
    'lieu_publi' => $_POST['lieu_publi'],
    'date_publication' => $_POST['date_publi'],
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
        //    var_dump('png');
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



//*************************************FORMULAIRE EDITION******************************************************** */

function getOnePhoto($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM photo WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function editBdd($pdo, $filename, $id){
    if(!is_null($filename)){
        $req = $pdo->prepare('UPDATE photo SET file_name = :file_name, lieu_publi = :lieu_publi , date_publication = :date_publication , nom_prenom_utilisateur = :nom_prenom_utilisateur WHERE id = :id');
        $req->execute([
            'file_name' => $filename,
            'lieu_publi' => $_POST['lieu_publi'],
            'date_publication' => $_POST['date_publi'],
            'nom_prenom_utilisateur' => $_POST['nom_prenom_utilisateur'],
            'id'=> $id

        ]);
    } else {
        $req = $pdo->prepare('UPDATE photo SET lieu_publi = :lieu_publi , date_publication = :date_publication , nom_prenom_utilisateur = :nom_prenom_utilisateur WHERE id = :id');
        $req->execute([
            'lieu_publi' => $_POST['lieu_publi'],
            'date_publication' => $_POST['date_publi'],
            'nom_prenom_utilisateur' => $_POST['nom_prenom_utilisateur'],
            'id'=> $id

        ]);
    }
}

      
   function validateEditForm() {
        $errors = [];
        $filename = null;
    
        if($_FILES['file_name']['size'] != 0) {
    
            if ($_FILES['file_name']['type'] === 'image/png') {
                if ($_FILES['file_name']['size'] < 80000) {
                    $extension = explode('/', $_FILES['file_name']['type'])[1];
                    $filename = uniqid() . '.' . $extension;
                    move_uploaded_file($_FILES['file_name']['tmp_name'],'uploads/'. $filename);
                } else {
                    $errors[] = 'Fichier trop lourd impossible';
                }
            } else {
                $errors[] = 'Impossible : j\'accepte que les PNGS !';
            }
        }
        if (empty($_POST['lieu_publi'])) {
            $errors[] = 'Merci de renseigner le lieu';
        }
        if ( empty($_POST['date_publi'])) {
            $errors[] = 'Merci de renseigner la date de publication';
        }
        if ( empty($_POST['nom_prenom_utilisateur'])) {
            $errors[] = 'Merci de renseigner l\'auteur';
        }
           
        return ['errors'=>$errors, 'photo'=>$filename];
    }
    
    
    

    //*************************************SUPPRESSION******************************************************** */

    function deletePhoto($pdo, $id)
   {
       $res = $pdo->prepare('DELETE FROM photo WHERE id = :id');
       $res->execute(['id'=> $id]);
   }