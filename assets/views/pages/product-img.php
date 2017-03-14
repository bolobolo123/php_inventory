<?php
	// SESSION SEC
	session_start();
	if (empty($_SESSION)) {
		header("location: ../../../index.php");
		exit;
	}
	// INCLUDES SCRIPTS > CONFIG + ADD
	include'../../includes/config.php';
	include'../../includes/add_product.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ajouter une image</title>
	<!-- META -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta description="">
	<!-- CSS -->
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/main.css">
</head>
<body>
	<a href="./product-form.php" alt="retour" class="add-product-retour"><i class="fa fa-chevron-left" ></i>Retour</a>
	<div class="pform1-container">
		<div class="title-container">
			<h2>Ajouter un produit</h2>
			<h1>Images</h1>
		</div>
		<div class="main-container">
			<form enctype="multipart/form-data" action="./home.php" method="post" class="pform1-container">
				<img src="#" alt="AN IMAGE WILL APPEAR IF YOU LOAD IT" class="show-img">
				<div class="show-info">
					<div class="info-title">
						<h2 class="title1">ABOUT FILE</h2>
						<h3 class="title2">Please upload only .png or .jpg files</h3>
					</div>
					<div class="info-container">
						<div class="info-block">
							<span class="block-title">MAIN INFOS</span>
							<span>Nom : <?= $_POST['name'] ?></span>
							<span>Réf : <?= $_POST['reference'] ?></span>
							<span>Type : <?= $_POST['type'] ?></span>
						</div>
						<div class="info-block">
							<span class="block-title">SELLING INFOS</span>
							<span>Price : <?= $_POST['price'] ?></span>
							<span>Quantity : <?= $_POST['quantity'] ?></span>
							<span>In <?= $_POST['stock'] ?></span>
						</div>
						<div class="info-block">
							<span class="block-title">FILE RESTRICTION</span>
							<span>Quantity : 1 Only</span>
							<span>Max Size : 1920x1080px</span>
							<span>Limit : 20Mb</span>
						</div>
						<div class="info-block">
							<span class="block-title">FILE INFOS</span>
							<span>file name : 50 char max</span>
							<span>Min Size :  300x300px</span>
							<span>Min Size : 0Mb</span>
						</div>
					</div>
					<div class="info-submit">
						<input type="file" name="image_url" id="fileImg">
						<label for="fileImg">
							<img src="../../img/upload-icon.png" alt="join">
							<span>Joindre un fichier</span>
						</label>
						<input type="submit" value="CONTINUE" class="submit-btn" name="addfile">
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- SCRIPTS -->
    <script src="../../scripts/product-img.js" charset="utf-8"></script>
</body>
</html>