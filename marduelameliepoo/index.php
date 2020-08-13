<html>
    <head>
        <?php
        include 'View/parts/stylesheets.html';
        ?>
    </head>

   <?php
    require 'includes.php';

    if(empty($_GET)){
        $voitureController = new DefaultController();   
        $voitureController->home();
    }
    else if($_GET['controller'] === 'default' && $_GET['action'] === 'home'){
        $voitureController = new DefaultController();   
        $voitureController->home();
    }    
    else if($_GET['controller'] === 'voiture' && $_GET['action'] === 'addForm'){
        $voitureController = new VoitureController();  
        $voitureController->addVoitureForm();
    }
    else if($_GET['controller'] === 'voiture' && $_GET['action'] === 'addVoiture'){
        $voitureController = new VoitureController();
        $voitureController->addVoiture();
    }
    else if($_GET['controller'] === 'voiture' && $_GET['action'] === 'delete' && isset($_GET['id'])){
        $voitureController = new VoitureController();
        $voitureController->delete($_GET['id']);
    }
    else if($_GET['controller'] === 'voiture' && $_GET['action'] === 'displayOne' && isset($_GET['id'])){
        $voitureController = new VoitureController();
        $voitureController->displayOne($_GET['id']);
    }