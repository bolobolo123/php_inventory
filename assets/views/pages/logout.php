<?php
	include '../../includes/config.php';
	// STARTING SESSION;
	session_start();
	// CLEANING
	$_SESSION = array();
	session_unset();
	// DESTROY
	session_destroy();
	// REDIR
	header("location: ../../../index.php");
