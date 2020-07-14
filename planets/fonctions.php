<?php




function getAllegiances() {
    return [
        'Lyonnaise',
        'Parisienne',
    ];
};

   function addBdd($pdo, $imageUrl){
    $req = $pdo->prepare(
    'INSERT INTO planets(name, status, terrain , allegiance, key_fact, image)
    VALUES(:name, :status, :terrain, :allegiance, :key_fact, :image)');
    $result = $req->execute([
    'name' => $_POST['name'],
    'status' => $_POST['status'],
    'terrain' => $_POST['terrain'],
    'allegiance' => $_POST['allegiance'],
    'key_fact' => $_POST['key_fact'],
    'image' => $imageUrl
    ]);
   }

   function deletePlanet($pdo, $id)
   {
       $res = $pdo->prepare('DELETE FROM planets WHERE id = :id');
       $res->execute(['id'=> $id]);
   }
   
//*****************************    FORMULAIRE CREATION         ************************************************ */


   //le tableau $error, sera incrémenté au fur et à mesure des erreurs
   //fonction qui va valider mon formulaire
   function validateForm() {
    $errors=[];
    $imageUrl = '';

       if($_FILES['image']['size'] == 0){
        $errors[] = 'Merci de rajouter une image';
       }

       if($_FILES['image']['type'] === 'image/png'){
            if($_FILES['image']['size'] <80000){
                $extension = explode('/', $_FILES['image']['type'])[1];                          //???????
                $imageUrl = uniqid().'.'.$extension;                                            //??????
                move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$imageUrl);  //???????
      
            } else {
                $errors[] = 'Votre fichier est trop lourd';
            }
    } else {
           $errors[] = 'Votre fichier n\'est pas .png';
       }

       if(empty($_POST['name'])) {
           $errors[]= 'Merci de renseigner le nom de la planète';
       }

       if(empty($_POST['status'])) {
        $errors[]= 'Merci de renseigner le statut de la planète';
        }

        if(empty($_POST['terrain'])) {
        $errors[]= 'Merci de renseigner le terrain de la planète';
        }

        if(empty($_POST['allegiance'])) {
            if(!in_array($_POST['allegiance'], getAllegiances())){
            $errors[]= 'Je ne connais pas cette planète';
        }    
        $errors[]= 'Merci de renseigner l\'allegiance de la planète';
        }

        if(empty($_POST['key_fact'])) {
            $errors[]= 'Merci de renseigner le key fact de la planète';
        }

      return ['errors'=> $errors, 'image' => $imageUrl];  

    }  

//*************************************FORMULAIRE EDITION******************************************************** */

function getOnePlanet($pdo,$id)
{
    $res = $pdo->prepare('SELECT * FROM planets WHERE id = :id');
    $res->execute(['id'=> $id]);
    return $res->fetch();
}


function editBdd($pdo, $imageUrl, $id){
    if(!is_null($imageUrl)){
        $req = $pdo->prepare('UPDATE planets SET name = :name, status = :status , terrain = :terrain , allegiance = :allegiance , key_fact = :key_fact , status = :status, image = :image WHERE id = :id');
        $req->execute([
            'name' => $_POST['name'],
            'status' => $_POST['status'],
            'terrain' => $_POST['terrain'],
            'allegiance' => $_POST['allegiance'],
            'key_fact' => $_POST['key_fact'],
            'image' => $imageUrl,
            'id'=> $id
        ]);
    } else {
        $req = $pdo->prepare('UPDATE planets SET name = :name, status = :status , terrain = :terrain , allegiance = :allegiance , key_fact = :key_fact , status = :status WHERE id = :id');
        $req->execute([
            'name' => $_POST['name'],
            'status' => $_POST['status'],
            'terrain' => $_POST['terrain'],
            'allegiance' => $_POST['allegiance'],
            'key_fact' => $_POST['key_fact'],
            'id'=> $id
        ]);
    }
}

   
    //le tableau $error, sera incrémenté au fur et à mesure des erreurs
   //fonction qui va valider mon formulaire
   
   function validateEditForm() {
        $errors = [];
        $imageUrl = null;
    
        if($_FILES['image']['size'] != 0) {
    
            if ($_FILES['image']['type'] === 'image/png') {
                if ($_FILES['image']['size'] < 80000) {
                    $extension = explode('/', $_FILES['image']['type'])[1];
                    $imageUrl = uniqid() . '.' . $extension;
                    move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'. $imageUrl);
                } else {
                    $errors[] = 'Fichier trop lourd impossible';
                }
            } else {
                $errors[] = 'Impossible : j\'accepte que les PNGS !';
            }
        }
        if (empty($_POST['name'])) {
            $errors[] = 'Veuillez saisir le nom de la planète';
        }
        if ( empty($_POST['status'])) {
            $errors[] = 'Veuillez saisir le status de la planète';
        }
        if ( empty($_POST['terrain'])) {
            $errors[] = 'Veuillez terrain le status de la planète';
        }
        if ( empty($_POST['allegiance'])) {
            if(!in_array($_POST['allegiance'], getAllegiances())){
                $errors[] = 'Allegiance inconue !!!';
            }
            $errors[] = 'Veuillez terrain l\'allegiance de la planète';
        }
        if ( empty($_POST['key_fact'])) {
            $errors[] = 'Veuillez la key fact de la planète';
        }
    
        return ['errors'=>$errors, 'image'=>$imageUrl];
    }
    
    ?>
    