<?php   
    $error_messages = array();
    $success_messages = array();
    // CANCEL BTN
    if ( (!empty($_POST)) && (isset($_POST['cancelinfo']))) {
        header('location: ./home.php');
    }
        // INFO UPLOAD
    // CHECK POST & SEC
    if ( (!empty($_POST)) && (isset($_POST['addinfo']))) {
    	// NAME SEC
    	if (empty($_POST['name']))
    		$error_messages['name'] = 'Invalid Name';
        else
            $name = $_POST['name']; 
    	// REF SEC
    	if (empty($_POST['reference']))
    		$error_messages['reference'] = 'Invalid Reference';
        else 
            $ref = $_POST['reference'];
        // TYPE SEC
        if (empty($_POST['type']))
            $error_messages['type'] = 'Invalid Type';
        else 
            $type = $_POST['type'];
        // PRICE SEC
        if (empty($_POST['price']))
            $error_messages['price'] = 'Invalid price';
        else 
            $price = $_POST['price'];
        // QTTY SEC
        if (empty($_POST['quantity']))
            $error_messages['quantity'] = 'Invalid quantity';
        else 
            $qtty = $_POST['quantity'];
        // DESCRIPTION SEC
        if (empty($_POST['description']))
            $error_messages['description'] = 'Invalid description';
        else 
            $desc = $_POST['description'];
        // plus SEC
        if (empty($_POST['plus']))
            $error_messages['plus'] = 'Invalid plus';
        else 
            $plus = $_POST['plus'];
        // STOCK SEC
        if (empty($_POST['stock']))
            $error_messages['stock'] = 'Invalid stock';
        else 
            $stock = $_POST['stock'];

    	// NICE SITUATION
    	if (empty($error_messages)) {
    		// Prepare request
    		$prepare = $pdo->prepare('INSERT INTO products (name, reference, type, price, quantity, description, plus, stock) VALUES (:name, :reference, :type, :price, :quantity, :description, :plus, :stock)');
    		// Bind and Send
    		$prepare->bindValue('name', $name);
            $prepare->bindValue('reference', $ref);
            $prepare->bindValue('type', $type);
            $prepare->bindValue('price', $price);
            $prepare->bindValue('quantity', $qtty);
            $prepare->bindValue('description', $desc);
            $prepare->bindValue('plus', $plus);
            $prepare->bindValue('stock', $stock);
    		$prepare->execute();
            // HISTORIC
            $prepare = $pdo->prepare('INSERT INTO historic (object, user, modification) VALUES (:object, :user, :modification)');
            $prepare->bindValue('object', $name);
            $prepare->bindValue('user', $_SESSION['login']);
            $prepare->bindValue('modification', 'created');
            $prepare->execute();
            // STOCK FOR SECOND FORM
            if ( (isset($_POST['name'])) && isset($_SESSION) ){
                $_SESSION['last_imgName'] = $_POST['name'];
            }
    	} else {
            // CLEANING
        	$_POST['name'] = '';
            $_POST['reference'] = '';
            $_POST['type'] = '';
            $_POST['price'] = '';
            $_POST['quantity'] = '';
            $_POST['description'] = '';
            $_POST['plus'] = '';
        	$_POST['stock'] = '';
            // REDIR
            header('location: ./product-form.php');
            exit;
        }
    }

        // UPLOAD FILE
    // IF AN IMAGE IS UPLOADED
    if ((!empty($_FILES)) && (isset($_POST['addfile'])) ) {
        // Reset error from prev page
        $error_messages = array();
        $extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        $extension  = strtolower(  substr(  strrchr($_FILES['image_url']['name'], '.')  ,1)  );
        $img_sizes   = getimagesize($_FILES['image_url']['tmp_name']);
        $maxsize    = '2000000';
        $max_width  = '16000';
        $max_height = '16000';
        // FILE SECURITY
        // UPLOAD SEC
        if ($_FILES['image_url']['error'] > 0) 
            $error_messages['file'] = "Erreur lors du transfert";
        // SIZE SEC
        if ($_FILES['image_url']['size'] > $maxsize)
            $error_messages['file'] = "Le fichier est trop gros";
        // FILETYPE SEC
        if (!in_array($extension,$extensions))
            $error_messages['file'] = "Mauvais format";
        // FILE DIM SEC
        if ($img_sizes[0] > $max_width OR $img_sizes[1] > $max_height)
            $error_messages = "Image trop grande";
        // NICE SITUATION
        if (empty($error_messages)) {
            $img_name = "../../img/upload/{$_FILES['image_url']['name']}";
            $resultat = move_uploaded_file($_FILES['image_url']['tmp_name'],$img_name);
            $prepare = $pdo->prepare('UPDATE products SET file=:file WHERE name=:name');
            $prepare->bindValue('file', $img_name);
            $prepare->bindValue('name', $_SESSION['last_imgName']);
            $prepare->execute();
            // CLEAN
            $_SESSION['last_imgName'] = '';
        } 
    } 
 