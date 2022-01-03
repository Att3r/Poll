<?php 
//Andmebaasi ühendused
define("HOST", "localhost"); // Serveri nimi
define("USERNAME", "atterannus"); // Kasutajanimi
define("PASSWORD", "Annus2207"); // PHP Myadmin parool
define("DBNAME", "atterannus_poll"); // Andmebaasi nimi

$dsn = "mysql:host=".HOST.";dbname=".DBNAME;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

?>