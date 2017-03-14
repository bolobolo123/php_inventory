<?php

	$error_messages = array();
	$succes_messages = array();
	// DELETING PRODUCTS FROM BDD
	if(!empty($_GET['delete_id'])) {
		// HISTORIC
        $prepare = $pdo->prepare('INSERT INTO historic (object, user, modification) VALUES (:object, :user, :modification)');
        $prepare->bindValue('object', 'something');
        $prepare->bindValue('user', $_SESSION['login']);
        $prepare->bindValue('modification', 'deleted');
        $prepare->execute();
        //DELETE
		$prepare = $pdo->prepare('DELETE FROM products WHERE id=:id');
		$prepare->bindValue('id', $_GET['delete_id']);
		$prepare->execute();
	}
	if(!empty($_GET['deleteh_id'])) {
		$prepare = $pdo->prepare('DELETE FROM historic WHERE id=:id');
		$prepare->bindValue('id', $_GET['deleteh_id']);
		$prepare->execute();
	}

	// EDIT GET
	if (!empty($_GET['edit'])) {

		if (!empty($_GET['edit']['name'])) {
			$prepare = $pdo->prepare('UPDATE products SET name=:name WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('name', $_GET['edit']['name']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		} 
		if (!empty($_GET['edit']['price'])) {
			$prepare = $pdo->prepare('UPDATE products SET price=:price WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('price', $_GET['edit']['price']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		}
		if (!empty($_GET['edit']['type'])) {
			$prepare = $pdo->prepare('UPDATE products SET type=:type WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('type', $_GET['edit']['type']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		}
		if (!empty($_GET['edit']['stock'])) {
			$prepare = $pdo->prepare('UPDATE products SET stock=:stock WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('stock', $_GET['edit']['stock']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		}
		if (!empty($_GET['edit']['quantity'])) {
			$prepare = $pdo->prepare('UPDATE products SET quantity=:quantity WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('quantity', $_GET['edit']['quantity']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		}
		if (!empty($_GET['edit']['description'])) {
			$prepare = $pdo->prepare('UPDATE products SET description=:description WHERE id=:id');
			$prepare->bindValue('id', $_GET['edit']['id']);
			$prepare->bindValue('description', $_GET['edit']['description']);
			$prepare->execute();
			$succes_messages['edit'] = 'Success editing !';
		}
		// HISTORIC
		if (!empty($succes_messages['edit'])) {
			$prepare = $pdo->prepare('INSERT INTO historic (object, user, modification) VALUES (:object, :user, :modification)');
        	$prepare->bindValue('object', 'something');
        	$prepare->bindValue('user', $_SESSION['login']);
        	$prepare->bindValue('modification', 'modified');
        	$prepare->execute();
		}
	}