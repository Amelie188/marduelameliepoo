<?php

class VoitureManager extends DbManager
{
    public function __construct()
    {
        parent::__construct(); 
       
    }


//*************************************************************  CRUD   *************************************************************/

// ======================> AFFICHAGE ALL

public function selectAll()
    {
        $voitures = [];  
        $sql =  'SELECT * FROM voiture';  

        foreach ($this->pdo->query($sql) as $row) {   
            $voitures[] = new Voiture($row['id'], $row['marque'], $row['modele'], $row['energie'], $row['boiteAuto'], $row['file']);
        }

        return $voitures;   
    }

// ======================> AJOUT 

public function addVoiture(Voiture $voiture)   
{

    $marque= $voiture->getMarque();   
    $modele = $voiture->getModele();
    $energie = $voiture->getEnergie();
    $boiteAuto = $voiture->getBoiteAuto();
    $file = $voiture->getFile();


    $requete = $this->pdo->prepare("INSERT INTO voiture (marque, modele, energie, boiteAuto, file) VALUES (?,?,?,?,?)");
    $requete->bindParam(1, $marque);
    $requete->bindParam(2, $modele);
    $requete->bindParam(3, $energie);
    $requete->bindParam(4, $boiteAuto);
    $requete->bindParam(5, $file);
 
    $requete->execute(); 
    $voiture->setId($this->pdo->lastInsertId());   
}

// ======================> SUPPRESSION

public function delete($id)
{
    $requete = $this->pdo->prepare("DELETE FROM voiture where id = ?");
    $requete->bindParam(1, $id);
    $requete->execute();
}

// ======================> DISPLAY ONE

public function selectVoiture($id)
{
    $requete = $this->pdo->prepare("SELECT * FROM voiture WHERE id=?");  // 
    $requete->bindParam(1, $id);
    $requete->execute();
    $res = $requete->fetch();
    $voiture = new Voiture($res['id'], $res['marque'], $res['modele'], $res['energie'], $res['boiteAuto'], $res['file']); 

     return $voiture;
 }












    
}


