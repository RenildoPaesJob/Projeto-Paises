<?php
//conexão com o banco SQL SERVER
define('DB_HOST', 'SISCON-0691');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', 'paises');
define('DB_DRIVER', 'sqlsrv');

$pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";" . "Database=" . DB_NAME . ";";

$pdo = new PDO($pdoConfig, DB_USER, DB_PASSWORD);