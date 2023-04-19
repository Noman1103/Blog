<!DOCTYPE html>
<html lang="fr">
<?php
	session_start();
?>
<head>
	<meta charset="utf-8">
	<title>Page de connexion</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section id="login" class="bloc-white">
	<?php 
		if(isset($_SESSION['status'])){
			if($_SESSION['status'] === TRUE){
				header('Location: admin.php');
			}
			else{
				echo "<p>Nom de compte ou mot de passe incorrect</p>";
			}
		}
	?>
	<form method="post" action="verify.php">
		<label for="username">Nom de compte</label><br>
		<input type="text" name="username" id="username"><br>
		<label for="password">Mot de passe</label><br>
		<input type="password" name="password" id="password"><br>
		<input type="submit" value="connexion">
	</form>
	<a href="index.php">Retour page d'accueil</a>
	</section>
</body>
</html>