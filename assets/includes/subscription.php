<?php   
    // LOGS
    $error_messages = array();
    $success_messages = array();
        // POST
    // CHECK POST & SEC
    if (!empty($_POST)) {
    	// USERNAME SEC
    	if (empty($_POST['username'])) $error_messages['username'] = 'Invalid Username/Password';
        else $username = $_POST['username']; 
    	// PASSWORD SEC
    	if (empty($_POST['password'])) $error_messages['password'] = 'Invalid Username/Password';
        else $password = hash('sha256',$_POST['password']);
        
    	// NICE SITUATION
    	if (empty($error_messages)) {
    		// REQUEST
    		$prepare = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    		$prepare->bindValue('username', $username);
    		$prepare->bindValue('password', $password);
    		$prepare->execute();
    		// CLEAN
    		$success_messages[] = "User registered";
            $error_messages[] = "";
    		$_POST['username'] = '';
    		$_POST['password'] = '';
    	}
    } else {
    	$_POST['username'] = '';
    	$_POST['password'] = '';
    }