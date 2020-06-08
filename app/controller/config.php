
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
const DEBUG = false;

// Configuration de la base de données
$dsn = 'mysql:dbname=haondedg;host=localhost;charset=utf8';
$username = 'haondedg';
$password = 'Ot9VHEmX';


// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

