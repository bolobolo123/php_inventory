<?php
	// INCLUDES > CONFIG + CONNEXION SCRIPT
	include 'assets/includes/config.php';
	include 'assets/includes/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion</title>
	<!-- META -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta description="Connect into the darkest site on the web">
	<!-- CSS -->
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/main.css">
</head>
<body>
	<a href="./assets/views/pages/subscribe.php" alt="subscribe" class="subscribe-redirect">Pas encore de compte ?</a>
	<div class="connexion-container">
		<form action="#" method="post" class="form-container">
			<div class="success-messages">
				<?php foreach ($success_messages as $_message){ ?> 
	       			<p> <?= "$_message" ?></p>
	       		<?php } ?>
			</div>
			<div class="errors-messages">
       			<?php foreach ($error_messages as $_key => $_message): ?> 
       				<p> <?= "$_key: $_message" ?></p>
       			<?php endforeach ?>
    		</div>
			<h2 class="form-title">Connexion</h2>
			<div class="input-container">
				<div class="labels">USERNAME</div>
				<input type="text" name="username" placeholder="USERNAME">
			</div>
			<div class="input-container">
				<div class="labels">PASSWORD</div>
				<input type="password" name="password" placeholder="PASSWORD">
			</div>
			<input type="submit" class="submit-btn" value="VALIDER" name="connexion">
		</form>
	</div>
</body>
</html>