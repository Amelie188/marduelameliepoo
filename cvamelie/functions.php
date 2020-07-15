<?php

// *****************************  ADD EXPERIENCE       ************************************************

function addBddExperience($pdo){
    $req = $pdo->prepare(
        'INSERT INTO experience (titre, description, date_debut, date_fin)
        VALUES(:titre, :description, :date_debut, :date_fin)');
        $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
        ]);
}


//*****************************    CHECK FORMULAIRE ADD EXPERIENCE         ************************************************ */


   function validateForm() {
    $errors=[];
    
       if(empty($_POST['titre'])) {
           $errors[]= 'Merci de renseigner le titre de votre experience';
       }

       if(empty($_POST['description'])) {
            $errors[]= 'Merci de renseigner la description de votre exprience';
        }

        if(empty($_POST['date_debut'])) {
            $errors[]= 'Merci de renseigner la date de debut de votre exprience';
        }

        if(empty($_POST['date_fin'])) {
            $errors[]= 'Merci de renseigner la date de fin de votre exprience';
        }

      return ['errors'=> $errors] ;

    }  



    //*************************************  CHECK FORMULAIRE EDIT EXPERIENCE  ******************************************************** */

function getOneExperience($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function editBddExperience($pdo, $id){  
    
        $req = $pdo->prepare(
            'UPDATE experience SET titre = :titre, description = :description, date_debut = :date_debut, date_fin = :date_fin, WHERE id = :id');
        $req->execute([
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin'],
            'id'=> $id

        ]);
    }
// }

    
   function validateEditForm() {
        $errors = [];
        
        if (empty($_POST['titre'])) {
            $errors[] = 'Merci de renseigner le titre de votre experience';
        }
        if ( empty($_POST['description'])) {
            $errors[] = 'Merci de renseigner la description de votre experience';
        }
        if ( empty($_POST['date_debut'])) {
            $errors[] = 'Merci de renseigner la date de debut de votre experience';
        }
        if ( empty($_POST['date_fin'])) {
            $errors[] = 'Merci de renseigner la date de fin de votre experience';
        }

        return ['errors'=>$errors];  //TO DO => est enlevé , 'photo'=>$filename
    }
    
    

    //*************************************   SUPPRESSION EXPERIENCE  ******************************************************** */

    function deleteExperience($pdo, $id)
   {
       $res = $pdo->prepare('DELETE FROM experience WHERE id = :id');
       $res->execute(['id'=> $id]);
   }




