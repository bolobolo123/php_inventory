<?php
	// LOGS
	$error_messages = array();
	$success_messages = array();
	// CLEAN THE SESSION TO GAIN TIME IF YOU WANNA TEST IT
	session_start();
	$_SESSION = array();
	session_unset();
	session_destroy();
		// POST
	// CHECK POST & SEC
	if (!empty($_POST)) {
		// USERNAME SEC
		if (empty($_POST['username'])) $error_messages['Warning'] = 'Invalid Username/Password';
		else $username = $_POST['username'];
		// PASSWORD SEC
		if (empty($_POST['password'])) $error_messages['Warning'] = 'Invalid Username/Password';
		else $password = hash('sha256',$_POST['password']);

		// NICE SITUATION
		if (empty($error_messages)) {
			// REQUEST
			$query = $pdo->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
			$query->bindValue('username', $username);
			$query->bindValue('password', $password);
			$query->execute();
			$users = $query->fetchAll();
			// IF EveryT IS GOOD > SESSION INIT
			if (!empty($users)) {
				session_cache_expire(2);
				$cache_expire = session_cache_expire();
				session_start();
				if (empty($_SESSION)) {
					$_SESSION['login']    = $username;
					$_SESSION['language'] = 'fr';
					$_SESSION['role']     = 'admin';
				} else {
					$error_messages['session'] = $_SESSION;
				}
				// CLEAN & REDIR
				$_POST['username'] = '';
	    		$_POST['password'] = '';
				header("location: ./assets/views/pages/home.php");
				exit;
			} else $error_messages['Warning'] = 'Invalid Username/Password';
		} else {
			$_POST['username'] = '';
	    	$_POST['password'] = '';
		}
	} 