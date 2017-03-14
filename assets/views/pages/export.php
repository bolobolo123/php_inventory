<?php
	// SESSION SEC
	session_start();
	if (empty($_SESSION)) {
		header("location: ../../../index.php");
		exit;
	} 
	// INCLUDE CONFIG
	include '../../includes/config.php';
	// GET THE TABLE
	$prepare = $pdo->query('SELECT * FROM products'); 
	$result = $prepare->fetchAll();
	// FORMAT THE CSV FILE
	$datestamp = date("Y-m-d");  
	$filename = $datestamp."_products.csv";    
	// INSERT EXCEL
	header("Content-Disposition: attachment; filename=$filename");  
	header("Content-Type: application/vnd.ms-excel");  
	// EXPORT 
	print_r($result);
	exit
?>