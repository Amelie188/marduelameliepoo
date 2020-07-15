<?php

$isConnected = false;
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $isConnected = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <a class="navbar-brand" href="">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if ($isConnected) {
              
            echo '
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="homepage.php" role="button">Mes images</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addPhoto.php" role="button">Ajouter une photo</a>
                    </li>
                </ul>
             ';
        }
        ?>
            <ul class="navbar-nav ml-auto">
                <?php if ($isConnected) {
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="disconect.php" role="button">Se déconnecter</a>
                    </li>
                ';
            } else {
                echo '
                    <li class="nav-item">
                        <a class="nav-link" href="register.php" role="button">Créer un compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" role="button">Se connecter</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="disconect.php" role="button">Se déconnecter</a>
                </li>
            ';
            }
            ?>
            </ul>
        </div>
    </nav>

    </body>

</html>