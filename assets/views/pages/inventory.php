<?php
	// SESSION SEC
	session_start();
	if (empty($_SESSION)) {
		header("location: ../../../index.php");
		exit;
	} 
	// INCLUDES SCRIPTS > CONFIG + EDIT
	include '../../includes/config.php';
	include '../../includes/edit_product.php';
	// QUERY ALL PRODUCTS IN BDD
	$query = $pdo->query('SELECT * FROM products');
	$products = $query->fetchAll();
	// LOAD HEADER
	include '../partials/header.php'
?>
	<div class="container">
		<div class="product-title">
			<div class="title-container">
				<h1>Inventaire</h1>
				<h2>Tous les produits</h2>
			</div>
		</div>
			<div class="products">
				<?php foreach ($products as $_product) { ?>
					<div class="product">
						<div class="img-container">
							<img class="product-img" src="<?= $_product['file'] ?>" alt="#">
							<div class="edit">
								<a href="?edit[id]=<?= $_product['id'] ?>" class="edit-btn">
									<img src="../../img/edit-icon.png" alt="edit">
								</a>
								<a href="?delete_id=<?= $_product['id'] ?>" class="delete-btn">
									<img src="../../img/delete-icon.png" alt="delete">
								</a>
							</div>
							<div class="img-content">
								<div class="content-main">
									<input type="text" disabled="disabled" name="name" class="name" value="<?= $_product['name'] ?>">
									<input type="text" disabled="disabled" name="price" class="price" value="<?= $_product['price'] ?> $" >
								</div>
								<input type="text" list="type" disabled="disabled" name="type" class="type" value="<?= $_product['type'] ?>" >
								<datalist id="type">
        					<option value="Tennis">Tennis</option>
        					<option value="Running">Running</option>
        					<option value="Lifestyle">Lifestyle</option>
        					<option value="Basket">Basket</option>
        					<option value="Skateboard">Skateboard</option>
    					</datalist>
								<input type="text" disabled="disabled" name="stock" class="stock <?= $_product['stock'] ?>"> 
							</div>
						</div>
						<div class="product-content">
							<input type="text" class="qtty" disabled="disabled" name="quantity" value="<?= $_product['quantity'] ?>" >
							<textarea class="desc" disabled="disabled" name="description" value=""><?= $_product['description'] ?></textarea>
							<div class="date"><?= date("d-m-y", strtotime(str_replace('-','/', $_product['date'])))?></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<!-- SCRIPTS -->
		<script src="../../scripts/edit.js"></script>
</body>
</html>
