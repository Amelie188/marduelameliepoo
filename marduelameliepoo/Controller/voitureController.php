<?php
class VoitureController{

    public function addVoitureForm()  
    {
        require 'View/insert_voiture_form.php'; 
    }

    public function addVoiture()   
    {
            $imageUrl = null;

            $voiture = new Voiture (null, $_POST['marque'], $_POST['modele'], $_POST['energie'],$_POST['boiteAuto'], $imageUrl); 
            $voitureManager = new VoitureManager();  

            $errors = [];
       

            if($_FILES['file']['size'] != 0) {
    
                if ($_FILES['file']['type'] === 'image/jpeg') {
                    if ($_FILES['file']['size'] < 800000) {
                        $extension = explode('/', $_FILES['file']['type'])[1];
                        $imageUrl = uniqid() . '.' . $extension;


                        move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'. $imageUrl);
                    } else {
                        $errors[] = 'Fichier trop lourd';
                    }
                } else {
                    $errors[] = 'Impossible : j\'accepte que les Png';
                }
            }

            if (empty($_POST['marque'])) {
                $errors[] = 'Le champ marque est requis';
            }
            if (empty($_POST['modele'])) {
                $errors[] = 'Le champ modele est requis';
            }
            if (empty($_POST['energie'])) {
                $errors[] = 'Le champ energie est requis';
            }
            if (empty($_POST['boiteAuto'])) {
                $errors[] = 'Le champ boiteAuto est requis';
            }

            if (count($errors) === 0) {

            $voiture->setFile($imageUrl) ;

           $voitureManager->addVoiture($voiture);
            header('Location:index.php?controller=default&action=home');  

        } else {
            require('View/insert_voiture_form.php');
            }
        
    }

    public function delete($id)  
    {
        $voitureManager = new VoitureManager();  
        $voitureManager->delete($id);  
        header('Location:index.php?controller=default&action=home');  
    }

    public function displayOne($id){ 
        $voitureManager= new VoitureManager();
        $voiture=$voitureManager->selectVoiture($id);  

        require 'View/detailVoiture.php';
    }


   
    
    





}
