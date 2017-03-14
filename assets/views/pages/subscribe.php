<?php
	// INCLUDES > CONFIG + SUBS SCRIPT
	include "../../includes/config.php";
	include "../../includes/subscription.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Subscription</title>
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
	<a href="../../../index.php" alt="subscribe" class="subscribe-redirect">Revenir à la connexion</a>
	<div class="subscribe-container">
		<form action="#" method="post" class="form-container">
			<div class="success-messages">
				<?php foreach ($success_messages as $_message){ ?> 
       				<p> <?= "$_message" ?></p>
       			<?php } ?>
			</div>
			<div class="errors-messages">
       			<?php foreach ($error_messages as $_message): ?> 
       				<p> <?= "$_message" ?></p>
       			<?php endforeach ?>
    		</div>
			<h2 class="form-title">Inscription</h2>
			<div class="input-container">
				<div class="labels">USERNAME</div>
				<input type="text" name="username" placeholder="USERNAME">
			</div>
			<div class="input-container">
				<div class="labels">PASSWORD</div>
				<input type="password" name="password" placeholder="PASSWORD">
			</div>

			<input type="submit" class="submit-btn" value="VALIDER">
		</form>
	</div>
</body>
</html>