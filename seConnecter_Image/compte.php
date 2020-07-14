
<h1>Menu</h1>





<ul>
    <li><a href="index.php">Menu</a></li>
    <li><a href="reverse.php">Renverser une phrase</a></li>
    <li><a href="compte.php">Compter le nombre</a></li>

</ul>


<?php
$text = "Heureusement que j'ai Maxime qui m'aide!!!";
$search= 'e';

echo(substr_count ($text , $search, $offset = 0, strlen($text)));

?>