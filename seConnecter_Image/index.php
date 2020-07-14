<!-- Exercice 1 : Ecrivez une fonction qui retourne une chaine de caractère inversée. -->
<!-- Exemple : 'Bonjour !' retournera '! ruojnoB' -->


<!-- *$string = trim("Vivement les vacances !!!");

*$len =strlen($string);

*$stringExp = str_split($string);

*for ($i = strlen($string)-1; $i >=0;$i--)
*{
*echo $string[$i];
*}  -->




<!-- Exercice 2 :
Créer une fonction qui prendra une chaine de caractère et une lettre en paramètre.
Cette fonction retournera le nombre de fois ou la lettre est présente dans notre chaine de caractére
Exemple :
Param 1 : Bonjour Aurélien,
Param2 : o
retournera: 2  -->

 

<!-- // $text = 'Amélie est la meilleure!';
// $search= 'l';
// echo(substr_count ($text , $search, $offset = 0, strlen($text))); -->


<!-- Exercice 3 :
// Ajoutez ces 2 fonctions dans un fichier de fonctions.
// Créez un menu (inverser une chaine de caractere, Compter des lettres) avec la navigation sur les 2 pages.
// Incluez les dans votre page pour naviguer entre ces deux Exercice. -->

<!-- 
// <h1>Menu</h1>


// <ul>
//     <li><a href="index.php">Menu</a></li>
//     <li><a href="reverse.php">Renverser une phrase</a></li>
//     <li><a href="compte.php">Compter le nombre</a></li>

// </ul> -->



 <!-- ------------------------------------------------------------------------------------- -->


<?php 

$listemail = [
'aureliendelorme1@gmail.com',
'test@gmail.com',
'smithcrank@gmail.com',
'test@humanbooster.com',
'test@supinfo.com',
'test@gmail.com',
'aurelien.delorme@orange.fr',
'test@yahoo.com',
'bonjour@msn.com',
'test@hotmail.com',
'adelorme@humanbooster.com',
];



foreach($listemail as $mail){

 $domaine= explode ("@", $mail);
 $listedomaine [] = $domaine[1];
}

var_dump($listedomaine);

var_dump(array_unique($listedomaine));

$total= (count($listedomaine));

print_r(array_count_values($listedomaine));


function percent($nombre, $total){
    return round(($nombre/$total)*100,2);
}



$correspondanceMailNombre = [];

foreach ($listedomaine as $domaine){
    // En début de parcours, je cré une clé du nom du domaine courant initialisé à 0
    $correspondanceMailNombre[$domaine] = 0;
    foreach ($listemail as $mail) {
        // Si les deux domaines sont similaires j'ajoute un à la clé de mon tableau qui correspondra au domaine
        if(explode('@',$mail)[1] == $domaine){
            $correspondanceMailNombre[$domaine] += 1;
        }
    }
}
?>

?>
<table class="table">
    <thead>
    <th>
        Domaine
    </th>
    <th>
        Nombre d'occurence
    </th>
    <th>
        Pourcentage
    </th>
    </thead>
    <tbody>
    <?php
        foreach ($correspondanceMailNombre as $index=>$value) {
            echo('
                <tr>
                    <td>'.$index.'</td>
                    <td>'.$value.'</td>
                    <td>'.percent($value, $total).'</td>
                </tr>
                 ');
        }
    ?>


    </tbody>
</table>






