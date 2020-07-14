<?php
var_dump($_POST);

if ($_POST['login'] == 'amel' && $_POST['password'] == 'amel') {
  echo("<h1> Bienvenue ".$_POST['login'].
    "!");
} else {
  echo('Probleme d\'authentification veuillez réessayer');
} 


