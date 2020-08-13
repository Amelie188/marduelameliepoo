<?php

class DefaultController{

    public function home() 
    {
        $voitureController = new voitureManager();   
        $voitures = $voitureController->selectAll();  
  
        require 'View/home_view.php';  
    }
}
