<?php


////////////////////////////////////  PARTIE COMPETENCES  /////////////////////////////////// */


   // *****************************  ADD COMPETENCES       ************************************************

function addBddCompetence($pdo){
    $req = $pdo->prepare(
        'INSERT INTO competence (titre, note)
        VALUES(:titre, :note)');
        $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        ]);
}



//*****************************    CHECK FORMULAIRE ADD COMPETENCES         ************************************************ */


   function validateFormCompetence() {
    $errors=[];
    
       if(empty($_POST['titre'])) {
           $errors[]= 'Merci de renseigner le titre de votre compétence';
       }

       if(empty($_POST['note'])) {
        $errors[]= 'Merci de renseigner votre note';
    }

    return ['errors'=> $errors] ;

    }  






    //*************************************  CHECK FORMULAIRE EDIT EXPERIENCE  ******************************************************** */

function getOneCompetence($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function editBddCompetence($pdo, $id){    
    
        $req = $pdo->prepare(
            'UPDATE competence SET titre = :titre , note = :note, WHERE id = :id');
        $req->execute([
            'titre' => $_POST['titre'],
            'note' => $_POST['note'],
            'id'=> $id

        ]);
    }
// }

    
   function validateEditFormCompetence() {
        $errors = [];
        
        if (empty($_POST['titre'])) {
            $errors[] = 'Merci de renseigner le titre de votre experience';
        }
        if ( empty($_POST['note'])) {
            $errors[] = 'Merci de renseigner votre note';
        }
        
        return ['errors'=>$errors];
    }
    
    

    //*************************************   SUPPRESSION EXPERIENCE  ******************************************************** */

    function deleteCompetence($pdo, $id)
   {
       $res = $pdo->prepare('DELETE FROM competence WHERE id = :id');
       $res->execute(['id'=> $id]);
   }


    //*************************************   SUPPRESSION EXPERIENCE  ******************************************************** */

  
function afficherNote($note) {

    for($i = 0; $i < $note; $i++) {
        echo('<img class="etoile " style="width: 1.5rem" src="images/etoile.png">');
    }

    for($i = $note; $i < 5; $i++) {
        echo('<img class="etoile" style="width: 1.5rem" src="images/etoilevide.png">');
    }
}

