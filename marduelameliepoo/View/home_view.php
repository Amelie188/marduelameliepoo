<html>
<head>
    <?php
    include 'parts/stylesheets.html'
    ?>
</head>

<body>
    <div class="container card border-warning container-fluid mt-5">
    <h1 class="text-center mt-3 mb-3">Les voitures</h1>

    <div>
    <a href="index.php?controller=voiture&action=addForm">
        <button style="margin-bottom:10px;" class="btn btn-primary mr-2">Ajouter une voiture</button>
    </a>
     
</div>
    
    <br>

    <table class="table">
        <thead>
            <td>@Id</td>
            <td>Marque</td>
            <td>Modèle</td>
            <td>Energie</td>
            <td>boiteAuto</td> 
            <td>File</td> 
            <td>Je voudrais :</td>

            
        </thead>

        <tbody>
            <?php
                foreach ($voitures as $voiture) {
                    ?>
                    <tr>
                        <td><?php echo $voiture->getId()?></td>
                        <td><?php echo $voiture->getMarque()?></td>
                        <td><?php echo $voiture->getModele()?></td>
                        <td><?php echo $voiture->getEnergie()?></td>
                        <td><?php echo $voiture->getBoiteAuto()?></td>
                        <td>
                            <img src="uploads/<?php echo $voiture->getFile()?>" height="20%" width="50%">
                        </td>
              
                        <td>
                        <a href="index.php?controller=voiture&action=displayOne&id=<?php echo $voiture->getId()?>"><button style="margin-bottom:10px;" class="btn btn-Danger">Détail</button></a>
                        
                        <a href="index.php?controller=voiture&action=delete&id=<?php echo $voiture->getId()?>">  <button style="margin-bottom:10px;" class="btn btn-Success">Supprimer</button></a> 
                                               
                        </a>

                        </td>
                    </tr>
                    <?php
                }
                ?>
 

                </tbody>
            </table>
            </div>
        
            <br>
            <br>
        
            <?php
            include 'parts/scripts.html'
            ?>
            </body>
        </html>
        