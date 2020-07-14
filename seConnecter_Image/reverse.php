<h1>Menu</h1>

<ul>
    <li><a href="index.php">Menu</a></li>
    <li><a href="reverse.php">Renverser une phrase</a></li>
    <li><a href="compte.php">Compter le nombre</a></li>

</ul>


<?php
$string = trim("Heureusement que j'ai Maxime qui m'aide!!!");

for ($i = strlen($string)-1; $i >=0;$i--)
{
echo $string[$i];
}  
?>