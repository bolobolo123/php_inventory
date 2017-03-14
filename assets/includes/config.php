<?php
// Connexion variables
define('DB_HOST','localhost');
define('DB_NAME','inventory_bdd');
define('DB_USER','root');
define('DB_PASS','root'); // Default Windows

try {
	// Connexion to db
	$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
	// Set fetch mode to object
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	die('Could not connect');
}