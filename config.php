<?php

//conexão com o banco SQL SERVER
define('DB_HOST', 'localhost');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'paises');
define('DB_DRIVER', 'sqlsrv');

$pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
$pdoConfig .= "Database=" . DB_NAME . ";";

$pdo = new PDO($pdoConfig, DB_USER, DB_PASSWORD);

// $query = $pdo->query("SELECT * FROM pais");

// $query->fetchAll();