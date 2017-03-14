<?php
	// SESSION SEC
	session_start();
	if (empty($_SESSION)) {
		header("location: ../../../index.php");
		exit;
	}
	// INCLUDES SCRIPTS > CONFIG + ADD + EDIT
	include '../../includes/config.php';
	include '../../includes/add_product.php';
	include '../../includes/edit_product.php';
	// QUERY ALL PRODUCTS & HISTORY IN BDD
	$query = $pdo->query('SELECT * FROM products');
	$products = $query->fetchAll();
	$query = $pdo->query('SELECT * FROM historic');
	$historic = $query->fetchAll();
	// LOAD HEADER
	include '../partials/header.php';
?>
    <div class="container">	
		<div class="dashboard">
			<div class="prod-alerts">
				<div class="add-product">
					<h2 class="add-title">Ajouter un nouveau produit</h2>
					<div class="add-text">
						Créez un nouveau produit en y indiquant le type, les informations, et une image afin de le répértorier dans l'inventaire. N'hésitez pas 
					</div>
					<a href="./product-form.php" alt="add product" class="add-redirect"><span>+</span></a>
				</div>
				<div class="alerts">
					<div class="container-alerts">
						<h2 class="alerts-title">Alertes</h2>
						<div class="alerts-text">
							L'ensemble des alertes concernant les stock
						</div>
					</div>
					<div class="alerts-products"> 
						<div class="intro-product">
							<div class="product">
								Produit
							</div>
							<div class="date"> 
								Date
							</div>
							<div class="qtty"> 
								Qtté
							</div>
						</div>
						<?php foreach ($products as $_product) { 
							if ($_product['quantity'] < 15) { ?>
								<div class="alerts-product">
									<div class="product">
										<span class="name"><?= $_product['name'] ?></span>
										<span class="type"><?= $_product['type'] ?></span>
									</div>
									<div class="date"> 
										<span><?= $_product['date'] ?></span>
									</div>
									<div class="qtty"> 
										<span class="warning"><?= $_product['quantity'] ?></span>
									</div>
									<a href="?delete_id=<?= $_product['id'] ?>" class="delete"> 
										<img src="../../img/delete-icon.png" alt="delete">
									</a>
								</div>
							<?php }
						} ?>
					</div>
				</div>
			</div>
				<div class="recap">
					<div class="container-recap">
						<div class="recap-title">Historique</div>
						<div class="recap-text">Historique de votre Session</div>
					</div>
					<div class="recap-historic">
					<?php foreach ($historic as $_historic) { ?>
						<div class="recap-product">
							<div class="product">
								<span class="name"><?= $_historic['user'] ?></span>
								<span class="type">has <?= $_historic['modification'] ?> <?= $_historic['object'] ?></span>
							</div>
							<div class="date"> 
								<span><?= $_historic['date'] ?></span>
							</div>
							<a href="?deleteh_id=<?= $_historic['id'] ?>" class="delete"> 
								<img src="../../img/delete-icon.png" alt="delete">
							</a>
						</div>
					<?php } ?>
					</div>
				</div>
				<div class="recap">
				<div class="container-recap">
					<h2 class="recap-title">Récapitulatif</h2>
					<div class="recap-text">
						Récapitulatif des derniers articles ajoutés
					</div>
				</div>
				<div class="recap-products"> 
					<div class="intro-product">
						<div class="product">
							Produit
						</div>
						<div class="date"> 
							Date
						</div>
						<div class="qtty"> 
							Qtté
						</div>
					</div>
					<?php foreach ($products as $_product) { ?>
						<div class="recap-product">
							<div class="product">
								<span class="name"><?= $_product['name'] ?></span>
								<span class="type"><?= $_product['type'] ?></span>
							</div>
							<div class="date"> 
								<span><?= $_product['date'] ?></span>
							</div>
							<div class="qtty"> 
								<span><?= $_product['quantity'] ?></span>
							</div>
							<a href="?delete_id=<?= $_product['id'] ?>" class="delete"> 
								<img src="../../img/delete-icon.png" alt="delete">
							</a>
						</div>
					<?php } ?>
				</div>
				</div>
		</div>
	</div>
<!-- SCRIPTS -->
    <script src="../../scripts/home.js" charset="utf-8"></script>
</body>
</html>