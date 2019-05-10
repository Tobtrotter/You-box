<?php

/*
pour utiliser ce fichier, vous devez duppliquer celui-ci (ne pas le supprimer) puis le renommer en retirant le .dist
Cela permet a chacun d'avoir ses informations de connexions a la base de données 
*/


$dbname = ''; // Nom de la base de données
$dbuser = ''; // Nom d'utilisateur de la base de données
$dbpass = ''; // Mot de passe d'accès a la base de donnée


$dbh = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8', $dbuser, $dbpass);